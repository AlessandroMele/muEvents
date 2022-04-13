@extends('layouts.default')

@section('title', 'Analisi organizzatore')

@section('scripts')
@can('isLevel3-4')
<script src="{{ asset('js/logout_butt.js') }}" ></script>
@endcan
@endsection 

@section('content')



<div class="container">
    @foreach($user as $user)
    <div class="s_event_content">
        <div class="s_event_info">
            <h1 class="subtitles">Informazioni relative all' organizzazione: {{ $user->username }} </h1>
            <h3 class="s_event_organizator">Id organizzatore: {{ $user->id }}</h1>
            <h3 class="s_event_organizator">Username: {{ $user->username }}</h3>
            <h3 class="s_event_region">Nome responsabile: {{ $user->name }}</h3>
            <h3 class="s_event_date">Cognome responsabile: {{ $user->surname }}</h3>
            <h3 class="s_event_date">Email aziendale: {{ $user->email }}</h3>   
        </div>
        <div class="s_event_content">
            
            <h1 class="subtitles">Dati di analisi relativi all' organizzazione: {{ $user->username }} </h1>
            <h3 class="s_event_organizator">{{ $user->username }} ha venduto un numero di biglietti totali pari a: {{ $stats['tickets'] }} </h3>
            <h3 class="s_event_organizator">{{ $user->username }} ha incassato in totale: {{ $stats['cash'] }} € </h3>
        </div>
    </div>
    @endforeach
</div>
@endsection