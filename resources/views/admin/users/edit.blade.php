@extends ('layouts.admin')


@section('page-title')
    <title>Admin - Update {{ $user->firstname }} {{ $user->lastname }}</title>
@endsection


@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/dropify/dropify.min.css')}}">
    <link href="{{asset('assets/css/users/account-setting.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/flatpickr/flatpickr.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/flatpickr/custom-flatpickr.css')}}" rel="stylesheet" type="text/css" />
    <style>
        .flatpickr-calendar.open {
            display: inline-block;
            z-index: 1052;
        }
    </style>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.users') }}">Users</a></li>
<li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">{{ $user->firstname }} {{ $user->lastname }}</a> </li>
<li class="breadcrumb-item"><a href="javascript:void(0);">Edit</a></li>
@endsection

@section('content')

    
    <div class="account-settings-container layout-top-spacing">
        <form id="general-info" class="section general-info" action="{{ route('admin.users.update', $user) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="account-content">
                <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                            
                            <div class="info">
                                <h6 class="">General Information</h6>
                                <div class="row">
                                    <div class="col-lg-11 mx-auto">
                                        <div class="row">
                                            <div class="col-xl-2 col-lg-12 col-md-4">
                                                <div class="upload mt-4 pr-md-4">
                                                    <input type="file" id="input-file-max-fs" name="image" class="dropify" data-default-file="{{$user->profile->getImage()}}" data-max-file-size="2M" />
                                                    <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> User Picture</p>
                                                </div>
                                            </div>
                                            <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                
                                                <div class="form-row mb-4">
                                                    <div class="form-group col-md-6">
                                                        <label for="firstname">First Name <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control @error('firstname') border-danger @enderror" id="firstname" name="firstname" placeholder="Please Input Firstname" value="{{ old('firstname') ?? $user->firstname }}">
                                                        @error('firstname')
                                                            <div class="invalid-feedback" style="display: block;">
                                                                {{$message}}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="lastname">Last Name <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control @error('lastname') border-danger @enderror" id="lastname" name="lastname" placeholder="Please Input Lastname" value="{{ old('lastname') ?? $user->lastname }}">
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
                                                        <input type="text" class="form-control @error('email') border-danger @enderror" id="email" name="email" placeholder="email@email.com" value="{{ old('email') ?? $user->email }}">
                                                        @error('email')
                                                            <div class="invalid-feedback" style="display: block;">
                                                                {{$message}}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="company">Company</label>
                                                        <input type="text" class="form-control @error('company') border-danger @enderror" id="company" name="company" placeholder="Please Input company" value="{{ old('company') ?? $user->company }}">
                                                        @error('company')
                                                            <div class="invalid-feedback" style="display: block;">
                                                                {{$message}}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                                <div class="form-row mb-4">
                                                    <div class="form-group col-md-6">
                                                        <label for="phone">Phone <span class="text-danger">*</span></label>
                                                        <input type="number" class="form-control @error('phone') border-danger @enderror" id="phone" name="phone" placeholder="123456789" value="{{ old('phone') ?? $user->phone }}">
                                                        @error('phone')
                                                            <div class="invalid-feedback" style="display: block;">
                                                                {{$message}}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    
                                                    <div class="form-group col-md-6">
                                                        <label for="identity">Identity <span class="text-danger">*</span></label>
                                                        <input type="number" class="form-control @error('identity') border-danger @enderror" id="identity" name="identity" placeholder="3523542" value="{{ old('identity') ?? $user->identity }}">
                                                        @error('identity')
                                                            <div class="invalid-feedback" style="display: block;">
                                                                {{$message}}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group mb-4">
                                                    <label for="address">Address <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control @error('address') border-danger @enderror" id="address" name="address" placeholder="Please Input address" value="{{ old('address') ?? $user->address }}">
                                                    @error('address')
                                                        <div class="invalid-feedback" style="display: block;">
                                                            {{$message}}
                                                        </div>
                                                    @enderror
                                                </div>
                                                
                                                
                                                
                                                <div class="form-row mb-4">
                                                    <div class="form-group col-md-6">
                                                        <label for="password" class="">Password <span class="text-danger">*</span></label>
                                                        <input type="password" name="password" id="password" placeholder="Your password" 
                                                            class="form-control" autofocus="off">
                                                        @error('password')
                                                            <div class="text-danger mt-1 text-sm">
                                                                {{$message}}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    
                                                    <div class="form-group col-md-6">
                                                        <label for="password_confirmation" class="">Password again <span class="text-danger">*</span></label>
                                                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repeat Your password" 
                                                            class="form-control" autofocus="off">
                                                        @error('password_confirmation')
                                                            <div class="text-danger mt-1 text-sm">
                                                                {{$message}}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <label class="dob-input">Date of Birth</label>
                                                        <div class="form-group mb-0 position-relative">
                                                            <input id="dob" name="dob" value="{{ old('dob') ?? $user->profile->dob }}" class="form-control flatpickr flatpickr-input " type="text" placeholder="Select Date..">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="mt-5">
                                                    <h5 class="">Social</h5>
                                                    <div class="row">
                            
                                                        <div class="col-md-12 mx-auto">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="input-group social-linkedin mb-3">
                                                                        <div class="input-group-prepend mr-3">
                                                                            <span class="input-group-text" id="linkedin"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg></span>
                                                                        </div>
                                                                        <input type="text" name="linkedin" class="form-control" placeholder="linkedin Username" aria-label="Username" aria-describedby="linkedin" value="{{ old('linkedin') ?? $user->link->linkedin }}" class="@error('linkedin') border-danger @enderror">
                                                                        @error('linkedin')
                                                                            <div class="invalid-feedback" style="display: block;">
                                                                                {{$message}}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                            
                                                                <div class="col-md-6">
                                                                    <div class="input-group social-tweet mb-3">
                                                                        <div class="input-group-prepend mr-3">
                                                                            <span class="input-group-text" id="tweet"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg></span>
                                                                        </div>
                                                                        <input type="text" name="twitter" class="form-control" placeholder="Twitter Username" aria-label="Username" aria-describedby="tweet" value="{{ old('twitter') ?? $user->link->twitter }}" class="@error('twitter') border-danger @enderror">
                                                                        @error('twitter')
                                                                            <div class="invalid-feedback" style="display: block;">
                                                                                {{$message}}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>                                                        
                                                            </div>
                                                        </div>
                            
                                                        <div class="col-md-12 mx-auto">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="input-group social-fb mb-3">
                                                                        <div class="input-group-prepend mr-3">
                                                                            <span class="input-group-text" id="fb"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg></span>
                                                                        </div>
                                                                        <input type="text" name="facebook" class="form-control" placeholder="Facebook Username" aria-label="Username" aria-describedby="fb" value="{{ old('facebook') ?? $user->link->facebook }}" class="@error('facebook') border-danger @enderror">
                                                                        @error('facebook')
                                                                            <div class="invalid-feedback" style="display: block;">
                                                                                {{$message}}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="account-settings-footer">
                
                <div class="as-footer-container">
            
                    <button id="multiple-reset" class="btn btn-primary">Reset All</button>
                    <div class="blockui-growl-message">
                        <i class="flaticon-double-check"></i>&nbsp; Settings Saved Successfully
                    </div>
                    <button type="submit" id="multiple-messages" class="btn btn-dark">Save Changes</button>
            
                </div>
            
            </div>
        </form>
    </div>
    

@endsection

@section('page-scripts')
    <script src="{{asset('plugins/fullcalendar/flatpickr.js')}}"></script>
    <script src="{{asset('plugins/dropify/dropify.min.js')}}"></script>
    <script src="{{asset('plugins/blockui/jquery.blockUI.min.js')}}"></script>
    <script src="{{asset('plugins/tagInput/tags-input.js')}}"></script>
    <script src="{{asset('assets/js/users/account-settings.js')}}"></script>
    <script src="{{asset('plugins/flatpickr/custom-flatpickr.js')}}"></script>
@endsection


@section('scripts')
<script>
    
</script>
@endsection