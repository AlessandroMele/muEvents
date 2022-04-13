@extends('layouts.default')

@section('title', 'Gestione Eventi')

@section('scripts')
<script src='{{ asset('js/confirm.js') }}'></script>
@endsection


@section('content')
<div class="faq_basso">
     <h1 class="subtitles"> Gestisci i tuoi eventi </h1>
        <div class="ins_cont">
        <a class="inserisci" href=" {{ route ('insertEvent')}}"> Inserisci un nuovo evento </a> 
        </div>


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
                    <div class="event_butt">
                    <a class="conferma" href=" {{route('modifyEvent', [$event->eventId] ) }} ">Modifica</a> 
                    {{ Form::open(array('class'=>'delete','route' => 'deleteEvent')) }}
                    @csrf
                    {{Form::hidden('eventId',$event->eventId)}}
                    {{ Form::submit('Annulla evento', ['class'=>'conferma']) }}
                    {{Form::close()}}
                    </div>
                </div>
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