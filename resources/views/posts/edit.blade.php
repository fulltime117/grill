@extends ('layouts.admin')

@section('page-styles')
    <link href="{{asset('plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('plugins/editors/quill/quill.snow.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/components/custom-media_object.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/elements/avatar.css')}}" rel="stylesheet" type="text/css">
    
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

@section('content')

    <div class="row layout-top-spacing">
        <div class="container mt-5">
            <div class="row">
                @auth
                    <div class="col-md-12 bg-white p-4 mb-4">
                        <form id="add_post_form" action="{{ route('posts.update', $post) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="body">Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" id="title" placeholder="Title" 
                                    class="form-control @error('title') border-danger @enderror"  value="{{old('title') ?? $post->title }}" rows="5">
                                </textarea>
                                @error('title')
                                    <div class="text-danger mt-1 text-sm">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <div class="custom-file-container" data-upload-id="myFirstImage">
                                    <label class="text-muted">Post Image <span class="text-danger">*</span><a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image"></a></label>
                                    <label class="custom-file-container__custom-file" >
                                        <input id="image" type="file" name="image" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                        <span class="custom-file-container__custom-file__custom-file-control @error('image') border-danger @enderror"></span>
                                    </label>
                                    @error('image')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{$message}}
                                        </div>
                                    @enderror
                                    <div class="custom-file-container__image-preview position-relative">
                                        <div class="bg-white position-absolute media-image">
                                            <img src="{{ asset($post->image)}}"> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label for="body">Body <span class="text-danger">*</span></label>
                                <div id="content-container">
                                        <div id="editor-container" >
                                            {!! old('body') ?? $post->body !!}
                                        </div>
                                    </div>
                                    
                                    <textarea class="d-none" name="body" id="body" cols="30" rows="10"></textarea>
                                @error('body')
                                    <div class="text-danger mt-1 text-sm">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <button id="add_post" type="submit" class="btn btn-primary w-100">Update Post</button>
                            </div>
                        </form>
                    </div>
                @endauth
                
                
            </div>
        </div>
    </div>
    

@endsection

@section('page-scripts')

    <script src="{{asset('plugins/file-upload/file-upload-with-preview.min.js')}}"></script>
    <script src="{{asset('plugins/editors/quill/quill.js')}}"></script>
    @auth 
        <script src="{{asset('plugins/editors/quill/custom-quill.js')}}"></script>
    @endauth
@endsection

@section('scripts')
<script>
    @auth
        //First upload
        var firstUpload = new FileUploadWithPreview('myFirstImage');
        
        // store new course
        $('#add_post').click(function(e) {
            e.preventDefault();
            $('#body').html(quill.root.innerHTML);
            $('#add_post_form').submit();
        });
    @endauth
</script>
@endsection