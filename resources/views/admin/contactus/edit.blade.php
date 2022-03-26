@extends ('layouts.admin')


@section('page-title')
    <title>Admin - Contactus Edit</title>
@endsection


@section('page-styles')
    <link href="{{asset('assets/css/pages/contact_us.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="javascript:void(0)">Pages</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">Edit Contactus</a></li>
    
@endsection

@section('content')

    <div class="row layout-top-spacing">
                
        <div class="col-lg-10 offset-lg-1 layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="d-flex justify-content-between px-4 align-items-center border-bottom">
                    <h4 class="">Edit Contactus</h4>
                </div>
                
                    <form action="{{ route('admin.contactus.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="id" value="{{$contactus->id}}">
                        <div class="row contact-form">
                        
                        <div class="col-lg-12 text-center mt-4 mb-5">
                            <h5>Banner Image</h5>
                            <label for="banner">
                                <img id="banner_img"src="{{ asset($contactus->banner) }}" width="100%" style="cursor: pointer">
                                <input type="file" name="banner" id="banner" class="d-none">
                            </label>
                        </div>
                        
                        
                        <div class="col-lg-6">
                            <h5>Side Image</h5>
                            <label for="image">
                                <img id="image_img"src="{{ asset($contactus->image) }}" width="100%" style="cursor: pointer">
                                <input type="file" name="image" id="image" class="d-none">
                            </label>
                        </div>
                        
                        
                        <div class="col-lg-6 ">
                            <div class="row mb-4">
                                <div class="col-sm-12 col-12 input-fields">
                                    <label for="">Banner Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Title" value="{{ old('title') ?? $contactus->title }}">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-sm-12 col-12 input-fields">
                                    <label for="">Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') ?? $contactus->email }}">
                                </div>
                                @error('email')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="row mb-4">
                                <div class="col-sm-12 col-12 input-fields">
                                    <label for="">Phone</label>
                                    <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{ old('phone') ?? $contactus->phone }}">
                                </div>
                                @error('phone')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="row mb-4">
                                <div class="col-sm-12 col-12 input-fields mb-4 mb-sm-0">
                                    <label for="">Address</label>
                                    <input type="text" name="address" class="form-control" placeholder="Address" value="{{ old('address') ?? $contactus->address }}">
                                </div>
                                @error('address')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="row mb-4">
                                <div class="col-sm-12 col-12 input-fields mb-4 mb-sm-0">
                                    <label for="">business</label>
                                    <input type="text" name="business" class="form-control" placeholder="Business" value="{{ old('business') ?? $contactus->business }}">
                                </div>
                                @error('business')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="row mb-4">
                                <div class="col-sm-12 col-12 input-fields mb-4 mb-sm-0">
                                    <label for="P.O.">P.O.</label>
                                    <input type="text" name="po" class="form-control" placeholder="P.O" value="{{ old('po') ?? $contactus->po }}">
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="col-lg-12 text-sm-left text-center">
                            <button type="submit"class="btn btn-primary mt-4">Update</button>
                        </div>
                        
                        </div>
                    </form>
                    
                </div>
            </div>
       
        
    </div>
    
    

@endsection

@section('page-scripts')
    
@endsection


@section('scripts')
<script>
    
    document.getElementById("banner").addEventListener("change", function() {
        if (this.files && this.files[0]) {
        var FR= new FileReader();
        FR.addEventListener("load", function(e) {
          document.getElementById("banner_img").src = e.target.result;
        }); 
        FR.readAsDataURL( this.files[0] );
      }
    });
    
    document.getElementById("image").addEventListener("change", function() {
        if (this.files && this.files[0]) {
        var FR= new FileReader();
        FR.addEventListener("load", function(e) {
          document.getElementById("image_img").src = e.target.result;
        }); 
        FR.readAsDataURL( this.files[0] );
      }
    });

</script>
@endsection