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
    <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">Contract Content Page</a></li>
    
@endsection

@section('content')

    <div class="row layout-top-spacing">
                
        <div class=" col-lg-8 offset-lg-2 layout-spacing">
            <form id="edit_contract_form" action="{{ route('admin.contract.update_content', $content->id) }}" method="post">
                @csrf
                @method('PATCH')
                
                <div class="widget-content widget-content-area mb-4 br-6">
                    <div class="d-flex justify-content-between px-4 align-items-center border-bottom">
                        <h4 class="">Edit Contract content</h4>
                    </div>
                    <div class="p-4 mb-4 mt-4">
                                
                        <div class="row mb-5 pb-5 mt-5">
                            <div class="col-lg-12">
                                <h5>Contract Content</h5>
                            </div>
                            
                            <div class="col-lg-12">
                                <div class="content-container">
                                    <div id="editor_contract" >
                                        {!! old('policy') ?? $content->content !!}
                                    </div>
                                </div>
                                <textarea class="d-none" name="contract" id="contract" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        
                        
                    </div>
                    
                    <div class="row">
                        <div class="col text-sm-left text-center">
                            <button id="update_contract" type="submit"class="btn btn-primary mt-4">Update</button>
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
    
    var contract = new Quill('#editor_contract', {
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
    
    $('#update_contract').click(function(e) {
        e.preventDefault();
        $('#contract').html(contract.root.innerHTML);
        $('#edit_contract_form').submit();
    });
    

</script>
@endsection