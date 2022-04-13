// Cambia il colore delle icone "elimina" nella gestione delle faq

$(function () {
    //quando passo sopra con il mouse si colora di azzurro
    $(".delete_fa").mouseover(function () {
        y = $(".delete_fa").index(this);
        $(".fa-times").eq(y).css('color', '#01e5be');
    });

    //quando sposto il mouse fuori si colora di bianco
    $(".delete_fa").mouseleave(function () {
        y = $(".delete_fa").index(this);
        $(".fa-times").eq(y).css('color', 'white');
    });

});