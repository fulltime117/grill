@extends ('layouts.admin')


@section('page-title')
    <title>Admin - New Post</title>
@endsection


@section('page-styles')
    <link href="{{asset('plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('plugins/editors/quill/quill.snow.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/components/custom-media_object.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/elements/avatar.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="javascript:void(0);"> Posts </a></li>
<li class="breadcrumb-item active"><a href="{{ route('posts.create') }}"> New Post </a> </li>
@endsection

@section('content')

<div class="row layout-spacing">

    <div class="container-fluid mt-5">
        <div class="row">
            {{--
            <div class="col-lg-4 p-4 ">
                <div class="bg-white p-4 mb-4">
                    <h5 class="">New Category</h5>
                    <form action="">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="category" class="form-control" value="{{ old('category') }}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add Category</button>
                        </div>
                    </form>
                </div>
                <div class="bg-white p-4 mb-4">
                    <div class="d-flex justify-content-between">
                        <h6 class="">Select Category</h6>
                        <div>
                            <a href=""></a>
                        </div>
                    </div>
                    <select name="category" id="" class="form-control">
                        <option value=""></option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="bg-white p-4 mb-4">
                    <h5 class="">New Tag</h5>
                    <form action="">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="tag" class="form-control" value="{{ old('tag') }}">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add Tag</button>
                        </div>
                    </form>
                </div>
                <div class="bg-white p-4 mb-4">
                    <div class="d-flex justify-content-between">
                        <h6 class="">Select Tags</h6>
                        <div>
                            <a href=""></a>
                        </div>
                    </div>
                    <select name="tag" id="" class="form-control">
                        <option value=""></option>
                        @foreach($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            --}}
            <div class="col-lg-4 p-4">
                <div class="bg-white p-4">
                    <h6>All Posts</h6>
                    <ul>
                        @foreach($posts as $post)
                        <li class="mb-2">
                            <a href="{{route('posts.show', $post)}}"><span class="text-primary font-weight-bolder"> {{ $post->title }} </span>
                            <div class="pl-3">
                                {{ $post->user->firstname }} | {{ $post->created_at->diffForHumans() }}
                            </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-8 p-4 mb-4">
                <div class="bg-white p-4">
                    <h5>Add Post</h5>
                    <form id="add_post_form" action="{{ route('posts') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group">
                            <label for="body">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" placeholder="Title" 
                                class="form-control @error('title') border-danger @enderror"  value="{{old('title')}}" rows="5">
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
                                <div class="custom-file-container__image-preview"></div>
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <label for="body">Body <span class="text-danger">*</span></label>
                            <div id="content-container">
                                    <div id="editor-container" >
                                        {!! old('body') !!}
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
                            <button id="add_post" type="submit" class="btn btn-primary w-100">Post</button>
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