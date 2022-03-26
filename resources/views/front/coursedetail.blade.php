@extends ('layouts.front')

@section('page-title')
    <title> פרט הקורס </title>
@endsection


@section('page-styles')
    <link href="{{asset('plugins/sweetalerts/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/sweetalerts/sweetalert.css')}}" rel="stylesheet" type="text/css" />
    
    <style>
       .stars input {
            position: absolute;
            left: -999999px;
        }
        
        .stars a {
            display: inline-block;
            padding-right:4px;
            text-decoration: none;
            margin:0;
        }
        
        .stars a:after {
            position: relative;
            font-size: 18px;
            font-family: 'FontAwesome', serif;
            display: block;
            content: "\f005";
            color: #9e9e9e;
        }      
        
        
        
        .stars a:hover ~ a:after{
          color: #9e9e9e;
        }
        span.active a.active ~ a:after{
          color: #9e9e9e;
        }
        
        span:hover a:after{
          color:#dec564;
        }
        
        span.active a:after,
        .stars a.active:after{
          color: #dec564;
        }
        
        form#add-temp label {
            color: #a79344;
        }
        



        form#add-temp .error-message.text-danger{
            font-size: 14px;
        }

        #add-temp .form-row{
            direction: rtl;
        }
       
        #add-temp .form-group{
            text-align: right;
            direction: rtl;
        }


                               
    </style>

@endsection


