@extends('layouts.default')

@section('title', 'Account')

@section('content')

<div class="account-info">
    <h2> Il mio Account </h2>
    @isset($accounts)
    @foreach($accounts as $account)
    <div>
         
    <table id="tabella">
      <tr>
    <td>Nome:</td>
    <td>{{ $account->name }}</td>
  </tr>
  <tr>
    <td>Cognome:</td>
    <td>{{ $account->surname }}</td>
  </tr>
        <tr>
    <td>Email:</td>
    <td>{{ $account->email }}</td>
  </tr>
  <tr>
    <td>Username:</td>
    <td>{{ $account->username }}</td>
  </tr>
</table>
    </div>
        <div class="button">
        <a class="visualizza" href=" {{ route('orders') }} "> Visualizza acquisti  </a>
        <a class="modifica" href=" {{ route('modifyInfo') }} "> Modifica informazioni </a>
    </div>
    

    @endforeach
    @endisset
</div>
@endsection