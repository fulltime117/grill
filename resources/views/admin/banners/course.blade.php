@extends ('layouts.admin')


@section('page-title')
    <title>Admin - Course Banner</title>
@endsection


@section('page-styles')
    <link href="{{asset('assets/css/pages/contact_us.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">Course Page</a></li>
@endsection

@section('content')

    <div class="row layout-top-spacing">
                
        <div class=" col-lg-10 offset-lg-1  layout-spacing">
            <form id="edit_aboutus_form" action="{{ route('admin.banners.course.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <input type="hidden" name="id" value="{{$course_page->id}}">
                <div class="widget-content widget-content-area br-6 mb-4">
                    <div class="d-flex justify-content-between px-4 align-items-center border-bottom">
                        <h4 class="">Edit Course Banner</h4>
                    </div>
                    <div class="p-4 mb-4 mt-4">
                        
                        <!--  top image section     -->
                        <div class="row mb-4">

                            <div class="col-lg-12 text-center mt-4 mb-5">
                                <h5>Banner image</h5>
                                <label for="banner">
                                    <img id="banner_img"src="{{ asset($course_page->banner) }}" width="100%" style="cursor: pointer">
                                    <input type="file" name="banner" id="banner" class="d-none">
                                </label>
                            </div>
                            
                            
                            <div class="col-lg-12">
                                <div class="form-group">                                
                                    <label for="">Banner Title</label>
                                    <input type="text" name="title" class="form-control" id="banner_title" value="{{$course_page->title}}"/>
                                </div>
                            </div>
                            
                        </div>
                                
                        
                        <div class="row">
                            <div class="col text-sm-left text-center">
                                <button id="update_course" type="submit"class="btn btn-primary mt-4">Update</button>
                            </div>
                        </div>     
                        
                    </div>
                    
                </div>
                
            </form>
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

</script>
@endsection