<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Model\OCatalog;
use Illuminate\Http\Request;

// Aggiunti per response JSON
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;


class ModEvent extends FormRequest {
    
    protected $_order;

    /**
     * regola per l'inserimento di un nuovo evento

     */
    public function rules(Request $request) {
        
        //posso inserire un numero di biglietti minimo pari a quelli già venduti
        $this->_order = new OCatalog;
        $buyTickets = $this->_order->GetTicketsById($request->eventId);
        
        return [
            'title' => 'required|max:30', 
            'description' => 'required',
            'map' => ['required','max:400','regex:#^(https|http)://[a-zA-Z0-9.]+#'],
            'date' => 'required|date_format:Y-m-d|after:today',
            'allTickets' => ['required','integer','min:1',"min:$buyTickets",'max:16000000'],
            'image' => 'nullable|image',
            'price' => 'required|numeric|between:0,10000.00',
            'discountPerc' => 'nullable|integer|between:0,100',
            'daysNumber' => 'nullable|integer|min:0|max:365'
        ];
    }
    
    //la risposta in caso di errore di validazione è restituita come json come errore 422
        protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY));
    }

}
