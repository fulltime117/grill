{{-- <h1>front faq</h1>

<ul>
    @forelse($faqs as $faq)
        <li>
            <h3>question: {{$faq->question}}</h3>
            <p>answer: {{$faq->answer}}</p>
        </li>
    @empty
    @endforelse
</ul> --}}


@extends ('layouts.front')

@section('page-title')
    <title> צור קשר </title>
@endsection

@php
      $bannerImg =  asset('front-assets/images/banners/contactus.png');   
@endphp

@section('page-styles')
    <style>
        #app .banner-area{
            background-image: url( {{$bannerImg}} ) !important;
            background-size: contain;
        }
    </style>
@endsection



@section('content')

<div class="banner-area faq">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <h2>FAQ</h2>
                    <ul>
                        <li>
                            <a href="index-2.html"> Home </a>
                            <i class="fa fa-angle-double-left"></i>
                            <p class="active"> F A Q</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="faq-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 faq-content">
                <div class="faq-accordion">
                    <div class="section-tittle text-center">
                        <h2>Frequently Ask Question</h2>
                    </div>
                    <ul class="accordion">
                        @forelse($faqs as $faq)
                        <li class="accordion-item">
                            <a class="accordion-title" href="javascript:void(0)">
                                <i class="fa fa-plus"></i> {{$faq->question}}
                            </a>
                            <p class="accordion-content">
                                {{$faq->answer}}
                            </p>
                        </li>
                        @empty
                        @endforelse                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

    
    
@endsection





@section('scripts')

<script>

</script>

@endsection