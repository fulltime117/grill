@extends ('layouts.front')

@section('content')

    <div class="row">
        
        <div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 bg-white p-5">
            <form method="post" action="{{ route('register') }}">
                @csrf
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
                
                <div class="form-group">
                    <button type="submit" class="bg-blue-500 py-3 rounded px-4 font-medium w-full">Register</button>
                </div>

                <div class="form-group">
                    Already have an account ? <a href="{{ route('login') }}">Login </a>
                </div>
                
            </form>
        </div>
    
    </div>
    

@endsection