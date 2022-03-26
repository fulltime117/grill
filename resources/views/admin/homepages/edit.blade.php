@extends ('layouts.admin')


@section('page-title')
    <title>Admin - Home pages Edit</title>
@endsection


@section('page-styles')
    <link href="{{asset('assets/css/pages/contact_us.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
    <link href="{{asset('plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('plugins/editors/quill/quill.snow.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css">
    
    <style>
        .media-image {
            top: 0px;
            left: 0px;
            width: 100%;
            padding: 0px;
            text-align: center;
            min-height: 250px;
        }
        .media-image img{
            width: 340px;
        }
        
        .welcome-absolute{
            position: absolute;
            width: 80%;
            left: 10%;
            top: 20%;
            background: #f0f8ff59;
        }
    </style>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">Home page</a></li>
    
@endsection

@section('content')

    <div class="row layout-top-spacing">
        <div id="navSection" data-spy="affix" class="nav sidenav">
            <div class="sidenav-content">
                <a href="#welcome" class="active nav-link">Welcome</a>
                <a href="#course" class="nav-link">Course</a>
                <a href="#why" class="nav-link">Why Grillman</a>
                <a href="#post" class="nav-link">Post</a>
                <a href="#partner" class="nav-link">Partner</a>
                <a href="#footer" class="nav-link">Footer logo & content</a>
            </div>
        </div>
                
        <div class=" col-lg-8 offset-lg-2 layout-spacing">
            
            <div id="welcome" class="widget-content widget-content-area br-6 mb-4">
                <div class="d-flex justify-content-between px-4 align-items-center border-bottom">
                    <h4 class="">Welcome</h4>
                </div>
                <div class="mt-4">
                    <div class=" mb-4">
                        <form id="edit_aboutus_form" action="{{ route('admin.homepages.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="type" value="welcome1">
                            <div class="position-relative">
                                <label for="welcome1">
                                    <img id="welcome1_img" src="{{ asset($welcome1->image) }}" width="100%" style="cursor: pointer">
                                    <input type="file" name="image" id="welcome1" class="d-none">
                                </label>
                                <div class="welcome-absolute">
                                    <div class="form-group">
                                        <input type="text" name="title" class="form-control" value="{{ old('title') ?? $welcome1->title }}" style="text-align:center">
                                    </div>
                                    <div class="form-group">
                                        <div style="width:150px; height: 150px;" class="mx-auto">
                                            <label for="welcome1_logo" class="w-100 h-100 border bg-white" class="bs-tooltip" title="Upload logo on the first banner">
                                                <img id="welcome1_logo_img" src="{{$welcome1->body}}" width="100%" style="cursor:pointer">
                                                <input id="welcome1_logo" type="file" class="d-none">
                                                <input type="hidden" id="welcome1_b64" name="body" value="{{$welcome1->body}}">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class=" mb-4">
                        <form id="edit_aboutus_form" action="{{ route('admin.homepages.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="type" value="welcome2">
                            <div class="position-relative">
                                <label for="welcome2">
                                    <img id="welcome2_img" src="{{ asset($welcome2->image) }}" width="100%" style="cursor: pointer">
                                    <input type="file" name="image" id="welcome2" class="d-none">
                                </label>
                                <div class="welcome-absolute">
                                    <div class="form-group p-3">
                                        {{-- <label for="" class="text-info">Title</label> --}}
                                        <input type="text" name="title" class="form-control" value="{{ old('title') ?? $welcome2->title }}" style="text-align:center">
                                    </div>
                                    <div class="form-group p-3">
                                        {{-- <label for="" class="text-info">Content</label> --}}
                                        <textarea type="text" name="body" class="form-control" rows="4" style="text-align:center">{!! old('welcome2') ?? $welcome2->body !!}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div id="course" class="widget-content widget-content-area br-6 mb-4">
                <div class="d-flex justify-content-between px-4 align-items-center border-bottom">
                    <h4 class="">Course</h4>
                </div>
                <div class="mt-4">
                    <div class=" mb-4">
                        <form id="edit_aboutus_form" action="{{ route('admin.homepages.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="type" value="course">
                            <div class="">
                                <div class="form-group p-3">
                                    <label for="" class="text-info">Title</label>
                                    <input type="text" name="title" class="form-control" value="{{ old('title') ?? $course->title }}" style="text-align:center">
                                </div>
                                <div class="form-group p-3">
                                    <label for="" class="text-info">Content</label>
                                    <textarea type="text" name="body" class="form-control" rows="4" style="text-align:center">{!! old('body') ?? $course->body !!}</textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div id="why" class="widget-content widget-content-area br-6 mb-4">
                <div class="d-flex justify-content-between px-4 align-items-center border-bottom">
                    <h4 class="">Why Grillman?</h4>
                </div>
                <div class="mt-4">
                    <div class="mb-4">
                        <form id="edit_aboutus_form" action="{{ route('admin.homepages.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="type" value="why">
                            <div class="row">
                                
                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label for="" class="text-info">Title</label>
                                        <input type="text" name="title" class="form-control" value="{{ old('title') ?? $why->title }}" style="text-align:center">
                                    </div>
                                    <div class="form-group ">
                                        <label for="" class="text-info">Content</label>
                                        <textarea type="text" name="body" class="form-control" rows="4" style="text-align:center">{!! old('body') ?? $why->body !!}</textarea>
                                    </div>
                                    <div class="form-group ">
                                        <label for="" class="text-info">Items</label>
                                        <textarea type="text" name="items" class="form-control" rows="8" >{!! old('items') ?? $why->items !!}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="why_image">
                                        <img id="why_image_img" src="{{ asset($why->image) }}" width="100%" style="cursor: pointer">
                                        <input type="file" name="image" id="why_image" class="d-none">
                                    </label>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            
            <div id="post" class="widget-content widget-content-area br-6 mb-4">
                <div class="d-flex justify-content-between px-4 align-items-center border-bottom">
                    <h4 class="">Post</h4>
                </div>
                <div class="mt-4">
                    <div class=" mb-4">
                        <form id="edit_aboutus_form" action="{{ route('admin.homepages.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="type" value="post">
                            <div class="">
                                <div class="form-group p-3">
                                    <label for="" class="text-info">Title</label>
                                    <input type="text" name="title" class="form-control" value="{{ old('title') ?? $post->title }}" style="text-align:center">
                                </div>
                                <div class="form-group p-3">
                                    <label for="" class="text-info">Content</label>
                                    <textarea type="text" name="body" class="form-control" rows="4" style="text-align:center">{!! old('body') ?? $post->body !!}</textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            
            <div id="partner" class="widget-content widget-content-area br-6 mb-4">
                <div class="d-flex justify-content-between px-4 align-items-center border-bottom">
                    <h4 class="">Partner</h4>
                </div>
                <div class="mt-4">
                    <div class=" mb-4">
                        <form id="edit_aboutus_form" action="{{ route('admin.homepages.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="type" value="partner1">
                            <div class="row">
                                <div class="col-lg-4 text-center">
                                    <label for="partner1">
                                        <img id="partner1_img" src="{{ asset($partner1->image) }}" width="150px" style="cursor: pointer">
                                        <input type="file" name="image" id="partner1" class="d-none">
                                    </label>
                                    <div class="form-group mt-4">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group ">
                                        <label for="" class="text-info">Title</label>
                                        <input type="text" name="title" class="form-control" value="{{ old('title') ?? $partner1->title }}" style="text-align:center">
                                    </div>
                                    <div class="form-group ">
                                        <label for="" class="text-info">Content</label>
                                        <textarea type="text" name="body" class="form-control" rows="4" style="text-align:center">{!! old('body') ?? $partner1->body !!}</textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <div class=" mb-4">
                        <form id="edit_aboutus_form" action="{{ route('admin.homepages.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="type" value="partner2">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="form-group ">
                                        <label for="" class="text-info">Title</label>
                                        <input type="text" name="title" class="form-control" value="{{ old('title') ?? $partner2->title }}" style="text-align:center">
                                    </div>
                                    <div class="form-group ">
                                        <label for="" class="text-info">Content</label>
                                        <textarea type="text" name="body" class="form-control" rows="4" style="text-align:center">{!! old('body') ?? $partner2->body !!}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4 text-center">
                                    <label for="partner2">
                                        <img id="partner2_img" src="{{ asset($partner2->image) }}" width="150px" style="cursor: pointer">
                                        <input type="file" name="image" id="partner2" class="d-none">
                                    </label>
                                    <div class="form-group mt-4">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <div class=" mb-4">
                        <form id="edit_aboutus_form" action="{{ route('admin.homepages.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="type" value="partner3">
                            <div class="row">
                                <div class="col-lg-4 text-center">
                                    <label for="partner3">
                                        <img id="partner3_img"src="{{ asset($partner3->image) }}" width="150px" style="cursor: pointer">
                                        <input type="file" name="image" id="partner3" class="d-none">
                                    </label>
                                    <div class="form-group mt-4">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="form-group ">
                                        <label for="" class="text-info">Title</label>
                                        <input type="text" name="title" class="form-control" value="{{ old('title') ?? $partner3->title }}" style="text-align:center">
                                    </div>
                                    <div class="form-group ">
                                        <label for="" class="text-info">Content</label>
                                        <textarea type="text" name="body" class="form-control" rows="4" style="text-align:center">{!! old('body') ?? $partner3->body !!}</textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <div class=" mb-4">
                        <form id="edit_aboutus_form" action="{{ route('admin.homepages.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="type" value="partner4">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="form-group ">
                                        <label for="" class="text-info">Title</label>
                                        <input type="text" name="title" class="form-control" value="{{ old('title') ?? $partner4->title }}" style="text-align:center">
                                    </div>
                                    <div class="form-group ">
                                        <label for="" class="text-info">Content</label>
                                        <textarea type="text" name="body" class="form-control" rows="4" style="text-align:center">{!! old('body') ?? $partner4->body !!}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4 text-center">
                                    <label for="partner4">
                                        <img id="partner4_img"src="{{ asset($partner4->image) }}" width="150px" style="cursor: pointer">
                                        <input type="file" name="image" id="partner4" class="d-none">
                                    </label>
                                    <div class="form-group mt-4">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
            
            
            <div id="footer" class="widget-content widget-content-area br-6 mb-4">
                <div class="d-flex justify-content-between px-4 align-items-center border-bottom">
                    <h4 class="">Footer logo&content</h4>
                </div>
                <div class="mt-4">
                    <div class=" mb-4">
                        <form id="edit_aboutus_form" action="{{ route('admin.homepages.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="type" value="footer_logo">
                            <div class="col-lg-4 text-center">
                                <label for="footer_logo">
                                    <img id="footer_logo_img"src="{{ asset($footer_logo->image) }}" width="150px" style="cursor: pointer">
                                    <input type="file" name="image" id="footer_logo" class="d-none">
                                </label>
                                
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group ">
                                    <label for="" class="text-info">Content</label>
                                    <textarea type="text" name="body" class="form-control" rows="4" style="text-align:center">{!! old('body') ?? $footer_logo->body !!}</textarea>
                                </div>
                                
                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>  
    </div>
    
    

