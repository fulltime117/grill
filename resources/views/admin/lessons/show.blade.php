@extends ('layouts.admin')


@section('page-title')
    <title>Admin - {{ Str::limit($lesson->coure_name, 10, '...') }}</title>
@endsection


@section('page-styles')
    <link href="{{asset('assets/css/users/user-profile.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/drag-and-drop/dragula/example.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/notification/snackbar/snackbar.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/components/tabs-accordian/custom-accordions.css')}}" rel="stylesheet" type="text/css" />
    
    <style>
        .courses-list {
            border-left: 4px solid #8dbf42;
            padding: 7px;
            background: aliceblue;
        }
        .active-lesson {
            background: #5f9fd6;
            color: white;
        }
    </style>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.lessons') }}">Lessons </a> </li>
<li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);"> {{ $lesson->lesson_name }} </a> </li>
<li class="breadcrumb-item"><a href="javascript:void(0);"> View </a> </li>
@endsection

@section('content')

<div class="row layout-spacing">

    <!-- Content -->
    <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">
    
        <div class="user-profile layout-spacing">
            <div class="widget-content widget-content-area">
                <div class="d-flex justify-content-between">
                    <h3 class="">Lesson Detail View</h3>
                    <a href="{{route('admin.lessons.edit', $lesson->id)}}" class="mt-2 edit-profile bs-tooltip" title="Edit Lesson"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>
                </div>
                <div class="text-center user-info">
                    <img src="{{asset( $lesson->lesson_image) }}" width="200px">
                    <p class="">{{ $lesson->lesson_name }} </p>
                </div>
                {{--
                <div class="user-info-list">
    
                    <div class="">
                        <ul class="contacts-block list-unstyled">
                            
                            <li class="contacts-block__item bs-tooltip" title="Course Name">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
                                {{$lesson->course->course_name}}
                            </li>
                            <li class="contacts-block__item bs-tooltip" title="Lesson Order Number">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-hash"><line x1="4" y1="9" x2="20" y2="9"></line><line x1="4" y1="15" x2="20" y2="15"></line><line x1="10" y1="3" x2="8" y2="21"></line><line x1="16" y1="3" x2="14" y2="21"></line></svg>
                                {{ $lesson->lesson_number }} Lesson Number : 
                            </li>
                            
                        </ul>
                    </div>                                    
                </div>
                --}}
            </div>
        </div>
    
        <div class="education layout-spacing ">
            
            <div class="widget-content widget-content-area">
                <h3 class="">Passed Users for lesson</h3>
                @if($lesson->lessonUsers)
                    @foreach($lesson->lessonUsers as $user)
                    <div class="timeline-alter">
                        <div class="item-timeline">
                            <div class="t-meta-date">
                                <p class="">{{ $user->created_at->diffForHumans() }}</p>
                            </div>
                            <div class="t-dot">
                            </div>
                            <div class="t-text d-flex align-items-center">
                                <p><img class="rounded-circle mr-2" src="{{ asset($user->profile->getImage()) }}" width="40px"></p>
                                <div>
                                    <p>{{ $user->firstname }} {{ $user->lastname }}</p>
                                    passed lesson #{{$lesson->lesson_number}}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
        
        <div class="education layout-spacing ">
            <div class="widget-content widget-content-area">
                <h3 class="">Lessons List for Course</h3>
                <div class="timeline-alter2">
                    
                    @forelse($lessons as $le)
                        <div class="p-3 bordered">
                            <div class="t-text">
                                <a href="{{ route('admin.lessons.show', $le) }}">
                                    <div class="d-flex align-items-center courses-list @if($le->id===$lesson->id) active-lesson @endif">
                                        <img class="rounded-circle" src="{{ $le->lesson_image }}" width="80px" alt="">
                                        <div class="pl-3">
                                            <div>Lesson Name: {{ $le->lesson_name }}</div>
                                            <div>Lesson Number: #{{ $le->lesson_number }}</div>
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
    
        <div class="bio media-meta layout-spacing ">
            
            <div class="widget-content widget-content-area pb-4">
                <h3 class="">Media Info</h3>
                @if($lesson->type == 'image')
                    <div class="text-center">
                        <img src="{{ asset($lesson->media)}}" style="max-width: 350px;"> 
                    </div>
                @elseif($lesson->type == 'video')
                    <div class="text-center">
                        <video width="320" height="240" controls>
                            <source src="{{ asset($lesson->media) }}" type="">
                            <source src="movie.ogg" type="video/ogg">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                @else
                    <div class="iframe-container">
                        <iframe class="responsive-iframe" src="{{ $lesson->media }}" allow="encrypted-media"></iframe>
                    </div>
                @endif
                
                <br>
                <div class="meta-detail">
                    <ul class="contacts-block list-unstyled">
                        <li class="contacts-block__item mb-2 bs-tooltip px-2" title="Original name">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-image"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                            @if($lesson->type != 'vimeo')
                                {{ $lesson->media_name ?? 'N/A' }}
                            @else
                                {{ $lesson->media }}
                            @endif
                        </li>
                        <li class="contacts-block__item mb-2 bs-tooltip px-2" title="Updated date">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                            {{ $lesson->updated_at ?? 'N/A' }}
                            
                        </li>
                        <li class="contacts-block__item mb-2 bs-tooltip px-2" title="File size">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-info"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                            @if($lesson->type != 'vimeo')
                                {{ $lesson->media_size }}MB
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
                <h3 class="">Description</h3>
                <div class="jumbotron">{!! $lesson->body !!}</div>
            </div>                                
        </div>
        
        
        
    
    </div>
    
