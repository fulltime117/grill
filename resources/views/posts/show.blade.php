@extends ('layouts.front')

@section('page-styles')
    <link href="{{asset('assets/css/components/custom-media_object.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/elements/avatar.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('content')

    <div class="banner-area news-details">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-content">
                        <h2>{{ $post->title }}</h2>
                        <ul>
                            <li>
                                <a href="{{ route('front') }}"> בית </a>
                                <i class="fa fa-angle-double-left"></i>
                                <a href="{{ route('posts') }}"> חֲדָשׁוֹת </a>
                                <i class="fa fa-angle-double-left"></i>
                                <p class="active"> חדשות בודדות </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="single-news-area">
        <div class="container">
            <div class="row">                 
                <div class="col-lg-8 col-md-7" style="margin-left: auto; margin-right: auto;">
                    <div class="single-post-content">                       
                        <div class="single-slider">
                            <div class="news-img">
                                <img src="{{ $post->image }}" alt="event" />
                            </div>
                            <div class="dlab-post-meta">
                                <ul class="post-meta">
                                    <li>{{ $post->user->firstname }}</li>
                                    <li style="border-right: 1px solid #dedede"> {{ $post->created_at->diffForHumans() }} </li>
                                </ul>
                            </div>
                            <div class="content">
                                <h2 style="direction: rtl; text-align: right;">{{ $post->title }}</h2>
                                <div style="text-align: right; padding-right: 0; direction: rtl;">
                                    {!! $post->body !!}
                                </div>
                            </div>
                            
                            <div class="like mt-4">
                                <div class="d-flex justify-content-between">
                                    {{-- <div  class="d-flex">
                                        @auth
                                            @if(!$post->likedBy(auth()->user()))
                                                <form action="{{ route('posts.like', $post) }}" method="post">
                                                    @csrf
                                                    <button type="submit" class="badge badge-success border-0">Like</button>
                                                </form>
                                            @else
                                                <form action="{{ route('posts.dislike', $post) }}" method="post">
                                                    @csrf
                                                    <button type="submit" class="badge badge-danger border-0 ml-3">Unlike</button>
                                                </form>
                                            @endif
                                            <span class="ml-3">{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
                                        @endauth    
                                    </div> --}}
                                    
                                    @can('delete', $post)
                                        <div>
                                            <a href="{{ route('posts.edit', $post) }}" class="px-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                            </a>
                                            <a href="javascript:void(0);" class="px-4"> 
                                                <form action="{{ route('posts.destroy', $post) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm ml-2">Delete</button>                                    
                                                </form>
                                            </a>
                                        </div>
                                    @endcan
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
{{-- 

                    @auth
                        <example-component :current-post="{{$post}}" :auth-user="{{ auth()->user() }}" user-img="{{ auth()->user()->profile->getImage() }}"></example-component>
                    @endauth
                    @guest
                        <div class="row bg-white px-2 py-5;">
                            <div class="col-md-12" style="direction: rtl;">
                                <h4>Comments</h4>
                                You can't leave comment for this post.
                                Please <a href="{{ route('login') }}"> Login </a> to leave comment.
                            </div>
                        </div>
                    @endguest --}}
                </div>              
            </div>
        </div>
    </section>




    

    <div class="container">
       
        
    </div>

@endsection

@section('page-scripts')

@endsection

@section('scripts')
<script>
</script>

@endsection