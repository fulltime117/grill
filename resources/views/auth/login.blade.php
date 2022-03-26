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
                    <h2> ברוך שובך! </h2>

                    <form method="post" action="{{ route('login') }}">
                        @csrf

                        @if(session('status'))
                            <div class="form-group">
                                <div class="alert alert-danger">{{ session('status') }}</div>
                            </div>
                        @endif
                        
                        @if(session('ip_over'))
                            <div class="form-group">
                                <div class="alert alert-danger">{{ session('ip_over') }}</div>
                            </div>
                        @endif
                        
                        @if(session('blocked'))
                            <div class="form-group">
                                <div class="alert alert-danger">{{ session('blocked') }}</div>
                            </div>
                        @endif
                        
                        @if(session('ordersuccess'))
                            <div class="form-group">
                                <div class="alert alert-success">{{ session('ordersuccess') }}</div>
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    {{-- <label for="email" class="">Email</label> --}}
                                    <input type="email" name="email" id="email" placeholder=" האימייל שלך " 
                                        class="form-control" value="{{ old('email') }}" autocomplete="off">
                                    @error('email')
                                        <div class="text-danger mt-1 text-sm">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group position-relative">
                                    {{-- <label for="password" class="">Password</label> --}}
                                    <input type="password" name="password" id="password" placeholder=" הסיסמה שלך " 
                                        class="form-control" value="">
                                    <a href="javascript:void(0)" class="position-absolute eye">
                                        <i class="fa fa-eye text-black-50"></i>
                                        <i class="fa fa-eye-slash text-black-50" style="display: none"></i>
                                    </a>
                                    @error('password')
                                        <div class="text-danger mt-1 text-sm">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="">
                                    <input type="checkbox" name="remember" id="remember" class="form-checkbox">
                                    <label for="remember"> זכור אותי </label>
                                </div>
                            </div>

                            <div class="col-lg-12">                                
                                <input type="submit" class="box-btn" value=" להתחבר ">
                            </div>

                            <span class="already"><a href="{{ route('forget') }}"> שכחת את הסיסמא ?  </a></span>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
    <script>
    
        $('.eye .fa-eye').click(function(){
            $('.eye .fa-eye').toggle();
            $('.eye .fa-eye-slash').toggle();
            $(this).closest('div').find('input').attr('type', 'text');
        });
        
        $('.eye .fa-eye-slash').click(function(){
            $('.eye .fa-eye').toggle();
            $('.eye .fa-eye-slash').toggle();
            $(this).closest('div').find('input').attr('type', 'password');
        });
        
    </script>
@endsection