@endsection

@section('page-scripts')
    <script src="{{asset('plugins/file-upload/file-upload-with-preview.min.js')}}"></script>
    <script src="{{asset('plugins/editors/quill/quill.js')}}"></script>
    <script src="{{asset('assets/js/scrollspyNav.js')}}"></script>
@endsection


@section('scripts')
<script>
    
    document.getElementById("welcome1_logo").addEventListener("change", function() {
        if (this.files && this.files[0]) {
        var FR= new FileReader();
        FR.addEventListener("load", function(e) {
          document.getElementById("welcome1_logo_img").src = e.target.result;
          document.getElementById("welcome1_b64").value = e.target.result;
        }); 
        FR.readAsDataURL( this.files[0] );
      }
    });
    
    document.getElementById("welcome1").addEventListener("change", function() {
        if (this.files && this.files[0]) {
        var FR= new FileReader();
        FR.addEventListener("load", function(e) {
          document.getElementById("welcome1_img").src = e.target.result;
        }); 
        FR.readAsDataURL( this.files[0] );
      }
    });
    
    document.getElementById("welcome2").addEventListener("change", function() {
        if (this.files && this.files[0]) {
        var FR= new FileReader();
        FR.addEventListener("load", function(e) {
          document.getElementById("welcome2_img").src = e.target.result;
        }); 
        FR.readAsDataURL( this.files[0] );
      }
    });
    
    document.getElementById("why_image").addEventListener("change", function() {
        if (this.files && this.files[0]) {
        var FR= new FileReader();
        FR.addEventListener("load", function(e) {
          document.getElementById("why_image_img").src = e.target.result;
        }); 
        FR.readAsDataURL( this.files[0] );
      }
    });
    
    document.getElementById("partner1").addEventListener("change", function() {
        if (this.files && this.files[0]) {
        var FR= new FileReader();
        FR.addEventListener("load", function(e) {
          document.getElementById("partner1_img").src = e.target.result;
        }); 
        FR.readAsDataURL( this.files[0] );
      }
    });
    
    document.getElementById("partner2").addEventListener("change", function() {
        if (this.files && this.files[0]) {
        var FR= new FileReader();
        FR.addEventListener("load", function(e) {
          document.getElementById("partner2_img").src = e.target.result;
        }); 
        FR.readAsDataURL( this.files[0] );
      }
    });
    
    document.getElementById("partner3").addEventListener("change", function() {
        if (this.files && this.files[0]) {
        var FR= new FileReader();
        FR.addEventListener("load", function(e) {
          document.getElementById("partner3_img").src = e.target.result;
        }); 
        FR.readAsDataURL( this.files[0] );
      }
    });
    
    document.getElementById("partner4").addEventListener("change", function() {
        if (this.files && this.files[0]) {
        var FR= new FileReader();
        FR.addEventListener("load", function(e) {
          document.getElementById("partner4_img").src = e.target.result;
        }); 
        FR.readAsDataURL( this.files[0] );
      }
    });
    
    document.getElementById("footer_logo").addEventListener("change", function() {
        if (this.files && this.files[0]) {
        var FR= new FileReader();
        FR.addEventListener("load", function(e) {
          document.getElementById("footer_logo_img").src = e.target.result;
        }); 
        FR.readAsDataURL( this.files[0] );
      }
    });
    
    

</script>
@endsection