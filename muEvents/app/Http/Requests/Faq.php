<?php

namespace app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Faq extends FormRequest {

    public function authorize(){
        return true;
    }
    
    /*
     * regola per la modifica dei dati dell'utente di livello 2
     */

    public function rules(){
        return[
            'question' => 'required|string',
            'answer' => 'required|string',
        ];
    }
}