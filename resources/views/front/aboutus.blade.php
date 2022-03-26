@extends ('layouts.front')

@section('page-title')
    <title> AboutUs </title>
@endsection


@php
    //   $bannerImg =;   
@endphp

@section('page-styles')
    <style>
        #app .banner-area{
            background-image: url( "{{ asset($aboutus->banner) }}" ) !important;
            background-position: bottom;
            background-attachment: unset;
        }
    </style>
@endsection


@section('content')

{{-- {{  dd($aboutus) }}; --}}
<div class="banner-area about">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <h2> {!! $aboutus->banner_title  !!} </h2>
                    <ul>
                        <li>
                            <a href="{{ route('front') }}"> בית </a>
                            <i class="fa fa-angle-double-left"></i>
                            <p class="active">  אודות  </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="about-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-7">
                <div class="single-about">
                    <div class="about-img">                        
                        <img src="{{asset($aboutus->image)}}" alt="about" />
                    </div>
                    <div class="about-contnet">
                        <h2>{!! $aboutus->title  !!}</h2>
                        <div class="aboutcontent">
                            {!! $aboutus->body !!}
                        </div>
                    </div>
                    {{-- <div class="about-btn">
                        <a href="https://www.youtube.com/watch?v=_ysd-zHamjk" class="video-pop">
                            <span class="video"> <i class="fa fa-play"></i> </span> Quick View with Video
                        </a>
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-4 col-md-5">
                <div class="about-content-right">
                    <div class="consultation-area">
                        <h2> קבל ייעוץ חינם </h2>
                        <form id="contactForm" action="{{ route('contacts') }}" method="post" >
                            <div class="row">
                                <div class="col-md-12 form-group mb-0">
                                    <input type="text" name="firstname" id="firstname" class="form-control" required  data-error=" אנא הזן את שמך הפרטי " placeholder=" שם פרטי " />
                                    <div class="help-block with-errors pl-1"></div>
                                </div>
                                <div class="col-md-12 form-group mb-0">
                                    <input type="text" name="lastname" id="lastname" class="form-control" required data-error=" אנא הזן את שם המשפחה שלך " placeholder=" שם משפחה " />
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-md-12 form-group mb-0">
                                    <input type="email" name="email" id="email" class="form-control" required data-error=" אנא הכנס את הדוא ל שלך " placeholder=" אימייל " />
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-md-12 form-group mb-0">
                                    <input type="text" name="phone" id="phone" required data-error=" אנא הזן את המספר שלך  "  class="form-control" placeholder=" טלפון " />
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="col-md-12 form-group mb-0">
                                    <textarea name="message" class="form-control" id="message" cols="30" rows="3" required data-error="  כתוב את ההודעה שלך " placeholder=" הודעת טקסט כאן ... "></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <button type="submit" class="box-btn"> שלח </button>
                            <div id="msgSubmit" class="h3 text-center hidden" style="margin-top: 1rem!important;"></div>
                                <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    

@endsection





@section('scripts')

<script>

</script>

@endsection