function errors(id,elemErrors) {
    //controllo se esistono errori, altrimenti non faccio nulla
    if ((typeof (elemErrors) === 'undefined') || (elemErrors.length < 1))
        return;
    //per ogni errore creo un elemento e lo aggiungo alla lista
    for (var i = 0; i < elemErrors.length; i++) {
        $("#err-" + id).append("<li>"+elemErrors[i]+"</li>");
    }
}



//funzione per la validazione del singolo elemento 
function validaElem(elementId, action, formId) {

    var formElems;
    var input;

    //prendo l'elemento sul quale ho perso il focus (dato dall'id)
    var elem = $("#" + formId + " :input[name=" + elementId + "]");
    //se è un file estraggo il contenuto del file (immagine)
    if (elem.attr('type') === 'file') {
        input = elem.get(0).files[0];
    }
    //se non è un file estraggo direttamente il valore
    else {
        input = elem.val();
    }
    
    //creo una form standard nella quale aggiungo l'elemento che voglio validare, aggiungo il token e spedisco
    formElems = new FormData();
    formElems.append(elementId, input);


    //estraggo il token dall'input hidden e lo aggiungo alla form
    var tokenVal = $("#" + formId + " input[name=_token]").val();
    formElems.append('_token', tokenVal);



    $.ajax({
        type: 'POST',
        //azione svolta
        url: action,
        //form da validare
        data: formElems,
        //tipo di dato in risposta
        dataType: "json",
        error: function (err) {
            if (err.status === 422) {
                //trasformo da json a oggetto js
                var errMsgs = JSON.parse(err.responseText);
                //elimino gli errori già presenti per l'elemento
                $("#err-" + elementId).html(' ');
                //inserisco i nuovi errori
                errors(elementId, errMsgs[elementId]);
            }
        },
        contentType: false,
        processData: false
    });

}



//funzione per la validazione dell'intera form
function validaForm(action, formId) {

    //creiamo la form da mandare al server con gli elementi della form_html 
    var form = new FormData(document.getElementById(formId));

    $.ajax({
        type: 'POST',
        url: action,
        data: form,
        dataType: "json",
        error: function (err) {
            if (err.status === 422) {
                //trasformo da json a oggetto js
                var errMsgs = JSON.parse(err.responseText);
                //elimino gli errori già presenti per ogni l'elemento ed inserisco i nuovi
                $.each(errMsgs, function (elementId) {
                    $("#err-" + elementId).html('');
                    errors(elementId, errMsgs[elementId]);
                });
            }
        },
        //se tutti i dati sono validati il server li inserisce nel db e vengo reindirizzato nella rotta ritornata in "data"
        success: function (elem) {
            window.location.replace(elem.redirect);
        },
        contentType: false,
        processData: false
    });
}





