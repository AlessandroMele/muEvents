@extends('layouts.default')

@section('title', 'Registrati')

@section('scripts')
<script src='{{ asset('js/valid.js') }}'></script>
@endsection


@section('content')

<div class="iscriviti">
    <div class="form">   

        {{ Form::open(array('route' => 'register', 'class' => 'formvalidation')) }}
        @csrf
        <h2>Registrati</h2>

        <table id="tabella2">
            
            <tr>
            <td class="label">{{ Form::label('name', 'Nome') }}</td>
            <td class="label">{{ Form::label('surname', 'Cognome') }}</td>
            </tr>
            
            <tr class="form-row">
                <td>{{ Form::text('name', '', [ 'id' => 'name']) }} </td>
                <td>{{ Form::text('surname', '', [ 'id' => 'surname']) }}</td>
            </tr>
            
            <tr class="form-row">
                <td>  
                    <ul class="errors name-err">
                        @if ($errors->first('name'))
                        @foreach ($errors->get('name') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                        @endif                    
                    </ul>
                </td>
                
                <td>  
                    <ul class="errors surname-err">
                        @if ($errors->first('surname'))
                        @foreach ($errors->get('surname') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                        @endif                    
                    </ul>
                </td>
            </tr>


            <tr>
            <td class="label">{{ Form::label('email', 'Email') }}</td>
            <td class="label">{{ Form::label('username', 'Username') }}</td>
            </tr>
            
            <tr class="form-row">
                <td>{{ Form::text('email', '', ['title'=>'formato: xxx@xxx.xxx','id' => 'email']) }}</td>
                <td>{{ Form::text('username', '', ['id' => 'username']) }}</td>
            </tr>
            
            <tr class="form-row">
                <td>            
                    <ul class="errors email-err">
                        @if ($errors->first('email'))
                        @foreach ($errors->get('email') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                        @endif
                    </ul>
                </td>
                
                <td>  
                    <ul class="errors username-err">
                        @if ($errors->first('username'))
                        @foreach ($errors->get('username') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                        @endif                    
                    </ul>
                </td>
                
            </tr>
            
            
            <tr>
            <td class="label">{{ Form::label('password', 'Password')}}</td>
            <td class="label">{{ Form::label('password_confirmation', 'Conferma Password' )}}</td>
            </tr>

            <tr class="form-row">
                <td>{{ Form::password('password', ['id' => 'password']) }}</td>
                <td>{{ Form::password('password_confirmation', ['id' => 'password-conf'])}}</td>
            </tr>
            
            <tr class="form-row">
                <td>            
                    <ul class="errors pass-err">
                        @if ($errors->first('password'))
                        @foreach ($errors->get('password') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                        @endif
                    </ul>
                </td>
                
                <td>       </td>
            </tr>
            
        </table>

      <div class="form-submit">
            {{ Form::submit('Conferma', ['class'=>'conferma']) }}
        {{ Form::close() }}
            <a href="{{ route('login') }}" class="conferma">Indietro</a>
</div>
    </div>
</div>


@endsection