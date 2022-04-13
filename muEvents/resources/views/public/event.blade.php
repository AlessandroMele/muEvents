@extends('layouts.default')

@section('title', 'Prodotto')

@section('scripts')
@can('isLevel3-4')
<script src="{{ asset('js/logout_butt.js') }}" ></script>
@endcan
@endsection 

@section('content')



<div class="container">
    @foreach($event as $event)
    <div class="s_event_content">

        <div class="s_event_image">
            <img class="s_image" src="{{ asset('images/events/'.$event->image) }}" >
        </div>

        <div class="s_event_info">
            <h1 class="subtitles">{{ $event->title }}</h1>
            <h3 class="s_event_organizator">Organizzato da: {{ $event->username }}</h3>
            <h3 class="s_event_region">Regione: {{ $event->region }}</h3>
            <h3 class="s_event_date">Data: {{ $event->date }}</h3>
        </div>

        <div class="s_event_description">
            {{ $event->description }}
        </div>

        <div class="s_event_price">
            @if($cost==$event->price)
            <h3>Prezzo biglietto: {{ $event->price }} € </h3>
            @else
            <h3 class="sold">Prezzo biglietto: {{ $event->price }} €</h3>
            <h3>Prezzo scontato: {{ $cost }} €  ({{$event->discountPerc}}%)</h3>
            @endif
            @if( $event->allTickets !=0)
            <p class="event_tickets"> Biglietti disponibili: {{ ($event->allTickets)-($tickets) }} su {{ $event->allTickets }}</p>
            @else
            <p class="event_tickets"> Biglietti esauriti </p>
            @endif
            <h5> Persone che parteciperanno: {{ $count }} </h5>
        </div>
        <div class="s_event_interaction">

            @can('isLevel3-4')
            <a class="conferma logout-butt">Acquista</a>
            <a class="conferma logout-butt">Parteciperò</a>
            @endcan

            @guest
            <a class="conferma" href=" {{ route ('login') }} ">Acquista</a>
            <a class="conferma" href=" {{ route ('login') }} ">Parteciperò</a>
            @endguest

            @can('isUser')
            <a class="conferma" href=" {{ route ('showBuyOptions', [$event->eventId] ) }} ">Acquista</a>
            @if($part==1)
            <a class="conferma" href=" {{ route ('delParticipation', [$event->eventId]) }} ">Non parteciperò</a>
            @elseif($part==0)
            <a class="conferma" href=" {{ route ('addParticipation', [$event->eventId]) }} ">Parteciperò</a>
            @endif
            @endcan   

        </div>
        <div class="s_event_map">
            <iframe class="s_map" src=" {{ $event->map }}"></iframe>
        </div>
    </div>
    @endforeach
</div>

@endsection