@extends('layouts.default')

@section('title', 'Accedi')

@section('content')
        
           <div id="accedi-iscriviti">
               <div class="login">
            <h2>Accedi</h2>
            {{ Form::open(array('route' => 'login','class' => 'login-form')) }}
             @csrf
            {{ Form::text('username', '', ['id' => 'username','placeholder' => 'username','required' => 'yes']) }}
            {{ Form::password('password', ['placeholder' => 'Password','placeholder' => 'password','id' => 'password','required' => 'yes']) }}
            @if ($errors->first('username'))
                <ul class="errors">
                    @foreach ($errors->get('username') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            {{ Form::submit('Accedi', ['class'=>'conferma']) }}
            {{ Form::close() }}
            
            
            <h4> Non hai un account? Registrati ora </h4>
           <a href="{{route('register')}}" class="reg">Registrati</a>
        </div>
</div>
@endsection