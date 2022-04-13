@extends('layouts.default')

@section('scripts')
        <script src="{{ asset('js/slideshow.js') }}" ></script>
@endsection 

@section('title', 'Homepage')

@section('content')
<div class="faq_basso">
    <h1 class="subtitles">Benvenuto su muEvents</h1>
    <div class="home-esterno">
    <div id="container-esterno">
        <div id="spotify">
            @isset($events)
        <h1 class="subtitles"> Eventi nei prossimi giorni </h1>
        <hr>
        @endisset
                <div>
            <h3 class="subtitles">Ascolta le nostre playlist su</h3>
            <a href="https://www.spotify.com/it/ " target="_blank"><img id="spotify" src="{{ asset('images/icons/spotify.png') }}"></a>
        </div>
        </div>
        <div class="slideshow-container">
            
            @if($events->isEmpty())
            <h1 class="no-events"> Nessun evento nei prossimi giorni, consulta il <a class="footer-link" href="{{route('filteredCatalog')}}"> catalogo</a> </h1>
        @endif

            @foreach($events as $event)
            <div class="mySlides">
                <a href="{{ route('event',[$event->eventId]) }}"><img src="{{ asset('images/events/'.$event->image) }}"></a>
            </div>
            @endforeach
                        @if(!$events->isEmpty())

            <a id="prev" >&#10094;</a>
            <a id="next" >&#10095;</a>
                    @endif
        </div>
        
    </div>
          <div class="home-info">
            <h1 class="subtitles"> Chi siamo </h1>
            <h3 class="subtitles"> Siamo un gruppo di 4 persone amanti della musica, abbiamo gusti diversi e questo ci ha permesso di 
                poter rappresentare più stili musicali.<br>
            Accomunati dalla stessa passione, abbiamo deciso di aprire uno e-commerce di biglietti di eventi musicali.</h3>
        </div>
        <div class="home-info">
            <h1 class="subtitles">Modalità di fornitura dei servizi </h1>
            <h3 class="subtitles">I biglietti vengono venduti con i seguenti metodi di pagamento:<br>
                <ul>
                    <li>Paypal (scelta consigliata in caso di rinunce)
                    <li>Carta di credito
                    <li>Bonifico bancario
                </ul>
        </div>
        <div class="home-info">
           <h1 class="subtitles"> Link al download della relazione </h1>
            <a class="conferma" href="{{asset('doc/relazione.pdf') }}" target="_blank">Download</a>
        </div>
</div>
    </div>
@endsection

