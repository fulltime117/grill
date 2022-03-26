@extends ('layouts.admin')


@section('page-title')
    <title>Admin - {{ $course-> course_name }}</title>
@endsection


@section('page-styles')
    <link href="{{asset('assets/css/users/user-profile.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/drag-and-drop/dragula/dragula.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/drag-and-drop/dragula/example.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/notification/snackbar/snackbar.min.css')}}" rel="stylesheet" type="text/css" />
    <style>
        .courses-list {
            border-left: 4px solid #8dbf42;
            padding: 7px;
            background: aliceblue;
        }
        .active-course {
            background:#8dbf42; color:#fff;
        }
    </style>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.courses') }}">Courses</a></li>
    <li class="breadcrumb-item active"><a href="javascript:void(0);"> {{$course->course_name}} </a> </li>
    <li class="breadcrumb-item " aria-current="page"><a href="javascript:void(0);"> View </a> </li>
@endsection

@section('content')

<div class="row layout-spacing">

    <!-- Content -->
    <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">
    
        <div class="user-profile layout-spacing">
            <div class="widget-content widget-content-area">
                <div class="d-flex justify-content-between">
                    <h3 class="">Course Detail View</h3>
                    <a href="{{route('admin.courses.edit', $course->id)}}" class="mt-2 edit-profile bs-tooltip" title="Edit Course"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>
                </div>
                <div class="text-center user-info">
                    <img src="{{asset($course->cover_image) }}" width="100%" alt="avatar">
                    <p class="">{{ $course->course_name }} </p>
                </div>
                <div class="user-info-list">
    
                    <div class="">
                        <ul class="contacts-block list-unstyled">
                            
                            
                            <li class="contacts-block__item">
                                <svg class="bs-tooltip" title="Course name" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                                {{$course->course_name}}
                            </li>
                            <li class="contacts-block__item">
                                <svg class="bs-tooltip" title="Course price" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                {{ $course->course_price }}
                            </li>
                            
                            <li class="contacts-block__item">
                                <svg class="bs-tooltip" title="Updated date" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                {{ $course->updated_at ?? 'N/A' }}
                            </li>
                            
                        </ul>
                    </div>                                    
                </div>
            </div>
        </div>
    
        <div class="education layout-spacing ">
            <div class="widget-content widget-content-area">
                <h3 class="">Registerd Users</h3>
                <div class="timeline-alter">
                    
                    @forelse($course->courseUsers as $user)
                        <div class="item-timeline">
                            <div class="t-meta-date">
                                <p class="">{{ $user->pivot->created_at->diffForHumans() }}</p>
                            </div>
                            <div class="t-dot">
                            </div>
                            <div class="t-text">
                                <a href="{{ route('admin.users.show', $user->id) }}">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <img class="rounded-circle" src="{{ $user->profile->getImage() }}" width="45px" alt="">
                                        <div class="pl-1">
                                            <p>{{ $user->firstname }} {{ $user->lastname }}</p>
                                            <p>{{ Str::limit($user->email, 15, '') }}</p>
                                            <p> @if($user->pivot->active) <span class="badge badge-success">active</span> 
                                                @else <span class="badge badge-warning">pending</span> @endif </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @empty
                        No courses
                    @endforelse
                    
                </div>
            </div>
        </div>
        
        <div class="education layout-spacing ">
            <div class="widget-content widget-content-area">
                <h3 class="">Courses List</h3>
                <div class="timeline-alter2">
                    
                    @forelse($courses as $c)
                        <div class="p-3 bordered">
                            <div class="t-text">
                                <a href="{{ route('admin.courses.show', $c) }}"  class="bs-tooltip" title="go to this course">
                                    <div class="d-flex align-items-center courses-list
                                        @if($course->id===$c->id) active-course  @endif">
                                        <img class="rounded-circle" src="{{ $c->cover_image }}" width="80px" alt="">
                                        <div class="pl-3">
                                            <div>Course Name: {{ $c->course_name }}</div>
                                            <div>Lesson Number {{ $c->lessons->count() }}</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @empty
                        No courses
                    @endforelse
                    
                </div>
            </div>
        </div>
    
    
    </div>
    
    <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">
    
        <div class="media-meta layout-spacing ">
            
            <div class="widget-content widget-content-area pb-4">
                <h3 class="">Media Info</h3>
                @if($course->type == 'image')
                    <div class="text-center">
                        <img src="{{ asset($course->media)}}" width="100%" style="max-width: 350px"> 
                    </div>
                @elseif($course->type == 'video')
                    <div class="text-center">
                        <video width="320" height="240" controls>
                            <source src="{{ asset($course->media) }}" type="">
                            <source src="movie.ogg" type="video/ogg">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                @else
                    <div class="iframe-container">
                        <iframe class="responsive-iframe" src="{{ $course->media }}" allow="encrypted-media"></iframe>
                    </div>
                @endif
                
                <br>
                <div class="meta-detail">
                    <ul class="contacts-block list-unstyled">
                        <li class="contacts-block__item mb-2">
                            <svg class="bs-tooltip" title="Original name" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                            @if($course->type != 'vimeo')
                                {{ $course->media_name ?? 'N/A' }}
                            @else
                                {{ $course->media }}
                            @endif
                        </li>
                        <li class="contacts-block__item mb-2">
                            <svg class="bs-tooltip" title="Uploaded date" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                            {{ $course->updated_at ?? 'N/A' }}
                        </li>
                        <li class="contacts-block__item mb-2">
                            <svg class="bs-tooltip" title="File size" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                            @if($course->type != 'vimeo')
                                {{ $course->media_size }}MB
                            @else
                                N/A
                            @endif
                            
                        </li>
                    </ul>
                </div>
            </div>                                
        </div>
    
        <div class="bio layout-spacing ">
            
            <div class="widget-content widget-content-area pb-4">   
                <h3 class="bs-tooltip d-inline-block" title="Course description">Description</h3>
                <div class="jumbotron">{!! $course->body !!}</div>
            </div>                                
        </div>
        
        <div class="Lessons-order bio layout-spacing pb-4">
            <div class="widget-content widget-content-area">
                <h3 class="bs-tooltip d-inline-block" title="Drag lessons for ordering...">Lessons</h3>
                
                <div class='parent ex-1'>
                    <div class="row">
                        <div class="col-sm-12">
                            
                            <div id='left-defaults' class='dragula'>
                                @foreach($course->lessons as $lesson)
                                    <div class="media d-md-flex d-block text-sm-left text-center lesson_order" data-id="{{ $lesson->id }}">
                                        <img src="{{ asset($lesson->lesson_image)}}" class="img-fluid ">
                                        <div class="media-body">
                                            <div class="d-xl-flex d-block justify-content-between">
                                                <div class="">
                                                    <h6 class="">{{$lesson->lesson_number}} - {{ $lesson->lesson_name }}</h6>
                                                    <p class="">{{ $lesson->created_at }}</p>
                                                </div>
                                                <div class="d-flex justify-content-between align-items-end" style="width: 60px">
                                                    <a href="{{ route('admin.lessons.edit', $lesson) }}" class="edit-profile bs-tooltip" title="Edit Lesson">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                                    </a>
                                                    <a href="{{ route('admin.lessons.show', $lesson) }}"class="bs-tooltip" title="View Lesson">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            
                            <div class="p-2 mt-2 pb-4">
                                <button class="btn btn-primary btn-md" id="save_lesson_order">Save lesson order</button>
                            </div>
                        </div>
                    </div>
                </div>
    
            </div>
        </div>
        
    
    </div>
    
</div>
    

@endsection

@section('page-scripts')
    <script src="{{asset('plugins/drag-and-drop/dragula/dragula.min.js')}}"></script>
    <script src="{{asset('plugins/drag-and-drop/dragula/custom-dragula.js')}}"></script>
    <script src="{{asset('plugins/notification/snackbar/snackbar.min.js')}}"></script>
    <script src="{{asset('assets/js/components/notification/custom-snackbar.js')}}"></script>
@endsection


@section('scripts')
<script>
    $(document).ready(function() {
        
        $('#save_lesson_order').click(function() {
        
            let lesson_orders = [];
            $('.lesson_order').each(function() {
                console.log($(this).attr('data-id'));
                lesson_orders.push($(this).attr('data-id'));
            });
            
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "{{ route('admin.lessons.order', $course) }}",
                method: 'POST',
                dataType: 'json',
                data: {lesson_orders},
                success: function(data) {
                    if(data){
                        Snackbar.show({
                            text: 'Lessons order was updated sucessfully',
                            pos: 'bottom-right'
                        });
                        setTimeout(() => {
                            location.reload();
                        }, 500);
                    }
                }
            });
        });
    
    });
</script>
@endsection