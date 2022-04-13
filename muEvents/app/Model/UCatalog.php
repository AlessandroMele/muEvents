<?php

namespace App\Model;

use Illuminate\Http\Request;
use App\Model\Resources\Event;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Database\Eloquent\Model;
use DB;

class UCatalog extends Model {

    public $paged = 2;

    
    //Restituisce l'id dell'utente corrente
    public function GetId() {
        return Auth::user()->id;
    }

    
    //Restituisce tutti i dati dell'utente corrente
    public function GetUser() {
        $account = User::where('id', $this->GetId());
        return $account;
    }

    
    //Restituisce un array associativo da mostrare come select nel form di filtraggio per Organizzazione
    public function GetOrganizersForFilters() {
        $organizers = User::select('username')->distinct()->where('role', 'organizer')->orderBy('username', 'ASC')
                ->pluck('username', 'username');
        return $organizers;
    }

    
    //Restituisce tutti i dati delle organizzazioni
    public function GetOrganizers() {
        $organizers = User::where('role', 'organizer');
        return $organizers->paginate($this->paged);
    }

    
    //Modifica nel DB i dati inseriti dall'utente corrente
    public function ModUser(Request $request) {
        $user = User::find($this->GetId());
        if ($request->filled('username'))
            $user->username = $request->username;
        if ($request->filled('email'))
            $user->email = $request->email;
        if ($request->filled('password') && ($request->password != ''))
            $user->password = Hash::make($request->password);
        if ($request->filled('name'))
            $user->name = $request->name;
        if ($request->filled('surname'))
            $user->surname = $request->surname;
        $user->save();
    }

    
    //Restituisce tutti gli utenti di livello 2
    public function GetUsers() {
        $users = User::where('role', 'user');
        return $users->paginate($this->paged);
    }

    
    //Cancella l'utente identificato dal suo id (grazie a cascade si eliminano anche participation e purchases)
    public function DelUser($userId) {
        User::where('id', $userId)->delete();
    }

    
    //ritorna tutte le informazione dell'organizzatore 
    public function GetOrganizerById($orgId) {
        $org = User::where('id', $orgId)->where('role', 'organizer')->get();
        return $org;
    }

    
    //Ritorna biglietti venduti e ricavo di un'organizzazione partendo dall'id
    public function GetStatsForOrganizator($orgId) {
        //numero di biglietti venduti dall'organizzazione (considerando tutti gli eventi)
        $tickets = User::join('managements', 'users.id', 'managements.userId')
                        ->join('events', 'events.id', 'managements.eventId')
                        ->join('purchases', 'purchases.eventId', 'events.id')->where('users.id', $orgId)->count();
        //rawQuery per calcolare la somma degli incassi per ogni singolo evento 
        $cash = DB::select(DB::raw("SELECT SUM(discountedPrice) AS IncassoTotale,managements.userId
           FROM managements JOIN (events JOIN (purchases JOIN users ON users.id=purchases.userId)
           ON purchases.eventId=events.id) ON managements.eventId=events.id GROUP BY managements.userId
           HAVING managements.userId=$orgId"));
        //il ricavo viene arrotondato
        $cash = round($cash[0]->IncassoTotale, 2);
        $stats = ['tickets' => $tickets, 'cash' => $cash];
        return $stats;
    }

    
    //Viene creata una nuova organizzazione 
    public function CreateOrg(Request $request) {
        User::create(['name' => $request->name, 'surname' => $request->surname, 'email' => $request->email,
            'username' => $request->username, 'password' => Hash::make($request->password),
            'role' => 'organizer']);
    }

    
    //Modifica nel DB i dati dell'organizzatore inseriti dall'admin
    public function UpdateOrg(Request $request) {
        $user = User::find($request->id);

        $request->validate(['name' => ['required', 'string', 'max:20'],
            'surname' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:30', \Illuminate\Validation\Rule::unique('users')->ignore($request->id)],
            'username' => ['required', 'string', 'min:8', 'max:20', \Illuminate\Validation\Rule::unique('users')->ignore($request->id)],
            'password' => ['nullable', 'string', 'min:8', 'confirmed']]);

        if ($request->filled('email'))
            $user->email = $request->email;

        if ($request->filled('password') && ($request->password != ''))
            $user->password = Hash::make($request->password);

        if ($request->filled('name'))
            $user->name = $request->name;

        if ($request->filled('surname'))
            $user->surname = $request->surname;

        $user->save();
    }

    
    //Elimino dal DB le partecipazioni, gli acquisti, la gestione, gli eventi ed infine l'organizzatore (una sola query grazie a cascade)
    public function DeleteOrg($orgId) {
        Event::join('managements', 'eventId', 'events.id')->join('users', 'userId', 'users.id')->where('userId', $orgId)->delete();
        User::where('id', $orgId)->delete();
    }

}
