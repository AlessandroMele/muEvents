<?php

namespace App\Model;

use Carbon\Carbon;
use App\Model\Resources\Event;
use App\Model\Resources\Management;
use App\Model\UCatalog;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class ECatalog extends Model {

    public $paged = 4;
    protected $_user;

    public function __construct() {
        $this->_user = new UCatalog;
        //Inizializzo le regioni come array associativo da passare alla form
        $this->_regions = ['Abruzzo' => 'Abruzzo', 'Basilicata' => 'Basilicata',
            'Calabria' => 'Calabria', 'Campania' => 'Campania', 'Emilia Romagna' => 'Emilia Romagna',
            'Friuli Venezia Giulia' => 'Friuli Venezia Giulia', 'Lazio' => 'Lazio', 'Liguria' => 'Liguria',
            'Lombardia' => 'Lombardia', 'Marche' => 'Marche', 'Molise' => 'Molise', 'Piemonte' => 'Piemonte',
            'Puglia' => 'Puglia', 'Sardegna' => 'Sardegna', 'Sicilia' => 'Sicilia', 'Toscana' => 'Toscana',
            'Trentino-Alto Adige' => 'Trentino-Alto Adige', 'Umbria' => 'Umbria', "Valle d Aosta" => "Valle d'Aosta",
            'Veneto' => 'Veneto'];
    }

    
    //Ottengo tutte le regioni
    public function GetAllRegions() {
        return $this->_regions;
    }
    
    
    //Ottengo tutte le regioni in cui ci sono eventi e creo un array associativo da passare alla select della form di filtraggio
    public function GetRegions() {
        return Event::select('region')->distinct()->orderBy('region', 'ASC')->pluck('region', 'region');
    }

    
    //Ricavo le informazioni sugli eventi da inserire nel catalogo (con paginazione)
    public function GetEvents() {
        $events = Event::join('managements', 'eventId', 'events.id')->join('users', 'userId', 'users.id');
        return $events->paginate($this->paged);
    }
    
    
    //Controllo se l'evento corrente è in sconto: in caso affermativo ritorno il prezzo scontato, altrimenti quello pieno 
    public function GetPriceById($eventId) {
        $event = Event::where('events.id', $eventId);
        $daysDiscount = $event->first()->daysNumber;
        //trasformo la data nel DB in un formato manipolabile
        $date = (new Carbon($event->first()->date));
        //data corrente
        $currentDate = Carbon::now();
        //calcolo la data di inizio sconto 
        $startDiscount = $date->subDays($daysDiscount); 
        //controllo se la data odierna è successiva a quella di inizio sconto
        if ($currentDate>=$startDiscount) {
           $price = $event->first()->price;
          $discountPerc = $event->first()->discountPerc;
          //ritorno il prezzo scontato con massimo 2 cifre decimali
            return round($price*(100-$discountPerc)/100,2);
        }
        else {
            return $event->first()->price;
        }
    }
    
    
    //Ricavo le informazioni sugli eventi nei prossimi 10 giorni
    public function GetEventForDate() {
        $add = 20;
        $currentDate = Carbon::now();
        $nextDate = Carbon::now()->addDays($add);
        $events = Event::join('managements', 'eventId', 'events.id')
                //cerco le righe in cui la data corrente + giorni di sconto è >= della data dell'evento
                ->where('events.date' ,'>=', $currentDate)
                ->where('events.date' ,'<=', $nextDate);
        return $events->get();
    }

    
    //Ricavo le informazioni su un evento partendo dal suo id
    public function GetEventById($eventId) {
        $events = Event::join('managements', 'eventId', 'events.id')->join('users', 'userId', 'users.id');
        return $events->where('events.id', $eventId)->get();
    }
    
    
    //Ricavo le informazioni su un evento partendo dal suo id (l'utente corrente deve essere un organizzatore)
    public function GetEventByIdForOrg($eventId) {
        $events = Event::join('managements', 'eventId', 'events.id')->join('users', 'userId', 'users.id')
                ->where('userId',$this->_user->GetId());
        return $events->where('events.id', $eventId)->get();
    }

    
    //Ricavo gli eventi in base ai parametri ricevuti nella form (con paginazione)
    public function GetEventsByParams(Request $request) {
        $org = '%';        $reg = '%';        $desc = '%';        $date = '%';
        //controllo se la data ha formato AAAA-MM in caso contrario riaggiorno con errore
        $request->validate(['date' => 'nullable|date_format:Y-m']);
        if ($request->organizer != '')
            $org = $request->organizer;
        if ($request->region != '')
            $reg = $request->region;
        if ($request->filled('description'))
            $desc = $request->description;
        if ($request->filled('date'))
            $date = $request->date;
        $ris = Event::join('managements', 'eventId', 'events.id');
        $ris = $ris->join('users', 'userId', 'users.id');
        $ris = $ris->where('username', 'like', $org);
        $ris = $ris->where('region', 'like', $reg);
        $ris = $ris->where('description', 'like', '%' . $desc . '%');
        $ris = $ris->where('date', 'like', $date . '%');
        return $ris->paginate($this->paged);
    }

    
    //Ottengo tutti gli eventi gestiti da un'organizzazione
    public function GetEventsByOrg() {
        $id = $this->_user->GetId();
        $events = Event::join('managements', 'eventId', 'events.id')->join('users', 'users.id', 'managements.userId');
        return $events->where('userId', $id)->paginate($this->paged);
    }

    
    //Elimino la partecipazione, gli acquisti, la gestione ed infine l'evento (basta una query grazie al cascade)
    public function DelEvent($eventId) {
        Event::where('id', $eventId)->delete();
    }

    
    //Inserisco l'evento nel DB ed inserisco l'immagine nella cartella 'public'
    public function CreateEvent(Request $request) {
        
        //estraggo l'immagine dalla request
        $image = $request->file('image');
        //estraggo il nome dell'immagine da inserire nel DB
        $imageName = $image->getClientOriginalName();
        
        //se non ci sono giorni di sconto pongo a zero il valore 
        if ($request->daysNumber == null)
            $daysNumber = 0;
        else
            $daysNumber = $request->daysNumber;
        
        //se non c'è sconto pongo a zero il valore 
        if ($request->discountPerc == null)
            $discountPerc = 0;
        else
            $discountPerc = $request->discountPerc;

        //creo l'evento nel DB ed estraggo il suo id
        $eventId = Event::create(['title' => $request->title, 'description' => $request->description, 'image' => $imageName,
                    'map' => $request->map, 'date' => $request->date, 'price' => $request->price, 'region' => $request->region,
                    'allTickets' => $request->allTickets, 'discountPerc' => $discountPerc, 'daysNumber' => $daysNumber])->id;

        //collego l'evento all'organizzazione che l'ha creato
        $userId = $this->_user->GetId();
        Management::create(['userId' => $userId, 'eventId' => $eventId]);

        //sposto l'immagine in public
        $path = public_path() . '/images/events';
        $image->move($path, $imageName);
    }

    //Modifico l'evento nel DB ed inserisco l'immagine nella cartella 'public'
    public function UpdateEvent(Request $request) {
        
        //se non ci sono giorni di sconto pongo a zero il valore 
        if ($request->daysNumber == null)
            $daysNumber = 0;
        else
            $daysNumber = $request->daysNumber;
        //se non c'è sconto pongo a zero il valore 
        if ($request->discountPerc == null)
            $discountPerc = 0;
        else
            $discountPerc = $request->discountPerc;
        //estraggo l'immagine dalla request se presente
        if(!empty($request->image)){
            $image=$request->image;
        //estraggo il nome dell'immagine da inserire nel DB
        $imageName = $image->getClientOriginalName();
        //Aggiorno dati nel db
        Event::where('id', $request->eventId)->update(['title' => $request->title, 'description' => $request->description, 'image' => $imageName,
            'map' => $request->map, 'date' => $request->date, 'price' => $request->price, 'region' => $request->region,
            'allTickets' => $request->allTickets, 'discountPerc' => $discountPerc, 'daysNumber' => $daysNumber]);
        //sposto l'immagine in public
        $path = public_path() . '/images/events';
        $image->move($path, $imageName);
            }
        //se non c'è l'immagine faccio direttamente la query
        else{
            Event::where('id', $request->eventId)->update(['title' => $request->title, 'description' => $request->description,
            'map' => $request->map, 'date' => $request->date, 'price' => $request->price, 'region' => $request->region,
            'allTickets' => $request->allTickets, 'discountPerc' => $discountPerc, 'daysNumber' => $daysNumber]);
            }
    }

    //Statistiche dell'evento specificato
    public function GetStats($eventId) {
        $soldTickets = Event::join('purchases', 'purchases.eventId', 'events.id')->where('events.id', $eventId)->count('purchases.userId');
        $allTickets = Event::where('events.id', $eventId)->select('allTickets')->first()->allTickets;
        $remTickets = $allTickets - $soldTickets;
        $cash = Event::join('purchases','eventId','events.id')->where('events.id', $eventId)->sum('discountedPrice');
        $perc = round((($soldTickets * 100) / $allTickets), 2);
        $stats = ['allTickets' => $allTickets, 'soldTickets' => $soldTickets, 'remTickets' => $remTickets, 'cash' => $cash, 'perc' => $perc];
        return $stats;
    }
}
