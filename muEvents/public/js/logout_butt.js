
$(function () {

    //cliccando sul bottone di logout (compra e partecipa da non autenticato) compare 
    //il pop-up e viene cambiata l'opacità del resto della pagina
    $(".logout-butt").on('click', function () {
        $(".logout_not2").css('display', 'block');
        $(".content-default").css('opacity', '0.3');
    });

    //cliccando sulla x scompare il pop-up e torna l'opacità iniziale
    $("#chiudi_butt").on('click', function () {
        $(".logout_not2").css('display', 'none');
        $(".content-default").css('opacity', '1');
    });
});