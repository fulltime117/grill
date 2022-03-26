@extends ('layouts.front')

@section('page-title')
    <title> Grillman - {{ $user->firstname }} </title>
@endsection


@section('page-styles')
@endsection


@section('content')
    @php
        $user = auth()->user();

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
                            {{-- <div class="origin-course-detail"> 
                                <div class="lesson-breadcrumb">
                                    <h5 class="lesson-origin-corse-name" style="direction:initial"> <a href="{{ route('coursedetail', $lesson->course->id) }}">{{ $lesson->course->course_name }}</a>&nbsp;<i class="fa fa-angle-double-right"></i>&nbsp;<a href="{{ route('lessondetail', $lesson)}}">{{ $lesson->lesson_name }}</a>&nbsp;<i class="fa fa-angle-double-right"></i>&nbsp;<strong>Question</strong></h5>
                                </div>
                            </div>
                            <hr> --}}
                            <div class="lesson-questions">
                                <form action="{{ route('client.tests.store', [$user, $lesson]) }}" method="post">    
                                    @csrf
                                    @foreach ($lesson->questions as $question)
                                
                                        <div class="form-group mb-4">
                                            <div><h3>{{ $question->q }}</h3></div>
                                            
                                            <div class="form-group">
                                                <input type="radio" id={{ $question->id + 10 }} name="qid_{{ $question->id }}" value="1">
                                                <label for={{ $question->id + 10 }}>{{ $question->opt1 }}</label>
                                            </div>
                                            <div class="form-group">
                                                <input type="radio" id={{ $question->id + 20 }} name="qid_{{ $question->id }}" value="2">
                                                <label for={{ $question->id + 20 }}>{{ $question->opt2 }}</label>
                                            </div> 
                                            <div class="form-group">
                                                <input type="radio" id={{ $question->id + 30 }} name="qid_{{ $question->id }}" value="3">
                                                <label for={{ $question->id + 30 }}>{{ $question->opt3 }}</label>
                                            </div>
                                            <div class="form-group">
                                                <input type="radio" id={{ $question->id + 40 }} name="qid_{{ $question->id }}" value="4">
                                                <label for={{ $question->id + 40 }}>{{ $question->opt4 }}</label>
                                            </div>
                                        </div>
                                        
                                    @endforeach
                                    <div class="form-group test-report-btn ">
                                        <button  type="submit" class="border-btn"> הגש מבחן </button>
                                    </div>
                                </form>
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