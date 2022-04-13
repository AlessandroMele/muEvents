$(function () {
    $(':input').on('input', function (event) {
            //estraggo l'id dell'elemento su cui si verifica l'evento
            var id = $(this).attr('id');
            //check è vera se ci sono errori
            var check = false;
            //in base all'id cambio i possibili errori
            switch (id){
                
                case 'email' :
                    //elimino gli errori precedenti e se presenti inserisco quelli nuovi (ripetuta per ogni elemento)
                    $('.email-err > li').remove();
                    var pattern = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,6})$/;
                    if (!pattern.test(this.value)) {
                        $('.email-err').append("<li> Formato email non corretto! </li>");
                        var check = true;
                
                    }
                    if (this.value.length > 40){ 
                        $('.username-err').append("<li> Inserire al più 40 caratteri! </li>");
                        var check = true;
                    }
                    break;
                    
                case 'password' :
                    $('.pass-err > li').remove();
                    if (this.value.length < 8){ 
                        $('.pass-err').append("<li> Inserire almeno 8 caratteri! </li>");
                        var check = true;
                    }
                    if ((($('#password-conf')).val()!=="") && (this.value!==($('#password-conf').val()))){
                        $('.pass-err').append("<li> La password di conferma non corrisponde! </li>");
                        var check = true;
                    }
                    break;
                    
                case 'password-conf' :
                    $('.pass-err > li').remove();
                    if ($('#password').val().length < 8){ 
                        $('.pass-err').append("<li> Inserire almeno 8 caratteri! </li>");
                        var check = true;
                    }
                    if ((($('#password-conf')).val()!=="") && (this.value!==($('#password').val()))){
                        $('.pass-err').append("<li> La password di conferma non corrisponde! </li>");
                        var check = true;
                    }
                    break;
                    
                case 'username' :
                    $('.username-err > li').remove();
                    if (this.value.length < 8){ 
                        $('.username-err').append("<li> Inserire almeno 8 caratteri! </li>");
                        var check = true;
                    }
                    if (this.value.length > 20){ 
                        $('.username-err').append("<li> Inserire al più 20 caratteri! </li>");
                        var check = true;
                    }
                    break;
                    
                case 'name' :
                    $('.name-err > li').remove();
                    if (this.value.length > 20){ 
                        $('.name-err').append("<li> Inserire al più 20 caratteri! </li>");
                        var check = true;
                    }
                    if (this.value===""){ 
                        $('.name-err').append("<li> Nome è richiesto </li>");
                        var check = true;
                    }
                    break;
                 case 'surname' :
                    $('.surname-err > li').remove();
                    if (this.value.length > 20){ 
                        $('.surname-err').append("<li> Inserire al più 20 caratteri! </li>");
                        var check = true;
                    }
                    
                    if (this.value===""){ 
                        $('.surname-err').append("<li> Cognome è richiesto </li>");
                        var check = true;
                    }
                    break  
            }
            //se ci sono errori (check) il pulsante di conferma viene disabilitato
            if (check){
                $('.formvalidation').on('submit', function(event){
                event.preventDefault();
            });
            //se non ci sono errori viene sbloccato il pulsante di conferma 
            }else{
                $('.formvalidation').unbind(); 
            }
    });
});
        