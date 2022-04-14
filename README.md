# Progetto di Tecnologie Web, UNIVPM A.A. 2020-2021
# Indice
1. Obiettivi didattici e specifiche di progetto
2. Database, schema degli utenti e dei link
3. Preparazione dell'ambiente
4. FAQs

# Obiettivi didattici
Il progetto ha come obiettivo la realizzazione di un sito web per la promozione e la commercializzazione di eventi organizzati in Italia.
Gli eventi sono pubblicati nel sito a cura delle organizzazioni che li gestiscono, che quindi costituiscono una delle classi di utenza che ha accesso al sito stesso. È libera e lasciata agli sviluppatori del sito la scelta della tipologia di eventi pubblicati: a livello esemplificativo e senza pretesa di esaustività si citano: eventi musicali, eventi teatrali, manifestazioni letterarie, mostre, convegni.

## Specifiche di Progetto
Gli utenti dell'applicazione avranno la possibilità di accedere alle informazioni generali sul sito e potranno anche accedere al catalogo che contiene la descrizione di ciascun evento. Una volta registrati, potranno acquistare i biglietti per gli eventi di interesse.
In sintesi, il progetto dovrà realizzare un’applicazione Web che consenta:
1. la presentazione di informazioni generali sul sito (modalità di fornitura dei servizi, modalità di adesione come gestore di eventi, FAQ, ...);
2. l’accesso al catalogo degli eventi gestiti, che mostri le informazioni principali relative ad ognuno di essi (descrizione, programma, data, orario e luogo di svolgimento, indicazioni su come raggiungere la località, mappa Google centrata sul luogo dell’evento, ...);
3. l’accesso al sito agli organizzatori degli eventi, per gestire gli eventi di loro competenza;
4. la registrazione di clienti al sito, a cura degli stessi;
5. l’acquisto di biglietti da parte dei clienti, con la possibilità di indicare il numero di biglietti richiesti e la modalità di pagamento, selezionandola da un insieme di possibilità predefinite;
6. la gestione del numero di biglietti disponibili per ciascun evento, con l’aggiornamento dei dati ad ogni acquisto fatto da un cliente.
Ad un maggior livello di dettaglio, nella realizzazione del sito si tenga conto delle seguenti specifiche funzionali:
7. il sito mostri un catalogo eventi con possibilità di filtro per società organizzatrice, data (mese ed anno), luogo di svolgimento (regione);
8. si dia all’utente la possibilità di effettuare una ricerca nel catalogo degli eventi basata sulla descrizione dell’evento di interesse, sulla sua data (mese ed anno) ed il luogo di svolgimento (regione), specificando uno o più parametri (descrizione, luogo, data). Nel caso di specifica di due o più parametri, la ricerca produca l'elenco degli eventi che soddisfano TUTTI i parametri specificati;
9. una volta selezionato un evento (da catalogo o dalla lista ottenuta come risultato della ricerca), vengano visualizzate le informazioni estese ad esso relative;
10. al termine della fase di acquisto di biglietti da parte di un cliente, si mostri una pagina riepilogativa con i dati dell'acquisto.
11. si tenga traccia, nel sistema, degli acquisti effettuati da ciascun cliente, in modo da poter avere un profilo di acquisto di ciascuno di essi.

Relativamente all’accesso all’applicazione, si definisca una policy diversificata articolata nei seguenti livelli:
1. Livello 1: area pubblica del sito, cioè disponibile con le informazioni o servizi forniti a tutti coloro che accedono al sito (anche agli utenti definiti nei livelli successivi). A questo livello si associno le
funzionalità di:
1.1 accesso al catalogo degli eventi (senza possibilità di acquisto di biglietti) e alla funzione di
ricerca;
1.2 registrazione di un nuovo cliente (utente di Livello2), a cura dello stesso.
2. Livello 2: area per i clienti i quali possono:
2.1 modificare tutti i propri dati personali;
2.2 acquistare biglietti;
2.3 visualizzare lo storico degli acquisti (elenco dei biglietti acquistati).
3. Livello 3: area per gli organizzatori degli eventi (uno per ciascuna organizzazione), che consenta a ciascuno di essi:
3.1 la creazione/modifica/cancellazione degli eventi gestiti dalla propria organizzazione; o la modifica delle quantità di biglietti disponibili per ogni evento gestito;
3.2 l’attivazione di funzioni di analisi delle vendite per gli eventi che gestisce, quali:
3.3 la quantità di biglietti venduti per un evento specificato;
3.4 la percentuale di biglietti venduti per un evento specificato in rapporto a quelli
disponibili;
3.5 l’incasso di ogni evento;
4. Livello 4: area ad accesso esclusivo dell’amministratore del sito, che consenta:
4.1 la cancellazione degli utenti di livello 2;
4.2 la creazione/modifica/cancellazione degli utenti di livello 3;
4.3 la visualizzazione dei dati di vendita di ciascuna organizzazione, previa selezione di quella
d'interesse, intesi come il numero cumulativo di biglietti venduti per tutti gli eventi organizzati
e l'incasso totale;
4.4 l’aggiornamento delle FAQ del sito.

## Funzionalità opzionali (IMPLEMENTATE)
1. Gestione di sconti Last-Minute: si dia la possibilità agli organizzatori degli eventi di definire, per ogni
evento, una percentuale di sconto sul prezzo pieno da applicare ad acquisti fatti in un intervallo
temporale immediatamente precedente la data dell’evento (n-giorni prima).
2. Gestione ‘parteciperò’: si implementi la possibilità per un cliente (livello 2) di indicare la sua intenzione
di partecipare ad un certo evento, indipendentemente dall’acquisto del biglietto. Di conseguenza, ogni evento a catalogo mostri, sia agli utenti di livello 1 che a quelli di livello 2, un contatore di tutti i ‘parteciperò’ ad esso associati;

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
1. PHP (versione 7.4.x) e Composer
2. Node.JS
3. XAMPP (Windows) o in alternativa MAMP (MacOs)

## Installazione
Per il corretto settaggio dell'applicazione, è necessario dapprima avviare il software del punto 3., abilitare sia il Web Server che MySQL, successivamente si rimanda alla seguente guida: https://devmarketer.io/learn/setup-laravel-project-cloned-github-com/
Una volta completati i passaggi precedenti, collocare la cartella di progetto all'interno della cartella htdocs presente nella directory del software del punto 3.
Siamo dunque pronti ad avviare la nostra applicazione aprendo un qualsiasi browser (si consigliano Chrome o Firefox) e digitare nella barra degli indirizzi il percorso per accedere al file index.php collocato nella cartella public della directory di progetto.
Nel mio caso:
'''
Esempio: http://localhost:8080/muEvents_TWEBPROG/muEvents/public/index.php
'''
dove 8080 è la porta del Web Server del software al punto 3.

# FAQS
Per qualsiasi informazione in merito a chiarimenti, supporto all'installazione e segnalazione di bug, non esitate a contattarmi al mio indirizzo e-mail personale.
