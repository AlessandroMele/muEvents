<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>muEvents | @yield('title', 'Home') </title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
        @cannot('isLevel3-4')
        <link rel="icon" href="{{ asset('faviconR.ico') }}">
        @endcan
        @can('isLevel3-4')
        <link rel="icon" href="{{ asset('faviconV.ico') }}">
        <link rel="stylesheet" href="{{ asset('css/admin.css') }}" type="text/css">
        @endcan
        <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css') }}" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        @yield('scripts')
        @auth
        <script src="{{ asset('js/logout_ico.js') }}" ></script>
        @endauth
    </head>
    <body>
        <div>
            @include('layouts/navbar')
        </div>
        <div class="content-default">            
            @yield('content')
        </div>
        <div id="logout">
            <h2>Sei sicuro di voler uscire?</h2>
            {{ Form::open(array('route' => 'logout')) }}
            @csrf
            {{ Form::submit('Conferma', ['class'=>'conferma']) }}
            {{ Form::close() }}
            <span id="chiudi">&times;</span>
        </div>
        <div class="logout_not2">
            <h2>Per svolgere quest'azione devi essere loggato come livello 2, sei sicuro di voler uscire?</h2>
            {{ Form::open(array('route' => 'logout')) }}
            @csrf
            {{ Form::submit('Conferma', ['class'=>'conferma']) }}
            {{ Form::close() }}
            <span id="chiudi_butt">&times;</span>
        </div>
        <div>
            @include('layouts/footer')
        </div>
    </body>
</html>