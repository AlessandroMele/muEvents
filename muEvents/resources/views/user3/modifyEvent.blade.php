@extends('layouts.default')

@section('title', 'Modifica informazioni')

@section('scripts')
<script src="{{ asset('js/insEv.js') }}" ></script>
<script>
$(function () {
    //action attivata
    var action = "{{ route('validateModEvent') }}";
    //id form da validare
    var formId = 'form_mod';
    $(":input").on('blur', function (event) {
        //id elemento su cui ho perso il focus
        var elementId = $(this).attr('id');
        validaElem(elementId, action, formId);
    });
    $("#form_mod").on('submit', function (event) {
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
        
        @foreach($event as $event)

        {{ Form::open(array('route' => 'validateModEvent', 'files' => true,'id'=>'form_mod')) }}
        @csrf
        <h2> Modifica dati evento </h2>
        
            {{Form::hidden('eventId',$event->eventId)}}
        <table id="tabella_ev">
            
            <tr>
            <td class="label">{{ Form::label('title', 'Titolo') }}</td>
            <td class="label">{{ Form::label('allTickets', 'Biglietti Totali') }}</td>
            </tr>
            
            <tr class="form-row">
                <td>{{ Form::text('title', $event->title, [ 'id' => 'title']) }} </td>
                <td>{{ Form::text('allTickets', $event->allTickets, [ 'id' => 'allTickets']) }}</td>
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
                <td>{{ Form::textarea('map', $event->map, ['id' => 'map', 'cols'=> 30,'rows'=> 5]) }}</td>
                <td>{{ Form::textarea('description', $event->description, ['id' => 'description','cols'=> 30,'rows'=> 5]) }}</td>
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
                <td>{{ Form::text('date', $event->date,['id' => 'date']) }}</td>
                <td>{{ Form::text('price', $event->price,['id' => 'price'])}}</td>
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
                <td>{{ Form::text('discountPerc', $event->discountPerc,['id' => 'discountPerc']) }}</td>
                <td>{{ Form::text('daysNumber', $event->daysNumber,['id' => 'daysNumber'])}}</td>
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
            <td class="label">{{ Form::label('image', 'Immagine (opzionale)')}}</td>
            </tr>

            <tr class="form-row">
                <td>{{ Form::select('region', $regions,$event->region ,['id' => 'region']) }}</td>
                
                <td>{{ Form::file('image', [ 'id' => 'image']) }}</td>
            </tr>
            
            <tr class="form-row">
                
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
        @endforeach
        {{ Form::close() }}
           <a href="{{ url()->previous() }}" class="conferma">Indietro</a>
</div>
    </div>
</div>
@endsection