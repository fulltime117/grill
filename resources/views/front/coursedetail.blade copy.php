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


<div class="banner-area class-details">
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
                        <h3 class="title"> תכונות הקורס </h3>
                        <ul>
                            <li><i class="fa fa-files-o"></i> שיעור <span>{{ $course->lessons->count() }}</span></li>
                            <li><i class="fa fa-users"></i> סטודנטים <span>{{$course->courseUsers->count()}}</span></li>
                            <li><i class="fa fa-wpforms"></i> תְעוּדָה <span> כן </span></li>
                            <li><i class="fa fa-check-square-o"></i> הערכות <span> כן </span></li>
                        </ul>
                    </div> 

                    {{-- if "Assessments" is "No", --}}
                    
                    <div class="buy-box course-meta">
                        <div class="course-cost"> ₪ {{ $course->course_price }}</div>
                        @auth
                            @if(!auth()->user()->userCourses->contains($course))
                                <a id="storeUser2" 
                                    href="javascript:void(0);" 
                                    
                                    data-url="{{ route('storeUser2', [auth()->user(), $course]) }}" class="course-buy-btn"> לִקְנוֹת 
                                </a>

                                <a id="opensplitmodal" href="javascript:void(0)" data-target="#payment-split-modal" data-toggle="modal" class="course-buy-btn"> split </a>

                            @endif
                        @endauth
                        @guest
                            <a id="openRegisterModal" href="javascript:void(0)" data-target="#registerModal" data-toggle="modal" class="course-buy-btn"> לִקְנוֹת </a>
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
                                        <i class="flaticon-next"></i>{{ $sideCourse->course_name }}
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
                                        <label for="identity"> זהות <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="identity" name="identity" maxlength="10" minlength="9">
                                        <div class="error-message text-danger" ></div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="company"> חֶברָה <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="company" name="company">
                                        <div class="error-message text-danger" ></div>
                                    </div>
                                </div>
                                
                                <div class="form-group mb-2">
                                    <label for="address"> כתובת <span class="text-danger">*</span></label>
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
                        <div class="alert alert-success"> לסיום התהליך, אנא בדוק את ה- SMS שלך באמצעות מספר טלפון </div>
                        <div class="form-group">
                            <form id="resend_sms_form" action="{{ route('front.resend_sms') }}">
                                @csrf
                                <input type="hidden" name="temp_id" id="temp_id">
                                <button id="resend_sms" type="submit" class="btn btn-success"> לשלוח שוב SMS? </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="course-buy-btn" style="border-color:#a79344!important;" data-dismiss="modal"><i class="flaticon-cancel-12"></i> לְבַטֵל </button>
                    <button type="submit" class="course-buy-btn register-btn" style="background:#a79344!important; color: white !important;">לִקְנוֹת</button>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="modal fade" id="payment-split-modal" tabindex="-1" role="dialog" aria-hidden="true">
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
                                <div class="sp-course-info mb-2">
                                    <table style="width:100%;">
                                        <tr class="text-right"> 
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
                                                        <td> שם קורס </td>                                      
                                                    </tr>                                     
                                                    <tr class="text-right">
                                                        <td> ₪ <span> {{ $course->course_price }} </span> </td>
                                                        <td> עלות הקורס </td>                                      
                                                    </tr> 
                                                </table>
                                            </td>                                            
                                        </tr>                                        
                                    </table> 
                                </div>

                                <div class="select-choose-section">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#home">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#menu1">Menu 1</a>
                                        </li>
                                        
                                    </ul>
                                      
                                      <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane container active" id="home">...</div>
                                        <div class="tab-pane container fade" id="menu1">...</div>
                                    </div>
                                </div>
                                  
                                <div class="accordion" id="splitaccodion" style="border-top: 1px solid #f3f1f1; padding:15px 0 10px;">
                                    <div id="splitswitch" class="split-switch">  
                                        <div class="asksplit">
                                            האם אתה רוצה תשלום מפוצל?
                                            <div class="btn-link collapsed switch-toggle" data-toggle="collapse" data-target="#spilt-course-info" aria-expanded="false" aria-controls="collapseThree">
                                                התפצל כאן
                                            </div>  
                                        </div> 
                                        <div class="switch-close btn-link collapsed switch-toggle" data-toggle="collapse" data-target="#spilt-course-info" aria-expanded="false" aria-controls="collapseThree">
                                            <i class="fa fa-close"></i>    
                                        </div>                                     
                                    </div>
                                    <div id="spilt-course-info" class="collapse" aria-labelledby="splitswitch" data-parent="#splitaccodion">
                                        <div class="form-group mb-3">
                                            <div class="avaliable-lessons">
                                                <h6 > שיעורים </h6>
                                                <ul style="display:flex; flex-direction: column;">
                                                    @foreach($course->lessons as $lesson)
                                                        <li class="lesson-item" order-number="{{ $loop->iteration }}"> {{ $lesson->lesson_name }}</li>
                                                    @endforeach                                                    
                                                </ul>
                                                <p class="m-0 exclamation-mark" >  ניתן לחלק את התשלום לפי בחירה  <i class="fa fa-exclamation-circle"></i> </p>
                                            </div>
                                        </div>
                                        <table style="width:100%" class="mb-2">                                    
                                            <tr class="text-right" style="font-size: 14px;">
                                              <td style="width: 50%; padding-right: 5px;">₪ <span id="total-amount"> {{ $course->course_price }} </span> </td>
                                              <td> <span id="totla-amount"></span> סך הכל </td>                                      
                                            </tr>
                                            <tr class="text-right" style="font-size: 14px;">
                                                <td style="width: 50%; padding-right: 5px;"> <span id="selected-lesson"> 5 </span> </td>
                                                <td> <span id=""></span> שיעור נבחר </td>                                      
                                            </tr>

                                            <tr class="text-right mt-2" style="font-size: 16px;">
                                                <td style="
                                                  width: 50%;
                                                  background: rgb(245, 245, 245);
                                                  border: 1px solid rgb(199 193 193);
                                                  box-sizing: border-box;
                                                  cursor: not-allowed;
                                                  color: #b3b3b3;
                                                  padding: 5px 10px;" > 
  
                                                       ₪ <span id="cal-amount" > {{ $course->course_price }} </span>
                                                  </td>
  
                                                <td class="pt-2"> סכום מפוצל </td>                                      
                                              </tr>
                                        </table> 
                                                                            
                                    </div>
                                </div> 
                                
                                <div class="accordion" id="cupon-accodion">
                                    <div id="cupon-switch">  
                                        <div class="asksplit">
                                            שיהיה לך קופון פרומו?
                                            <div class="btn-link collapsed switch-toggle" data-toggle="collapse" data-target="#cupon-info" aria-expanded="false" aria-controls="collapseThree">
                                                מימש את הקופון שלך
                                            </div>  
                                        </div>                                                                           
                                    </div>

                                    <div id="cupon-info" class="collapse" aria-labelledby="cupon-switch" data-parent="#cupon-accodion">
                                        <table style="width: 100%; text-align: right; direction:rtl">
                                            <tr style="font-size: 14px;">
                                                <td>Subtotal</td>
                                                <td style="width: 50%">aa ₪</td>
                                            </tr>
                                            <tr style="font-size: 14px;">
                                                <td> Discount [ <span id="coupon-discount-percent"> 10 % </span> ] </td>
                                                <td style="width: 50%"> -bb ₪ </td>
                                            </tr>
                                            <tr style="font-size: 16px;">
                                                <td class="pt-2"> Total </td>
                                                <td style="width: 50%"> cc ₪ </td>
                                            </tr>
                                        </table>
                                        
                                        <div class="input-group mt-2">
                                            <div class="input-group-prepend">
                                              <button class="btn m-0 course-buy-btn p-0" type="button"> Apply </button>
                                            </div>
                                            <input style="direction:RTL;" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        
                    </div>
                </div>

                <div class="modal-footer">

                    <button class="course-buy-btn register-btn mt-2" style="background:#a79344!important; color: white !important;">לִקְנוֹת</button>

                    
                </div>
            </div>
        </div>
    </div>
