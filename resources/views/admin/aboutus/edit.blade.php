@extends ('layouts.admin')


@section('page-title')
    <title>Admin - Aboutus Edit</title>
@endsection


@section('page-styles')
    <link href="{{asset('assets/css/pages/contact_us.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
    <link href="{{asset('plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('plugins/editors/quill/quill.snow.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
    <li class="breadcrumb-item active"><a href="javascript:void(0);">About Us Page</a></li>
    
@endsection

@section('content')

    <div class="row layout-top-spacing">
                
        <div class=" col-lg-10 offset-lg-1  layout-spacing">
            <form id="edit_aboutus_form" action="{{ route('admin.aboutus.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <input type="hidden" name="id" value="{{$aboutus->id}}">
                <div class="widget-content widget-content-area br-6 mb-4">
                    <div class="d-flex justify-content-between px-4 align-items-center border-bottom">
                        <h4 class="">Edit Aboutus</h4>
                    </div>
                    <div class="p-4 mb-4 mt-4">
                        
                        <!--  top image section     -->
                        <div class="row mb-4">

                            <div class="col-lg-12 text-center mt-4 mb-5">
                                <h5>Banner image</h5>
                                <label for="banner">
                                    <img id="banner_img"src="{{ asset($aboutus->banner) }}" width="100%" style="cursor: pointer">
                                    <input type="file" name="banner" id="banner" class="d-none">
                                </label>
                            </div>
                            
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Contact Form</label>
                                    <div class="border" style="height: 600px">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-8">
                                <div class="form-group">                                
                                    <label for="">Banner Title</label>
                                    <input type="text" name="banner_title" class="form-control" id="banner_title" value="{{$aboutus->banner_title}}"/>
                                </div>
                                
                                <div class="form-group">
                                    <label for="image">
                                        <img id="image_img" src="{{ asset($aboutus->image) }}" width="100%" style="cursor: pointer">
                                        <input type="file" name="image" id="image" class="d-none">
                                    </label>
                                </div>
                                
                                <div class="form-group">                                
                                    <label for="">Title</label>
                                    <input type="text" name="title" class="form-control" id="title" value="{{$aboutus->title}}"/>
                                </div>
    
                                <div class="form-group">
                                    <label for="">Why Us?</label>
                                    <textarea class="form-control" name="body" id="body" cols="30" rows="10">{{$aboutus->body}}</textarea>
                                </div>
                            </div>
                            
                        </div>
                                
                        
                        <div class="row">
                            <div class="col text-sm-left text-center">
                                <button id="update_aboutus" type="submit"class="btn btn-primary mt-4">Update</button>
                            </div>
                        </div>     
                        
                    </div>
                    
                </div>
                
            </form>
        </div>  
    </div>
    
    

@endsection

@section('page-scripts')
    <script src="{{asset('plugins/file-upload/file-upload-with-preview.min.js')}}"></script>
    <script src="{{asset('plugins/editors/quill/quill.js')}}"></script>
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