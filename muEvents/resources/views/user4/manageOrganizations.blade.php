@extends('layouts.default')

@section('title', 'Gestione Organizzazioni')

@section('scripts')
<script src='{{ asset('js/confirm.js') }}'></script>
<script src='{{ asset('js/change_color.js') }}'></script>
@endsection

@section('content')

<div class="faq_basso">
    <h1 class="subtitles"> Gestione Organizzazioni </h1>
    <section>
        <div class="ins_cont">
        <a class="inserisci" href=" {{ route ('insertOrganization')}}"> Inserisci una nuova Organizzazione </a> 
        </div>
            @isset($organizers)
            @foreach($organizers as $organizer)
            <article class="faq">
                <div class="faq_man">
                    <h4> Username: {{ $organizer->username }} </h4>
                    <a class="modifica_faq" href=" {{ route ('modifyOrganization', [$organizer->id] ) }} ">Modifica</a>
                    {{ Form::open(array('class'=>'delete','route' => 'deleteOrganization')) }}
                    @csrf
                    {{Form::hidden('orgId',$organizer->id)}}
                    <i class="fa fa-times"></i>
                    {{ Form::submit('',['class'=>'delete_fa']) }}
                    {{Form::close()}}   
                </div>
            </article>
            @endforeach
            @include('helpers.paginator', ['paginator' => $organizers])
            @endisset()
        </section>
</div>
    @endsection