@extends('layouts.default')
@section('title', 'Gestione Organizzazioni')
@section('content')
<div class="faq_basso">
    <h1 class="subtitles"> Gestisci organizzazioni </h1>
            <section class="faq">
                <div class="faq_man">
                    <h4> Visualizza informazioni organizzazione </h4>
                     <a class="conferma" href=" {{ route ('showOrganizations') }} ">Vai</a>
                </div>
            </section>
            <section class="faq">
                <div class="faq_man">
                    <h4> Inserisci/Modifica/Cancella informazioni organizzazione </h4>
                    <a class="conferma" href=" {{ route ('manageOrganizations') }} ">Vai</a>
            </div>
            </section>
</div>
@endsection