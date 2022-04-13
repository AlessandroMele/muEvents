<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\FCatalog;
use App\Model\UCatalog;
use App\Http\Requests\NewOrg;
use App\Http\Requests\Faq;

class User4Controller extends Controller {

    public $paged = 1;
    protected $_userCatalog;
    protected $_eventCatalog;
    protected $_faqCatalog;

    
    public function __construct() {
        $this->middleware('can:isAdmin');
        $this->_userCatalog = new UCatalog;
        $this->_faqCatalog = new FCatalog;
    }

    
    //pagina di gestione degli utenti di livello2
    public function ManageUsers() {
        $users = $this->_userCatalog->GetUsers();
        return view('user4.users')
                        ->with('users', $users);
    }

    
    //eliminazione di un utente livello2 e ricaricamento della pagina 
    public function DeleteUser(Request $request) {
        $userId = $request->userId;
        $this->_userCatalog->DelUser($userId);
        return redirect()->action('User4Controller@ManageUsers');
    }

    
    //pagina di gestione delle faq
    public function HomeFAQ() {
        $faqs = $this->_faqCatalog->GetFaqs();
        return view('user4.manageFaq')
                        ->with('faqs', $faqs);
    }

    
    //pagina in cui inserire i dati della nuova faq
    public function InsertFAQ() {
        return view('user4.insertFaq');
    }

    
    //pagina di modifica della faq
    public function ModifyFAQ($faqId) {
        $faq = $this->_faqCatalog->GetFaqById($faqId);
        return view('user4.modifyFaq')
                        ->with('faq', $faq);
    }

    
    //elimina la faq e ricarica la pagina
    public function DeleteFAQ(Request $request) {
        $faqId = $request->faqId;
        $this->_faqCatalog->DeleteFAQ($faqId);
        return redirect()->action('User4Controller@HomeFAQ');
    }

    
    //Funzione di verifica e inserimento dei dati della faq
    public function ValidateInsertFAQ(Faq $request) {
        $this->_faqCatalog->CreateFaq($request);
        return redirect()->action('User4Controller@HomeFAQ');
    }

    
    //Funzione di verifica e modifica dei dati della faq (
    public function ValidateModifyFAQ(Faq $request) {
        $this->_faqCatalog->UpdateFaq($request);
        return redirect()->action('User4Controller@HomeFAQ');
    }

    
    //pagina di scelta dell'operazione da svolgere (visualizzazione o modifica/inserimento/cancellazione)
    public function HomeOrganizations() {
        return view('user4.homeOrganizations');
    }

    
    //pagina in cui sono presenti tutte le organizzazioni
    public function ShowOrganizations() {
        $users = $this->_userCatalog->GetOrganizers();
        return view('user4.showOrgs')
                        ->with('users', $users);
    }

    
    //pagina in cui trovo i dati dell'organizzazione specificata
    public function ShowOrganization($orgId) {
        $org = $this->_userCatalog->GetOrganizerById($orgId);
        //se l'id non corrisponde ad un organizzatore ritorniamo una pagina di errore
        if ($org->isEmpty()) {
            $route = 'showOrganizations';
            return view('public.errors')
                            ->with('route', $route);
        } else {
            $stats = $this->_userCatalog->GetStatsForOrganizator($orgId);
            return view('user4.analyzeOrg')
                            ->with('user', $org)
                            ->with('stats', $stats);
        }
    }

    
    //pagina con tutte le informazioni da cancellare/modificare e con pulsante di inserimento
    public function ManageOrganizations() {
        $organizers = $this->_userCatalog->GetOrganizers();
        return view('user4.manageOrganizations')
                        ->with('organizers', $organizers);
    }

    
    //pagina di modifica dell'organizzazione
    public function ModifyOrganization($orgId) {
        $organizer = $this->_userCatalog->GetOrganizerById($orgId);
        //se l'id non corrisponde ad un organizzatore ritorniamo una pagina di errore
        if ($organizer->isEmpty()) {
            $route = 'manageOrganizations';
            return view('public.errors')
                            ->with('route', $route);
        } else {
            return view('user4.modifyOrganization')
                            ->with('organizer', $organizer);
        }
    }

    
    //eliminazione dell'organizzazione
    public function DeleteOrganization(Request $request) {
        $orgId = $request->orgId;
        $this->_userCatalog->DeleteOrg($orgId);
        return redirect()->action('User4Controller@ManageOrganizations');
    }

    
    //pagina in cui inserire i dati della nuova organizzazione
    public function InsertOrganization() {
        return view('user4.insertOrganization');
    }

    
    //validazione e inserimento dell'organizzazione
    public function ValidateInsertOrganization(NewOrg $request) {
        $this->_userCatalog->CreateOrg($request);
        return redirect()->action('User4Controller@ManageOrganizations');
    }

    
    //validazione e modifica dell'organizzazione
    public function ValidateModifyOrganization(NewOrg $request) {
        $this->_userCatalog->UpdateOrg($request);
        return redirect()->action('User4Controller@ManageOrganizations');
    }

}
