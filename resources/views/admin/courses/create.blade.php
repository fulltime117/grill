@extends ('layouts.admin')


@section('page-title')
    <title>Admin - Add Course</title>
@endsection


@section('page-styles')
    <link href="{{asset('plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('plugins/editors/quill/quill.snow.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('plugins/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.courses') }}">Courses</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);"> Add </a> </li>
@endsection

@section('content')

    <div class="row layout-top-spacing">
        
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            
            <form id="add_course_form" action="{{ route('admin.courses.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-row mb-4">
                
                    <div class="col-md-6 mb-4">
                        
                        <div class="statbox widget box box-shadow mb-4">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4>Meta Info</h4>
                                    </div>                                                                        
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <div class="form-group">
                                    <label for="course_name">Course Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('course_name') border-danger @enderror" id="course_name" name="course_name" placeholder="Please Input course_name" value="{{ old('course_name') }}">
                                    @error('course_name')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="overview">Course Overview <span class="text-danger">*</span></label>
                                    <textarea type="number" class="form-control @error('overview') border-danger @enderror" id="overview" name="overview" placeholder="Please Input overview" >{{ old('overview') }}</textarea>
                                    @error('overview')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label for="course_price">Course Price <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control @error('course_price') border-danger @enderror" id="course_price" name="course_price" placeholder="Please Input course_price" value="{{ old('course_price') }}">
                                    @error('course_price')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div id="cover_image" class="statbox widget box box-shadow">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="">
                                        <h4>Upload <span id="media-type">Cover Image</span> </h4>
                                    </div>      
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <div class="custom-file-container" data-upload-id="myFirstImage">
                                    <label>Remove file<a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                    <label class="custom-file-container__custom-file" >
                                        <input id="cover_image" type="file" name="cover_image" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                        <span class="custom-file-container__custom-file__custom-file-control @error('cover_image') border-danger @enderror"></span>
                                    </label>
                                    @error('cover_image')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{$message}}
                                        </div>
                                    @enderror
                                    <div class="custom-file-container__image-preview"></div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                    
                    
                    <div id="fuSingleFile" class="col-md-6 mb-4">
                        
                        <div class="statbox widget box box-shadow mb-4">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="">
                                        <h4>Media Type <span class="text-danger">*</span> </h4>
                                    </div>      
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <div class="form-group">
                                    <select name="type" id="type" class="form-control selectpicker @error('type') border-danger @enderror" value="old('type')">
                                        <option @if(old('type') == 'image' ) selected @endif data-content="<span class='badge badge-primary'>Image</span>">image</option>
                                        <option @if(old('type') == 'video' ) selected @endif  data-content="<span class='badge badge-dark'>Video</span>">video</option>
                                        <option @if(old('type') == 'vimeo' ) selected @endif  data-content="<span class='badge badge-danger'>Vimeo</span>">vimeo</option>
                                    </select>
                                    @error('type')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        
                        <div id="select_media" class="statbox widget box box-shadow mb-4 allmedia
                            @if( old('type') == 'vimeo' ) d-none @endif">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="">
                                        <h4>Upload <span id="media-type">Media</span> </h4>
                                    </div>      
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                <div class="custom-file-container" data-upload-id="myFirstImage2">
                                    <label id="media-size">Remove file<a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                    <label class="custom-file-container__custom-file" >
                                        <input id="media" type="file" name="media" class="custom-file-container__custom-file__custom-file-input" accept="media/*">
                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                        <span class="custom-file-container__custom-file__custom-file-control @error('media') border-danger @enderror"></span>
                                    </label>
                                    @error('media')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{$message}}
                                        </div>
                                    @enderror
                                    <div class="custom-file-container__image-preview"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div id="select_vimeo" class="statbox widget box box-shadow mb-4 allmedia
                            @if( old('type') != 'vimeo' ) d-none @endif">
                            <div class="widget-header">
                                <div class="row">
                                    <div class="">
                                        <h4 id="media-type" class="text-danger">Input Vimeo URL</h4>
                                    </div>      
                                </div>
                            </div>
                            <div class="widget-content widget-content-area">
                                
                                
                                <div class="form-group">
                                    <label for="vimeo">URL</label>
                                    <input type="text" id="vimeo" name="vimeo" class="form-control @error('vimeo') border-danger @enderror"" placeholder="https://vimeo.com" value="{{ old('vimeo') }}">
                                        @error('vimeo')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                
                                
                            </div>
                        </div>
                        
                        <div class="statbox widget box box-shadow mb-4">
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
                                        {!! old('body') !!}
                                    </div>
                                </div>
                                
                                <textarea class="d-none" name="body" id="body" cols="30" rows="10"></textarea>
                                
                                
                                <div class="col-md-12 mt-4">
                                    <button type="submit" id="add_course" class="btn btn-primary mt-3">Add Course</button>
                                </div>
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
    <script src="{{asset('plugins/editors/quill/custom-quill.js')}}"></script>
    <script src="{{asset('plugins/bootstrap-select/bootstrap-select.min.js')}}"></script>
@endsection


@section('scripts')
<script>
    //First upload
    var firstUpload = new FileUploadWithPreview('myFirstImage');
    var firstUpload2 = new FileUploadWithPreview('myFirstImage2');
    
    // store new course
    $('#add_course').click(function(e) {
        e.preventDefault();
        $('#body').html(quill.root.innerHTML);
        $('#add_course_form').submit();
    });
    
    // change upload/url
    $('#type').change(function() {
        $('.allmedia').addClass('d-none')
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
    
    
</script>
@endsection