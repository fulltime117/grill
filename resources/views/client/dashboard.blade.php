@extends ('layouts.front')

@section('page-title')
    <title> Grillman - {{ $user->firstname }} </title>
@endsection


@section('page-styles')
@endsection

@php
    // dd($user);

    // $user->profile->getImage()
@endphp

@section('content')

    <div class="client-dashboard">

        @include('layouts.client-header')

        <div class="stu-db">
            <div class="container pg-inn">
                <div class="row">
                    <div class="col-md-3">
                        @include('client.includ-profile-data')
                    </div>
                    <div class="col-lg-9">
                        <div class="udb">
                            <div class="row total-manage-row">
                                <div class="col-lg-6">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                           <div class="total-contents">
                                                <div class="total-counts">
                                                    <div class="total-counts-number">{{ $purchasedCourses-> count() }}</div>
                                                    <div class="total-counts-text">Total Course</div> 
                                                </div>
                                                <div class="total-icons">
                                                    <i class='	fa fa-folder-open-o'></i>
                                                </div>
                                           </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                           <div class="total-contents">
                                                <div class="total-counts">
                                                    <div class="total-counts-number">{{ $total_expense }}</div>
                                                    <div class="total-counts-text">Total expenses</div> 
                                                </div>
                                                <div class="total-icons">
                                                    <i class='fa fa-shekel'></i>
                                                </div>
                                           </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="udb-sec udb-prof">
                                <a href="{{ route('client.profile', $user) }}">
                                    <h4><i class="fa fa-user"></i> About Me</h4>
                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed
                                        to using 'Content here, content here', making it look like readable English.</p>
                                </a>                                
                            </div>                                            --}}
                            {{-- <div class="udb-sec udb-prof">
                                <h4><i class="fa fa-leanpub"></i> Current Course</h4>
                                <ul style="text-align: right; direction:rtl; padding:0;">
                                    @forelse($purchasedCourses as $course)
                                        <li>
                                            <a href="{{ route('coursedetail', $course) }}">
                                                <h5 class="udb-title">
                                                    {{ $course->course_name }}
                                                </h5>
                                                <p>Course Price: {{ $course->course_price }}</p>
                                                <p>Lessons Number {{ $course->lessons->count() }}</p>
                                                <p>Current Lesson {{ $course->pivot->lesson_number }}</p>
                                            </a>
                                        </li>
                                    @empty
                                        <li>You have no course purchased</li>
                                    @endforelse
                                </ul>
                            </div> --}}
                            <div class="udb-sec udb-cour">
                                <h4><i class="fa fa-book"></i>  Booking Courses</h4>
                                <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text.The point of using Lorem Ipsummaking it look like readable English.</p>
                                <div class="sdb-cours">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <div class="list-mig-like-com com-mar-bot-30">
                                                    <div class="list-mig-lc-img"> 
                                                        <img src="{{asset('front-assets/images/courses/img1.png')}}" alt=""> 
                                                        <span class="home-list-pop-rat list-mi-pr">Duration:150 Days</span> 
                                                    </div>
                                                    <div class="list-mig-lc-con">
                                                        <h5>Master of Science</h5>
                                                        <p>Illinois City,</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="list-mig-like-com com-mar-bot-30">
                                                    <div class="list-mig-lc-img"> 
                                                        <img src="{{asset('front-assets/images/courses/img2.png')}}" alt=""> 
                                                        <span class="home-list-pop-rat list-mi-pr">Duration:60 Days</span> 
                                                    </div>
                                                    <div class="list-mig-lc-con">
                                                        <h5>Java Programming</h5>
                                                        <p>Illinois City,</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="list-mig-like-com com-mar-bot-30">
                                                    <div class="list-mig-lc-img"> 
                                                        <img src="{{asset('front-assets/images/courses/img3.png')}}" alt=""> 
                                                        <span class="home-list-pop-rat list-mi-pr">Duration:30 Days</span> 
                                                    </div>
                                                    <div class="list-mig-lc-con">
                                                        <h5>Aeronautical Engineering</h5>
                                                        <p>Illinois City,</p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>   
                            
                            {{-- <div class="udb-sec udb-prof">
                                <h4><i class="fa fa-user"></i> Recent Posts</h4>
                                @foreach($posts as $post)
                                    <div class="single-post mb-4">
                                        <a href="{{ route('posts.show', $post) }}">
                                            <h5>Title: {{ $post->title }}</h5>
                                            <div>Liked: {{ $post->likes->count() }}</div>
                                            <div>Comments:  {{$post->comments->count()}}</div>
                                            <div>Created Date {{ $post->created_at->diffForHumans() }}</div>
                                            <div>Updated Date {{ $post->created_at->diffForHumans() }}</div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>  --}}
                        </div>
                    </div>

                </div>                
            </div>
        </div>
    </div>

                            {{-- <div class="card mb-4">
                                <div class="card-header">
                                    <h3>All Posts</h3>
                                </div>
                                <div class="card-body">

                                    @foreach($posts as $post)

                                        <div class="single-post mb-4">
                                            <a href="{{ route('posts.show', $post) }}">
                                                <h5>Title: {{ $post->title }}</h5>
                                                <div>Liked: {{ $post->likes->count() }}</div>
                                                <div>Comments:  {{$post->comments->count()}}</div>
                                                <div>Created Date {{ $post->created_at->diffForHumans() }}</div>
                                                <div>Updated Date {{ $post->created_at->diffForHumans() }}</div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div> --}}
    
    

@endsection





@section('scripts')

<script>
   
</script>

@endsection