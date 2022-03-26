@extends ('layouts.front')

@section('content')

<div class="banner-area signup">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <h2> להתחבר </h2>
                    <ul>
                        <li>
                            <a href="{{ route('front') }}"> בית </a>
                            <i class="fa fa-angle-double-left"></i>
                            <p class="current"> להתחבר </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="signup-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 sign-form-box">
                <div class="signup-form">
                    @if(session('mailsuccess'))
                        <div class="form-group">
                            <div class="alert alert-success text-right">{{ session('mailsuccess') }}</div>
                        </div>
                    @endif
                    @if(session('wrongemail'))
                        <div class="form-group">
                            <div class="alert alert-danger text-right">{{ session('wrongemail') }}</div>
                        </div>
                    @endif
                    <h2> שכחת את הסיסמה שלך? </h2>

                    <form method="post" action="{{ route('forget') }}">
                        @csrf

                        @if(session('status'))
                            <div class="form-group">
                                <div class="alert alert-danger">{{ session('status') }}</div>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="email" class=""> כתובת דוא"ל </label>
                                    <input type="email" name="email" id="email" placeholder="example@example.com" 
                                        class="form-control" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="text-danger mt-1 text-sm">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12">                                
                                <input type="submit" class="box-btn" value=" לאפס את הסיסמה ">
                            </div>

                            <span class="already"> זוכר את הסיסמה שלך? <a href="{{ route('login') }}"> Login פה </a></span>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection