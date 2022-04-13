
@extends('layouts.default')

@section('title', 'Gestione FAQ')

@section('scripts')
<script src='{{ asset('js/confirm.js') }}'></script>
<script src='{{ asset('js/change_color.js') }}'></script>
@endsection

@section('content')

<div class="faq_basso">
    <h1 class="subtitles"> Gestione FAQ </h1>
    <section>
        <div class="ins_cont">
        <a class="inserisci" href=" {{ route ('insertFAQ')}}"> Inserisci una nuova FAQ</a> 
        </div>
            @isset($faqs)
            @foreach($faqs as $faq)
            <article class="faq">
                <div class="faq_man">
                    <h4> {{ $faq->question }} </h4>
                    <a class="modifica_faq" href=" {{ route ('modifyFAQ', [$faq->id] ) }} ">Modifica</a>
                    {{ Form::open(array('class'=>'delete','route' => 'deleteFAQ')) }}
                    @csrf
                    {{Form::hidden('faqId',$faq->id)}}
                    <i class="fa fa-times"></i>
                    {{ Form::submit('',['class'=>'delete_fa']) }}
                    {{Form::close()}}
                    
                </div>
                <p class="testo_man"> {{ $faq->answer }}</p>
            </article>
            @endforeach
                        @include('helpers.paginator', ['paginator' => $faqs])
            @endisset()
        </section>
</div>
    @endsection