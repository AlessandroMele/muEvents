@extends('layouts.default')

@section('title', 'Catalogo Prodotti')

@section('scripts')
<script src="{{ asset('js/filterReset.js') }}" ></script>
@can('isLevel3-4')
<script src="{{ asset('js/logout_butt.js') }}" ></script>
@endcan
@endsection 

@section('content')


<div class="faq_basso">
    <h1 class="subtitles"> Catalogo eventi </h1>
    <div id="filtri">
        <h2> Filtra la ricerca</h2>

        {{ Form::open(array('route' => 'filteredCatalog', 'method' => 'get','class' => 'form_filt')) }}
        <div class="elem">
            {{ Form::label('organizer', 'Organizzatore') }}
            {{ Form::select('organizer', $organizers,$request->organizer, ['id' => 'organizer', 'placeholder' => '--Seleziona--']) }}
        </div>
        <div class="elem">
            {{ Form::label('region', 'Regione') }}
            {{ Form::select('region', $regions,$request->region, ['id' => 'region','placeholder' => '--Seleziona--']) }}
        </div>
        <div class="elem">
            {{ Form::label('description', 'Descrizione') }}
            {{ Form::text('description', $request->description, ['id' => 'description']) }}
        </div>
        <div class="elem">
            {{ Form::label('date', 'Anno-Mese (AAAA-MM)') }}
            {{ Form::text('date', $request->date, ['id' => 'date']) }}
            @if ($errors->first('date'))
            <ul class="errors">
                @foreach ($errors->get('date') as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
            @endif
        </div>

        <div>
            {{ Form::submit('Conferma', ['class' => 'conferma']) }}
            <a class="conferma" id="azzera"> Azzera </a>
        </div>
        {{ Form::close() }}
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
                    <h2 class="event_region">Organizzatore: {{ $event->username }}</h2>
                    <h2 class="event_region">Regione: {{ $event->region }}</h2>
                    <h2 class="event_date">Data: {{ $event->date }}</h2>
                    <a class="conferma" href=" {{ route ('event', [$event->eventId] ) }} ">Visualizza</a>

                    @can('isLevel3-4')
                    <a class="conferma logout-butt">Acquista</a>
                    @endcan

                    @guest
                    <a class="conferma" href=" {{ route ('login') }} ">Acquista</a>
                    @endguest

                    @can('isUser')
                    <a class="conferma" href=" {{ route ('showBuyOptions', [$event->eventId] ) }} ">Acquista</a>
                    @endcan   
                </div>
            </section>
            @endforeach
            @include('helpers.paginator', ['paginator' => $events])
            @endisset()
            @if($events->isEmpty())
            <div class="event_content">
                <span id="subtitles"><h3>La ricerca non ha prodotto alcun risultato</h3></span>
            </div>
            @endif
        </div></div>
</div>

@endsection