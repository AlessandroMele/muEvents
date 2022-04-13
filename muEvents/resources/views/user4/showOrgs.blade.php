@extends('layouts.default')

@section('title', 'Gestione Organizzatori')

@section('scripts')
<script src='{{ asset('js/confirm.js') }}'></script>
@endsection


@section('content')
<div class="faq_basso">
    <h1 class="subtitles"> Visualizza i dati e le analisi degli organizzatori</h1>

    <div class="catalogo">
        <div class="user_list">
            @isset($users)
            @foreach($users as $user)
            <section class="user_content">
                    <h2 class="event_region">Username: {{ $user->username }} </h1>
                    <h2 class="event_region">ID: {{ $user->id }}</h2>
                    <h2 class="event_region">Nome: {{ $user->name }}</h2>
                    <h2 class="event_region">Cognome: {{ $user->surname }}</h2>
                    <h2 class="event_date">Email: {{ $user->email }}</h2>
                    <a class="conferma" href="{{ route('showOrganization', [$user->id]) }}">Visualizza/analisi</a>
            </section>
            @endforeach
            @include('helpers.paginator', ['paginator' => $users])
            @endisset()
            @if($users->isEmpty())
            <div class="user_content">
                <span id="subtitles"><h3>Nessun organizzatore presente</h3></span>
            </div>
            @endif
        </div></div>
</div>
@endsection