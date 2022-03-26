<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Grillman Israel website from Carnivores Orginal, the site that will teach you how to be a professional grillman to make good money than you like - meat.">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-T8JV3FBGRD"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        
        gtag('config', 'G-T8JV3FBGRD');
    </script>
    
    <meta name="csrf-token" content="{{ csrf_token() }}">    
    <link rel="stylesheet" type="text/css" href="{{asset('front-assets/css/chatbox.css')}}">
    <link rel="icon" type="image/x-icon" href=" {{asset('front-assets/images/favicon.ico')}}"/>      
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="preload" href="front-assets/css/style.css" as="style">
    <link rel="preload" href="front-assets/fonts/OpenSansHebrew-Regular.ttf" as="font" type="font/ttf" crossorigin> 
    @yield('page-title')        

    {{-- ******************************************* 
                    common style start
    ******************************************* --}}    
        <link rel="stylesheet" type="text/css" href="{{asset('front-assets/css/bootstrap.min.css')}}" />
    
        <link rel="stylesheet" type="text/css" href="{{asset('front-assets/css/meanmenu.css')}}"/>
    
        <link rel="stylesheet" type="text/css" href="{{asset('front-assets/css/flaticon.css')}}" />
    
        <link rel="stylesheet" type="text/css" href="{{asset('front-assets/css/magnific-popup.css')}}" />
    
        <link rel="stylesheet" type="text/css" href="{{asset('front-assets/css/animate.css')}}" />
    
        <link rel="stylesheet" href="{{asset('front-assets/css/owl.carousel.min.css')}}" />
    
        <link rel="stylesheet" href="{{asset('front-assets/css/style.css')}}" />
    
        <link rel="stylesheet" href="{{asset('front-assets/css/responsive.css')}}" />
    {{-- *******************************************
                    common style end
    ******************************************* --}}

    
    {{-- *******************************************
                    extra style here
    ******************************************* --}}
    <style>
        
    </style>
    @yield('page-styles')    
    
</head>




