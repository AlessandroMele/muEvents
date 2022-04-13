@extends('layouts.default')

@section('title', 'Gestione Utenti')

@section('scripts')
<script src='{{ asset('js/confirm.js') }}'></script>
@endsection


@section('content')
<div class="faq_basso">
    <h1 class="subtitles"> Elimina utenti</h1>

    <div class="catalogo">
        <div class="user_list">
            @isset($users)
            @foreach($users as $user)
            <section class="user_content">
                    <h2 class="event_region">Username: {{ $user->username }} </h1>
                    <h2 class="event_region">ID: {{ $user->id }}</h2>
                    <h2 class="event_region">Nome: {{ $user->name }}</h2>
                    <h2 class="event_region">Cognome: {{ $user->surname }}</h2>
                    <h2 class="event_region">Email: {{ $user->email }}</h2>
                    {{ Form::open(array('class'=>'delete','route' => 'deleteUser')) }}
                    @csrf
                    {{Form::hidden('userId',$user->id)}}
                    {{ Form::submit('Elimina utente', ['class'=>'conferma']) }}
                    {{Form::close()}}
            </section>
            @endforeach
            @include('helpers.paginator', ['paginator' => $users])
            @endisset()
            @if($users->isEmpty())
            <div class="user_content">
                <span id="subtitles"><h3>Nessun utente presente</h3></span>
            </div>
            @endif
        </div></div>
</div>
@endsection