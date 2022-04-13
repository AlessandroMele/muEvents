<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\FCatalog;
use App\Model\ECatalog;
use App\Model\OCatalog;
use App\Model\UCatalog;

class PublicController extends Controller {

    protected $_faqCatalog;
    protected $_eventCatalog;
    protected $_orderCatalog;
    protected $_userCatalog;

    public function __construct() {
        $this->_faqCatalog = new FCatalog;
        $this->_eventCatalog = new ECatalog;
        $this->_orderCatalog = new OCatalog;
        $this->_userCatalog = new UCatalog;
    }

    //Homepage sito
    public function ShowHomepage() {
        $events = $this->_eventCatalog->GetEventForDate();
        return view('public.home')
                        ->with('events', $events);
    }

    //Catalogo eventi (con paginazione ed eventuali filtri)
    public function ShowFilteredCatalog(Request $request) {
        $events = $this->_eventCatalog->GetEventsByParams($request);
        $organizers = $this->_userCatalog->GetOrganizersForFilters();
        $regions = $this->_eventCatalog->GetRegions();
        $events->appends($request->except('_token'));
        return view('public.catalog')
                        ->with('events', $events)
                        ->with('request', $request)
                        ->with('organizers', $organizers)
                        ->with('regions', $regions);
    }

    //Pagina evento selezionato
    public function ShowEvent($eventId) {
        $event = $this->_eventCatalog->GetEventById($eventId);
        $count = $this->_orderCatalog->GetPartsById($eventId);
        $tickets = $this->_orderCatalog->GetTicketsById($eventId);
        $cost = $this->_eventCatalog->GetPriceById($eventId);
        //se l'utente non è autenticato viene sollevata un'eccezione da auth, perciò pongo part a null
        try {
            //1 se partecipa, 0 se non partecipa, exception se non è loggato
            $part = $this->_orderCatalog->GetPartById($eventId);
        } catch (\Exception $e) {
            $part = null;
        }
        return view('public.event')
                        ->with('event', $event)
                        ->with('count', $count)
                        ->with('part', $part)
                        ->with('tickets', $tickets)
                        ->with('cost', $cost);
    }

    //Elenco FAQ 
    public function ShowFaqs() {
        $faqs = $this->_faqCatalog->GetFaqs();
        return view('public.faq')
                        ->with('faqs', $faqs);
    }

}