@section('content')
<div class="banner-area classes">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <h2> קורסים </h2>
                    <ul>
                        <li>
                            <a href="{{ route('front') }}"> בית </a>
                            <i class="fa fa-angle-double-left"></i>
                            <a href="{{ route('courses') }}"> קורסים </a>
                            <i class="fa fa-angle-double-left"></i>
                            <p class="active"> פרט הקורס </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="single-class-area">
    <div class="container">
        <div class="row course-detail-content">
            <div class="col-lg-4 col-md-5">
                <div class="class-content-right">
                    <form>
                        <div class="input-group">
                            <input type="text" class="form-control about-search pr-4" placeholder=" לחפש... " />
                        </div>
                        <button type="submit"> <i class="flaticon-search"></i></button>
                    </form>
                    <div class="features-box course-meta">
                        <h3 class="title"> קורסים </h3>
                        <ul>
                            <li><i class="fa fa-files-o"></i> שיעורים <span>{{ $course->lessons->count() }}</span></li>
                        </ul>
                    </div> 

                    {{-- if "Assessments" is "No", --}}
                    
                    <div class="buy-box course-meta">
                        <div class="course-cost"> ₪ {{ $course->course_price }}</div>

                            @auth
                                @if(!auth()->user()->userCourses->contains($course))
                                    <a id="opensplitmodal" href="javascript:void(0)" data-target="#payment-split-modal" data-toggle="modal" class="course-buy-btn"> Buy more</a>
                                    
                                    {{--<a id="storeUser2" 
                                        href="javascript:void(0);" 
                                        data-url="{{ route('storeUser2', [auth()->user(), $course]) }}" class="course-buy-btn"> לִקְנוֹת </a>
                                    --}}
                                @endif
                            @endauth
                            
                            @guest
                                <a id="openRegisterModal" 
                                    href="javascript:void(0)" 
                                    data-target="#registerModal" 
                                    data-toggle="modal" 
                                    class="course-buy-btn mt-3">Buy</a>
                            @endguest

                        
                        
                        
                        
                        



                        @if(session('ordersuccess'))
                            <div class="form-group mt-2">
                                <div class="alert alert-success">{{ session('ordersuccess') }}</div>
                            </div>
                        @endif
                    </div>
                    
                    <p class="visit"> קורסים אחרים </p>

                    <ul class="class-list">                        
                        @foreach ($courses as $sideCourse)
                            @if ( !($sideCourse->course_name == $course->course_name) )
                                <li>
                                    <a href="{{ route('coursedetail', $sideCourse) }}">
                                       {{ $sideCourse->course_name }} <i class="flaticon-next"></i>
                                    </a>
                                </li>   
                            @endif
                        @endforeach   
                    </ul>
                    
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="single-class">
                    <div class="class-img">
                        @if($course->type=='image')
                            <div class="single-course-img">
                                <img src="{{asset($course->media)}}" alt="individual course image" />
                            </div>
                        @elseif($course->type=='video')
                            <div class="bg-white media-image">
                                <video controls>
                                    <source src="{{ asset($course->media) }}" type="">
                                    <source src="movie.ogg" type="video/ogg">                                    
                                </video>
                            </div>
                        @else 
                            <div class="iframe-container">
                                <iframe class="responsive-iframe" src="{{ $course->media }}" allow="encrypted-media"></iframe>
                            </div>
                        @endif
                    </div>
                    <div class="class-contnet">
                        <h2>{{ $course->course_name }}</h2>
                        <p>{{ $course->overview }}</p>

                        {{-- logined user & if he/she have already buy course --}}
                        @auth
                            @if(auth()->user()->userCourses->contains($course))
                            <div class="course-details-tabs">
                                <section class="news">
                                    <div class="container">
                                        <div class="row">
                                            @foreach($course->lessons as $lesson)
                                                <div class="col-lg-4 col-md-6 lesson-box">
                                                    <div class="single-news 
                                                        @if($progressing_lesson_number == 0)
                                                            lock
                                                        @else
                                                            @if($lesson->lesson_number > $progressing_lesson_number) lock  @endif
                                                        @endif
                                                        
                                                    ">
                                                        <div class="news-img">
                                                            <a @can('view', $lesson) href="{{ route('lessondetail', $lesson) }}" @endcan>
                                                        
                                                                <img src="{{asset($lesson->lesson_image)}}" alt="events" />
                                                            </a>
                                                        </div>
                                                        <div class="content">
                                                            <a @can('view', $lesson) href="{{ route('lessondetail', $lesson) }}" @endcan>
                                                        
                                                                <p class="lesson-number">{{ $lesson->lesson_number }}</p>
                                                                <h2>{{  $lesson->lesson_name  }}</h2>
                                                            </a>                                                           
                                                        </div>
            
                                                        {{-- defalt display none !!!  If "single news" containt to "lock" class, this is display flex  --}}
                                                        <div class="lesson-lock">
                                                            <div class="lock-wrapper animate-float">
                                                                <i class="fa fa-expeditedssl"></i>                                            
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </section>
                            </div> 

                            @else

                            <div class="course-details-tabs">
                                <ul class="nav nav-pills" role="tablist"> 
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#lesson"> שיעורים </a>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#description"> תיאור </a>
                                    </li>
                                    
                                    <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#review"> סקירה </a>
                                    </li>                               
                                </ul>
                                
                                <!-- Tab panes -->
                                <div class="tab-content">

                                    <div id="lesson" class="tab-pane active"><br>
                                        <h2> שיעורים </h2>
                                        <section class="news">
                                            <div class="container">
                                                <div class="row">
                                                    
                                                    @foreach($course->lessons as $lesson)
                                                        <div class="col-lg-4 col-md-6 lesson-box">
                                                            <div class="single-news 
                                                                @if($progressing_lesson_number == 0)
                                                                    lock
                                                                @else
                                                                    @if($lesson->lesson_number > $progressing_lesson_number) lock  @endif
                                                                @endif
                                                                
                                                            ">
                                                                <div class="news-img">
                                                                    <a @can('view', $lesson) href="{{ route('lessondetail', $lesson) }}" @endcan>
                                                                
                                                                        <img src="{{asset($lesson->lesson_image)}}" alt="events" />
                                                                    </a>
                                                                </div>
                                                                <div class="content">
                                                                    <a @can('view', $lesson) href="{{ route('lessondetail', $lesson) }}" @endcan>
                                                                
                                                                        <p class="lesson-number">{{ $lesson->lesson_number }}</p>
                                                                        <h2>{{  $lesson->lesson_name  }}</h2>
                                                                    </a>                                                           
                                                                </div>
        
                                                                {{-- defalt display none !!!  If "single news" containt to "lock" class, this is display flex  --}}
                                                                <div class="lesson-lock">
                                                                    <div class="lock-wrapper animate-float">
                                                                        <i class="fa fa-expeditedssl"></i>                                            
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </section>
                                    </div>

                                    <div id="description" class="tab-pane fade "><br>
                                        <h2> פרטי הקורס </h2>
                                        <p>{!! $course->body !!}</p>
                                    </div>

                                    
                                    <div id="review" class="tab-pane fade"><br>
                                        <div class="single-review">
                                            <div class="review-img">
                                                <img src="{{asset('front-assets/images/defalt-profile.png')}}" alt="client">
                                            </div>
                                            <div class="client-content">
                                                <h4>Luyes Jagu</h4>
                                                <ul>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star-half-empty"></i></li>
                                                </ul>
                                                <p> ממש נחמד, מבין, מראה ידע כנה בנושא. סוג של תלמיד כיתה קשוח. </p>
                                            </div>
                                        </div>
                                        <div class="add-review">
                                            <form action="{{ route('course.reviews.store', $course) }}" method="post">
                                                @csrf
                                                
                                                <div class="form-group">
                                                    <label for=""> השאירו ביקורת </label>
                                                    <textarea name="" id="" class="form-control" cols="30" rows="6"></textarea>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <p class="stars">
                                                    <span>
                                                        <a class="star-1" data-star="1" href="javascript:void(0);"></a>
                                                        <a class="star-2" data-star="2" href="javascript:void(0);"></a>
                                                        <a class="star-3" data-star="3" href="javascript:void(0);"></a>
                                                        <a class="star-4" data-star="4" href="javascript:void(0);"></a>
                                                        <a class="star-5" data-star="5" href="javascript:void(0);"></a>
                                                    </span>
                                                    </p>
                                                </div>
                                                <div class="course-detail-review-btn">
                                                    <button id="review-store" type="submit" class="btn btn-primary"> שלח </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endauth

                        {{-- if not logined user & guest --}}
                        @guest
                        <div class="course-details-tabs">
                            <ul class="nav nav-pills" role="tablist"> 
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="pill" href="#lesson"> שיעורים </a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#description"> תיאור </a>
                                </li>
                                
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#review"> סקירה </a>
                                </li>                               
                            </ul>
                            
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div id="lesson" class="tab-pane active"><br>
                                    <h2> שיעורים </h2>
                                    <section class="news">
                                        <div class="container">
                                            <div class="row">
                                                
                                                @foreach($course->lessons as $lesson)
                                                    <div class="col-lg-4 col-md-6 lesson-box">
                                                        <div class="single-news 
                                                            @if($progressing_lesson_number == 0)
                                                                lock
                                                            @else
                                                                @if($lesson->lesson_number > $progressing_lesson_number) lock  @endif
                                                            @endif
                                                            
                                                        ">
                                                            <div class="news-img">
                                                                <a @can('view', $lesson) href="{{ route('lessondetail', $lesson) }}" @endcan>
                                                            
                                                                    <img src="{{asset($lesson->lesson_image)}}" alt="events" />
                                                                </a>
                                                            </div>
                                                            <div class="content">
                                                                <a @can('view', $lesson) href="{{ route('lessondetail', $lesson) }}" @endcan>
                                                            
                                                                    <p class="lesson-number">{{ $lesson->lesson_number }}</p>
                                                                    <h2>{{  $lesson->lesson_name  }}</h2>
                                                                </a>                                                           
                                                            </div>
    
                                                            {{-- defalt display none !!!  If "single news" containt to "lock" class, this is display flex  --}}
                                                            <div class="lesson-lock">
                                                                <div class="lock-wrapper animate-float">
                                                                    <i class="fa fa-expeditedssl"></i>                                            
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </section>
                                </div>

                                <div id="description" class="tab-pane fade"><br>
                                    <h2> פרטי הקורס </h2>
                                    <p>{!! $course->body !!}</p>                                
                                </div>

                                
                                <div id="review" class="tab-pane fade"><br>
                                    <div class="single-review">
                                        <div class="review-img">
                                            <img src="{{asset('front-assets/images/defalt-profile.png')}}" alt="client">
                                        </div>
                                        <div class="client-content">
                                            <h4> Luyes Jagu </h4>
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star-half-empty"></i></li>
                                            </ul>
                                            <p> ממש נחמד, מבין, מראה ידע כנה בנושא. סוג של תלמיד כיתה קשוח. </p>
                                        </div>
                                    </div>
                                    <div class="add-review">
                                        <form action="{{ route('course.reviews.store', $course) }}" method="post">
                                            @csrf
                                            
                                            <div class="form-group">
                                                <label for=""> השאירו ביקורת </label>
                                                <textarea name="" id="" class="form-control" cols="30" rows="6"></textarea>
                                            </div>
                                            
                                            <div class="form-group">
                                                <p class="stars">
                                                <span>
                                                    <a class="star-1" data-star="1" href="javascript:void(0);"></a>
                                                    <a class="star-2" data-star="2" href="javascript:void(0);"></a>
                                                    <a class="star-3" data-star="3" href="javascript:void(0);"></a>
                                                    <a class="star-4" data-star="4" href="javascript:void(0);"></a>
                                                    <a class="star-5" data-star="5" href="javascript:void(0);"></a>
                                                </span>
                                                </p>
                                            </div>
                                            <div class="course-detail-review-btn">
                                                <button id="review-store" type="submit" class="btn btn-primary">שלח</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endguest
                        
                    </div>
                </div>
            </div>            
        </div>
    </div>
