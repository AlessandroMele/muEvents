
$(function () {

    //cliccando sull'icona di logout compare il pop-up e viene cambiata l'opacità del resto della pagina
    $("#logout-ico").on('click', function () {
        $("#logout").css('display', 'block');
        $(".content-default").css('opacity', '0.3');
    });

    //cliccando sulla x scompare il pop-up e torna l'opacità iniziale
    $("#chiudi").on('click', function () {
        $("#logout").css('display', 'none');
        $(".content-default").css('opacity', '1');
    });
});