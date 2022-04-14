# Progetto di Tecnologie Web, UNIVPM A.A. 2020-2021

# Indice
- [Obiettivi didattici e specifiche di progetto](#obiettivi-didattici)
- [Database, schema degli utenti e dei link](#database-schema-degli-utenti-e-dei-link)
- [Preparazione dell'ambiente](#preparazione-dellambiente)
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
![Image text](/readme_materials/2-Utente1.jpg)
![Image text](/readme_materials/2-Utente2.jpg)
![Image text](/readme_materials/2-Utente3.jpg)
![Image text](/readme_materials/2-Utente4.jpg)
## Schema dei link
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
Per accedere come utente di livello 2,3,4 inserire le seguenti credenziali:
2 -> user: clieclie password: Jnso7ITN ;
3 -> user: orgaorga password: Jnso7ITN ;
4 -> user: adminadmin password: Jnso7ITN ;

# FAQS
Per qualsiasi informazione in merito a chiarimenti, supporto all'installazione e segnalazione di bug, non esitate a contattarmi al mio indirizzo e-mail personale.
