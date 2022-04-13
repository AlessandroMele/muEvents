@extends('layouts.default')

@section('title', 'Dettaglio analisi evento')

@section('content')

<div class="container">
    @foreach($event as $event)
    <div class="s_event_content">

        <div class="s_event_image">
            <img class="s_image" src="{{ asset('images/events/'.$event->image) }}" >
        </div>

        <div class="s_event_info">
            <h1 class="subtitles">{{ $event->title }}</h1>
            <h2 class="s_event_organizator">Organizzato da: {{ $event->username }}</h2>
            <h2 class="s_event_region">Regione: {{ $event->region }}</h2>
            <h2 class="s_event_date">Data: {{ $event->date }}</h2>
            <br><h2 class="s_event_analisi">Per questo evento hai venduto: {{ $stats['soldTickets'] }} biglietti su {{ $stats['allTickets'] }} disponibili ({{ $stats['perc'] }} %)</h3>
                    <h2 class="s_event_analisi">Biglietti rimanenti: {{ $stats['remTickets'] }}</h2>
            <h2 class="s_event_analisi">In totale hai incassato: {{ $stats['cash'] }} €</h2>
        </div>
        
        <div class="s_event_map">
            <iframe class="s_map" src=" {{ $event->map }}"></iframe>
        </div>
    </div>
    @endforeach
</div>
@endsection