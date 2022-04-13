<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ModUser;
use App\Model\OCatalog;
use App\Model\UCatalog;
use App\Model\ECatalog;

class User2Controller extends Controller {

    public $paged = 4;
    protected $_user;
    protected $_eventCatalog;

    public function __construct() {
        $this->middleware('can:isUser');
        $this->_eventCatalog = new ECatalog;
        $this->_user = new UCatalog;
        $this->_orderCatalog = new OCatalog;
    }

    //Pagina con vista informazioni/acquisti e opzioni di modifica dati per l'utente corrente
    public function ShowInfo() {
        $account = $this->_user->GetUser()->get();
        return view('user2.account')
                        ->with('accounts', $account);
    }

    //Pagina ordini effettuati dall'utente corrente (con paginazione)
    public function MyOrders() {
        $orders = $this->_orderCatalog->GetOrders()->paginate($this->paged);
        return view('user2.accountorder')
                        ->with('orders', $orders);
    }

    //Pagina per modificare i dati dell'utente corrente
    public function ModifyInfo() {
        $account = $this->_user->GetUser()->get();
        return view('auth.modify')
                        ->with('accounts', $account);
    }

    //Verifica dei dati inseriti nella pagina di modifica 
    public function SaveInfo(ModUser $request) {
        $this->_user->ModUser($request);
        //richiamiamo il metodo showInfo del controller2
        return redirect()->action('User2Controller@ShowInfo');
    }

    //Pagina in cui selezionare il metodo di pagamento 
    public function ShowBuyOptions($eventId) {
        $payments = $this->_orderCatalog->GetPayments();
        $tickets = $this->_orderCatalog->GetTicketsById($eventId);
        $event = $this->_eventCatalog->GetEventById($eventId);
        $cost = $this->_eventCatalog->GetPriceById($eventId);
        return view('user2.buyoptions')
                        ->with('event', $event)
                        ->with('payments', $payments)
                        ->with('tickets', $tickets)
                        ->with('cost', $cost);
    }

    //Inserisco gli ordini e restituisco un sommario 
    public function BuyTicket(Request $request) {
        $order = $this->_orderCatalog->Buy($request);
        //se il pagamento è andato a buon fine vado al sommario altrimenti ricarico la pagina
        if (!$order) {
            return redirect()->action('User2Controller@ShowBuyOptions', [$request->eventid]);
        } else {
            $tickets = $request->tickets;
            $price = $this->_eventCatalog->GetPriceById($request->eventid);
            return view('user2.summary')
                            ->with('order', $order)
                            ->with('price', $price)
                            ->with('tickets', $tickets);
        }
    }

    //Aggiunge l'utente ai partecipanti e ricarica la pagina
    public function AddParticipation($eventId) {
        try {
            $userId = $this->_user->GetId();
            $this->_orderCatalog->AddPart($userId, $eventId);
            $tickets = $this->_orderCatalog->GetTicketsById($eventId);
            $count = $this->_orderCatalog->GetPartsById($eventId);
            $event = $this->_eventCatalog->GetEventById($eventId);
            $cost = $this->_eventCatalog->GetPriceById($eventId);
            return view('public.event')
                            ->with('event', $event)
                            ->with('count', $count)
                            ->with('tickets', $tickets)
                            ->with('cost', $cost)
                            ->with('part', 1);
        } catch (\Exception $e) {
            //si genera un'eccezione se l'utente compare già nella partecipazione
            $route = 'homepage';
            return view('public.errors')
                            ->with('route', $route);
        }
    }

    //Rimuove l'utente dai partecipanti e ricarica la pagina
    public function DeleteParticipation($eventId) {
        $userId = $this->_user->GetId();
        $this->_orderCatalog->DeletePart($userId, $eventId);
        $tickets = $this->_orderCatalog->GetTicketsById($eventId);
        $count = $this->_orderCatalog->GetPartsById($eventId);
        $event = $this->_eventCatalog->GetEventById($eventId);
        $cost = $this->_eventCatalog->GetPriceById($eventId);
        return view('public.event')
                        ->with('event', $event)
                        ->with('count', $count)
                        ->with('tickets', $tickets)
                        ->with('cost', $cost)
                        ->with('part', 0);
    }

}
