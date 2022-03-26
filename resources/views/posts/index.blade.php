@extends ('layouts.front')

@php
    $bannerImg =  asset('front-assets/images/banners/post.png');   
@endphp

@section('page-styles')
    <link href="{{asset('plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('plugins/editors/quill/quill.snow.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/components/custom-media_object.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/elements/avatar.css')}}" rel="stylesheet" type="text/css">
    <style>
        #app .banner-area{
            background-image: url( "{{ asset($banners->banner) }}" ) !important;
            background-position: bottom;            
        }

        .page-item a, .page-item span{
            width: 120px;
            display: flex;
            justify-content: center;
            color: #a79344; 
            outline: none !important;           
        }

        .page-item a:hover{
            background:  #a79344;
            color: white;
        }
    </style>
@endsection

@section('content')

<div class="banner-area news-bg">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <h2> {{ $banners->title }} </h2>
                    <ul>
                        <li>
                            <a href="{{ route('front') }}"> בית </a>
                            <i class="fa fa-angle-double-left"></i>
                            <p class="active"> כתבות ועדכונים </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="all-post-page">
    <div class="container">
        <div class="row">
            @foreach ($posts as $post)
            <x-post :post="$post"/>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-3 mb-5">
            {!! $posts->links() !!}
        </div>
    </div>
</section>   




    {{-- <div class="container">
        <div class="row">
            @auth
                <div class="col-md-12 bg-white p-4 mb-4">
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
            @endauth
            
            <div class="col-md-12 bg-white">
                @if($posts)
                    @foreach($posts as $post)
                        <x-post :post="$post"/>
                    @endforeach
                    
                    <div class="d-flex justify-content-center">
                        {!! $posts->links() !!}
                    </div>
                @else
                    <p>No posts</p>
                @endif
            </div>
        </div>
    </div> --}}
    

@endsection

@section('page-scripts')

    {{-- <script src="{{asset('plugins/file-upload/file-upload-with-preview.min.js')}}"></script>
    <script src="{{asset('plugins/editors/quill/quill.js')}}"></script>
    @auth 
        <script src="{{asset('plugins/editors/quill/custom-quill.js')}}"></script>
    @endauth --}}
@endsection

@section('scripts')
<script>
    // @auth
    //     //First upload
    //     var firstUpload = new FileUploadWithPreview('myFirstImage');
        
    //     // store new course
    //     $('#add_post').click(function(e) {
    //         e.preventDefault();
    //         $('#body').html(quill.root.innerHTML);
    //         $('#add_post_form').submit();
    //     });
    // @endauth
</script>
@endsection