@extends('layouts.default')

@section('title', 'Resoconto Spesa')

@section('content')
<div class="faq_basso">
    <h1 class="subtitles"> Grazie per aver acquistato, ecco un riepilogo della tua spesa</h1>
    @foreach($order as $order)
    <div class="summary">
        <h2> Hai acquistato un numero di biglietti pari a <i>{{$tickets}}</i> per <i>{{$order->title}}</i> con metodo di pagamento <i>{{ $order->payment }}</i> per un totale di <i>{{$price*$tickets}}</i> € </h2>
        <div class="summary_links">
            <a class="conferma" href=" {{ route ('homepage') }} "> Home </a>
            <a class="conferma" href=" {{ route ('filteredCatalog') }} "> Catalogo Eventi </a>
        </div>
    </div>
    @endforeach
</div>
@endsection