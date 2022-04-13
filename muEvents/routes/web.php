<?php

/** SEZIONE PUBBLICA (UTENTE 1) */

//Homepage sito
Route::get('/', 'PublicController@ShowHomepage')->name('homepage');

//Login
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');

//Logout
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

//Registrazione
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

//Catalogo eventi / catalogo filtrato
Route::get('/catalog', 'PublicController@ShowFilteredCatalog')->name('filteredCatalog');

//Pagina evento selezionato 
Route::get('/catalog/event/{eventId}', 'PublicController@ShowEvent')->name('event');

//Elenco FAQ 
Route::get('/faq', 'PublicController@ShowFaqs')->name('faq');

/** FINE SEZIONE PUBBLICA (UTENTE 1) */

/** SEZIONE UTENTE 2 */

//Pagina con vista informazioni/acquisti e opzioni di modifica dati
Route::get('/account', 'User2Controller@ShowInfo')->name('account');

//Pagina ordini effettuati dall'utente
Route::get('/account/orders', 'User2Controller@MyOrders')->name('orders');

//Pagina con form di modifica delle informazioni dell'account
Route::get('/account/modify', 'User2Controller@ModifyInfo')->name('modifyInfo');

//Validazione del form di modifica delle informazioni dell'account
Route::post('/account/modify', 'User2Controller@SaveInfo')->name('saveInfo');

//Pagina di acquisto del biglietto di un evento
Route::get('/catalog/event/{eventId}/buy', 'User2Controller@ShowBuyOptions')->name('showBuyOptions');

//Validazione delle impostazioni di acquisto del biglietto
Route::post('/catalog/event/buy', 'User2Controller@BuyTicket')->name('validateBuy');

//Pagina di riepilogo del biglietto acquistato
Route::get('/catalog/event/{eventId}/buy/summary', 'User2Controller@Summary')->name('summary');

//Aggiungo parteciperò per l'evento specifico
Route::get('/catalog/event/{eventId}/addPart', 'User2Controller@AddParticipation')->name('addParticipation');

//Rimuovo parteciperò per l'evento specifico
Route::get('/catalog/event/{eventId}/delPart', 'User2Controller@DeleteParticipation')->name('delParticipation');

/** FINE SEZIONE UTENTE 2 */

/** SEZIONE UTENTE 3 */

//Pagina di gestione degli eventi
Route::get('/manageEvents', 'User3Controller@ManageEvents')->name('manageEvents');

//rotte di recupero informazioni per la modifica e invio della form con validazione
Route::get('/manageEvents/modify/event/{eventId}', 'User3Controller@ModifyEvent')->name('modifyEvent');
Route::post('/manageEvents/modify/event', 'User3Controller@ValidateModEvent')->name('validateModEvent');

//rotte di inserimento informazioni per un nuovo evento e invio della form con validazione
Route::get('/manageEvents/insert', 'User3Controller@InsertEvent')->name('insertEvent');
Route::post('/manageEvents/insert', 'User3Controller@ValidateInsEvent')->name('validateInsEvent');

//Cancellazione di un evento specifico
Route::post('/manageEvents/delete/event', 'User3Controller@DeleteEvent')->name('deleteEvent');

//Recupero di tutti gli eventi di quell'organizzazione e visualizzazione stats per specifico evento
Route::get('/analyzeEvents', 'User3Controller@ShowStats')->name('analyzeEvents');
Route::get('/analyzeEvents/event/{eventId}', 'User3Controller@ShowEventStats')->name('showEventStats');

/** FINE SEZIONE UTENTE 3 */

/** SEZIONE UTENTE 4 */

//Pagina di gestione degli utenti
Route::get('/manageUsers', 'User4Controller@ManageUsers')->name('manageUsers');
Route::post('/manageUsers/delete', 'User4Controller@DeleteUser')->name('deleteUser');

//Pagina di gestione organizzazioni
Route::get('/manageOrganizations', 'User4Controller@HomeOrganizations')->name('homeOrganizations');

//Visuaizzazione organizzazione
Route::get('/manageOrganizations/show', 'User4Controller@ShowOrganizations')->name('showOrganizations');
Route::get('/manageOrganizations/show/organization/{orgId}', 'User4Controller@ShowOrganization')->name('showOrganization');

//Pagina con opzione di scelta organizzazione
Route::get('/manageOrganizations/manage', 'User4Controller@ManageOrganizations')->name('manageOrganizations');

//Pagina di modifica organizzazioni
Route::get('/manageOrganizations/manage/modify/organization/{orgId}', 'User4Controller@ModifyOrganization')->name('modifyOrganization');
Route::post('/manageOrganizations/manage/modify/organization', 'User4Controller@ValidateModifyOrganization')->name('validateModifyOrganization');

//Pagina di inserimento organizzazioni
Route::get('/manageOrganizations/manage/insert', 'User4Controller@InsertOrganization')->name('insertOrganization');
Route::post('/manageOrganizations/manage/insert', 'User4Controller@ValidateInsertOrganization')->name('validateInsertOrganization');

//Pagina di cancellazione organizzazioni
Route::post('/manageOrganizations/manage/delete', 'User4Controller@DeleteOrganization')->name('deleteOrganization');

//Pagina di gestione delle FAQ 
Route::get('/manageFAQ', 'User4Controller@HomeFAQ')->name('homeFAQ');

//Pagina di inserimento delle FAQ 
Route::get('/manageFAQ/insert', 'User4Controller@InsertFAQ')->name('insertFAQ');
Route::post('/manageFAQ/insert', 'User4Controller@ValidateInsertFAQ')->name('validateInsertFAQ');

//Pagina di modifica delle FAQ 
Route::get('/manageFAQ/modify/faq/{faqId}', 'User4Controller@ModifyFAQ')->name('modifyFAQ');
Route::post('/manageFAQ/modify/faq', 'User4Controller@ValidateModifyFAQ')->name('validateModifyFAQ');

//Cancellazione di una specifica FAQ 
Route::post('/manageFAQ/delete', 'User4Controller@DeleteFAQ')->name('deleteFAQ');

/** FINE SEZIONE UTENTE 4 */