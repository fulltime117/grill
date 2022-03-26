@extends ('layouts.front')

@section('page-title')
    <title> CourseDeatil </title>
@endsection


@section('page-styles')
@endsection


@section('content')
<div class="banner-area class-details">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <h2>Courses</h2>
                    <ul>
                        <li>
                            <a href="{{ route('front') }}"> Home </a>
                            <i class="fa fa-angle-double-left"></i>
                            <a href="{{ route('courses') }}"> Courses</a>
                            <i class="flaticon-fast-forward"></i>
                            <p class="active">CourseDeatil</p>
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
                            <input type="text" class="form-control about-search" placeholder="Search..." />
                        </div>
                        <button type="submit"> <i class="flaticon-search"></i></button>
                    </form>
                    <div class="features-box course-meta">
                        <h3 class="title">Course Features</h3>
                        <ul>
                            <li><i class="fa fa-files-o"></i> Lectures <span>{{ $course->lessons->count() }}</span></li>
                            <li><i class="fa fa-puzzle-piece"></i> Quizzes <span>32</span></li>
                            <li><i class="fa fa-users"></i> Students <span>{{$course->courseUsers->count()}}</span></li>
                            <li><i class="fa fa-wpforms"></i> Certificate <span>Yes</span></li>
                            <li><i class="fa fa-check-square-o"></i> Assessments <span>Yes</span></li>
                        </ul>
                    </div> 

                    {{-- if "Assessments" is "No", --}}
                    
                    <div class="buy-box course-meta">
                        <div class="course-cost">${{ $course->course_price }}</div>
                        <a href="{{ route('coursebuy', $course) }}" class="course-buy-btn">Buying...</a>
                    </div>     
                    
                    <p class="visit">More Classes</p>
                    <ul class="class-list">
                        @foreach ($courses as $sideCourse)
                            <li>
                                <a href="{{ route('coursedetail', $sideCourse) }}">
                                    <i class="flaticon-next"></i>{{ $sideCourse->course_name }}</a>
                            </li>
                        @endforeach
                        
                    </ul>
                    
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="single-class">
                    <div class="class-img">
                        @if($course->type=='image')
                            <img src="{{asset($course->media)}}" alt="individual course image" />
                        @elseif($course->type=='video')
                            <div class="bg-white media-image">
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
                    </div>
                    
                    
                    
                    <div class="class-contnet">
                        <h2>{{ $course->course_name }}</h2>

                        @auth
                        <div>
                            <h3>Please fill in the blank</h3>
                            <form action="">
                                <div class="form-group">
                                    <label for=""></label>
                                </div>
                            </form>                            
                        </div>
                        @endauth
                            
                        @guest
                            @if(session('send_sms'))
                                
                            @endif
                            <form action="{{ route('storeUser') }}" method="post">
                                @csrf
                                <input type="hidden" name="course_id" value="{{ $course->id }}">
                                <div class="form-row mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="firstname">First Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('firstname') border-danger @enderror" id="firstname" name="firstname" placeholder="Please Input Firstname" value="{{ old('firstname') }}">
                                        @error('firstname')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="lastname">Last Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('lastname') border-danger @enderror" id="lastname" name="lastname" placeholder="Please Input Lastname" value="{{ old('lastname') }}">
                                        @error('lastname')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-row mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="email">Email <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('email') border-danger @enderror" id="email" name="email" placeholder="email@email.com" value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="username">Username <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('username') border-danger @enderror" id="username" name="username" placeholder="Account name" value="{{ old('username') }}">
                                        @error('username')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-row mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="phone">Phone <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control @error('phone') border-danger @enderror" id="phone" name="phone" placeholder="123456789" value="{{ old('phone') }}">
                                        @error('phone')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label for="identity">Identity <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control @error('identity') border-danger @enderror" id="identity" name="identity" placeholder="3523542" value="{{ old('identity') }}">
                                        @error('identity')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group mb-4">
                                    <label for="address">Address <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('address') border-danger @enderror" id="address" name="address" placeholder="Please Input address" value="{{ old('address') }}">
                                    @error('address')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <label for="company">Company</label>
                                    <input type="text" class="form-control @error('company') border-danger @enderror" id="company" name="company" placeholder="Please Input company" value="{{ old('company') }}">
                                    @error('company')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                
                                <div class="form-row mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="password" class="">Password <span class="text-danger">*</span></label>
                                        <input type="password" name="password" id="password" placeholder="Your password" 
                                            class="form-control" value="">
                                        @error('password')
                                            <div class="text-danger mt-1 text-sm">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label for="password_confirmation" class="">Password again <span class="text-danger">*</span></label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repeat Your password" 
                                            class="form-control" value="">
                                        @error('password_confirmation')
                                            <div class="text-danger mt-1 text-sm">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group buy-course-btn">
                                    <button type="submit" class="bg-blue-500 py-3 rounded px-4 font-medium w-full ">Buy</button>
                                </div>
                            </form>                        
                        @endguest
                    </div>
                </div>               
            </div>            
        </div>
    </div>
</section>


@endsection





@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        @if(isset($send_sms))
            setTimeout(() => {
                swal("Success send SMS", "Please check your phone for contract", "success");
            }, 2000);
        @endif
    });
</script>

@endsection