</section>

<section>
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalTitle"aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header test-center" style="background: #a79344; color: white; direction:rtl; ">
                    <h5 class="" style="text-align: right;"> הזן את המידע האישי שלך </h5>
                    <button type="button" class="close mr-auto ml-1 pr-0 pl-0" data-dismiss="modal" aria-label="Close" >
                      <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="compose-box">
                        <div class="compose-content" id="registerModalTitle">
                            
                            <form id="add-temp" action="{{ route('storeUser') }}" method="post">                                
                                @csrf
                                <input type="hidden" id="selected-courses" name="course_id" value="{{$course->id}}">
                                

                                <div class="form-row mb-2">
                                    <div class="form-group col-md-6">
                                        <label for="firstname"> שם פרטי <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="firstname" name="firstname" >
                                        <div class="error-message text-danger" ></div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="lastname"> שם משפחה <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="lastname" name="lastname">
                                        <div class="error-message text-danger" ></div>
                                    </div>
                                </div>
                                
                                <div class="form-row mb-2">
                                    <div class="form-group col-md-6">
                                        <label for="email"> אימייל <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="email" name="email">
                                        <div class="error-message text-danger" ></div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="phone"> טלפון <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="phone" name="phone">
                                        <div class="error-message text-danger" ></div>
                                    </div>
                                </div>
                                
                                <div class="form-row mb-2">
                                    <div class="form-group col-md-6">
                                        <label for="identity"> תעודת זהות <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="identity" name="identity" maxlength="10" minlength="9">
                                        <div class="error-message text-danger" ></div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="company"> חברה (אופציונאלי) </label>
                                        <input type="text" class="form-control" id="company" name="company">
                                        <div class="error-message text-danger" ></div>
                                    </div>
                                </div>
                                
                                <div class="form-group mb-2">
                                    <label for="address"> כתובת מלאה <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="address" name="address">
                                    <div class="error-message text-danger" ></div>
                                </div>
                                
                                <div class="form-row mb-2">
                                    <div class="form-group col-md-6">
                                        <label for="password" class=""> 
                                            <span class="bs-tooltip" title="Password must contain at least one number, one specific character and both uppercase and lowercase letters, at least 6 lengths more">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                                            </span>
                                            סיסמה
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="password" name="password" id="password" 
                                            class="form-control" value="">
                                        <div class="error-message text-danger" ></div>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label for="password_confirmation" class=""> סיסמא בשנית <span class="text-danger">*</span></label>
                                        <input type="password" name="password_confirmation" id="password_confirmation"  
                                            class="form-control" value="">
                                        <div class="error-message text-danger" ></div>
                                    </div>
                                    
                                </div>

                            </form>
                        </div>
                    </div>
                    
                    <div class="sms-container">
                        <div class="alert alert-success">  לסיום התהליך, בדוק את ההודעה שנשלחה אל מכשיר הטלפון שלך </div>
                        <div class="form-group">
                            <form id="resend_sms_form" action="{{ route('front.resend_sms') }}">
                                @csrf
                                <input type="hidden" name="temp_id" id="temp_id">
                                <button id="resend_sms" type="submit" class="btn btn-success"> לא קיבלת? שלח שוב </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="course-buy-btn" style="border-color:#a79344!important;" data-dismiss="modal"><i class="flaticon-cancel-12"></i> ביטול </button>
                    <button type="submit" class="course-buy-btn register-btn" style="background:#a79344!important; color: white !important;">   קניה  </button>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="modal fade" id="payment-split-modal" tabindex="-1" role="dialog" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content"> 

                <div class="modal-header test-center" style="background: #a79344; color: white; direction:rtl; ">
                    <h5 class="" style="text-align: right;"> אשר את בחירתך  </h5>
                    <button type="button" class="close mr-auto ml-1 pr-0 pl-0" data-dismiss="modal" aria-label="Close" >
                      <span aria-hidden="true" class="text-white">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="split-content">
                        <div class="sp-top">
                            <div class="sp-amount">
                                {{-- course info section --}}
                                <div class="sp-course-info mb-2">
                                    <table style="width:100%;">
                                        <tr class="text-left"> 
                                            <td>
                                                <img src="{{$course->cover_image}}" alt="" style="
                                                width: 120px;
                                                border-radius: 4px;
                                                padding: 2px;
                                                border: 1px solid #a79344;"> 
                                            </td>                                                                           
                                            <td>
                                                <table style="width:100%; color: #000;">
                                                    <tr class="text-right">
                                                        <td> {{ $course->course_name }} </td>
                                                        <td data-en="course name"> שם קורס </td>                                      
                                                    </tr>                                     
                                                    <tr class="text-right">
                                                        <td> ₪ <span id="course_price" data-course_length="{{$course->lessons->count()}}"> {{ $course->course_price }} </span> </td>
                                                        <td data-en="course price"> מחיר קורס </td>                                      
                                                    </tr> 
                                                </table>
                                            </td>                                            
                                        </tr>                                        
                                    </table> 
                                </div>

                                {{-- select section --}}

                                <div class="px-5">
                                    <div style="border-top: 1px solid #f3f1f1; padding:15px 0 10px;" class="d-none">

                               

                                        <div id="splitswitch" class="split-switch">  
                                            <div class="asksplit">
                                                <div class="btn-link" data-toggle="split" style="text-decoration:underline!important">
                                                    לחץ כאן
                                                </div> 
                                                <div style="direction:rtl;">
                                                    האם אתה רוצה תשלום מפוצל?
                                                </div>                                                 
                                            </div>                                            
                                        </div>
                                    </div> 
                                    
                                    @auth
                                        {{-- <div>
                                            <div id="cupon-switch">  
                                                <div class="asksplit">
                                                    <div class="btn-link" data-toggle="coupon" style="text-decoration:underline!important">
                                                        לחץ כאן 
                                                    </div>  
                                                    <div style="direction:rtl;">
                                                        יש לך   coupon code?
                                                    </div>
                                                </div>                                                                           
                                            </div>
                                        </div> --}}
                                    @endauth
                                </div>                                
                            </div>                            
                        </div> 
                    </div>
                </div>

                {{-- check out detail section --}}

                <div class="modal-footer" style="flex-direction: column">

                    <div id="spilt-course-info">
                        <div class="form-group mb-3">
                            <div class="avaliable-lessons">
                                <ul style="display:flex; flex-direction: column;">
                                    @foreach($course->lessons as $lesson)
                                    <li class="lesson-item" order-number="{{ $loop->iteration }}">
                                        <div class="form-group">
                                            <span style="background: rgb(167, 147, 68);
                                            width: 20px;
                                            height: 20px;
                                            display: inline-flex;
                                            align-items: center;
                                            justify-content: center;
                                            border-radius: 100px;
                                            color: rgb(255, 255, 255);
                                            padding-bottom: 1px;
                                            margin-left: 10px;">{{$lesson->lesson_number}}</span>
                                            <input
                                                type="checkbox"
                                                id="fl{{ $loop->iteration }}"
                                                class="selectLessons"
                                                data-lesson_id="{{ $lesson->id }}"
                                                data-lesson_number="{{ $lesson->lesson_number }}"
                                            />
                                            <label class="form-check-label mr-2" for="fl{{ $loop->iteration }}" style="cursor: pointer;">
                                                 {{ Str::limit($lesson->lesson_name, 30) }}
                                            </label>
                                        </div>
                                    </li>
                                    @endforeach                                                    
                                </ul>
                            </div>
                        </div>
                        <table style="width:100%" class="mb-2">                                    
                            <tr class="text-right">
                                <td> 
                                    <div class="d-flex justify-content-between flex-row-reverse">
                                        <div>
                                            <span id="fromLesson" style="color: #000;
                                            background: #57575785;
                                            border: 2px inset #848484;
                                            width: 46px;
                                            height: 28px;
                                            display: inline-flex;
                                            justify-content: center;
                                            align-items: center;">0</span>
                                             : 
                                            <span> From</span>
                                        </div>
                                        <div>
                                            <span id="toLesson" style="color: #000;
                                            background: #57575785;
                                            border: 2px inset #848484;
                                            width: 46px;
                                            height: 28px;
                                            display: inline-flex;
                                            justify-content: center;
                                            align-items: center;">0</span>
                                             : 
                                            <span> To</span>
                                        </div>
                                    </div>
                                </td>
                                <td data-en="selected lessons range"> טווח השיעורים שנבחרו </td>                                      
                            </tr>

                            <tr class="text-right">
                                <td class="pt-2"> 
                                    ₪ <span id="amountToPay_1" style="font-size: 20px; color: #a79344;"> 0 </span>
                                </td>

                                <td class="pt-2" data-en="amount to pay"> סכום לתשלום </td>                                      
                            </tr>
                        </table> 
                        @auth
                            @if(!auth()->user()->userCourses->contains($course))
                                <a class="storeUser2 course-buy-btn mt-3" 
                                    href="javascript:void(0);"
                                    data-type="spilt"
                                    data-url="{{ route('storeUser2', [auth()->user(), $course]) }}"> Check Out
                                </a>
                            @endif
                        @endauth
                        @guest
                            <a id="openRegisterModal" 
                                href="javascript:void(0)" 
                                data-target="#registerModal" 
                                data-toggle="modal" 
                                class="course-buy-btn mt-3">Check Out</a>
                        @endguest
                    </div>
                    
                    @auth
                        
                        <div id="cupon-info">

                            <div id="cupon-switch" class="mb-2">  
                                <div class="asksplit">                            
                                    <div style="direction:rtl;">
                                        יש לך   coupon code?
                                    </div>
                                </div>                                                                           
                            </div>

                            <div class="input-group mb-4">
                                
                                <div class="input-group-prepend">
                                  <button id="check_coupon" 

                                

                                    class="btn m-0 course-buy-btn" 

                                    data-url="{{route('check_coupon', auth()->user())}}"
                                    type="button"
                                    style="padding: 6px 18px"> Apply </button>
                                </div>
                                <input id="coupon_code" style="direction:RTL;" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
                            </div>
                            
                            <table id="coupon_table" class="d-none mb-3 text-right" style="width: 100%;direction:rtl;">
                                <tr style="font-size: 14px;">
                                    <td style="width: 50%">Course Price</td>
                                    <td><span style="text-decoration:line-through">₪{{$course->course_price}}</span></td>
                                </tr>
                                <tr style="font-size: 14px;">
                                    <td style="width: 50%"> הנחה<span id="discount"> (10%) </span>  </td>
                                    <td  style="display: flex;
                                    flex-direction: row-reverse;
                                    justify-content: flex-end;"> - &nbsp; <span id="discounted"> 56</span></td>
                                </tr>


                                <tr style="font-size: 16px;">
                                    <td style="width: 50%"> Amount to Pay </td>
                                    <td style="width: 50%;"> <span id="amountToPay_2" style="font-size: 20px; color: #a79344;">₪459</span></td>
                                </tr>
                            </table>
                            
                            <a class="storeUser2 course-buy-btn mt-3" 
                                href="javascript:void(0);" 
                                data-type="coupon_code"
                                data-url="{{ route('storeUser2', [auth()->user(), $course]) }}"> Check Out
                            </a>
                        </div>
                    @endauth

                
                    
                </div>
            </div>
        </div>
    </div>
</section>

<input id="remove_token" type="hidden" value="{{ route("front.remove_token") }}">
@endsection





@section('scripts')
    <script src="{{asset('plugins/sweetalerts/sweetalert2.min.js')}}"></script>
    
<script>
    
    let tokenTimer = null;


    $('.stars a').on('click', function(){
      $('.stars span, .stars a').removeClass('active');
    
      $(this).addClass('active');
      $('.stars span').addClass('active');
    });
    
    $('#review-store').click(function(e){
        e.preventDefault();
        swal({
            type: 'error',
            title: 'Oops...',
            text: 'You are not allowed to leave review for this course!',
            padding: '2em'
        })
    })




      
</script>
<script src="{{asset('assets/js/custom/front/coursedetail.js')}}"></script>
<script src="{{asset('assets/js/custom/front/coursedetail-spilt.js')}}"></script>
@endsection