<body>

    <div id="loading">
        <div id="loading-center">            
            <div class="preloading-object">
                <img src="{{asset('front-assets/images/loader.gif')}}" alt="preloading">
            </div>
        </div>
    </div>


    <div class="navbar-area">
        <div class="mobile-nav">
            <div class="mobile-auth-bar">
                @auth                                                                    
                <div class="nav-item dropdown nav-item-user-dashboard">
                    <a class="nav-item dropdown-toggle colord8" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src={{ auth()->user()->profile->getImage() }} alt="" width="30px">
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('admin.dashboard.home')  }}"><i class="fa fa-dashboard" style="color:#a79344"></i> &nbsp; הפרופיל שלי </a></li>
                        <li><a id="logout" class="dropdown-item" href="{{route('logout', auth()->user())}}"><i class="fa fa-sign-out" style="color:#a79344"></i> &nbsp;  התנתק  </a></li>
                    </ul>
                </div>
                @endauth                                                                        
                @guest
                    <a  class="mobile-login-btn"  href="{{ route('login') }}">  התחברות  <i class="fa fa-lock" aria-hidden="true" style="font-size: 13px;"></i></a>
                @endguest
            </div>
            <a href="{{ route('front') }}" class="logo">
                <img src="{{asset('front-assets/images/logo1.png')}}" alt="logo" style="height: 45px;"/>
            </a>
            
        </div>
        <div class="main-nav">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="{{ route('front') }}">
                        <img src="{{asset('front-assets/images/logo1.png')}}" alt="logo" style="height: 60px; padding-bottom:5px" />
                    </a>
                    @php
                        $static_pages_top = \App\Models\Footer::where(['published' => '1', 'is_top'=>'1'])->get();
                    @endphp
                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav text-right">
                            <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                                <a href="{{ route('front') }}" class="nav-link"> דף הבית </a>
                            </li>
                            <li class="nav-item {{ Request::is('aboutus') ? 'active' : '' }}">
                                <a href="{{ route('aboutus') }}" class="nav-link"> אודות </a>
                            </li>
                            <li class="nav-item {{ Request::is('courses') ? 'active' : '' }}">
                                <a href="{{ route('courses') }}" class="nav-link"> קורסים </a>                                
                            </li>                            
                            <li class="nav-item {{ Request::is('posts') ? 'active' : '' }}">
                                <a href="{{ route('posts') }}" class="nav-link"> בלוג  </a>
                            </li>
                            <li class="nav-item {{ Request::is('contactus') ? 'active' : '' }}" >
                                <a href="{{ route('contactus') }}" class="nav-link">  צור קשר  </a>
                            </li>
                            
                            @forelse($static_pages_top as $page)
                                <li class="nav-item {{ Request::is($page->slug) ? 'active' : '' }}">
                                    <a href="{{ url('/' ,$page->slug) }}">{{ $page->page_name }}</a>
                                </li>    
                            @empty
                            @endforelse
                            
                        </ul>
                    </div>
                    <div class="auth-bar">
                        @auth                                                            
                            <div class="nav-item dropdown nav-item-user-dashboard">
                                <a class="nav-item dropdown-toggle auth-bar-button" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ auth()->user()->firstname }}
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('admin.dashboard.home')  }}"><i class="fa fa-dashboard" style="color:#a79344"></i> &nbsp;  הפרופיל שלי  </a></li>
                                    <li><a class="dropdown-item" href="{{route('logout', auth()->user())}}"><i class="fa fa-sign-out" style="color:#a79344"></i> &nbsp;  התנתק  </a></li>
                                </ul>
                            </div>
                        @endauth                                                                        
                        @guest
                            <a href="{{ route('login') }}" class="auth-bar-button">  התחברות  <i class="fa fa-lock" aria-hidden="true" style="font-size: 13px;"></i></a>
                        @endguest
                    </div>
                </nav>
            </div>
        </div>
    </div>


    <div id="app" >
        @yield('content')
        @auth
            @if(auth()->user()->id > 1)
                @php
                    $otherUser = \App\Models\User::whereHas('roles', function($query) {
                        $query->where('name', 'admin');
                    })->first();
                @endphp   
                <div class="chatbox">  
                
                    <div class="mini-chat-header">
                        <div class="mini-avatar">
                            <img class="agent circle" src="{{$otherUser->profile->getImage()}}" alt="Jesse Tino"> 
                        </div>   
                        <div class="mini-ch-header">
                            <div class="mini-ch-close" id="chat-close">
                                <span class="chat-box-toggle"><i class="fa fa-close"></i></span>
                            </div> 
                            <div class="chat-partner-name" >
                                <h5>{{ $otherUser->lastname }} {{ $otherUser->firstname }}</h5>
                            </div> 
                        </div> 
                    </div>          
                             
                    <user-component :auth-user="{{ auth()->user() }}" :other-user="{{ $otherUser }}" store-url="{{ route('message.store') }}"></user-component>
                </div>
    
                <div class="chat-circle-logo" id="chat-raise">
                    <div class="chat-note-wrapper">
                        <div class="chat-note">                        
                            <img src="{{asset('front-assets/images/chat-noti.png')}}" alt="chat-note-image" >
                        </div>
                        <div class="chat-note-text">
                            תמיכה
                        </div>
                        <img src="{{asset('front-assets/images/logo3.png')}}" alt="chat-log" class="chat-raise-icon">   
                    </div>  
                </div>
                <div class="auto-logout">
                    
                    <auto-logout admin-img="{{asset($otherUser->profile->getImage())}}"></auto-logout>
                </div>
            @endif
        @endauth       
    </div>


    

    <div class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-content">                        
                        <div class="footer-about">
                            @php
                                $footers = Illuminate\Support\Facades\DB::table('homepages')->where('type', 'footer_logo')->first();
                                $contactUs = Illuminate\Support\Facades\DB::table('contactuses')->first(); 
                            @endphp
                            
                            <a href="{{ route('front') }}" class="logo"><img src="{{asset($footers->image)}}" alt="logo" style="width:150px" /></a>
                            <p>  {{ $footers->body  }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-content">
                        <h2>  יצירת קשר  </h2>
                        <ul class="footer-address">
                            <li>
                                <a href="tel:9720526336776"><i class="fa fa-phone"></i> <span> {{ $contactUs->phone  }} </span></a>
                            </li>
                           
                            <li>
                                <a href="mailto:info@grillman.co.li"><i class="fa fa-envelope-o"></i> <span> {{ $contactUs->email  }} </span></a>
                            </li>
                            <li>
                                <a href="http://maps.google.com">
                                    <i class="fa fa-map-marker"></i><span > {{ $contactUs->address  }} </span> 
                                </a>
                            </li>
                        </ul>
                        <div class="footer-left">
                            <ul class="footer-social">
                                <li>
                                    <a href="#"><i class="flaticon-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="flaticon-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="flaticon-envelope"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="flaticon-google-plus"></i></a>
                                </li>
                            </ul>
                        </div> 
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="footer-content">
                        <h2> קורסי בשר </h2>
                        <div class="widget-post-bx">

                            @php
                                $courses = App\Models\Course::orderBy('updated_at', 'desc')->where('active', '1')->paginate(2);
                            @endphp 

                            @foreach ($courses as $course)
                                <div class="widget-post clearfix">
                                    <div class="dlab-post-media"> 
                                        <img src=" {{ $course->cover_image }} "alt=""> 
                                    </div>
                                    <div class="dlab-post-info">
                                        <div class="dlab-post-header">
                                            <h6 class="post-title"><a href=" {{ route('courses') }} "> {{ $course->course_name }}</a></h6>
                                        </div>
                                        <div class="dlab-post-meta">
                                            <ul>
                                                <li class="post-date"> <i class="fa fa-clock-o"></i> {{ $course->created_at }} </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach                            
                        </div>
                    </div>
                </div>
                
                @php
                    $static_pages_bottom = \App\Models\Footer::where(['published' => '1', 'is_bottom'=>'1'])->get();
                @endphp

                <div class="col-lg-3 col-md-6">
                    <div class="footer-content">
                        <h2> שימושי </h2>
                        <ul>
                            
                            @forelse($static_pages_bottom as $page)
                                <li>
                                    <a href="{{ url('/', $page->slug) }}">{{ $page->page_name }}</a>
                                </li>    
                            @empty
                            @endforelse
                            
                            <li>
                                <a href="{{ route('faq') }}">FAQ</a>
                            </li>   
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="feedback">
        <div id="feedback-form">            
            <div class="feedback-content">
                <h4>  צור קשר </h4>
                <p class="contactpopupmessage"></p>
                <form id="contactfrom1" >
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control contact_first_name" name="firstname" id="contact_first_name"  placeholder="  שם פרטי " required autocomplete="off">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control contact_first_name" name="lastname" id="contact_last_name"  placeholder=" שם משפחה " required autocomplete="off">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="email" class="form-control contact_email" name="email" id="contact_email" placeholder="אימייל" required autocomplete="off">
                        </div>

                        <div class="form-group col-md-6">
                            <input type="number" class="form-control contact_phone" name="phone" id="contact_phone" maxlength="10" placeholder="  טלפון " required autocomplete="off">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea class="form-control contact_message" name="message" id="contact_message" style="padding-top:15px; height:80px;" placeholder="הודעה " required autocomplete="off"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <input id="front_contact_btn" type="submit" class="feedback-btn" value="שלח">
                        </div>
                        <div id="contact_alert_success" class="alert alert-success col-md-12 d-none">
                            נשלח בהצלחה.
                        </div>
                    </div>
                </form>
            </div>            
        </div>
        <div id="feedback-tab"><i class="fa fa-envelope" aria-hidden="true"></i></div>
    </div>


    


    <a href="#" class="scroll-top wow bounceInDown">
        <i class="fa fa-angle-double-up"></i>
    </a>
    {{-- *******************************************
                    common script start
    ******************************************* --}}
    <script src="{{asset('js/app.js')}}"></script>
    <script src="https://media.twiliocdn.com/sdk/js/chat/v3.3/twilio-chat.min.js"></script>

    <script src="{{asset('front-assets/js/jquery.min.js')}}"></script>

    <script src="{{asset('front-assets/js/popper.min.js')}}"></script>
    <script src="{{asset('front-assets/js/bootstrap.min.js')}}"></script>

    <script src="{{asset('front-assets/js/jquery.meanmenu.js')}}"></script>
    <script src="{{asset('front-assets/js/jquery.magnific-popup.min.js')}}"></script>

    <script src="{{asset('front-assets/js/owl.carousel.min.js')}}"></script>

    <script src="{{asset('front-assets/js/wow.min.js')}}"></script>

    <script src="{{asset('front-assets/js/isotope.pkgd.min.js')}}"></script>

    <script src="{{asset('front-assets/js/form-validator.min.js')}}"></script>

    <script src="{{asset('front-assets/js/contact-form-script.js')}}"></script>

    <script src="{{asset('front-assets/js/main.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-ajax-unobtrusive@3.2.6/dist/jquery.unobtrusive-ajax.min.js"></script>    
    
    
    <!-- <script>
	    var botmanWidget = {
	        aboutText: 'grillman team',
	        introMessage: "✋ Welcome to our Grillman Course"
	    };
    </script>
  
    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script> -->
    
    {{-- *******************************************
                    common script end
    ******************************************* --}}




    {{-- *******************************************
                    extra script here
    ******************************************* --}}
    @yield('page-scripts') 
    @yield('scripts')  
    
    <script>
        $('#front_contact_btn').click(function(e) {
            $("#contactfrom1").attr({
                "data-ajax-url": "{{ route('contacts') }}",
                "data-ajax-method": "post",
                "data-ajax": true,
                "data-ajax-complete": "saveSuccess",
            });
            $('#ajax_loader').removeClass('d-none');
        });
        
        function saveSuccess(data) {
            if(data.status == '200') {
               $('#contact_alert_success').removeClass('d-none');
               $('#contact_first_name').val('');
               $('#contact_last_name').val('');
               $('#contact_email').val('');
               $('#contact_phone').val('');
               $('#contact_message').val('');
               setTimeout(() => {
                    $('#contact_alert_success').addClass('d-none');
               }, 6*1000);
            }
        }
    </script>
</body>
</html>