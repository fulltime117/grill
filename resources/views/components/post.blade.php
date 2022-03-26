@props(['post'=>$post])

{{-- <div class="media mb-5">
    <a href="{{ route('posts.show', $post) }}"><img class=" rounded" src="{{ $post->image }}" style="width: 190px!important; height: auto!important"></a>
    <div class="media-body ">
        <h4 class="media-heading">{{ $post->title }}</h4>
        <div class="p-2 mb-4">{!! Str::limit($post->body, 200, '...') !!}</div>
        <div class="media-notation d-flex align-items-center justify-content-between">
            <div class="d-flex">
                <a href="javascript:void(0);" class="px-2">{{ $post->created_at->diffForHumans() }} </a>
                <a href="{{route('posts.ofUser', $post->user)}}" class="px-2"> Written By {{ $post->user->firstname }} </a>
            </div>
            
            
            
            @can('delete', $post)
                <div class="d-flex">
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
            
            @auth
            <div class="d-flex">
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
            </div>
            @endauth    
                
            <span class="ml-3">{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
            
            
        </div>
    </div>
</div> --}}

<div class="col-lg-4 col-md-6">
    <div class="single-news">
        <div class="news-img">
            <a href="{{ route('posts.show', $post) }}">
                <img src="{{ $post->image }}" alt="events" />
            </a>
        </div>
        <div class="content-wrapper">
            <a href="{{ route('posts.show', $post) }}">
                <h2>{{ $post->title }}</h2>
            </a>
            <p class="calender" style="display: flex; justify-content:space-between;">
                <span><i class="flaticon-calendar"></i> {{ $post->created_at->diffForHumans() }}</span>
                <span>{{ $post->user->firstname }}<i class="fa fa-bookmark-o"></i> </span>
            </p>
            <p>
                {!! Str::limit($post->body, 80, '...') !!}
            </p>
            <a href="{{ route('posts.show', $post) }}" class="line-bnt">
                קרא עוד
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>
</div>