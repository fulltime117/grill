@extends ('layouts.admin')


@section('page-title')
    <title>Admin - Other pages Edit</title>
@endsection


@section('page-styles')
    <link href="{{asset('assets/css/pages/contact_us.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}">
    <link href="{{asset('plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('plugins/editors/quill/quill.snow.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">Other Pages</a></li>
    
@endsection

@section('content')

    <div class="row layout-top-spacing">
                
        <div class=" col-lg-8 offset-lg-2 layout-spacing">
            <form id="edit_aboutus_form" action="{{ route('admin.otherpages.update') }}" method="post">
                @csrf
                @method('PATCH')
                
                <div class="widget-content widget-content-area mb-4 br-6">
                    <div class="d-flex justify-content-between px-4 align-items-center border-bottom">
                        <h4 class="">Edit Other Pages</h4>
                        <span data-toggle="modal" data-target="#addCoupanModal" href="{{route('admin.aboutus.show')}}" class="bs-tooltip" title="Show Page"> 
                            Show <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0066ff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg> 
                        </span>
                    </div>
                    <div class="p-4 mb-4 mt-4">
                                
                        <div class="row mb-5 pb-5 mt-5">
                            <div class="col-lg-12">
                                <h5>Privacy Policy</h5>
                            </div>
                            
                            <div class="col-lg-12">
                                <div class="content-container">
                                    <div id="editor-policy" >
                                        {!! old('policy') ?? $other->policy !!}
                                    </div>
                                </div>
                                <textarea class="d-none" name="policy" id="policy" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        
                        
                        <div class="row mb-5 pt-5 pb-5 mt-5">
                            <div class="col-lg-12">
                                <h5>Product Supply</h5>
                            </div>
                            
                            <div class="col-lg-12">
                                <div class="content-container">
                                    <div id="editor-product" >
                                        {!! old('product_supply') ?? $other->product_supply !!}
                                    </div>
                                </div>
                                <textarea class="d-none" name="product_supply" id="product" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        
                        <div class="row mb-5 pt-5 pb-5 mt-5">
                            <div class="col-lg-12">
                                <h5>Cancellation and Disclosure Policy</h5>
                            </div>
                            
                            <div class="col-lg-12">
                                <div class="content-container">
                                    <div id="editor-cancellation" >
                                        {!! old('cancellation') ?? $other->cancellation !!}
                                    </div>
                                </div>
                                <textarea class="d-none" name="cancellation" id="cancellation" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        
                        <div class="row mt-5">
                            <div class="col-lg-12">
                                <h5>Business Responsibility</h5>
                            </div>
                            
                            <div class="col-lg-12">
                                <div class="content-container">
                                    <div id="editor-business" >
                                        {!! old('business_responsibility') ?? $other->business_responsibility !!}
                                    </div>
                                </div>
                                <textarea class="d-none" name="business_responsibility" id="business" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="row">
                        <div class="col text-sm-left text-center">
                            <button id="update_aboutus" type="submit"class="btn btn-primary mt-4">Update</button>
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
    
    var quill_policy = new Quill('#editor-policy', {
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
    
    var quill_product = new Quill('#editor-product', {
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
    
    var quill_cancellation = new Quill('#editor-cancellation', {
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
    
    var quill_business = new Quill('#editor-business', {
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
    
    
    
    
    $('#update_aboutus').click(function(e) {
        e.preventDefault();
        $('#policy').html(quill_policy.root.innerHTML);
        $('#product').html(quill_product.root.innerHTML);
        $('#cancellation').html(quill_cancellation.root.innerHTML);
        $('#business').html(quill_business.root.innerHTML);
        $('#edit_aboutus_form').submit();
    });
    
    

</script>
@endsection