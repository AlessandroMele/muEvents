@extends('layouts.default')

@section('title', 'Storico acquisti')

@section('content')
<div class="faq_basso">
    <h1 class="subtitles"> Biglietti acquistati </h1>
        <div class="event_list">
            @isset($orders)
            @foreach($orders as $order)
        <section class="event_content"> 
            <div class="event_image">
                <img class="image" src="{{ asset('images/events/'.$order->image) }}">
            </div>
        <div class="event_detail">
            <h2 class="event_title">{{ $order->title }} </h2>
            <h2 class="event_region">Regione: {{ $order->region }}</h2>
            <h2 class="event_region">Data: {{ $order->date }}</h2>                   
            <h2 class="event_region">Hai speso: {{ $order->discountedPrice }} € </h2>
            <h2 class="event_date">Metodo di pagamento: {{ $order->payment }} </h2>   
        </div>
        </section>
        @endforeach
        @include('helpers.paginator', ['paginator' => $orders])
        @endisset()
        </div>
    @if($orders->isEmpty())
            <div class="event_content">
                <span id="subtitles"><h3>Non hai acquistato nessun biglietto, cosa aspetti? :)</h3></span>
            </div>
            @endif
</div>
@endsection