@extends ('layouts.front')



@section('content')

<div class="client-dashboard">
    
    @include('layouts.client-header')
    <div class="account-settings-container">
        <form id="general-info" class="section general-info" action="{{ route('client.users.update', $user) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="account-content">
                
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h4 style="text-align: right"> מידע כללי </h4>
                        <hr>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-row mb-2">
                                    <div class="form-group col-md-6">
                                        <label for="input-file-max-fs" class="upload-label">
                                            <img id="imageResult" src=" " style="width: 100px; height:100px">    
                                            <span class="image-uploade-glyph"><i class="fa fa-camera"></i></span>
                                        </label>
                                        <input type="file" id="input-file-max-fs" name="image" class="dropify d-none" data-default-file="{{$user->profile->getImage()}}" data-max-file-size="2M" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-lg-12">
                                <div class="form-row mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="firstname"> שם פרטי <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('firstname') border-danger @enderror" id="firstname" name="firstname" placeholder=" אנא הזן שם פרטי " value="{{ old('firstname') ?? $user->firstname }}">
                                        @error('firstname')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="lastname"> שם משפחה <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('lastname') border-danger @enderror" id="lastname" name="lastname" placeholder=" אנא הזן שם משפחה " value="{{ old('lastname') ?? $user->lastname }}">
                                        @error('lastname')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="email"> אימייל <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('email') border-danger @enderror" id="email" name="email" placeholder=" email@email.com " value="{{ old('email') ?? $user->email }}">
                                        @error('email')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="phone"> טלפון <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control @error('phone') border-danger @enderror" id="phone" name="phone" placeholder=" 123456789 " value="{{ old('phone') ?? $user->phone }}">
                                        @error('phone')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div> 
                            </div>                                   
                        </div>                                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-row mb-4">                                                    
                                    <div class="form-group col-md-6">
                                        <label for="company"> חֶברָה <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('company') border-danger @enderror" id="company" name="company" placeholder=" אנא הזן חברה " value="{{ old('company') ?? $user->company }}">
                                        @error('company')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="identity"> זהות <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control @error('identity') border-danger @enderror" id="identity" name="identity" placeholder="3523542" value="{{ old('identity') ?? $user->identity }}">
                                        @error('identity')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="address"> כתובת <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('address') border-danger @enderror" id="address" name="address" placeholder=" אנא הזן כתובת " value="{{ old('address') ?? $user->address }}">
                                    @error('address')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                
                                
                                <div class="form-row mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="password" class=""> סיסמה <span class="text-danger">*</span></label>
                                        <input type="password" name="password" id="password" placeholder=" הסיסמה שלך " 
                                            class="form-control" autofocus="off">
                                        @error('password')
                                            <div class="text-danger mt-1 text-sm">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label for="password_confirmation" class=""> סיסמא בשנית <span class="text-danger">*</span></label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder=" חזור על הסיסמה שלך " 
                                            class="form-control" autofocus="off">
                                        @error('password_confirmation')
                                            <div class="text-danger mt-1 text-sm">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row mb-4">
                                    <div class="form-group col-md-6">
                                        <label class="dob-input"> תאריך לידה </label>  
                                        <input id="dob" name="dob" value="{{ old('dob') ?? $user->profile->dob }}" class="form-control flatpickr flatpickr-input " type="text" placeholder=" בחר תאריך.. ">                                                      
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h5 style="text-align: right"> חֶברָתִי </h5>
                        <div class="row">
                            <div class="col-md-12 mx-auto">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group social-linkedin mb-3">
                                            <div class="input-group-prepend ">
                                                <span class="input-group-text" id="linkedin"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg></span>
                                            </div>
                                            <input type="text" name="linkedin" class="form-control"  aria-label="Username" aria-describedby="linkedin" value="{{ old('linkedin') ?? $user->link->linkedin }}" class="@error('linkedin') border-danger @enderror">
                                            @error('linkedin')
                                                <div class="invalid-feedback" style="display: block;">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-group social-tweet mb-3">
                                            <div class="input-group-prepend ">
                                                <span class="input-group-text" id="tweet"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg></span>
                                            </div>
                                            <input type="text" name="twitter" class="form-control"  aria-label="Username" aria-describedby="tweet" value="{{ old('twitter') ?? $user->link->twitter }}" class="@error('twitter') border-danger @enderror">
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
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="fb"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg></span>
                                            </div>
                                            <input type="text" name="facebook" class="form-control" aria-label="Username" aria-describedby="fb" value="{{ old('facebook') ?? $user->link->facebook }}" class="@error('facebook') border-danger @enderror">
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
                        
                        <div class="row">
                            <div class="col-md-6 text-right">
                                <button type="submit" id="multiple-messages" class="btn btn-dark mb-3 edit-profile-btn"> שמור שינויים </button>
                            </div> 
                            {{-- <div class="col-md-6">
                                <button id="multiple-reset" class="btn btn-primary">Reset All</button>
                                <div class="blockui-growl-message">
                                    <i class="flaticon-double-check"></i>&nbsp; Settings Saved Successfully
                                </div>
                            </div> --}}
                        </div>
                            
                    </div>
                </div>
                            
            </div>
        </form>
    </div>

</div>   
@endsection

@section('scripts')
    <script>
        var input = document.getElementById( 'input-file-max-fs' );

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#imageResult')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $('#input-file-max-fs').on('change', function () {
                readURL(input);
            });
        });
    </script>
@endsection
