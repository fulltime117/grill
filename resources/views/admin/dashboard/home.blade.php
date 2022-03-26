@extends ('layouts.admin')


@section('page-title')
    <title>Admin - Dashboard</title>
@endsection


@section('page-styles')
    <link href="{{asset('plugins/apex/apexcharts.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/dashboard/dash_2.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/forms/switches.css')}}" rel="stylesheet" type="text/css" />
@endsection


  



@section('breadcrumb')
    <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">home</a></li>
@endsection

@section('content')

<div class="row layout-top-spacing">
    
    <div class="col-lg-12 layout-spacing">
        <div class="widget bg-white p-3">
            <div class="d-flex align-items-center">
                <label class="switch s-icons s-outline s-outline-danger mr-2 mb-0">
                    <input type="checkbox" id="coming_soon" @if($coming_soon->active) checked @endif>
                    <span class="slider"></span>
                </label>
                <span class="ml-3">Coming Soon</span>
            </div>
        </div>
    </div>
    
    <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="row widget-statistic">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="widget widget-one_hybrid widget-followers">
                    <div class="widget-heading">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        </div>
                        <p class="w-value">{{ $total_users->count() }}</p>
                        <h5 class="">Total users</h5>
                    </div>
                    <div class="row m-0">
                        <div class="widget-heading col-6">
                            <div class="w-icon text-warning">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                            </div>
                            <p class="w-value">{{ $pending_users->count() }}</p>
                            <h5 class="">Pending</h5>
                        </div>
                        <div class="widget-heading col-6">
                            <div class="w-icon text-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                            </div>
                            <p class="w-value">{{ $blocked_users->count() }}</p>
                            <h5 class="">Blocked</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="widget widget-one_hybrid widget-referral">
                    <div class="widget-heading">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
                        </div>
                        <p class="w-value">{{ $total_courses->count() }}</p>
                        <h5 class="">Total courses</h5>
                    </div>
                    <div class="widget-heading">    
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
                        </div>
                        <p class="w-value">{{ $pending_courses->count() }}</p>
                        <h5 class="">Pending courses</h5>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                <div class="widget widget-one_hybrid widget-engagement">
                    <div class="widget-heading">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                        </div>
                        <p class="w-value">{{ $total_lessons->count() }}</p>
                        <h5 class="">Total Lessons</h5>
                    </div>
                    <div class="widget-heading">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                        </div>
                        <p class="w-value">{{ $pending_lessons->count() }}</p>
                        <h5 class="">Pending Lessons</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
        <div class="widget-four">
            <div class="widget-heading">
                <h5 class="">Visitors by Browser</h5>
            </div>
            <div class="widget-content">
                <div class="vistorsBrowser">
                    <div class="browser-list">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chrome"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="4"></circle><line x1="21.17" y1="8" x2="12" y2="8"></line><line x1="3.95" y1="6.06" x2="8.54" y2="14"></line><line x1="10.88" y1="21.94" x2="15.46" y2="14"></line></svg>
                        </div>
                        <div class="w-browser-details">
                            <div class="w-browser-info">
                                <h6>Chrome</h6>
                                <p class="browser-count">65%</p>
                            </div>
                            <div class="w-browser-stats">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-primary" role="progressbar" style="width: 65%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="browser-list">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-compass"><circle cx="12" cy="12" r="10"></circle><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon></svg>
                        </div>
                        <div class="w-browser-details">
                            
                            <div class="w-browser-info">
                                <h6>Safari</h6>
                                <p class="browser-count">25%</p>
                            </div>

                            <div class="w-browser-stats">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-danger" role="progressbar" style="width: 35%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="browser-list">
                        <div class="w-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                        </div>
                        <div class="w-browser-details">
                            
                            <div class="w-browser-info">
                                <h6>Others</h6>
                                <p class="browser-count">15%</p>
                            </div>

                            <div class="w-browser-stats">
                                <div class="progress">
                                    <div class="progress-bar bg-gradient-warning" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>

                        </div>

                    </div>
                    
                </div>

            </div>
        </div>
    </div>

    <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-one">
            <div class="widget-heading">
                <h6 class="">Statistics</h6>
            </div>
            <div class="w-chart">
                <div class="w-chart-section">
                    <div class="w-detail">
                        <p class="w-title">Total Visited</p>
                        <p class="w-stats">{{ count($total_visited_users) }}</p>
                    </div>
                    <div class="w-chart-render-one">
                        <div id="total-users"></div>
                    </div>
                </div>

                <div class="w-chart-section">
                    <div class="w-detail">
                        <p class="w-title">Total Orders</p>
                        <p class="w-stats">{{ $total_orders->count() }}</p>
                    </div>
                </div>
                
                <div class="w-chart-section">
                    <div class="w-detail2">
                        <p class="w-title">Pending Orders</p>
                        <p class="w-stats">{{ $pending_orders->count() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
        <div class="widget widget-card-four">
            <div class="widget-content">
                <div class="w-content">
                    <div class="w-info">
                        <h6 class="value">{{ '₪'. $income }}</h6>
                        <p class="">payed</p>
                    </div>
                    <div class="">
                        <div class="w-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                        </div>
                    </div>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: 57%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
        <div class="widget widget-card-four">
            <div class="widget-content">
                <div class="w-content">
                    <div class="w-info">
                        <h6 class="value">Contacts</h6>
                       
                    </div>
                    <div class="">
                        <div class="w-icon bg-success text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        </div>
                    </div>
                </div>
                <div class="" style="visibility:hidden2">
                    <br>
                    <p class="">2 unread messages</p>
                    <br>
                </div>
            </div>
        </div>
    </div>
    
    
    {{--
    <div class="col-xl-9 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-chart-three">
            <div class="widget-heading">
                <div class="">
                    <h5 class="">Unique Visitors</h5>
                </div>

                <div class="dropdown  custom-dropdown">
                    <a class="dropdown-toggle" href="#" role="button" id="uniqueVisitors" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="uniqueVisitors">
                        <a class="dropdown-item" href="javascript:void(0);">View</a>
                        <a class="dropdown-item" href="javascript:void(0);">Update</a>
                        <a class="dropdown-item" href="javascript:void(0);">Download</a>
                    </div>
                </div>
            </div>

            <div class="widget-content">
                <div id="uniqueVisits"></div>
            </div>
        </div>
    </div>
    --}}

    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-activity-three">

            <div class="widget-heading">
                <h5 class="">Online Users</h5>
            </div>

            <div class="widget-content">

                <div class="mt-container mx-auto">
                    <div class="timeline-line">
                        
                        @foreach($online_users as $online)
                            <div class="item-timeline timeline-new">
                                <div class="t-dot">
                                    <div class="t-primary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></div>
                                </div>
                                <div class="t-content">
                                    <div class="t-uppercontent">
                                        <h5>Logs</h5>
                                        <span class="">{{ $online->created_at->diffForHumans() }}</span>
                                    </div>
                                    <p><span>Updated</span> Server Logs</p>
                                    <div class="tags">
                                        <img src="{{ $online->user->profile->getImage() }}" width="40px" class="rounded-circle">
                                        <div class="badge badge-success">{{ $online->ip }}</div>
                                        <div class="badge badge-warning">Purchased Courses {{ $online->user->userCourses->count() }}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        

                                                           
                    </div>                                    
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-activity-three">

            <div class="widget-heading">
                <h5 class="">Test Results</h5>
            </div>

            <div class="widget-content">

                <div class="mt-container mx-auto">
                    <div class="timeline-line">
                        
                        @foreach($testResults as $notification)
                            @php
                                $testUser = \App\Models\User::find($notification->data['user_id']);
                                $testLesson = \App\Models\Lesson::find($notification->data['lesson_id']);
                            @endphp
                            <div class="item-timeline timeline-new">
                                <div class="t-dot">
                                    <div class="t-success @if(!$notification->data['passed']) t-danger @endif">
                                        @if($notification->data['passed'])
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        @else
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                        @endif
                                    </div>
                                </div>
                                <div class="t-content">
                                    <div class="t-uppercontent">
                                        <h5 class="bs-tooltip" title="Course: {{ $testLesson->course->course_name }}">
                                            <a href="{{ route('admin.lessons.show', $testLesson) }}">{{ $testLesson->lesson_name }} - #{{$testLesson->lesson_number }}</a></h5>
                                        <span class="">{{ $notification->created_at->diffForHumans() }}</span>
                                    </div>
                                       
                                    <div class="tags">
                                        <img src="{{ $testUser->profile->getImage() }}" width="40px" class="rounded-circle">
                                        <div class="badge badge-info">
                                            <a href="{{ route('admin.users.show', $testUser) }}"  class="text-white">
                                            {{ $testUser->firstname }} {{ $testUser->lastname }}</a></div>
                                        @if($notification->data['passed'])
                                            <div class="badge badge-success">Passed</div>
                                        @else
                                            <div class="badge badge-danger">Not Passed</div>
                                        @endif
                                        <span class="float-right mt-2 bs-tooltip markAsRead"
                                            data-url="{{ route('mark_as_read', $notification->id) }}"
                                            title="Mark as read, remove in this notification widget"><i class="fa fa-check-square-o"></i></span>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>                                    
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-activity-three">

            <div class="widget-heading">
                <h5 class="">Contact Notify</h5>
            </div>

            <div class="widget-content">

                <div class="mt-container mx-auto">
                    <div class="timeline-line">
                        
                        @foreach($contactNotifies as $notification)
                            <div class="item-timeline timeline-new">
                                <div class="t-dot">
                                    <div class="t-secondary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitch"><path d="M21 2H3v16h5v4l4-4h5l4-4V2zm-10 9V7m5 4V7"></path></svg>
                                    </div>
                                </div>
                                <div class="t-content">
                                    <div class="t-uppercontent">
                                        <h5 class="bs-tooltip" title="{{ 'View Contact detail ' }}">
                                            <a href="{{ route('admin.contacts') }}">{{ $notification->data['name'] }}</a></h5>
                                        <span class="">{{ $notification->created_at->diffForHumans() }}</span>
                                    </div>
                                       
                                    <div class="tags">
                                        <div class="badge badge-warning">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                            {{ $notification->data['email'] }}
                                        </div>
                                        <div class="badge badge-warning">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>    
                                            {{ $notification->data['phone'] }}
                                        </div>
                                        <span class="float-right mt-2 bs-tooltip markAsRead"
                                            data-url="{{ route('mark_as_read', $notification->id) }}"
                                            title="Mark as read, remove in this notification widget"><i class="fa fa-check-square-o"></i></span>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>                                    
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-activity-three">

            <div class="widget-heading">
                <h5 class="">Buyed Courses Notify</h5>
            </div>

            <div class="widget-content">

                <div class="mt-container mx-auto">
                    <div class="timeline-line">
                        
                        @forelse($courseBuyNotifications as $notification)
                            @php
                                $testUser = \App\Models\User::find($notification->data['user']);
                                $testCourse = \App\Models\Course::find($notification->data['course']);
                                
                            @endphp
                            <div class="item-timeline timeline-new">
                                <div class="t-dot">
                                    <div class="t-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                                    </div>
                                </div>
                                <div class="t-content">
                                    <div class="t-uppercontent">
                                        <h5 class="bs-tooltip" title="Course: {{ $testCourse->course_name }}">
                                            <a href="{{ route('admin.courses.show', $testCourse) }}">{{ $testCourse->course_name }}</a></h5>
                                        <span class="">{{ $notification->created_at->diffForHumans() }}</span>
                                    </div>
                                       
                                    <div class="tags">
                                        <img src="{{ $testUser->profile->getImage() }}" width="40px" class="rounded-circle">
                                        <div class="badge badge-info">
                                            <a href="{{ route('admin.users.show', $testUser) }}"  class="text-white">
                                            {{ $testUser->firstname }} {{ $testUser->lastname }}</a></div>
                                            <div class="badge badge-success">Buyed</div>
                                        <span class="float-right mt-2 bs-tooltip markAsRead"
                                            data-url="{{ route('mark_as_read', $notification->id) }}"
                                            title="Mark as read, remove in this notification widget"><i class="fa fa-check-square-o"></i></span>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse

                    </div>                                    
                </div>
            </div>
        </div>
    </div>

    

</div>
@php
$users = [11, 11, 12, 12, 13, 14, 14, 15, 16, 18, 16, 18];
@endphp
<script>
    const users = <?= json_encode($users, true); ?>;
    // console.log(typeof users, users);
</script>
@endsection

@section('page-scripts')
    
    
@endsection


@section('scripts')
<script>
    
    
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
                    $this.closest('div.item-timeline').remove();
                }
            }
        })
    })
    
    $('#coming_soon').click(function(){
        const active = $(this).is(':checked') ? 1 : 0 ; 
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "{{route('setting.coming_soon')}}",
            method: 'POST',
            dataType: 'json',
            data: { active },
            success: function(data){
                const toast = swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    padding: '2em'
                });
                
                toast({
                    type: 'success',
                    title: 'Coming soon is changed in successfully',
                    padding: '2em',
                })
            }
        });
    });
    

</script>
@endsection