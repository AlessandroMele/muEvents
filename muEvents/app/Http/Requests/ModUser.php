<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModUser extends FormRequest {

    public function authorize(){
        return true;
    }
    
    /*
     * regola per la modifica dei dati dell'utente di livello 2
     */

    public function rules(){
        return[
            'name' => ['required', 'string', 'max:20'],
            'surname' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'regex:/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,6})$/', 'max:40', \Illuminate\Validation\Rule::unique('users')->ignore($this->user()->id)],
            'username' => ['required', 'string', 'min:8','max:20', \Illuminate\Validation\Rule::unique('users')->ignore($this->user()->id)],
            'password' => ['nullable', 'string', 'min:8', 'confirmed']
        ];
    }
}