@extends('layouts.default')

@section('title', 'Modifica informazioni')

@section('scripts')
<script src='{{ asset('js/valid.js') }}'></script>
@endsection

@section('content')

<div class="iscriviti">
    <div class="form">
        {{ Form::open(array('route' => 'saveInfo', 'class' => 'formvalidation')) }}
        @csrf
        <h2>Modifica dati</h2>

        @foreach($accounts as $account)

        <table id="tabella1">

            <tr>
                <td class="label">{{ Form::label('name', 'Nome') }}</td>
                <td class="label">{{ Form::label('surname', 'Cognome') }}</td>
            </tr>

            <tr class="form-row">
                <td>{{ Form::text('name', $account->name, [ 'id' => 'name']) }} </td>
                <td>{{ Form::text('surname', $account->surname, [ 'id' => 'surname']) }}</td>
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
                <td class="label">{{ Form::label('username', 'Username (non modificabile)') }}</td>
            </tr>

            <tr class="form-row">
                <td>{{ Form::text('email', $account->email, ['title'=>'formato: xxx@xxx.xxx','id' => 'email']) }}</td>
                <td>{{ Form::text('username', $account->username, ['id' => 'username','readonly'=>'true']) }}</td>
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

        </table>


        <h3 class="mod_pass">Per modificare la password (opzionale):</h3>


        <table id="tabella2">
            <tr>
                <td class="label">{{ Form::label('password', 'Nuova password')}}</td>
                <td class="label">{{ Form::label('password_confirmation', 'Conferma nuova password')}}</td>
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
             <a href="{{ route('account') }}" class="conferma">Indietro</a>
        </div> 
        @endforeach
    </div>
</div>
@endsection