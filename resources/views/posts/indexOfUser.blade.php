@extends ('layouts.front')

@section('page-styles')
    <link href="{{asset('assets/css/components/custom-media_object.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/elements/avatar.css')}}" rel="stylesheet" type="text/css">
@endsection
    
@section('content')
    
    <div class="container">
        <div class="row">
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
        
    </div>
    

@endsection

@section('page-scripts')

@endsection

@section('scripts')
<script>


</script>
@endsection