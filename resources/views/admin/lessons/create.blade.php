@extends ('layouts.admin')


@section('page-title')
    <title>Admin - Add Lesson</title>
@endsection


@section('page-styles')
    <link href="{{asset('plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('plugins/editors/quill/quill.snow.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('plugins/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/elements/alert.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.lessons') }}">Lessons </a> </li>
    <li class="breadcrumb-item active"><a href="javascript:void(0);"> Add </a> </li>
@endsection

@section('content')

<form id="add_lesson_form" 
    enctype="multipart/form-data">
    @csrf
    
    <div class="row layout-top-spacing">
        
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            
            <div class="form-row mb-4">
            
                <div class="col-md-6">
                    
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>Lesson Info</h4>
                                </div>                                                                        
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="course_id">Select Course <span class="text-danger">*</span></label>
                                    <select class="form-control" id="course" name="course_id" required>
                                        <option value=""></option>
                                        @foreach($courses as $course) 
                                            <option value="{{ $course->id }}">{{ $course->course_name }}</option>    
                                        @endforeach
                                    </select>
                                    
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="lesson_name">Lesson Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="lesson_name" name="lesson_name" placeholder="Please Input lesson_name" value="" required>
                                    
                                </div>
                            </div>
                            
                            <div id="select_vimeo" class="form-group  allmedia">
                                <label for="vimeo">Vimeo URL</label>
                                <input type="text" id="vimeo" name="media" class="form-control" placeholder="https://vimeo.com" value="" required>
                                
                            </div>
                            
                            <div class="form-group">
                                <div class="custom-file-container" data-upload-id="myFirstImage2">
                                    <label class="text-muted">Lesson Image <span class="text-danger">*</span><a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                    <label class="custom-file-container__custom-file" >
                                        <input id="lesson_image" type="file" name="lesson_image" class="custom-file-container__custom-file__custom-file-input" accept="image/*" required>
                                        <span class="custom-file-container__custom-file__custom-file-control"></span>
                                    </label>
                                    <div class="custom-file-container__image-preview"></div>
                                </div>
                            </div>
                            
                            
                                                           
                                                           
                        </div>
                    </div>
                    
                </div>
                
                <div class="col-md-6">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4> Description </h4>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div id="content-container">
                                <div id="editor-container" >
                                    
                                </div>
                            </div>
                            
                            <textarea class="d-none" name="body" id="body" cols="30" rows="30"></textarea>
                            
                            <!-- <div class="col-md-12 mt-4">
                                <button type="submit" id="add_lesson" class="btn btn-primary mt-3">Add Lesson</button>
                            </div> -->
                        </div>
                    </div>
                    
                    
                    
                    
                </div>
                
               
                
            </div>
            
        </div>
    </div>
    
    
    <div class="row layout-spacing">
        <div class="col-xl-12 layout-top-spacing">
            <div class="widget-content widget-content-area">
                <h3 class="">Edit Questions</h3>
                
                <div class='parent ex-1'>
                    <div class="row">
                        <div class="col-sm-12">
                            
                            
                            @for ($i = 0; $i < 5; $i++)
                                <div class="card pt-4 px-2 mb-4 border-0 q{{$i+1}}">
                                
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text text-secondary">Question #{{$i+1}}</span>
                                        </div>
                                        <input type="text" class="form-control q" name="q[{{$i}}]" required>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <div class="col-lg-12">
                                            <label for="">Possiblities</label>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon5">1</span>
                                                </div>
                                                <input type="text" class="form-control opt1" name="opt1[{{$i}}]" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon5">2</span>
                                                </div>
                                                <input type="text" class="form-control opt2" name="opt2[{{$i}}]" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon5">3</span>
                                                </div>
                                                <input type="text" class="form-control opt3" name="opt3[{{$i}}]" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-3">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon5">4</span>
                                                </div>
                                                <input type="text" class="form-control opt4" name="opt4[{{$i}}]" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Correct Answer Number</span>
                                                </div>
                                                <input type="number" class="form-control answer_number" name="answer_number[{{$i}}]" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Order Number</span>
                                                </div>
                                                <input type="number" class="form-control question_number" name="question_number[{{$i}}]" value="{{$i + 1}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            
                            
                            
                        
                            <div class="p-2 mt-2">
                                <button type="submit" class="btn btn-secondary btn-md" id="save_questions">
                                    <div id="ajax_loader" class="spinner-grow text-white mr-2 align-self-center loader-sm d-none" style="width: 16px; height: 16px;"></div>
                                Save questions</button>
                            </div>
                            
                            <div class="alert custom-alert-1 mb-4 d-none" role="alert" style="background: #8dbf42; border-color: #50d115">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                </button>
                                <div class="media">
                                    <div class="alert-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                                    </div>
                                    <div class="media-body">
                                        <div class="alert-text">
                                            <strong>Success! </strong><span> Saved Lessons and Questions.</span> 
                                        </div>
                                        <div class="alert-btn">
                                            <button type="button" id="add_new_lesson" class="btn btn-default btn-dismiss">Add New Lesson</button>
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
    
</form>

@endsection

@section('page-scripts')
    <script src="{{asset('plugins/file-upload/file-upload-with-preview.min.js')}}"></script>
    <script src="{{asset('plugins/editors/quill/quill.js')}}"></script>
    <script src="{{asset('plugins/editors/quill/custom-quill.js')}}"></script>
    <script src="{{asset('plugins/bootstrap-select/bootstrap-select.min.js')}}"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/jquery-ajax-unobtrusive@3.2.6/dist/jquery.unobtrusive-ajax.min.js"></script>    
@endsection


@section('scripts')
<script>
    //First upload
    // var firstUpload = new FileUploadWithPreview('myFirstImage');     
    var firstUpload2 = new FileUploadWithPreview('myFirstImage2');
    
    // store new course
    $('#save_questions').click(function(e) {
        $('#body').html(quill.root.innerHTML);
        $("#add_lesson_form").attr({
            "data-ajax-url": "{{ route('admin.lessons.store_with_questions') }}",
            "data-ajax-method": "post",
            "data-ajax": true,
            "data-ajax-complete": "saveSuccess",
        });
        $('#ajax_loader').removeClass('d-none');
    });
    
    function saveSuccess(data) {
        if(data.status == '200') {
            $('.custom-alert-1').removeClass('d-none');
            $('#save_questions').addClass('d-none');
        }
        console.log(data.status);
    }
    
    $('#add_new_lesson').click(function(){
        window.location.reload();
    })
    
    
</script>
@endsection