@extends ('layouts.front')

@section('page-title')
    <title> ContactUs </title>
@endsection



@section('page-styles')
    <style>
        #app .banner-area{
            background-image:url( "{{ asset($contactus->banner) }}" ) !important;
            background-size: contain;
        }
    </style>
@endsection



@section('content')

<div class="banner-area contact">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <h2> {{ $contactus->title }} </h2>
                    <ul>
                        <li>
                            <a href="{{ route('front') }}"> בית </a>
                            <i class="fa fa-angle-double-left"></i>
                            <p class="active"> איש קשר </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="shape-ellips-contact">
    <img src="{{asset('front-assets/images/contact-shape.png')}}" alt="shape" />
</div>

<div class="contact-service">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="single-service text-center">
                    <div class="service-icon">
                        <i class="fa fa-envelope-o"></i>
                    </div>
                    <div class="service-content">
                        <p>{{ $contactus->email }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="single-service text-center">
                    <div class="service-icon">
                        <i class="flaticon-pin"></i>
                    </div>
                    <div class="service-content">
                        <p>{{ $contactus->address }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="single-service text-center sst-10">
                    <div class="service-icon">
                        <i class="flaticon-telephone"></i>
                    </div>
                    <div class="service-content">
                        <p>{{ $contactus->phone }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="home-contact-area pb-100">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="home-contact-content">
                    <h2> מה אתה רוצה לדעת ? </h2>
                    <form id="contactForm" action="{{ route('contacts') }}" method="post">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <input type="text" name="firstname" id="firstname" class="form-control" required  data-error=" אנא הזן את שמך הפרטי " placeholder=" שם פרטי " />
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <input type="text" name="lastname" id="lastname" class="form-control" required data-error=" אנא הזן את שם המשפחה שלך " placeholder=" שם משפחה " />
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control" required data-error=" אנא הכנס את הדוא ל שלך " placeholder=" אימייל " />
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6">
                                <div class="form-group">
                                    <input type="text" name="phone" id="phone" required data-error=" אנא הזן את המספר שלך " class="form-control" placeholder=" טלפון " />
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>                            
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <textarea name="message" class="form-control" id="message" cols="30" rows="5" required data-error=" כתוב את ההודעה שלך " placeholder=" הודעת טקסט כאן ... "></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <button type="submit" class="default-btn page-btn box-btn">
                                    שלח
                                </button>
                                <div id="msgSubmit" class="h3 text-center hidden mt-2"></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 pr-0">
                <div class="contact-img">
                    <img src="{{asset($contactus->image)}}" alt="contact" />
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