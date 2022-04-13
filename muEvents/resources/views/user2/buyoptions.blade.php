
@extends('layouts.default')

@section('title', 'Metodo di pagamento')

@section('content')

<div class="buy_options_container">
    @foreach($event as $event)
    <div class="buy_options_content">
        <div class="buy_options_image">
            <img class="buy_options_image" src="{{ asset('images/events/'.$event->image) }}" >
        </div>
        <div class="buy_options_info">
            <h1 class="buy_options_title">{{ $event->title }}</h1>
            <h3 class="buy_options_info">Regione: {{ $event->region }}</h3>
            <h3 class="buy_options_info">Organizzatore: {{ $event->username }}</h3>
            <h3 class="buy_options_info">Data: {{ $event->date }}</h3>
            @if($cost==$event->price)
            <h3>Prezzo biglietto: {{ $event->price }} € </h3>
            @else
            <h3 class="sold">Prezzo biglietto: {{ $event->price }} €</h3>
            <h3>Prezzo scontato: {{ $cost }} €  ({{$event->discountPerc}}%)</h3>
            @endif
            @if( $event->allTickets != $tickets )
            <p class="buy_options_info"> Rimasti {{$event->allTickets-$tickets}} biglietti</p>
            @endif
            {{ Form::open(array('route' => 'validateBuy','class'=>'buy_options_form')) }}
            @csrf
            {{ Form::hidden('eventid', $event->eventId) }}
            <div class="buy_options_container">
                <div class="buy_options_dati">
                    {{ Form::label('buy_option', "Opzioni d'acquisto") }}
                    {{ Form::select('buy_option',$payments, ['id' => 'payment']) }}
                </div>
                <div class="buy_options_dati">
                    {{ Form::label('tickets', "Numero biglietti") }}
                    {{ Form::number('tickets',1, ['id' => 'tickets', 'min'=>'0','max'=>$event->allTickets-$tickets]) }}
                </div>
            </div>
            <div class="buy_options_confirm">
                @if( $event->allTickets != $tickets)
                {{ Form::submit('Conferma Acquisto', ['class'=>'conferma']) }}
                @else 
                <p class="event_tickets"> Nessun biglietto rimanente  </p>
                @endif
                {{ Form::close() }}
                <a href="{{ route('filteredCatalog') }}" class="conferma">Indietro</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection