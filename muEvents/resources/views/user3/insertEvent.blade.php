@extends('layouts.default')

@section('title', 'Inserisci nuovo evento')

@section('scripts')
<script src="{{ asset('js/insEv.js') }}" ></script>
<script>
$(function () {
    //action attivata
    var action = "{{ route('validateInsEvent') }}";
    //id form da validare
    var formId = 'form_ins';
    $(":input").on('blur', function (event) {
        //id elemento su cui ho perso il focus
        var elementId = $(this).attr('id');
        validaElem(elementId, action, formId);
    });
    
    $("#form_ins").on('submit', function (event) {
        //blocco l'azione di submit e chiamo la funzione di validazione
        event.preventDefault();
        validaForm(action, formId);
    });
});
</script>
@endsection

@section('content')

<div class="iscriviti">
    <div class="form">   

{{ Form::open(array('route' => 'validateInsEvent', 'files' => true, 'id'=>'form_ins')) }}
        @csrf
        <h2> Inserisci un nuovo evento </h2>

        <table id="tabella_ev">
            
            <tr>
            <td class="label">{{ Form::label('title', 'Titolo') }}</td>
            <td class="label">{{ Form::label('allTickets', 'Biglietti Totali') }}</td>
            </tr>
            
            <tr class="form-row">
                <td>{{ Form::text('title', '', [ 'id' => 'title']) }} </td>
                <td>{{ Form::text('allTickets','', [ 'id' => 'allTickets']) }}</td>
            </tr>
            
            <tr class="form-row">
                <td>            
                    <ul class="errors" id="err-title">
                    </ul>
                </td>
                
                <td>
                    <ul class="errors" id="err-allTickets">
                    </ul>
                </td>
            </tr>


            <tr>
            <td class="label">{{ Form::label('map', 'Iframe Mappa') }}</td>
            <td class="label">{{ Form::label('description', 'Descrizione') }}</td>
            </tr>
            
            <tr class="form-row">
                <td>{{ Form::textarea('map', '', ['id' => 'map', 'cols'=> 30,'rows'=> 5]) }}</td>
                <td>{{ Form::textarea('description', '', ['id' => 'description','cols'=> 30,'rows'=> 5]) }}</td>
            </tr>
            
            <tr class="form-row">
                <td>            
                    <ul class="errors" id="err-map">
                    </ul>
                </td>
                
                <td>  
                    <ul class="errors" id="err-description">
                    </ul>
                </td>
                
            </tr>
            
            
            <tr>
            <td class="label">{{ Form::label('date', 'Data')}}</td>
            <td class="label">{{ Form::label('price', 'Prezzo biglietto' )}}</td>
            </tr>

            <tr class="form-row">
                <td>{{ Form::text('date', '',['id' => 'date']) }}</td>
                <td>{{ Form::text('price', '',['id' => 'price'])}}</td>
            </tr>
            
            <tr class="form-row">
                
                <td>            
                    <ul class="errors" id="err-date">
                    </ul>
                </td>
                
                <td>            
                    <ul class="errors" id="err-price">
                    </ul>
                </td>
            </tr>
            
            <tr>
            <td class="label">{{ Form::label('discountPerc', 'Percentuale di sconto')}}</td>
            <td class="label">{{ Form::label('daysNumber', 'Giorni di sconto' )}}</td>
            </tr>

            <tr class="form-row">
                <td>{{ Form::text('discountPerc', '',['id' => 'discountPerc']) }}</td>
                <td>{{ Form::text('daysNumber', '',['id' => 'daysNumber'])}}</td>
            </tr>
            
            <tr class="form-row">
                
                <td>            
                    <ul class="errors" id="err-discountPerc">
                    </ul>
                </td>
                
                <td>            
                    <ul class="errors" id="err-daysNumber">
                    </ul>
                </td>
            </tr>
            
            <tr>
            <td class="label">{{ Form::label('region', 'Regione')}}</td>
            <td class="label">{{ Form::label('image', 'Immagine')}}</td>
            </tr>

            <tr class="form-row">
                <td>{{ Form::select('region', $regions ,['id' => 'region']) }}</td>
                <td>{{ Form::file('image', [ 'id' => 'image']) }}</td>
            </tr>
            
            <tr class="form-row">
                
                <td>            
                    <ul class="errors" id="err-region">
                    </ul>
                </td>
                
                <td>            
                    <ul class="errors" id="err-image">
                    </ul>
                </td>
            </tr>
            
        </table>
        

        <div class="form-submit">
            {{ Form::submit('Conferma', ['class'=>'conferma']) }}

        {{ Form::close() }}
           <a href="{{ url()->previous() }}" class="conferma">Indietro</a>
        </div>
</div>
    </div>

@endsection