</section>


    
    <!-- <div class="modal fade" id="couponModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="direction: rtl">
                <div class="modal-header">
                    <h5 class="modal-title" >Do you have coupon code?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-left:-1rem!important; margin-right:auto!important">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>
                <div class="modal-body" style="text-direction:rtl; text-align: right;">
                    <p>If you have coupon code, please input coupon code. You will discount for this course.</p>
                    <p>Otherwise, please leave it.</p>
                    <div class="form-group">
                        <label for="">Coupon Code</label>
                        <input type="text" class="form-control" name="coupon_code" id="coupon_code" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div> -->
    

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




    // split payment modal 

        // function sptoggle(){
        //     $('.sp-course-info').toggle();
        //     $('.asksplit').toggle();        
        //     $('.switch-close').toggle();
        // }

        // $('.switch-toggle').click(function(){
        //     sptoggle()
        // })

    // =========split calculator============
    let amount = Number( $('#total-amount').text() );
    let selted_lesson = $('.lesson-item').length;

    $('.lesson-item').hover(function(){         
        var total = Number( $('#total-amount').text() );   
        var lessons = $('.lesson-item').length;
        var individual_lesson_cost =  (total / lessons);
        var lesson_num = $(this).attr('order-number');
        var calc_cost = individual_lesson_cost * lesson_num;
        $('#cal-amount').text(calc_cost.toFixed(0)); 
    })
  

    $('.lesson-item').click(function(){
        // itemselected()
        $('.lesson-item').removeClass('selected');    
        $(this).addClass('selected'); 
        var total = Number( $('#total-amount').text() );   
        var lessons = $('.lesson-item').length;
        var individual_lesson_cost =  (total / lessons);
        var lesson_num = $(this).attr('order-number');
        var calc_cost = individual_lesson_cost * lesson_num;
        amount = calc_cost.toFixed(0);

        selted_lesson = $('.selected').attr('order-number')
        $('#selected-lesson').text(selted_lesson);
    })

    $('.lesson-item').mouseout(function(){
        $('#cal-amount').text(amount); 
    })

    // =========cupon calculator============





    
</script>
<script src="{{asset('assets/js/custom/front/coursedetail.js')}}"></script>
@endsection