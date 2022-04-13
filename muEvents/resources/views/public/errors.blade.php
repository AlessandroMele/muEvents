@extends('layouts.default')

@section('title', 'Resoconto Spesa')

@section('content')
<div class="faq_basso">
        <div class="summary">
        <h2> Ops qualcosa è andato storto </h2>
        <div class="summary_links">
            <a class="conferma" href=" {{ route ('homepage') }} "> Home </a>
            @can('isLevel3-4')
            <a class="conferma" href=" {{ route ($route) }} "> Indietro </a>
            @endcan
        </div>
        </div>
</div>
@endsection
