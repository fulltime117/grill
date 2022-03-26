
@extends ('layouts.front')

@section('page-title')
    <title> פרט השיעור </title>
@endsection


@section('page-styles')
@endsection


@section('content')
    @php
        $user = auth()->user();
        // dd($lesson->course);
    @endphp
<div class="client-dashboard">
    
    @include('layouts.client-header')

    <div class="stu-db">
        <div class="container pg-inn">
            <div class="row">
                <div class="col-md-3">
                    @include('client.includ-profile-data')
                </div>
                <div class="col-md-9">
                    <div class="udb">                        
                        <div class="lesson-detail-content">
                            <h4 class="lesson-name">{{ $lesson->lesson_name }}</h4>
                            <div class="lesson-content-container">
                                <div class="lesson-media">
                                    @if($lesson->type == 'image')
                                        <img src="{{ $lesson->media }}" alt="">
                                    @elseif($lesson->type == 'video')
                                        <div class="bg-white media-image">
                                            <video width="320" height="240" controls>
                                                <source src="{{ asset($lesson->media) }}" type="">
                                                <source src="movie.ogg" type="video/ogg">
                                                Your browser does not support the video tag.
                                            </video>
                                        </div>
                                    @else
                                        <div class="iframe-container">
                                            <iframe class="responsive-iframe" src="{{ $lesson->media }}" allow="encrypted-media"></iframe>
                                        </div>
                                    @endif
                                </div>
                                
                                <div class="lesson-description" style="margin-top:15px">
                                    <h4> תיאור </h4>
                                    <p>{!! $lesson->body !!}</p>
                                </div>
                                
                                <div class="lesson-test">
                                    <a href="{{ route('client.tests.show', [auth()->user(), $lesson]) }}" class="border-btn"> עבור למבחן </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

@section('scripts')
    <script>

    </script>
@endsection