</div>
        
<div class="row layout-spacing">
    <div class="col-xl-8 col-lg-6 col-md-7 col-sm-12 layout-top-spacing">
        <div class="widget-content widget-content-area">
            <h3 class="">View Questions</h3>
            
            <div class='parent ex-1'>
                <div class="row">
                    <div class="col-sm-12">
                        
                        
                        
                        <div id="withoutSpacing" class="no-outer-spacing">
                            @foreach($lesson->questions as $question)
                                <div class="card no-outer-spacing">
                                    <div class="card-header" id="headingTwo2">
                                        <section class="mb-0 mt-0">
                                            <div role="menu" class="collapsed" data-toggle="collapse" data-target="#withoutSpacingAccordionTwo" aria-expanded="false" aria-controls="withoutSpacingAccordionTwo">
                                                {{$question->q}} #{{$loop->iteration}}  <div class="icons"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></div>
                                            </div>
                                        </section>
                                    </div>
                                    <div id="withoutSpacingAccordionTwo" class="collapse" aria-labelledby="headingTwo2" data-parent="#withoutSpacing">
                                        <div class="card-body">
                                            <ul class="ml-4">
                                                <li 
                                                    class="@if($question->answer_number==1) text-black @endif">{{$question->opt1}}</li>
                                                <li 
                                                    class="@if($question->answer_number==2) text-black @endif">{{$question->opt2}}</li>
                                                <li 
                                                    class="@if($question->answer_number==3) text-black @endif">{{$question->opt3}}</li>
                                                <li 
                                                    class="@if($question->answer_number==4) text-black @endif">{{$question->opt4}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                    </div>
                </div>
            </div>
        </div> 
    </div>
    
    
    <div class="col-xl-4 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">
        <div class="widget-content widget-content-area">
            <h3 class="">Questions Order</h3>
            
            <div class='parent ex-1'>
                <div class="row">
                    <div class="col-sm-12">
                        
                        <div id='left-defaults' class='dragula'>
                            @forelse($lesson->questions as $question)
                                <div class="media d-md-flex d-block text-sm-left text-center question_order" data-id="{{ $question->id }}">
                                    
                                    <div class="media-body">
                                        <div class="d-xl-flex d-block justify-content-between">
                                            <div class="">
                                                <h6 class="bs-tooltip" title="Question">{{ $question->q }} - #{{$question->question_number}}</h6>
                                                <p class="bs-tooltip" title="Updated at">{{ $question->created_at }}</p>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p>No Questions</p>
                            @endforelse
                        </div>
                        
                        <div class="p-2 mt-2">
                            <button class="btn btn-primary btn-md" id="save_question_orders">Save question order</button>
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
    <script src="{{asset('assets/js/components/ui-accordions.js')}}"></script>
    
@endsection


@section('scripts')
<script>
    $(document).ready(function() {
        
        $('#save_question_orders').click(function() {
        
            let question_orders = [];
            $('.question_order').each(function() {
                console.log($(this).attr('data-id'));
                question_orders.push($(this).attr('data-id'));
            });
            
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "{{ route('admin.questions.order', $lesson) }}",
                method: 'POST',
                dataType: 'json',
                data: {question_orders},
                success: function(data) {
                    if(data){
                        Snackbar.show({
                            text: 'Questions order was updated sucessfully',
                            pos: 'bottom-right'
                        });
                        
                        setTimeout(() => {
                            window.location.reload();
                        }, 500);

                    }
                }
            });
        });
    
    });
</script>
@endsection