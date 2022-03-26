@extends ('layouts.admin')


@section('page-title')
    <title>Admin - Static Pages</title>
@endsection


@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/custom_dt_html5.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/dt-global_style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/apps/todolist.css')}}">
    <link href="{{asset('assets/css/components/custom-modal.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/editors/quill/quill.snow.css')}}" rel="stylesheet" type="text/css">
    
    
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
    <li class="breadcrumb-item active"><a href="{{route('footer.index')}}">Static Pages</a></li>
    <li class="breadcrumb-item"><a href="javascript:void(0);"> Add </a></li>
@endsection

@section('content')

    <div class="row layout-top-spacing">
                
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="d-flex justify-content-between px-4 align-items-center border-bottom">
                    <h4 class="">Add New Page to site</h4>
                    <a href="{{route('footer.index')}}" class="bs-tooltip" title="View all static pages"> 
                        Page List <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0066ff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg> 
                    </a>
                </div>
                <form id="add_page_form" action="{{route('footer.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4 mt-5 text-center">
                        <h5>Banner Image</h5>
                        <label for="banner">
                            <img id="banner_img"src="{{asset('front-assets/images/classes-details.png')}}" width="100%" style="cursor: pointer">
                            <input type="file" name="banner" id="banner" class="d-none">
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="">Banner Title</label>
                        <input class="form-control" type="text " name="banner_title">
                    </div>
                    
                    <div class="row mb-5">
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label for="">Page Name</label>        
                                <input class="form-control" type="text " name="page_name">
                                @error('page_name')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label for="">Slug for link</label>        
                                <input class="form-control" type="text " name="slug">    
                                @error('slug')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <label for="">Position</label>
                            <div class="">
                                <input type="checkbox" name="is_top" id="is_top">    
                                <label for="is_top" class="mb-0"> Header </label>        
                            </div>
                            <div class="">
                                <input type="checkbox" name="is_footer" id="is_footer">     
                                <label for="is_footer" class="mb-0"> Footer </label>        
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-5">
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label for="">Meta Title</label>        
                                <input class="form-control" type="text " name="meta_title">    
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="">Meta Description </label>        
                                <input class="form-control" type="text " name="meta_description">    
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="form-group">
                                <label for="">Meta Keyword </label>        
                                <input class="form-control" type="text " name="meta_keyword">    
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group text-center">
                        <input type="text" class="form-control" name="title" placeholder="Page Title">
                    </div>
                    <div class="content-container">
                        <div id="body-snow" >
                            {!! old('body') !!}
                        </div>
                    </div>
                    <textarea class="d-none" name="body" id="body" cols="30" rows="10"></textarea>
                    
                    <div class="form-group mt-3">
                        <button type="submit" id="add_page" class="btn btn-primary">Save New Page</button>
                    </div> 
                </form>
            </div>
        </div>
        
    </div>

@endsection

@section('page-scripts')
    <script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
    <script src="{{asset('plugins/sweetalerts/custom-sweetalert.js')}}"></script>
    <script src="{{asset('plugins/editors/quill/quill.js')}}"></script>
@endsection


@section('scripts')
<script>
    var quill_body = new Quill('#body-snow', {
      modules: {
        toolbar: [
          ['bold', 'italic', 'underline', 'strike'],
          ['image', 'code-block', 'blockquote'],
          [{ 'list': 'ordered'}, { 'list': 'bullet' }],
          [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
          [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
          // [{ 'direction': 'rtl' }], 
          
          [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
          [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
          [{ 'font': [] }],
          [{ 'align': [] }],
          ['clean']          
        ]
      },
      placeholder: 'Write here...',
      theme: 'snow'  // or 'bubble'
    });    
    
    document.getElementById("banner").addEventListener("change", function() {
        if (this.files && this.files[0]) {
        var FR= new FileReader();
        FR.addEventListener("load", function(e) {
          document.getElementById("banner_img").src = e.target.result;
        }); 
        FR.readAsDataURL( this.files[0] );
      }
    });
    
    $('#add_page').click(function(e) {
        e.preventDefault();
        $('#body').html(quill_body.root.innerHTML);
        $('#add_page_form').submit();
    });
    
    
</script>
@endsection