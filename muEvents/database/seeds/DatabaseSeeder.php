<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {

        DB::table('users')->insert([
            ['name' => 'Alex', 'surname' => 'Verdi', 'email' => 'alex@verdi.it',
                'username' => 'alexalex', 'password' => Hash::make('alexalex'), 'role' => 'user',
                'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['name' => 'Han', 'surname' => 'Solo', 'email' => 'sound@garden.it',
                'username' => 'Island Record', 'password' => Hash::make('wideawake'), 'role' => 'organizer',
                'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['name' => 'Mario', 'surname' => 'Rossi', 'email' => 'mario@rossi.it',
                'username' => 'clieclie', 'password' => Hash::make('Jnso7ITN'), 'role' => 'user',
                'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['name' => 'Ian', 'surname' => 'Paice', 'email' => 'deep@purple.it',
                'username' => 'orgaorga', 'password' => Hash::make('Jnso7ITN'), 'role' => 'organizer',
                'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['name' => 'Geezer', 'surname' => 'Butler', 'email' => 'sabbath@black.it',
                'username' => 'adminadmin', 'password' => Hash::make('Jnso7ITN'), 'role' => 'admin',
                'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['name' => 'Luke', 'surname' => 'Skywalker', 'email' => 'laresistenza@libero.it',
                'username' => 'Tanta Roba Label', 'password' => Hash::make('wideawake'), 'role' => 'organizer',
                'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ['name' => 'Anakin', 'surname' => 'Skywalker', 'email' => 'lamortenera@gmail.it',
                'username' => 'darth_vader', 'password' => Hash::make('darth_vader'), 'role' => 'user',
                'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
	    ['name' => 'Chris', 'surname' => 'Cornell', 'email' => 'oystercult@blue.com',
                'username' => 'Audioslave Records', 'password' => Hash::make('wideawake'), 'role' => 'organizer',
                'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
	    ['name' => 'Benedetta', 'surname' => 'Scaramuzzi', 'email' => 'besca99@gmail.com',
                'username' => 'Bescabesca', 'password' => Hash::make('Ho21anni'), 'role' => 'user',
                'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
	    ['name' => 'Giuseppe', 'surname' => 'Verdi', 'email' => 'verdig@gmail.com',
                'username' => 'giusverdi', 'password' => Hash::make('giusverdi'), 'role' => 'user',
                'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
        ]);

        DB::table('events')->insert([
            ['description' => "Persona è il sesto album in studio del rapper italiano Marracash, pubblicato il 31 ottobre 2019 dalla Island Records.
                    L'album ha ricevuto il plauso della critica, venendo definito come un «classico istantaneo» dalla critica specializzata
                    del genere,e come «il miglior disco italiano dell'anno» secondo la rivista Rolling Stone Italia.
                    Composto da quindici brani, l'album è il risultato di un periodo di isolamento durato due anni e nove mesi causato da vicissitudini personali:
                    «Il disco è figlio del superamento di un momento duro, cupo e disperato.
                    Per due anni e nove mesi ho vissuto in isolamento, mi sono legato a una persona tossica dal punto di vista sentimentale.
                    Sono andato dallo psicanalista perché mi sentivo vuoto. Un samurai che aveva perso il suo fuoco.
                    Poi le canzoni sono uscite come sangue da una ferita in soli tre mesi, è stata una catarsi.
                    Fabio, per rinascere, ha dovuto uccidere Marracash.»", 'map' => 'http://maps.google.it/maps?f=q&source=s_q&hl=it&geocode=&q=Via+Brecce+Bianche,+12,+Ancona&aq=0&sll=41.442726,12.392578&sspn=23.377375,53.657227&ie=UTF8&hq=&hnear=Via+Brecce+Bianche,+12,+60131+Ancona,+Marche&z=14&ll=43.581248,13.515684&output=embed',
                'region' => 'Marche', 'date' => '2021-07-10', 'title' => 'Marracash @PersonaTour', 'image' => 'marracash.jpg',
                'allTickets' => 1000, 'price' => 20, 'discountPerc' => 0, 'daysNumber' => 0],
            ['description' => "Gemelli è il terzo album in studio del rapper italiano Ernia, pubblicato il 19 giugno 2020 da Island Records/Universal.
                Dopo sessioni di registrazione in studio a cavallo tra il 2019 e il 2020 a Los Angeles, in California,
                Ernia ha anticipato l'annuncio dell'album mediante la pubblicazione di diverse raccolte di fotografie sul proprio profilo Instagram, 
                per l'intera durata del mese di marzo, salvo poi vedersi sovrapporre la pandemia di COVID-19 che ha posticipato l'uscita dello stesso 
                progetto.", 'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2890.9223205737776!2d13.5266827!3d43.566501699999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132d806f5756df13%3A0x8ef17379d83fe7a6!2sPalaRossini!5e0!3m2!1sit!2sit!4v1623264886833!5m2!1sit!2sit',
                'region' => 'Lombardia', 'date' => '2021-06-10', 'title' => 'Ernia @GemelliTour', 'image' => 'ernia.jpg',
                'allTickets' => 5000, 'price' => 40, 'discountPerc' => 0, 'daysNumber' => 0],
            ['description' => "Persona è il sesto album in studio del rapper italiano Marracash, pubblicato il 31 ottobre 2019 dalla Island Records.
                    L'album ha ricevuto il plauso della critica, venendo definito come un «classico istantaneo» dalla critica specializzata
                    del genere,e come «il miglior disco italiano dell'anno» secondo la rivista Rolling Stone Italia.
                    Composto da quindici brani, l'album è il risultato di un periodo di isolamento durato due anni e nove mesi causato da vicissitudini personali:
                    «Il disco è figlio del superamento di un momento duro, cupo e disperato.
                    Per due anni e nove mesi ho vissuto in isolamento, mi sono legato a una persona tossica dal punto di vista sentimentale.
                    Sono andato dallo psicanalista perché mi sentivo vuoto. Un samurai che aveva perso il suo fuoco.
                    Poi le canzoni sono uscite come sangue da una ferita in soli tre mesi, è stata una catarsi.
                    Fabio, per rinascere, ha dovuto uccidere Marracash.»", 'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2891.0304886038657!2d13.526201900000002!3d43.56424779999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132d8084e3822f2d%3A0x3ff4d14f21488e41!2sStadio%20del%20Conero!5e0!3m2!1sit!2sit!4v1623265499713!5m2!1sit!2sit',
                'region' => 'Marche', 'date' => '2021-06-14', 'title' => 'Marracash @PersonaTour', 'image' => 'marracash.jpg',
                'allTickets' => 2000, 'price' => 30, 'discountPerc' => 0, 'daysNumber' => 0],
            ['description' => "Persona è il sesto album in studio del rapper italiano Marracash, pubblicato il 31 ottobre 2019 dalla Island Records.
                    L'album ha ricevuto il plauso della critica, venendo definito come un «classico istantaneo» dalla critica specializzata
                    del genere,e come «il miglior disco italiano dell'anno» secondo la rivista Rolling Stone Italia.
                    Composto da quindici brani, l'album è il risultato di un periodo di isolamento durato due anni e nove mesi causato da vicissitudini personali:
                    «Il disco è figlio del superamento di un momento duro, cupo e disperato.
                    Per due anni e nove mesi ho vissuto in isolamento, mi sono legato a una persona tossica dal punto di vista sentimentale.
                    Sono andato dallo psicanalista perché mi sentivo vuoto. Un samurai che aveva perso il suo fuoco.
                    Poi le canzoni sono uscite come sangue da una ferita in soli tre mesi, è stata una catarsi.
                    Fabio, per rinascere, ha dovuto uccidere Marracash.»", 'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2891.0304886038657!2d13.526201900000002!3d43.56424779999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132d8084e3822f2d%3A0x3ff4d14f21488e41!2sStadio%20del%20Conero!5e0!3m2!1sit!2sit!4v1623265499713!5m2!1sit!2sit',
                'region' => 'Liguria', 'date' => '2021-06-20', 'title' => 'Marracash @PersonaTour', 'image' => 'marracash.jpg',
                'allTickets' => 500, 'price' => 25, 'discountPerc' => 10, 'daysNumber' => 20],
            ['description' => "Persona è il sesto album in studio del rapper italiano Marracash, pubblicato il 31 ottobre 2019 dalla Island Records.
                    L'album ha ricevuto il plauso della critica, venendo definito come un «classico istantaneo» dalla critica specializzata
                    del genere,e come «il miglior disco italiano dell'anno» secondo la rivista Rolling Stone Italia.
                    Composto da quindici brani, l'album è il risultato di un periodo di isolamento durato due anni e nove mesi causato da vicissitudini personali:
                    «Il disco è figlio del superamento di un momento duro, cupo e disperato.
                    Per due anni e nove mesi ho vissuto in isolamento, mi sono legato a una persona tossica dal punto di vista sentimentale.
                    Sono andato dallo psicanalista perché mi sentivo vuoto. Un samurai che aveva perso il suo fuoco.
                    Poi le canzoni sono uscite come sangue da una ferita in soli tre mesi, è stata una catarsi.
                    Fabio, per rinascere, ha dovuto uccidere Marracash.»", 'map' => 'http://maps.google.it/maps?f=q&source=s_q&hl=it&geocode=&q=Via+Brecce+Bianche,+12,+Ancona&aq=0&sll=41.442726,12.392578&sspn=23.377375,53.657227&ie=UTF8&hq=&hnear=Via+Brecce+Bianche,+12,+60131+Ancona,+Marche&z=14&ll=43.581248,13.515684&output=embed',
                'region' => 'Campania', 'date' => '2021-06-12', 'title' => 'Marracash @PersonaTour', 'image' => 'marracash.jpg',
                'allTickets' => 4000, 'price' => 22.5, 'discountPerc' => 5, 'daysNumber' => 10],
            ['description' => "Gemelli è il terzo album in studio del rapper italiano Ernia, pubblicato il 19 giugno 2020 da Island Records/Universal.
                Dopo sessioni di registrazione in studio a cavallo tra il 2019 e il 2020 a Los Angeles, in California,
                Ernia ha anticipato l'annuncio dell'album mediante la pubblicazione di diverse raccolte di fotografie sul proprio profilo Instagram, 
                per l'intera durata del mese di marzo, salvo poi vedersi sovrapporre la pandemia di COVID-19 che ha posticipato l'uscita dello stesso 
                progetto.", 'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2888.3958499768164!2d13.50992555!3d43.61911934999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132d7fbca3c34835%3A0x1d86dde2f0e9af7a!2sTeatro%20delle%20Muse%20-%20Marche%20Teatro!5e0!3m2!1sit!2sit!4v1623265599186!5m2!1sit!2sit',
                'region' => 'Lombardia', 'date' => '2022-06-25', 'title' => 'Ernia @GemelliTour', 'image' => 'ernia.jpg',
                'allTickets' => 5000, 'price' => 40, 'discountPerc' => 0, 'daysNumber' => 0],
            ['description' => "Gemelli è il terzo album in studio del rapper italiano Ernia, pubblicato il 19 giugno 2020 da Island Records/Universal.
                Dopo sessioni di registrazione in studio a cavallo tra il 2019 e il 2020 a Los Angeles, in California,
                Ernia ha anticipato l'annuncio dell'album mediante la pubblicazione di diverse raccolte di fotografie sul proprio profilo Instagram, 
                per l'intera durata del mese di marzo, salvo poi vedersi sovrapporre la pandemia di COVID-19 che ha posticipato l'uscita dello stesso 
                progetto.", 'map' => 'http://maps.google.it/maps?f=q&source=s_q&hl=it&geocode=&q=Via+Brecce+Bianche,+12,+Ancona&aq=0&sll=41.442726,12.392578&sspn=23.377375,53.657227&ie=UTF8&hq=&hnear=Via+Brecce+Bianche,+12,+60131+Ancona,+Marche&z=14&ll=43.581248,13.515684&output=embed',
                'region' => 'Marche', 'date' => '2022-07-03', 'title' => 'Ernia @GemelliTour', 'image' => 'ernia.jpg',
                'allTickets' => 5000, 'price' => 40, 'discountPerc' => 0, 'daysNumber' => 0],
            ['description' => "Potere è il quarto album in studio del rapper italiano Luchè, pubblicato il 29 giugno 2018 dalla Universal Music Group."
                . "Il 24 gennaio 2019 l'album è stato ripubblicato con l'aggiunta del singolo Stamm fort, registrato in collaborazione con Sfera Ebbasta ed inserito come terza traccia del disco.",
                'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2888.3958499768164!2d13.50992555!3d43.61911934999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132d7fbca3c34835%3A0x1d86dde2f0e9af7a!2sTeatro%20delle%20Muse%20-%20Marche%20Teatro!5e0!3m2!1sit!2sit!4v1623265599186!5m2!1sit!2sit',
                'region' => 'Campania', 'date' => '2021-07-02', 'title' => 'Luche @PotereTour', 'image' => 'luche.jpg',
                'allTickets' => 4000, 'price' => 22.5, 'discountPerc' => 5, 'daysNumber' => 10],
            ['description' => "Potere è il quarto album in studio del rapper italiano Luchè, pubblicato il 29 giugno 2018 dalla Universal Music Group.
Il 24 gennaio 2019 l'album è stato ripubblicato con l'aggiunta del singolo Stamm fort, registrato in collaborazione con Sfera Ebbasta ed inserito come terza traccia del disco.", 'map' => 'http://maps.google.it/maps?f=q&source=s_q&hl=it&geocode=&q=Via+Brecce+Bianche,+12,+Ancona&aq=0&sll=41.442726,12.392578&sspn=23.377375,53.657227&ie=UTF8&hq=&hnear=Via+Brecce+Bianche,+12,+60131+Ancona,+Marche&z=14&ll=43.581248,13.515684&output=embed',
                'region' => 'Abruzzo', 'date' => '2021-06-18', 'title' => 'Luche @PotereTour', 'image' => 'luche.jpg',
                'allTickets' => 4000, 'price' => 22.5, 'discountPerc' => 5, 'daysNumber' => 15],
            ['description' => "Potere è il quarto album in studio del rapper italiano Luchè, pubblicato il 29 giugno 2018 dalla Universal Music Group."
                . "Il 24 gennaio 2019 l'album è stato ripubblicato con l'aggiunta del singolo Stamm fort, registrato in collaborazione con Sfera Ebbasta ed inserito come terza traccia del disco.", 'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2888.3958499768164!2d13.50992555!3d43.61911934999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132d7fbca3c34835%3A0x1d86dde2f0e9af7a!2sTeatro%20delle%20Muse%20-%20Marche%20Teatro!5e0!3m2!1sit!2sit!4v1623265599186!5m2!1sit!2sit',
                'region' => 'Marche', 'date' => '2021-06-20', 'title' => 'Luche @PotereTour', 'image' => 'luche.jpg',
                'allTickets' => 4000, 'price' => 22.5, 'discountPerc' => 5, 'daysNumber' => 15],
        ]);

        DB::table('faqs')->insert([
            ['question' => 'Come mi registro su muevents®?', 'answer' => "È facile, dalla home page clicca in alto sull'icona di registrazione e segui le facili indicazioni. Ti verrà chiesto di inserire i tuoi dati e di scegliere una password."],
            ['question' => 'Posso ordinare senza registrarmi?', 'answer' => "No, per ordinare occorre essere registrati. Abbiamo optato per questa scelta proprio per tutelare i nostri Clienti nelle fasi successive. Essendo registrato potrai consultare lo storico dei tuoi ordini ed potrai far sapere agli organizzatori dell'evento se parteciperai o no."],
            ['question' => 'Come posso modificare i miei dati di registrazione?', 'answer' => "Hai la possibilità di modificare i tuoi dati di registrazione accedendo alla tua area personale, per farlo clicca alto a destra sull'icona di login e poi sul pulsante 'modifica informazioni'."],
            ['question' => 'Politica sulla privacy', 'answer' => 'Nessuna delle informazioni che raccogliamo viene condivisa con altre aziende. Le informazioni relative ai pagamenti tramite carta di credito sono utilizzate solo in relazione agli ordini ricevuti.'],
            ['question' => 'Perché devo obbligatoriamente dare la mia e-mail?', 'answer' => 'Le informazioni che muevents® ti chiede sono utilizzate per contattarti solo per materie strettamente tecniche o amministrative.'],
            ['question' => 'Come faccio ad ordinare un prodotto?', 'answer' => 'Tutti gli ordini devono necessariamente essere effettuati direttamente sul portale muevents®. Navigando nel sito secondo si accede direttamente alla pagina dei prodotti e, con pochi semplici click, sarai in grado di comprare biglietti per i tuoi eventi preferiti.'],
            ['question' => 'Come posso trovare il prodotto che mi interessa', 'answer' => 'Trovare un prodotto sul sito Adjutor è semplice e intuitivo. Nel catalogo troverai una sezione per filtrare i prodotti in base ai tuoi gusti'],
            ['question' => 'Come posso effettuare il pagamento?', 'answer' => 'Puoi scegliere tra diverse modalità di pagamento. Una volta entrato nella sezione di acquisto potrai scegliere il numero di biglietti da comprare e il metodo di pagamento.'],
            ['question' => 'Come si ordina?', 'answer' => 'Acquistare su muevents® è facilissimo! Ti basta seguire pochi e semplici passi che ti conducono agli acquisti dei prodotti che desideri.'],
        ]);

        DB::table('managements')->insert([
            ['userId' => '2', 'eventId' => '1'],
            ['userId' => '4', 'eventId' => '2'],
            ['userId' => '6', 'eventId' => '3'],
            ['userId' => '6', 'eventId' => '4'],
            ['userId' => '4', 'eventId' => '5'],
            ['userId' => '2', 'eventId' => '6'],
            ['userId' => '4', 'eventId' => '7'],
            ['userId' => '6', 'eventId' => '8'],
            ['userId' => '4', 'eventId' => '9'],
            ['userId' => '2', 'eventId' => '10'],
        ]);

        DB::table('purchases')->insert([
            ['userId' => '1', 'eventId' => '1', 'discountedPrice' => '20'],
            ['userId' => '3', 'eventId' => '2', 'discountedPrice' => '40'],
            ['userId' => '7', 'eventId' => '3', 'discountedPrice' => '30'],
            ['userId' => '7', 'eventId' => '1', 'discountedPrice' => '20'],
            ['userId' => '3', 'eventId' => '6', 'discountedPrice' => '40'],
            ['userId' => '1', 'eventId' => '8', 'discountedPrice' => '22.5'],
        ]);

        DB::table('participations')->insert([
            ['userId' => '1', 'eventId' => '1'],
            ['userId' => '3', 'eventId' => '2'],
            ['userId' => '7', 'eventId' => '3'],
            ['userId' => '1', 'eventId' => '4'],
            ['userId' => '3', 'eventId' => '1'],
            ['userId' => '7', 'eventId' => '6'],
            ['userId' => '1', 'eventId' => '8'],
            ['userId' => '7', 'eventId' => '4'],
        ]);
    }

}
