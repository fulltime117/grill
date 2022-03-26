@extends ('layouts.admin')


@section('page-title')
    <title>Admin - Add Lesson</title>
@endsection


@section('page-styles')
    <link href="{{asset('plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('plugins/editors/quill/quill.snow.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('plugins/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/elements/alert.css')}}" rel="stylesheet" type="text/css">
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
            max-width: 320px;
        }
    </style>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.lessons') }}">Lessons </a> </li>
    <li class="breadcrumb-item active" ><a href="javascript:void(0);"> {{ $lesson->lesson_name }} </a> </li>
    <li class="breadcrumb-item"><a href="{{ route('admin.lessons') }}"> Edit </a> </li>
@endsection

@section('content')

    <div class="row layout-top-spacing">
        
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            
            <form id="add_lesson_form" action="{{ route('admin.lessons.update', $lesson) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
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
                                <div class="form-group">
                                    <label for="lesson_name">Lesson Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('lesson_name') border-danger @enderror" id="lesson_name" name="lesson_name" placeholder="Please Input lesson_name" value="{{ old('lesson_name') ?? $lesson->lesson_name }}">
                                    @error('lesson_name')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <div class="custom-file-container position-relative" data-upload-id="myFirstImage2">
                                        <label class="text-muted">Lesson Image <span class="text-danger">*</span><a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                        <label class="custom-file-container__custom-file" >
                                            <input id="lesson_image" type="file" name="lesson_image" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                            <span class="custom-file-container__custom-file__custom-file-control @error('lesson_image') border-danger @enderror"></span>
                                        </label>
                                        @error('lesson_image')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{$message}}
                                            </div>
                                        @enderror
                                        <div class="custom-file-container__image-preview position-relative">
                                            <div class="bg-white position-absolute media-image">
                                                <img src="{{ asset($lesson->lesson_image)}}"> 
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="course_id">SelCourse <span class="text-danger">*</span></label>
                                    <select class="form-control selectpicker @error('course_id') border-danger @enderror" id="course" name="course_id">
                                        @foreach($courses as $course) 
                                            <option @if($lesson->course_id == $course->id) selected @endif value="{{ $course->id }}">{{ $course->course_name }}</option>    
                                        @endforeach
                                    </select>
                                    @error('course_id')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                                               
                                                               
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="col-md-6">
                        
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Media Info</h4>
                                    </div>                                                                        
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                
                                <div class="form-group">
                                    <label for="type">Lesson Type <span class="text-danger">*</span></label>
                                    <select name="type" id="type" class="form-control selectpicker @error('type') border-danger @enderror" value="old('type')">
                                        <option @if( old('type') == 'image' || $lesson->type == 'image' ) selected  @endif data-content="<span class='badge badge-primary'>Image</span>">image</option>
                                        <option @if( old('type') == 'video' || $lesson->type == 'video' ) selected  @endif data-content="<span class='badge badge-dark'>Video</span>">video</option>
                                        <option @if( old('type') == 'image' || $lesson->type == 'vimeo' ) selected  @endif data-content="<span class='badge badge-danger'>Vimeo</span>">vimeo</option>
                                    </select>
                                    @error('type')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                
                                <div id="select_media" class="form-group allmedia
                                    @if( old('type') == 'vimeo' || $lesson->type == 'vimeo' ) d-none @endif
                                ">
                                    <div class="custom-file-container position-relative" data-upload-id="myFirstImage">
                                        <label class="text-muted">Media <span class="text-danger">*</span><a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                        <label class="custom-file-container__custom-file" >
                                            <input id="media" type="file" name="media" class="custom-file-container__custom-file__custom-file-input" accept="image/video/*">
                                            <span class="custom-file-container__custom-file__custom-file-control @error('media') border-danger @enderror"></span>
                                        </label>
                                        @error('media')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{$message}}
                                            </div>
                                        @enderror
                                        <div class="custom-file-container__image-preview position-relative">
                                        
                                            @if($lesson->type == 'image')
                                                <div class="bg-white position-absolute media-image">
                                                    <img src="{{ asset($lesson->media)}}"> 
                                                </div>
                                            @endif
                                            @if($lesson->type == 'video')
                                                <div class="bg-white position-absolute media-image">
                                                    <video width="320" height="240" controls>
                                                        <source src="{{ asset($lesson->media) }}" type="">
                                                        <source src="movie.ogg" type="video/ogg">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                </div>
                                            @endif
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                <div id="select_vimeo" class=" allmedia
                                    @if( old('type') != 'vimeo' && $lesson->type != 'vimeo' ) d-none @endif
                                    ">
                                    
                                    <div class="form-group">
                                        <label for="vimeo">Vimeo URL</label>
                                        <input type="text" id="vimeo" name="vimeo" class="form-control @error('vimeo') border-danger @enderror"" placeholder="https://vimeo.com" @if( $lesson->type == 'vimeo') value="{{ old('vimeo') ?? $lesson->media }}" @endif>
                                        @error('vimeo')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{$message}}
                                        </div>
                                        @enderror
                                        
                                    </div>
                                    @if($lesson->type == 'vimeo' && $lesson->media)
                                        <div class="iframe-container">
                                            <iframe class="responsive-iframe" src="{{ $lesson->media }}" allow="encrypted-media"></iframe>
                                        </div>
                                    @endif
                                </div>
                                
                            </div>
                        </div>
                        
                        
                    </div>
                    
                    <div class="col-lg-12 mt-4">
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
                                        {!! old('body') ?? $lesson->body !!}
                                    </div>
                                </div>
                                
                                <textarea class="d-none" name="body" id="body" cols="30" rows="10"></textarea>
                                
                                <div class="col-md-12 mt-4">
                                    <button type="submit" id="add_lesson" class="btn btn-primary mt-3">Update Lesson</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                </div>
            </form>
               
        </div>
        
        
        <div class="col-lg-12 mt-4 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div id="accordionWithout-spacing" class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Edit Questions</h4>
                        </div>
                    </div>
                </div> 
                <div class="widget-content widget-content-area icon-accordion-content">
    
                    <p class="mb-3">Edit <code>Questions</code> for this <code>Lesson</code> </p>
                    
                    <form id="add_question_form" data-url="{{route('admin.lessons.update_with_questions', $lesson)}}">
                        @csrf
                        @method('PATCH')
                        @foreach ($lesson->questions as $i=>$question)
                            <div class="card pt-4 px-2 mb-4 border-0 q{{$i+1}}">
                            
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-secondary">Question #{{$i+1}}</span>
                                    </div>
                                    <input type="text" class="form-control q" name="q[{{$i}}]" value="{{$question->q}}" required>
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
                                            <input type="text" class="form-control opt1" name="opt1[{{$i}}]" value="{{$question->opt1}}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon5">2</span>
                                            </div>
                                            <input type="text" class="form-control opt2" name="opt2[{{$i}}]" value="{{$question->opt2}}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon5">3</span>
                                            </div>
                                            <input type="text" class="form-control opt3" name="opt3[{{$i}}]" value="{{$question->opt3}}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mb-3">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon5">4</span>
                                            </div>
                                            <input type="text" class="form-control opt4" name="opt4[{{$i}}]" value="{{$question->opt4}}" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Correct Answer Number</span>
                                            </div>
                                            <input type="number" class="form-control answer_number" name="answer_number[{{$i}}]" value="{{$question->answer_number}}" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Order Number</span>
                                            </div>
                                            <input type="number" class="form-control question_number" name="question_number[{{$i}}]" value="{{$question->question_number}}">
                                        </div>
                                    </div>
                                    
                                    <input type="hidden" name="question_id[{{$i}}]" value="{{$question->id}}"/>
                                </div>
                            </div>
                        @endforeach
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
                                        <strong>Success! </strong><span> Updated Questions Successfully.</span> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </form>
                    
                    
                </div>
            </div>
        </div>
        
    </div>

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
    var firstUpload = new FileUploadWithPreview('myFirstImage');
    var firstUpload2 = new FileUploadWithPreview('myFirstImage2');
    
    // store new course
    $('#add_lesson').click(function(e) {
        e.preventDefault();
        $('#body').html(quill.root.innerHTML);
        $('#add_lesson_form').submit();
    });
    
    // change upload/url
    $('#type').change(function() {
        $('.allmedia').addClass('d-none');
        if($(this).val() == 'image' || $(this).val() == 'video') {
            // image|video, fileupload needed
            if($(this).val() == 'image') {
                // image
                $('#select_media').removeClass('d-none');
                $('#vimeo').val('');
            }else {
                $('#select_media').removeClass('d-none');
                $('#vimeo').val('');
            }
        }else {
            // vimeo|url
            $('#select_vimeo').removeClass('d-none');
        } 
    });
    
    $('#save_questions').click(function(e) {
        $("#add_question_form").attr({
            "data-ajax-url": $('#add_question_form').attr('data-url'),
            "data-ajax-method": "post",
            "data-ajax": true,
            "data-ajax-complete": "saveSuccess",
        });
        $('#ajax_loader').removeClass('d-none');
    });
    
    function saveSuccess(data) {
        if(data.status == '200') {
            $('.custom-alert-1').removeClass('d-none');
            $('#ajax_loader').addClass('d-none');
            setTimeout(() => {
                $('.custom-alert-1').addClass('d-none');
            }, 10*1000);
        }
    }
    
    
    
</script>
@endsection