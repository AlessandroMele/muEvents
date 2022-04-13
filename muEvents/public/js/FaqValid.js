$(function () {
    $(':input').on('input', function (event) {
            //estraggo l'id dell'elemento su cui si verifica l'evento
            var id = $(this).attr('id');
            //check è vera se ci sono errori
            var check = false;
            //in base all'id cambio i possibili errori
            switch (id){
                 case 'question' :         
                                         $('.question-err > li').remove();
                    if (this.value===""){ 
                        $('.question-err').append("<li> La domanda è richiesta </li>");
                        var check = true;
                    }
                    break  
                    
                    case 'answer' :
                    $('.answer-err > li').remove();
                    if (this.value===""){ 
                        $('.answer-err').append("<li> La risposta è richiesta </li>");
                        var check = true;
                    }
                    break;
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


