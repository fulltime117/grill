@extends ('layouts.admin')


@section('page-title')
    <title>Admin - {{ $user-> username }}</title>
@endsection


@section('page-styles')
    <link href="{{asset('assets/css/users/user-profile.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="javascript:void(0);">Users</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">Show - {{ $user->firstname }} {{ $user->lastname }}</a></li>
@endsection

@section('content')

<div class="row layout-spacing">

    <!-- Content -->
    <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">
    
        <div class="user-profile layout-spacing">
            <div class="widget-content widget-content-area">
                <div class="d-flex justify-content-between">
                    <h3 class="">Profile</h3>
                    <a href="{{route('admin.users.edit', $user->id)}}" class="mt-2 edit-profile bs-tooltip" title="Edit Profile"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>
                </div>
                <div class="text-center user-info">
                    <img src="{{asset($user->profile->getImage())}}" alt="avatar">
                    <p class="">{{ $user->firstname }} {{ $user->lastname }}</p>
                </div>
                <div class="user-info-list">
    
                    <div class="">
                        <ul class="contacts-block list-unstyled">
                            
                            <li class="contacts-block__item">
                                <a href="mailto:example@mail.com"><svg class="bs-tooltip" title="Email to" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>{{ $user->email }}</a>
                            </li>
                            <li class="contacts-block__item">
                                <svg class="bs-tooltip" title="Date of Birthday" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                {{ $user->profile->dob ?? 'N/A' }}
                            </li>
                            <li class="contacts-block__item">
                                <svg class="bs-tooltip" title="Address" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                {{ $user->address ?? 'N/A' }}
                            </li>
                           
                            <li class="contacts-block__item">
                                <svg class="bs-tooltip" title="Phone number" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                <span>{{ $user->phone}}</span>
                            </li>
                            
                            <li class="contacts-block__item">
                                <svg class="bs-tooltip" title="Identity number" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                {{ $user->identity}}
                            </li>
                            
                            <li class="contacts-block__item">
                                <svg class="bs-tooltip" title="Company Info" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-truck"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                                {{ $user->company ?? 'No Company'}}
                            </li>
                            
                            <li class="contacts-block__item">
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <div class="social-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <div class="social-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <div class="social-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>                                    
                </div>
            </div>
        </div>
    
        <div class="education layout-spacing ">
            <div class="widget-content widget-content-area">
                <h3 class="">Passed Courses</h3>
                <div class="timeline-alter">
                    
                    <div class="item-timeline">
                        <div class="t-meta-date">
                            <p class="">04 Mar 2009</p>
                        </div>
                        <div class="t-dot">
                        </div>
                        <div class="t-text">
                            <p>Course 1</p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    
    </div>
    
    <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">
    
        <div class="skills layout-spacing ">
            <div class="widget-content widget-content-area">
                <h3 class="">[{{ $user->firstname }} {{ $user->lastname }}] Courses</h3>
                
                @forelse($user->userCourses as $course)
                    @php
                        $progress = 0;
                        $current_lesson = '';
                        foreach($course->lessons as $lesson){
                            if($course->pivot->active && $course->pivot->lesson_number == $lesson->lesson_number) {
                                $progress = intval( $lesson->lesson_number/count($course->lessons)*100);
                                $current_lesson = $lesson;
                            }
                        }
                    @endphp
                    <div class="progress br-30">
                        <div class="progress-bar bg-primary" 
                            role="progressbar" 
                            style="width: {{ $progress. '%' }}" 
                            aria-valuenow="{{ $progress }}" 
                            aria-valuemin="0" 
                            aria-valuemax="100">
                            
                            <div class="progress-title">
                                
                                <span>
                                    <a href="{{ route('admin.courses.show', $course->id) }}" class="bs-tooltip text-white" title="All Lessons -  {{ $course->lessons->count() }}">{{ $course->course_name }} </a>
                                    </span>
                                <a href="{{ route('admin.lessons.show', $current_lesson->id) }}" class="bs-tooltip" title="{{ $current_lesson->lesson_name }}">
                                    <span class="badge badge-danger">{{ $current_lesson->lesson_number }}</span> </a>
                            </div>
                            
                        </div>
                    </div>
                    
                @empty
                    No courses
                @endforelse
    
            </div>
        </div>
    
        <div class="bio layout-spacing">
            <div class="widget-content widget-content-area pb-4">
                <h3 class="">Bio</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi unde porro eligendi, accusantium beatae modi odit fuga at ea! Numquam ea vero quidem quaerat? Quo mollitia dignissimos ad voluptatibus perspiciatis.</p>
            </div>                                
        </div>
    
    </div>
    
    </div>
    

@endsection

@section('page-scripts')
    
@endsection


@section('scripts')
<script>
    
</script>
@endsection