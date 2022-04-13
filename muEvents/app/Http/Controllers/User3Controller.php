<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\ECatalog;
use App\Http\Requests\NewEvent;
use App\Http\Requests\ModEvent;

class User3Controller extends Controller {

    protected $_eventCatalog;

    public function __construct() {
        $this->middleware('can:isOrg');
        $this->_eventCatalog = new ECatalog;
    }

    //Pagina di gestione con gli eventi relativi all'organizzazione
    public function ManageEvents() {
        $events = $this->_eventCatalog->GetEventsByOrg();
        return view('user3.eventorg')
                        ->with('events', $events);
    }

    //Cancellazione di un evento e ricaricamento della pagina
    public function DeleteEvent(Request $request) {
        $eventId = $request->eventId;
        $this->_eventCatalog->DelEvent($eventId);
        return redirect()->action('User3Controller@ManageEvents');
    }

    //Pagina in cui inserire i dati del nuovo evento
    public function InsertEvent() {
        $regions = $this->_eventCatalog->GetAllRegions();
        return view('user3.insertEvent')
                        ->with('regions', $regions);
    }

    //Pagina per modificare i dati dell'evento
    public function ModifyEvent($eventId) {
        $event = $this->_eventCatalog->GetEventByIdForOrg($eventId);
        //se l'id non corrisponde ad un evento dell'organizzatore corrente, ritorna una pagina di errore
        if ($event->isEmpty()) {
            $route = 'manageEvents';
            return view('public.errors')
                            ->with('route', $route);
        } else {
            $regions = $this->_eventCatalog->GetAllRegions();
            return view('user3.modifyEvent')
                            ->with('regions', $regions)
                            ->with('event', $event);
        }
    }

    //Funzione di verifica dei dati della form di inserimento 
    public function ValidateInsEvent(NewEvent $request) {
        $this->_eventCatalog->CreateEvent($request);
        //ritorna un documento json con un elemento solo: redirect con valore manageEvents 
        //cioè definisco dove reindirizzare l'utente dopo un successo
        return response()->json(['redirect' => route('manageEvents')]);
    }

    //Funzione di verifica dei dati della form di modifica 
    public function ValidateModEvent(ModEvent $request) {
        $this->_eventCatalog->UpdateEvent($request);
        //ritorna un documento json con un elemento solo: redirect con valore manageEvents 
        //cioè definisco dove reindirizzare l'utente dopo un successo
        return response()->json(['redirect' => route('manageEvents')]);
    }

    //Visualizza stats dell'organizzazione
    public function ShowStats() {
        $events = $this->_eventCatalog->GetEventsByOrg();
        return view('user3.analyzeEvents')
                        ->with('events', $events);
    }

    //Stats singolo evento
    public function ShowEventStats($eventId) {
        $event = $this->_eventCatalog->GetEventByIdForOrg($eventId);
        //se l'id non corrisponde ad un evento dell'organizzatore corrente ritorniamo una pagina di errore
        if ($event->isEmpty()) {
            $route = 'analyzeEvents';
            return view('public.errors')
                            ->with('route', $route);
        } else {
            $stats = $this->_eventCatalog->GetStats($eventId);
            return view('user3.eventStats')
                            ->with('event', $event)
                            ->with('stats', $stats);
        }
    }

}
