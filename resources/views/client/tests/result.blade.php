@extends ('layouts.front')

@section('page-title')
    <title> תוצאת הבדיקה </title>
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
                    <div class="lesson-test-result-content"> 

                        <div class="test-results">
                            {{-- icon --}}
                            @if($test_result)
                            <div class="result-icons" 
                                style="
                                    display: flex;
                                    justify-content: center;
                                    align-items: center;
                                    border-radius: 50%;
                                    border: 2px solid #28a745;
                                    width: 70px;
                                    height: 70px;
                                    font-size: 2rem;
                                    font-weight: 100;
                                    color: #28a745;
                                "
                            >
                                <i class="fa fa-check"></i>
                            </div>
                            @else
                            <div class="result-icons" 
                                style="
                                    display: flex;
                                    justify-content: center;
                                    align-items: center;
                                    border-radius: 50%;
                                    border: 2px solid #dc3545;
                                    width: 70px;
                                    height: 70px;
                                    font-size: 2rem;
                                    font-weight: 100;
                                    color: #dc3545;
                                "
                            >
                                <i class="fa fa-remove"></i>
                            </div>
                            @endif 

                            {{-- result body --}}
                            <div class="result-text">
                                @if($test_result)
                                <h2> מזל טוב!  &nbsp; {{ $user->firstname }} {{ $user->lastname }}</h2>
                                <h5> עבר לך במבחן ל <span class="text-success"> {{ $lesson->lesson_name }} </span></h5>
                                @else
                                    <h2> מצטער! &nbsp;{{ $user->firstname }} {{ $user->lastname }}</h2>
                                    <h5> לא עברו אותך במבחן ל <span class="text-danger"> {{ $lesson->lesson_name }} </span></h5>
                                @endif 
                            </div>

                            {{-- result action button --}}
                            <div class="test-action-btn">                                
                                @if($test_result)
                                <a href="{{ route('lessondetail', $next_lesson) }}">
                                    <button class="border-btn">
                                       השיעור הבא
                                    </button>
                                </a>
                                @else
                                <a href="{{ route('lessondetail', $lesson) }}">
                                    <button class="border-btn">
                                        חזרה לשיעור
                                    </button>
                                </a>
                                @endif 
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