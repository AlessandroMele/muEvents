$(function () {


    //all'inizio compare solo l'immagine 0          
    var slideIndex = 0;
    mostra(slideIndex);

    //quando clicco avanzo all'immagine successiva (freccia destra) o torno a quella precedente (freccia sinistra)
    $("#prev").on('click', function () {
        mostra(slideIndex -= 1);
    });
    $("#next").on('click', function () {
        mostra(slideIndex += 1);
    });


    //mostro l'immagine n
    function mostra(n) {
        var i;
        //classe del container con l'immagine
        var slides = $(".mySlides");
        
        // se vado oltre il numero di immagini presenti torno all'inizio
        if (n > slides.length - 1)
            slideIndex = 0;
        // se ho un n negativo vado all'ultima immagine
        if (n < 0)
            slideIndex = slides.length - 1;
        
        // metto tutti a display none
        for (i = 0; i < slides.length; i++) {
            slides.eq(i).css('display', 'none');
        }
        // tolgo il none dal container dell'immagine che voglio mostrare
        slides.eq(slideIndex).css('display', 'block');
    }
});