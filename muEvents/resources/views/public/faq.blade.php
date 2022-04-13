@extends('layouts.default')

@section('scripts')
        <script src="{{ asset('js/faq.js') }}" ></script>
@endsection 

@section('title', 'FAQ')

@section('content')

        <section class="faq_basso">
            <h1 class="subtitles"> Frequently Asked Questions </h1>    
            @isset($faqs)
            @foreach($faqs as $faq)
            <article class="faq">
                <div class="faq_int">
                    <h4> {{ $faq->question }} </h4> <i class="fa fa-angle-up"></i> <i class="fa fa-angle-down"></i>
                </div>
                <p class="testo"> {{ $faq->answer }}</p>
            </article>
            @endforeach
                        @include('helpers.paginator', ['paginator' => $faqs])
            @endisset()
        </section>
        
@endsection