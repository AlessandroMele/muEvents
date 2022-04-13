@extends('layouts.default')

@section('title', 'Inserisci nuova FAQ')

@section('scripts')
<script src='{{ asset('js/FaqValid.js') }}'></script>
@endsection

@section('content')

<div class="iscriviti">
    <div class="form">   

        {{ Form::open(array('route' => 'validateInsertFAQ','class' => 'formvalidation')) }}
        @csrf
        <h2> Inserisci un nuova FAQ </h2>

        <table id="tabella_ev">
            
            <tr>
            <td class="label">{{ Form::label('question', 'Testo Domanda') }}</td>
            <td class="label">{{ Form::label('answer', 'Testo Risposta') }}</td>
            </tr>
            
            <tr class="form-row">
                <td>{{ Form::textarea('question', '', [ 'id' => 'question']) }} </td>
                <td>{{ Form::textarea('answer','', [ 'id' => 'answer']) }}</td>
            </tr>
            
            <tr class="form-row">
                <td>            
                    <ul class="question-err">
                        @if ($errors->first('question'))
                        @foreach ($errors->get('question') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                        @endif
                    </ul>
                    
                </td>
                
                <td>
                    <ul class="answer-err">
                        @if ($errors->first('answer'))
                        @foreach ($errors->get('answer') as $message)
                        <li>{{ $message }}</li>
                        @endforeach
                        @endif
                    </ul>
                </td>
            </tr>

   
        </table>
        

      <div class="form-submit">
            {{ Form::submit('Conferma', ['class'=>'conferma']) }}
        {{ Form::close() }}
           <a href="{{ route('homeFAQ') }}" class="conferma">Indietro</a>
</div>
    </div>
</div>


@endsection

