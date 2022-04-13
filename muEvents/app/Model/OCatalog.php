<?php

namespace App\Model;

use App\Model\UCatalog;
use App\Model\ECatalog;
use App\User;
use App\Model\Resources\Purchase;
use App\Model\Resources\Participation;
use App\Model\Resources\Event;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class OCatalog extends Model {

    protected $_user;
    protected $_payments;
    protected $_eventCatalog;

    public function __construct() {
        $this->_user = new UCatalog;
        $this->_eventCatalog = new ECatalog;

        //Inizializzo i metodi di pagamento come array associativo da passare alla form
        $this->_payments = ['Paypal' => 'Paypal', 'Carta di credito' => 'Carta di credito', 'Bonifico bancario' => 'Bonifico bancario'];
    }

    //Ottengo tutti i metodi di pagamento
    public function GetPayments() {
        return $this->_payments;
    }

    //Ottengo i biglietti comprati dall'utente corrente
    public function GetOrders() {
        $id = $this->_user->GetId();
        $orders = User::join('purchases', 'users.id', 'purchases.userId');
        $orders = $orders->where('users.id', $id);
        $orders = $orders->join('events', 'events.id', 'purchases.eventId');
        $orders = $orders->join('managements', 'managements.eventId', 'events.id');
        $orders = $orders->orderBy('date');
        return $orders;
    }

    //Recupera le info sul pagamento dalla form e aggiunge la tupla riportando le informazioni d'acquisto al controller
    public function Buy(Request $request) {
        $tickets = $request->tickets;
        $eventId = $request->eventid;
        $buyTickets = $this->GetTicketsById($eventId);
        $event = Event::find($eventId);
        //se l'utente copra più biglietti di quanti ne siano rimasti ritorna null
        if ($tickets > ($event->allTickets - $buyTickets))
            return null;
        
        else {
            $payment = $request->buy_option;
            $userId = $this->_user->GetId();
            $eventId = $request->eventid;
            $cost = $this->_eventCatalog->GetPriceById($eventId);
            //l'utente può aver comprato più biglietti
            for ($i = 1; $i <= $tickets; $i++) {
                $orderId = Purchase::create(['payment' => $payment, 'userId' => $userId, 'eventId' => $eventId, 'discountedPrice' => $cost])->id;
                $order = Purchase::join('events', 'events.id', 'eventId')
                        ->where('purchases.id', $orderId);
            }
            return $order->get();
        }
    }

    
    //Aggiunge la partecipazione di un utente all'evento specificato
    public function AddPart($userId, $eventId) {
        Participation::create(['userId' => $userId, 'eventId' => $eventId]);
    }

    
    //Elimina la partecipazione di un utente all'evento specificato
    public function DeletePart($userId, $eventId) {
        Participation::where(['userId' => $userId, 'eventId' => $eventId])->delete();
    }

    
    //Numero di partecipazioni per un evento specificato
    public function GetPartsById($eventId) {
        $count = Participation::groupBy('eventId')->having('eventId', $eventId)->count();
        return $count;
    }

    
    //Numero di biglietti venduti per un evento specificato
    public function GetTicketsById($eventId) {
        $count = Purchase::groupBy('eventId')->having('eventId', $eventId)->count();
        return $count;
    }

    
    //Controllo se l'utente corrente partecipa all'evento che sta visualizzando
    public function GetPartById($eventId) {
        $userId = $this->_user->GetId();
        $count = Participation::where('eventId', $eventId)->where('userId', $userId)->get();
        //se l'utente non partecipa ritorno 0
        if ($count->isEmpty())
            $part = 0;
        else
            $part = 1;
        return $part;
    }

}
