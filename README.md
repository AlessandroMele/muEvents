# Progetto di Tecnologie Web, UNIVPM A.A. 2020-2021

# Indice
- [Obiettivi didattici e specifiche di progetto](#obiettivi-didattici)
- [Database, schema degli utenti e dei link](#database-schema-degli-utenti-e-dei-link)
- [Preparazione dell'ambiente](#preparazione-dellambiente)
- [Progettazione e descrizione sintetica del sito](#progettazione-e-descrizione-sintetica-del-sito)
- [FAQs](#faqs)

# Obiettivi didattici
Il progetto ha come obiettivo la realizzazione di un sito web per la promozione e la commercializzazione di eventi organizzati in Italia.<br />
Gli eventi sono pubblicati nel sito a cura delle organizzazioni che li gestiscono, che quindi costituiscono una delle classi di utenza che ha accesso al sito stesso.<br />
È libera e lasciata agli sviluppatori del sito la scelta della tipologia di eventi pubblicati: a livello esemplificativo e senza pretesa di esaustività si citano: eventi musicali, eventi teatrali, manifestazioni letterarie, mostre, convegni.

## Specifiche di Progetto
Gli utenti dell'applicazione avranno la possibilità di accedere alle informazioni generali sul sito e potranno anche accedere al catalogo che contiene la descrizione di ciascun evento.<br />
Una volta registrati, potranno acquistare i biglietti per gli eventi di interesse.
In sintesi, il progetto dovrà realizzare un’applicazione Web che consenta:
- la presentazione di informazioni generali sul sito (modalità di fornitura dei servizi, modalità di adesione come gestore di eventi, FAQ, ...);
- l’accesso al catalogo degli eventi gestiti, che mostri le informazioni principali relative ad ognuno di essi (descrizione, programma, data, orario e luogo di svolgimento, indicazioni su come raggiungere la località, mappa Google centrata sul luogo dell’evento, ...);
- l’accesso al sito agli organizzatori degli eventi, per gestire gli eventi di loro competenza;
- la registrazione di clienti al sito, a cura degli stessi;
- l’acquisto di biglietti da parte dei clienti, con la possibilità di indicare il numero di biglietti richiesti e la modalità di pagamento, selezionandola da un insieme di possibilità predefinite;
- la gestione del numero di biglietti disponibili per ciascun evento, con l’aggiornamento dei dati ad ogni acquisto fatto da un cliente.
Ad un maggior livello di dettaglio, nella realizzazione del sito si tenga conto delle seguenti specifiche funzionali:
- il sito mostri un catalogo eventi con possibilità di filtro per società organizzatrice, data (mese ed anno), luogo di svolgimento (regione);
- si dia all’utente la possibilità di effettuare una ricerca nel catalogo degli eventi basata sulla descrizione dell’evento di interesse, sulla sua data (mese ed anno) ed il luogo di svolgimento (regione), specificando uno o più parametri (descrizione, luogo, data). Nel caso di specifica di due o più parametri, la ricerca produca l'elenco degli eventi che soddisfano TUTTI i parametri specificati;
- una volta selezionato un evento (da catalogo o dalla lista ottenuta come risultato della ricerca), vengano visualizzate le informazioni estese ad esso relative;
- al termine della fase di acquisto di biglietti da parte di un cliente, si mostri una pagina riepilogativa con i dati dell'acquisto.
- si tenga traccia, nel sistema, degli acquisti effettuati da ciascun cliente, in modo da poter avere un profilo di acquisto di ciascuno di essi.<br />

Relativamente all’accesso all’applicazione, si definisca una policy diversificata articolata nei seguenti livelli:
- Livello 1: area pubblica del sito, cioè disponibile con le informazioni o servizi forniti a tutti coloro che accedono al sito (anche agli utenti definiti nei livelli successivi). A questo livello si associno le funzionalità di:
  - accesso al catalogo degli eventi (senza possibilità di acquisto di biglietti) e alla funzione di
ricerca;
  - registrazione di un nuovo cliente (utente di Livello2), a cura dello stesso.
- Livello 2: area per i clienti i quali possono:
  - modificare tutti i propri dati personali;
  - acquistare biglietti;
  - visualizzare lo storico degli acquisti (elenco dei biglietti acquistati).
- Livello 3: area per gli organizzatori degli eventi (uno per ciascuna organizzazione), che consenta a ciascuno di essi:
  - la creazione/modifica/cancellazione degli eventi gestiti dalla propria organizzazione;
  o la modifica delle quantità di biglietti disponibili per ogni evento gestito;
  - l’attivazione di funzioni di analisi delle vendite per gli eventi che gestisce, quali:
  - la quantità di biglietti venduti per un evento specificato;
  - la percentuale di biglietti venduti per un evento specificato in rapporto a quelli disponibili;
  - l’incasso di ogni evento;
- Livello 4: area ad accesso esclusivo dell’amministratore del sito, che consenta:
  - la cancellazione degli utenti di livello 2;
  - la creazione/modifica/cancellazione degli utenti di livello 3;
  - la visualizzazione dei dati di vendita di ciascuna organizzazione, previa selezione di quella d'interesse, intesi come il numero cumulativo di biglietti venduti per tutti gli eventi organizzati e l'incasso totale;
  - l’aggiornamento delle FAQ del sito.

## Funzionalità opzionali (IMPLEMENTATE)
- Gestione di sconti Last-Minute: si dia la possibilità agli organizzatori degli eventi di definire, per ogni evento, una percentuale di sconto sul prezzo pieno da applicare ad acquisti fatti in un intervallo temporale immediatamente precedente la data dell’evento (n-giorni prima).
- Gestione ‘parteciperò’: si implementi la possibilità per un cliente (livello 2) di indicare la sua intenzione di partecipare ad un certo evento, indipendentemente dall’acquisto del biglietto.
Di conseguenza, ogni evento a catalogo mostri, sia agli utenti di livello 1 che a quelli di livello 2, un contatore di tutti i ‘parteciperò’ ad esso associati;

# Database, schema degli utenti e dei link

## Database
![Image text](/readme_materials/1-db.jpg)
## Schema degli utenti
Sono state definite le specifiche funzionali per livello di utenza e costruito un mockup da seguire rigidamente durante la fase di progettazione. <br />
Segue l’elenco degli utenti che hanno la possibilità di accedere al sito, per ognuno di essi vengono indicati gli strumenti messi a loro disposizione:
- Utente livello 1: area pubblica del sito, ovvero disponibile a tutti coloro che accedono al sito web senza autenticarsi, essi hanno la possibilità di esplorare il catalogo (con possibilità di filtraggio), visualizzare le FAQ e, ovviamente, registrarsi come utenti di livello 2.
- Utente livello 2: area dedicata ai clienti che possono acquistare biglietti, usufruire di eventuali sconti, indicare la propria intenzione di partecipare ad un certo evento, modificare i propri dati personali e visualizzare lo storico degli acquisti nella loro area personale.
- Utente livello 3: area dedicata agli organizzatori di eventi; essi possono fare domanda come organizzatori inviando un’apposita mail all’indirizzo presente nel footer.
Ogni organizzatore può creare/modificare/cancellare i propri eventi gestiti e attivare la funzione di analisi delle vendite (quantità/percentuale biglietti venduti e incasso per ogni evento).
- Utente livello 4: area dedicata all’ amministratore del sito, colui che può eliminare gli utenti di livello 2 (utenti), creare/modificare/cancellare utenti di livello 3 (organizzazioni), visualizzare i dati di vendita di ciascuna organizzazione e creare/modificare/cancellare le FAQ del sito.
![Image text](/readme_materials/2-Utente1.jpg)
![Image text](/readme_materials/2-Utente2.jpg)
![Image text](/readme_materials/2-Utente3.jpg)
![Image text](/readme_materials/2-Utente4.jpg)

## Schema dei link
Lo schema di link definisce tutte le rotte del sito web, ovvero lo schema di navigazione che è possibile seguire quando ci troviamo in una pagina specifica.
![Image text](/readme_materials/3-schemaLink.jpg)

# Preparazione dell'ambiente

## Prerequisiti
- PHP (versione 7.4.x) e Composer;
- Node.JS;
- XAMPP (Windows), o in alternativa MAMP (MacOs);

## Installazione
Per il corretto settaggio dell'applicazione, è necessario dapprima avviare XAMPP, abilitare sia il Web Server che MySQL, successivamente si rimanda alla seguente guida: https://devmarketer.io/learn/setup-laravel-project-cloned-github-com/.<br />
Una volta completati i passaggi precedenti, collocare la cartella di progetto all'interno della cartella htdocs presente nella directory di XAMPP.<br />
Aprire ora il browser (si consiglia Chrome o Firefox) e digitare nella barra degli indirizzi il percorso per accedere al file index.php collocato nella cartella public della directory di progetto.<br />
Ad esempio:

```bash
http://localhost:8080/muEvents_TWEBPROG/muEvents/public/index.php
```

dove 8080 è la porta del Web Server di XAMPP.
Per accedere come utente, inserire le seguenti credenziali:
- Livello 2 -> user: clieclie, password: Jnso7ITN ;
- Livello 3 -> user: orgaorga, password: Jnso7ITN ;
- Livello 4 -> user: adminadmin, password: Jnso7ITN ;


## Progettazione e descrizione sintetica del sito
Dal punto di vista grafico, abbiamo deciso di creare interamente da zero il layout del sito in linea con gli stili del momento, con gradazioni di colore dipendenti dal livello di utenza con cui si interagisce.
Seguono diverse schermate per evidenziare questi aspetti.
![Image text](/readme_materials/Catalogo-utente-livello-12.png)
![Image text](/readme_materials/Catalogo-utente-livello-34.png)
 
### DESCRIZIONE SINTETICA DEL SITO E DELLE FUNZIONALITÀ

#### UTENTE DI LIVELLO 1

![Image text](/readme_materials/utente-livello-1.png)
La homepage del sito si presenta in modo semplice: uno slideshow contenente gli eventi che si tengono a partire dalla data corrente con un intervallo massimo di 20 giorni.
Sono inoltre presenti le diverse sezioni: “chi siamo”, il link alla relazione di progetto e le modalità di fornitura dei servizi.<br />
Il catalogo mostra, oltre a tutti gli eventi, la possibilità di effettuare ricerche filtrate in base agli organizzatori e le regioni per i quali sono già presenti eventi, in più la possibilità di poter ricercare in base alla descrizione dell’evento e all’anno/mese desiderati; osserviamo che l’unico formato ammesso per la data risulta essere “AAAA-MM”, ogni eventuale variazione comporterà un messaggio di errore del valore inserito.<br />
È previsto un pulsante di azzeramento per la cancellazione dei valori inseriti.<br />
Spostandoci nella pagina di uno specifico evento, è possibile, oltre alla visualizzazione di tutte le informazioni richieste, anche la possibilità di poter mostrare la propria partecipazione o acquistare la quantità desiderata di biglietti: in questo caso si viene reindirizzati alla pagina di login/registrazione poiché le seguenti funzionalità sono accessibili solo agli utenti di livello 2.<br />
Nella sezione FAQ è possibile visualizzare l’elenco di tutte le domande più frequenti, con eventuale possibilità di estendere la finestra mediante apposita freccia per visualizzare la risposta.<br />
Nella sezione relativa al footer, vengono mostrati le informazioni generali per rimanere in contatto e la richiesta per poter aderire al sito come organizzatore di eventi.

#### UTENTE DI LIVELLO 2

![Image text](/readme_materials/utente-livello-2.png)
Oltre alle funzionalità precedenti, è possibile accedere alla propria area riservata per:
• Visualizzare o modificare le proprie informazioni;
• Visualizzare gli acquisti da esso effettuati.
Le funzionalità sono accessibili mediante apposita sezione nella barra di navigazione, identificata dall’icona dell’utente.

#### UTENTE DI LIVELLO 3

![Image text](/readme_materials/utente-livello-3.png)
L’utente di livello 3, ovvero le organizzazioni degli eventi, possono accedere agli stessi contenuti messi a disposizione per gli utenti di livello 1, con la differenza che, una volta premuti i pulsanti di acquisto/parteciperò, apparirà un messaggio avvisandoli di eseguire la disconnessione ed effettuare l’autenticazione come utenti di livello 2.<br />
Gli organizzatori possono inserire/modificare e cancellare i propri eventi, è previsto inoltre uno strumento di analisi (in una sezione diversa nella barra di navigazione) che permettere di visualizzare, per ogni evento appartenente all’organizzazione stessa, il numero di biglietti venduti sul totale e l’incasso totale relativo all’evento in questione.

#### UTENTE DI LIVELLO 4
![Image text](/readme_materials/utente-livello-4.png)
L’utente di livello 4 è l’amministratore del sito, esso continua a poter usufruire degli stessi contenuti dell’utente di livello 1 con le stesse modalità previste per l’organizzatore.<br />
Le sue funzionalità specifiche si riferiscono, in particolare a:
- Cancellazione degli utenti di livello 2;
- Inserimento/modifica/cancellazione degli utenti di livello 3;
- Visualizzazione degli utenti di livello 3;
- Inserimento/modifica/cancellazione delle FAQ.

### STRUMENTI UTILIZZATI
L’implementazione del sito è stata realizzata mediante i seguenti strumenti:
- HTML: linguaggio di markup, che descrive la struttura ed il contenuto testuale/multimediale di una pagina web.
- CSS: linguaggio utilizzato per definire la formattazione di documenti HTML.
- JQuery: libreria basata su linguaggio JavaScript per la creazione di contenuti.
- Laravel: framework open source che adotta il pattern MVC, realizzato in linguaggio PHP.


#### FUNZIONI PARTICOLARI
- Nel momento in cui si modificano i valori dei parametri nell’URL, da utente di livello 3, potrei modificare l’id dell’evento andando così a modificare eventi/visualizzare statistiche di altri organizzatori, questo problema è stato ovviato controllando che l’evento appartenesse effettivamente a quell’organizzazione.
- Nel momento in cui si modificano i valori dei parametri nell’URL, da utente di livello 4, potrei modificare le informazioni dell’utente di livello 2, ma la funzionalità è applicabile ai soli organizzatori.
- Gestione errori dovuti all’utilizzo del tasto “indietro” del browser: in particolare, nel “parteciperò” e “acquisto” di biglietti in numero superiore a quelli disponibili.
Tutte le precedenti casistiche sono state gestite inserendo controlli aggiuntivi all’interno del Model, che, qualora non venissero soddisfatti, reindirizzano dal controller ad una pagina di errore, contenente un link per riprendere la navigazione dalla pagina a partire dalla quale si è verificato l’errore.
- Validazione lato client: nelle form di registrazione/modifica dell’utente di livello 2 e inserimento/modifica utente di livello 3, è stato inserito uno script per la validazione lato client di tutti i dati degli stessi (inserimento e modifica eventi sono stati gestiti tramite AJAX).

# FAQS
Per qualsiasi informazione in merito a chiarimenti, supporto all'installazione e segnalazione di bug, non esitate a contattarmi al mio indirizzo e-mail personale.
