@extends('layouts.default')

@section('title', 'Analisi Eventi')

@section('content')
<div class="faq_basso">
            <h1 class="subtitles"> Visualizza dati dei tuoi eventi </h1>

    <div class="catalogo">
        <div class="event_list">
            @isset($events)
            @foreach($events as $event)
            <section class="event_content">
                <div class="event_image">
                    <img class="image" src="{{ asset('images/events/'.$event->image) }}">
                </div>
                <div class="event_detail">
                    <h2 class="event_title">{{ $event->title }} </h2>
                    <h2 class="event_region">Regione: {{ $event->region }}</h2>
                    <h2 class="event_region">Data: {{ $event->date }}</h2>
                    <h2 class="event_date">Organizzatore: {{ $event->username }}</h2>
                    <a class="conferma" href="{{ route('showEventStats',$event->eventId) }}" >Analisi</a>
            </section>
            @endforeach
            @include('helpers.paginator', ['paginator' => $events])
            @endisset()
            @if($events->isEmpty())
            <div class="event_content">
                <span id="subtitles"><h3>Nessun Evento da visualizzare</h3></span>
            </div>
            @endif
        </div></div>
</div>
@endsection