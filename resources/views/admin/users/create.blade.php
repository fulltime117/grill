@extends ('layouts.admin')


@section('page-title')
    <title>Admin - Add User</title>
@endsection


@section('page-styles')
    <link href="{{asset('assets/css/elements/alert.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/elements/infobox.css')}}" rel="stylesheet" type="text/css" />
    <style>
        .select-course .active {
            border: 2px solid #1288ebc9;
        }
    </style>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.users') }}">Users</a></li>
<li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">Add User</a> </li>
@endsection

@section('content')

    <div class="row layout-top-spacing">
        <div class="col-lg-4">
            
            <div class="widget box bg-white p-4">
                <h5>Select Coruse</h5>
                <div class="mt-3 d-flex flex-wrap">
                    @foreach ($courses as $course)
                        <div class="p-2 mb-4" style="width:150px; height: 100px">
                            <a href="javascript:void(0)" class="select-course" >
                                <img src="{{ $course->cover_image }}" 
                                    class="bs-tooltip image @if( old('courses') == $course->id ) active @endif"
                                    title="Lesson: {{ $course->lessons->count() }}"
                                    width="100%" data-id="{{ $course->id }}">
                                <div>{{ $course->course_name }}</div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        
        <div class="col-lg-8  layout-spacing">
            <div class="widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Add User</h4>
                        </div>                                                                        
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <form id="add-temp" action="{{ route('admin.users.store_temp') }}" method="post">
                        @csrf
                        <input type="hidden" id="selected-courses" name="course_id">
                        <div class="form-row mb-2">
                            <div class="form-group col-md-6">
                                <label for="firstname">First Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="firstname" name="firstname" >
                                <div class="error-message text-danger" ></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastname">Last Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="lastname" name="lastname">
                                <div class="error-message text-danger" ></div>
                            </div>
                        </div>
                        
                        <div class="form-row mb-2">
                            <div class="form-group col-md-6">
                                <label for="email">Email <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="email" name="email">
                                <div class="error-message text-danger" ></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone">Phone <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="phone" name="phone">
                                <div class="error-message text-danger" ></div>
                            </div>
                        </div>
                        
                        <div class="form-row mb-2">
                            <div class="form-group col-md-6">
                                <label for="identity">Identity <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="identity" name="identity" maxlength="10" minlength="9">
                                <div class="error-message text-danger" ></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="company">Company <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="company" name="company">
                                <div class="error-message text-danger" ></div>
                            </div>
                        </div>
                        
                        <div class="form-group mb-2">
                            <label for="address">Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="address" name="address">
                            <div class="error-message text-danger" ></div>
                        </div>
                        
                        <div class="form-row mb-2">
                            <div class="form-group col-md-6">
                                <label for="password" class=""> 
                                    <span class="bs-tooltip" title="Password must contain at least one number, one specific character and both uppercase and lowercase letters, at least 6 lengths more">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                                    </span>
                                    Password
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="password" name="password" id="password" 
                                    class="form-control" value="">
                                <div class="error-message text-danger" ></div>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="password_confirmation" class="">Password again <span class="text-danger">*</span></label>
                                <input type="password" name="password_confirmation" id="password_confirmation"  
                                    class="form-control" value="">
                                <div class="error-message text-danger" ></div>
                            </div>
                        </div>
                        
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <button type="submit" class="btn btn-primary">Generate url for Contract</button>
                            </div>
                            <input type="text" id="contract-url" class="form-control" placeholder="Please click button for generating url for this user" aria-label="" 
                                 value="" >
                        </div>
                    </form>
                    
                    <div class="mt-4">
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <div>
                                <button id="send-sms" class="btn btn-success" 
                                    data-url="{{ route('admin.send_sms') }}"
                                    data-token="">
                                        <svg class="d-none" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader spin mr-2"><line x1="12" y1="2" x2="12" y2="6"></line><line x1="12" y1="18" x2="12" y2="22"></line><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line><line x1="2" y1="12" x2="6" y2="12"></line><line x1="18" y1="12" x2="22" y2="12"></line><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line></svg>
                                        Send SMS
                                    </button>
                            </div>
                            <div class="alert alert-icon-left alert-light-success sms-success d-none" data-url="{{ route('admin.check_sign')}}" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" data-dismiss="alert" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                                <strong>Success!</strong> SMS was sent to user. Please wait until he sign.
                            </div>
                            <div class="alert alert-icon-left alert-light-warning sms-fail d-none" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" data-dismiss="alert" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                                <strong>Warning!</strong> SMS was failure. Please check phone number
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="infobox-3 d-none">
                            <div class="info-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                            </div>
                            <h5 class="info-heading text-primary">Signed!!!</h5>
                            <p class="info-text">Client successfully signed for contract.</p>
                            <p class="info-text">Please register his info into DB by clicking Save. Send email for giving to him access credentian</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <button id="save-user" type="button" class="btn btn-success" data-url="{{ route('admin.save_user') }}">Save client 
                                    <span class="d-none save-user-check ml-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                                    </span>
                                </button>
                                
                                {{-- consider it
                                <a id="email-register"
                                    class="info-link btn btn-primary d-flex align-items-center justify-content-between" 
                                    href="{{ route('admin.emails.register', 'registered_user') }}" > 
                                    <span class="mr-2">Send email</span> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                </a>
                                --}}
                            </div>
                        </div>
                    </div>
                    
                    
                    <input type="hidden" id="remove_token_url" data-url="{{route('front.remove_token')}}">
                </div>
            </div>
        </div>
        
    </div>
    

@endsection

@section('page-scripts')

<script src="{{asset('plugins/input-mask/jquery.inputmask.bundle.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap-maxlength/bootstrap-maxlength.js')}}"></script>
<script src="{{asset('assets/js/custom/admin/users/custom-create.js')}}"></script>
@endsection


@section('scripts')
<script>
    $(document).ready(function() {
        
        
        $('#identity').maxlength({
            placement:"top"
        });
        
    })
    
    
    $('.select-course').click(function() {
        const img = $(this).find('.image');
        $('.image').removeClass('active');
        img.addClass('active');
        $('#selected-courses').val(img.attr('data-id'));
    });
</script>
@endsection