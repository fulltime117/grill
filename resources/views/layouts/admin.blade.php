<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    
    @yield('page-title')
    
    
    <link rel="icon" type="image/x-icon" href=" {{asset('assets/img/favicon.ico')}}"/>
    <link href="{{asset('assets/css/loader.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{asset('assets/js/loader.js')}}"></script>
    
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/elements/tooltip.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/sweetalerts/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/sweetalerts/sweetalert.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/elements/breadcrumb.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/elements/miscellaneous.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/font-icons/fontawesome/css/regular.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/font-icons/fontawesome/css/fontawesome.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{asset('assets/css/forms/switches.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/elements/avatar.css')}}" rel="stylesheet" type="text/css" />
    
    
    {{--
        <link href="{{asset('')}}" rel="stylesheet" type="text/css" />
        <script src="{{asset('')}}"></script>
    --}}
    
    <!-- END GLOBAL MANDATORY STYLES -->



    <!-- BEGIN PAGE LEVEL STYLES -->
        @yield('page-styles')
    <!-- END PAGE LEVEL STYLES -->
    
    <style>
        @media print {
            .no-print, .no-print *
            {
                display: none !important;
            }
        }
        .feather-icon .icon-section {
            padding: 30px;
        }
        .feather-icon .icon-section h4 {
            color: #3b3f5c;
            font-size: 17px;
            font-weight: 600;
            margin: 0;
            margin-bottom: 16px;
        }
        .feather-icon .icon-content-container {
            padding: 0 16px;
            width: 86%;
            margin: 0 auto;
            border: 1px solid #bfc9d4;
            border-radius: 6px;
        }
        .feather-icon .icon-section p.fs-text {
            padding-bottom: 30px;
            margin-bottom: 30px;
        }
        .feather-icon .icon-container { cursor: pointer; }
        .feather-icon .icon-container svg {
            color: #3b3f5c;
            margin-right: 6px;
            vertical-align: middle;
            width: 20px;
            height: 20px;
            fill: rgba(0, 23, 55, 0.08);
        }
        .feather-icon .icon-container:hover svg {
            color: #1b55e2;
            fill: rgba(27, 85, 226, 0.23921568627450981);
        }
        .feather-icon .icon-container span { display: none; }
        .feather-icon .icon-container:hover span { color: #1b55e2; }
        .feather-icon .icon-link {
            color: #1b55e2;
            font-weight: 600;
            font-size: 14px;
        }


        /*FAB*/
        .fontawesome .icon-section {
            padding: 30px;
        }
        .fontawesome .icon-section h4 {
            color: #3b3f5c;
            font-size: 17px;
            font-weight: 600;
            margin: 0;
            margin-bottom: 16px;
        }
        .fontawesome .icon-content-container {
            padding: 0 16px;
            width: 86%;
            margin: 0 auto;
            border: 1px solid #bfc9d4;
            border-radius: 6px;
        }
        .fontawesome .icon-section p.fs-text {
            padding-bottom: 30px;
            margin-bottom: 30px;
        }
        .fontawesome .icon-container { cursor: pointer; }
        .fontawesome .icon-container i {
            font-size: 20px;
            color: #3b3f5c;
            vertical-align: middle;
            margin-right: 10px;
        }
        .fontawesome .icon-container:hover i { color: #1b55e2; }
        .fontawesome .icon-container span { color: #888ea8; display: none; }
        .fontawesome .icon-container:hover span { color: #1b55e2; }
        .fontawesome .icon-link {
            color: #1b55e2;
            font-weight: 600;
            font-size: 14px;
        }
    </style>
    
    <style>
        
        .iframe-container {
            position: relative;
              width: 100%;
              overflow: hidden;
              padding-top: 56.25%; /* 16:9 Aspect Ratio */
        }
        
        .responsive-iframe {
              position: absolute;
              top: 0;
              left: 0;
              bottom: 0;
              right: 0;
              width: 100%;
              height: 100%;
              border: none;
            }
        
        .custom-file-container__image-preview.position-relative {
            overflow: hidden;
        }
        
        .far, .fas, .fa { 
            cursor: pointer; 
            font-size: 18px;
        } 
    </style>
    
</head>
<body data-spy="scroll" data-target="#navSection" data-offset="140">
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->
    
    
    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        <header class="header navbar navbar-expand-sm">

            <ul class="navbar-item theme-brand flex-row  text-center">
                <li class="nav-item theme-logo theme-text">
                    <a href="{{ route('front') }}">
                        <img src="{{asset('assets/img/logo.png')}}" class="navbar-logo" alt="logo">
                    </a>
                </li>
            </ul>

            <ul class="navbar-item flex-row ml-md-auto">
                <li class="nav-item dropdown message-dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle bs-tooltip" title="unread chat" id="messageDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                        @if(auth()->user()->unreadNotifications()->where('type', 'App\Notifications\ChatNotify')->orderBy('created_at', 'desc')->count())
                            <span class="badge "></span> 
                        @endif
                    </a>
                    <div class="dropdown-menu p-0 position-absolute" aria-labelledby="messageDropdown">
                        <div class="">
                            <div class="dropdown-item">
                                <div class="media align-items-center">
                                    <a href="{{ route('mark_as_read_all_types', implode(',', ['ChatNotify'])) }}" class="text-success mark_as_read_all_types">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                        <span class="ml-2"> Mark all as read</span>
                                    </a>
                                </div>
                            </div>
                            @forelse(auth()->user()->unreadNotifications()->where('type', 'App\Notifications\ChatNotify')->orderBy('created_at', 'desc')->get() as $notification)
                                <div class="dropdown-item markAsRead" data-url="{{ route('mark_as_read', $notification->id) }}">
                                    <div class="media align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitch"><path d="M21 2H3v16h5v4l4-4h5l4-4V2zm-10 9V7m5 4V7"></path></svg>
                                        <div class="media-body">
                                            <div class="notification-para ml-2"><strong>{{ \App\Models\User::find($notification->data['user_id'])->firstname  }}</strong> wants chat</div>
                                        </div>
                                    </div>
                                </div> 
                            @empty
                                No contacts
                            @endforelse
                        </div>
                    </div>
                </li>
                
                <li class="nav-item dropdown message-dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle bs-tooltip" title="unread messages" id="messageDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        @if(auth()->user()->unreadNotifications()->where('type', 'App\Notifications\ContactNotify')->orderBy('created_at', 'desc')->count())
                          <span class="badge badge-success"></span>
                        @endif
                    </a>
                    <div class="dropdown-menu p-0 position-absolute" aria-labelledby="messageDropdown">
                        <div class="">
                            <div class="dropdown-item">
                                <div class="media align-items-center">
                                    <a href="{{ route('mark_as_read_all_types', implode(',', ['ContactNotify'])) }}" class="text-success mark_as_read_all_types">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                        <span class="ml-2"> Mark all as read</span>
                                    </a>
                                </div>
                            </div>
                            @forelse(auth()->user()->unreadNotifications()->where('type', 'App\Notifications\ContactNotify')->orderBy('created_at', 'desc')->get() as $notification)
                                <div class="dropdown-item markAsRead" data-url="{{ route('mark_as_read', $notification->id) }}">
                                    <div class="media align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitch"><path d="M21 2H3v16h5v4l4-4h5l4-4V2zm-10 9V7m5 4V7"></path></svg>
                                        <div class="media-body">
                                            <div class="notification-para ml-2"><strong>{{ $notification->data['name'] }}</strong> sent contact</div>
                                        </div>
                                    </div>
                                </div> 
                            @empty
                                No contacts
                            @endforelse
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown notification-dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle bs-tooltip" title="unread activities of users" id="notificationDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                        @if(auth()->user()->unreadNotifications()->where('type', 'App\Notifications\TestSuccess')->count() + 
                            auth()->user()->unreadNotifications()->where('type', 'App\Notifications\CourseBuyNotify')->count())
                            <span class="badge "></span> 
                        @endif
                    </a>
                    <div class="dropdown-menu position-absolute" aria-labelledby="notificationDropdown">
                        <div class="notification-scroll">
                            <div class="dropdown-item">
                                <div class="media align-items-center">
                                    <a href="{{ route('mark_as_read_all_types', implode(',', ['TestSuccess', 'CourseBuyNotify'])) }}" class="text-success mark_as_read_all_types">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                        <span class="ml-2"> Mark all as read</span>
                                    </a>
                                </div>
                            </div>
                            @forelse(auth()->user()->unreadNotifications as $notification)
                                 
                                @if($notification->type == 'App\Notifications\TestSuccess')
                                    @php
                                        $testUser = \App\Models\User::find($notification->data['user_id']);
                                        $testLesson = \App\Models\Lesson::find($notification->data['lesson_id']);
                                    @endphp
                                    <div class="dropdown-item markAsRead" data-url="{{ route('mark_as_read', $notification->id) }}">
                                        <div class="media">
                                            @if($notification->data['passed'])
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                            @endif
                                            <div class="media-body">
                                                <div class="notification-para">
                                                    <span class="user-name">{{ $testUser->firstname }} {{ $testUser->lastname }}</span>
                                                    tested {{ $testLesson->lesson_name }}-#{{ $testLesson->lesson_number }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @elseif($notification->type == 'App\Notifications\CourseBuyNotify')
                                <div class="dropdown-item markAsRead" data-url="{{ route('mark_as_read', $notification->id) }}"">
                                    @php
                                        $buyer = \App\Models\User::find($notification->data['user']);
                                        $course = \App\Models\Course::find($notification->data['course']);
                                    @endphp
                                    <div class="media">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                                        <div class="media-body">
                                            <div class="notification-para"><span class="user-name">{{ $buyer->firstname }} {{ $buyer->lastname }}</span> bought {{ $course->course_name }}</div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @empty
                            
                            @endforelse
                        </div>
                    </div>
                </li>

                <li class="nav-item dropdown user-profile-dropdown">
                    <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <img src="{{asset(auth()->user()->profile->getImage())}}" alt="avatar">
                    </a>
                    <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                        <div class="">
                            <div class="dropdown-item">
                                <a href="{{ route('admin.users.show', 1) }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle>
                                </svg> My Profile</a>
                            </div>
                            <div class="dropdown-item">
                                <a href="{{ route('admin.chat') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                                 Chat with user</a>
                            </div>
                            <div class="dropdown-item">
                                <a href="{{ route('admin.logs') }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg> View Logs</a>
                            </div>
                            <div class="dropdown-item">
                                <a href="{{route('admin.logout')}}" id="logout"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg> Log Out</a>
                            </div>
                        </div>
                    </div>
                </li>

            </ul>
        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN NAVBAR  -->
    <div class="sub-header-container">
        <header class="header navbar navbar-expand-sm">
            <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>

            <ul class="navbar-nav flex-row">
                <li>
                    <div class="page-header">

                        <nav class="breadcrumb-two" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                @yield('breadcrumb')
                                {{--<li class="px-3"></li>--}}
                            </ol>
                        </nav>

                    </div>
                </li>
            </ul>
            
            <a href="javascript:history.back()" class="ml-3 btn btn-warning btn-sm"> 
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-skip-back"><polygon points="19 20 9 12 19 4 19 20"></polygon><line x1="5" y1="19" x2="5" y2="5"></line></svg>
            </a>
        </header>
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        <div class="sidebar-wrapper sidebar-theme">
            
            <nav id="sidebar">
                <!-- <div class="shadow-bottom"></div> -->

                <ul class="list-unstyled menu-categories" id="accordionExample">
                
                    {{--
                    <li class="menu">
                        <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                <span>Dashboard</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="dashboard" data-parent="#accordionExample">
                            <li>
                                <a href="{{ route('admin.dashboard.home') }}"> Home </a>
                            </li>
                            <li>
                                <a href="{{ route('admin.dashboard.calendar') }}"> My Calendar </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu">
                        <a href="#apps" data-toggle="collapse" data-active="false" aria-expanded="false" class="dropdown-toggle collapsed">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
                                <span>Apps</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="apps" data-parent="#accordionExample">
                            <li class="">
                                <a href="{{route('admin.chat')}}"> Chat </a>
                            </li>
                           
                            <li>
                                <a href="{{route('admin.invoices')}}"> Invoice List </a>
                            </li>
                            
                        </ul>
                    </li>
                    --}}
                    
                    <li class="menu">
                        <a href="{{ route('admin.dashboard.home') }}" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                <span>Home</span>
                            </div>
                        </a>
                    </li>
                    
                    
                    
                    <li class="menu">
                        <a href="{{ route('admin.users') }}" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                <span>User List</span>
                            </div>
                        </a>
                    </li>
                    
                    <li class="menu">
                        <a href="{{ route('admin.logs') }}" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
                                <span>Logs List</span>
                            </div>
                        </a>
                    </li>
                    
                    <li class="menu">
                        <a href="{{ route('admin.pendings') }}" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
                                <span>Pending List</span>
                            </div>
                        </a>
                    </li>
                    
                    <li class="menu">
                        <a href="{{ route('admin.contracts') }}" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                <span>Contracts List</span>
                            </div>
                        </a>
                    </li>
                    
                    <li class="menu">
                        <a href="{{ route('diploma.index') }}" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#e7af1e" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bookmark"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path></svg>
                                <span>Diploma List</span>
                            </div>
                        </a>
                    </li>
                    
                    
                    <li class="menu">
                        <a href="#courses" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
                                <span>Courses</span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="courses" data-parent="#accordionExample">
                            <li>
                                <a href="{{ route('admin.courses') }}"> Courses</a>
                            </li>
                            
                            <li>
                                <a href="{{ route('admin.lessons') }}"> Lessons </a>
                            </li>
                            
                            <li>
                                <a href="{{ route('admin.questions') }}"> Questions </a>
                            </li>
                            
                            <li>
                                <a href="{{ route('admin.tests') }}"> Test Results</a>
                            </li>
                            
                        </ul>
                    </li>
                    
                    <li class="menu">
                        <a href="{{ route('admin.contacts') }}" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                <span>Contact Info</span>
                            </div>
                        </a>
                    </li>
                    <li class="menu">
                        <a href="{{ route('admin.faqs') }}" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                                <span>FAQ</span>
                            </div>
                        </a>
                    </li>
                    
                    <li class="menu">
                        <a href="#coupons" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7.01" y2="7"></line></svg>
                                <span>Coupons </span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="coupons" data-parent="#accordionExample">
                            <li>
                                <a href="{{ route('cu.create') }}"> New Coupon</a>
                            </li>
                            <li>
                                <a href="{{ route('cu.coupons') }}"> Coupons List</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="menu">
                        <a href="{{ route('sales') }}" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-percent"><line x1="19" y1="5" x2="5" y2="19"></line><circle cx="6.5" cy="6.5" r="2.5"></circle><circle cx="17.5" cy="17.5" r="2.5"></circle></svg>
                                <span>Sales List</span>
                            </div>
                        </a>
                    </li>
                    
                    <li class="menu">
                        <a href="#Pages" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                <span>Pages </span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="Pages" data-parent="#accordionExample">
                            <li>
                                <a href="{{ route('admin.homepages.edit') }}"> Home Page</a>
                            </li>
                            
                            <li>
                                <a href="{{ route('admin.aboutus.edit') }}"> About Us Page </a>
                            </li>
                            
                            <li>
                                <a href="{{ route('admin.banners.course') }}"> Course Page</a>
                            </li>
                            
                            <li>
                                <a href="{{ route('admin.banners.post') }}"> Post Page</a>
                            </li>
                            
                            <li>
                                <a href="{{ route('admin.contactus.edit') }}"> Contact Us Page</a>
                            </li>
                            
                            
                            <li>
                                <a href="{{ route('footer.index') }}"> Static Pages</a>
                            </li>
                            
                            
                            <li>
                                <a href="{{ route('admin.contract.edit_content') }}"> Contract Page</a>
                            </li>
                            
                            {{--
                            <li>
                                <a href="{{ route('admin.otherpages.edit') }}"> Contract Page</a>
                            </li>
                            --}}
                        </ul>
                    </li>
                    
                    {{-- 
                    <li class="menu">
                        <a href="#Email" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg>
                                <span>Email </span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="Email" data-parent="#accordionExample">
                            <li>
                                <a href="{{ route('emailtypes') }}">Email Templates</a>
                            </li>
                            <li>
                                <a href="{{ route('emails.welcome') }}"> Send Email</a>
                            </li>
                            <li>
                                <a href="{{ route('emails') }}"> Email history</a>
                            </li>
                            <li>
                            </li>
                        </ul>
                    </li>
                    --}}
                    
                    
                    <li class="menu">
                        <a href="#Post" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-feather"><path d="M20.24 12.24a6 6 0 0 0-8.49-8.49L5 10.5V19h8.5z"></path><line x1="16" y1="8" x2="2" y2="22"></line><line x1="17.5" y1="15" x2="9" y2="15"></line></svg>
                                <span>Post </span>
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                        </a>
                        <ul class="collapse submenu list-unstyled" id="Post" data-parent="#accordionExample">
                            <li>
                                <a href="{{ route('posts.create') }}">New Post</a>
                            </li>
                            <li>
                                <a href="{{ route('posts.admin_index') }}">Post List</a>
                            </li>
                            
                            
                        </ul>
                    </li>
                    
                    {{--
                    <li class="menu">
                        <a href="{{ route('admin.files') }}" aria-expanded="false" class="dropdown-toggle">
                            <div class="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg>
                                <span>File Manager</span>
                            </div>
                        </a>
                    </li>
                    --}}
                    
                    
                    
                    
                    
                </ul>
                
            </nav>

        </div>
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                    @yield('content')
            </div>
            <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © 2020 <a target="_blank" href="https://designreset.com">Grillman</a>, All rights reserved.</p>
                </div>
                <div class="footer-section f-section-2">
                    <p class="">Coded with Grillman development team<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
                </div>
            </div>
        </div>
        <!--  END CONTENT AREA  -->
    </div>
    <!-- END MAIN CONTAINER -->
    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{asset('assets/js/libs/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>
    <script src="{{asset('plugins/font-icons/feather/feather.min.js')}}"></script>
    
    <script src="{{asset('assets/js/elements/tooltip.js')}}"></script>
    
    <script src="{{asset('plugins/sweetalerts/sweetalert2.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{asset('assets/js/custom.js')}}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->




    <!-- BEGIN PAGE LEVEL SCRIPTS -->
        @yield('page-scripts')
    <!-- END PAGE LEVEL SCRIPTS -->
    
    
    
    
    
    <script>
    
        /*
        ================================================
        |            Active current url                 |
        ================================================
        */
        
        $(document).ready(function() {
            const url = "{{ $url }}";
            $('a').each(function(){
                if($(this).attr('href') === url){
                    
                    if($(this).closest('ul')) {
                        $(this).closest('li').addClass('active');
                        $(this).closest('ul').addClass('show');
                    }
                    $(this).closest('.menu').find('a.dropdown-toggle').removeClass('collapsed')
                        .attr('data-active', true)
                        .attr('area-expanded', true);
                    
                }
            });
            
            
            // logout for post
            $('#logout').click(function(e) {
                e.preventDefault();
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: $(this).attr('href'),
                    method: 'POST',
                    success: function(){ window.location.href = "{{ route('login') }}"; }
                });
            })
            
            
            
            $('.markAsRead').click(function(){
                const $this = $(this);
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: $(this).attr('data-url'),
                    method: 'POST',
                    dataType: 'json',
                    success: function(data){
                        if(data == '1') {
                            console.log(data);
                            $this.remove();
                        }
                    }
                })
            })
            
            $('.mark_as_read_all_types').click(function(e) {
                e.preventDefault();
                const $this = $(this);
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: $(this).attr('href'),
                    method: 'POST',
                    dataType: 'json',
                    success: function(data){
                        if(data == '1') {
                            console.log(data);
                            $this.closest('div.dropdown-menu').find('div.markAsRead').remove();
                        }
                    }
                })
            })
            
        });
        
        
        $('.mt-container').each(function(){ const ps = new PerfectScrollbar($(this)[0]); });

    
    </script>
    
    
    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
    @yield('scripts')
    <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
    
</body>
</html>