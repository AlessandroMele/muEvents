@extends('layouts.default')

@section('title', 'Modifica Organizzazione')

@section('scripts')
<script src='{{ asset('js/valid.js') }}'></script>
@endsection

@section('content')

<div class="iscriviti">
    <div class="form">   

        {{ Form::open(array('route' => 'validateModifyOrganization', 'class' => 'formvalidation')) }}
        @csrf
        <h2> Modifica Organizzazione </h2>

        @foreach($organizer as $organizer)
        <table id="tabella2">
            
            <tr>
            <td class="label">{{ Form::label('name', 'Nome') }}</td>
            <td class="label">{{ Form::label('surname', 'Cognome') }}</td>
            </tr>
            
            <tr class="form-row">
                <td>{{ Form::text('name', $organizer->name , [ 'id' => 'name']) }} </td>
                <td>{{ Form::text('surname', $organizer->surname , [ 'id' => 'surname']) }}</td>
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
                <td>{{ Form::text('email', $organizer->email, ['title'=>'formato: xxx@xxx.xxx','id' => 'email']) }}</td>
                <td>{{ Form::text('username', $organizer->username, ['id' => 'username','readonly'=>'true']) }}</td>
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
        
        @endforeach
        {{ Form::hidden('id', $organizer->id,['id'=>'id']) }}
        {{ Form::close() }}
         <a href="{{ route('manageOrganizations') }}" class="conferma">Indietro</a>
        </div>
    </div>
</div>


@endsection