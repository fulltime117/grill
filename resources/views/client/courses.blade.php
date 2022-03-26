@extends ('layouts.front')

@section('page-title')
    <title> Grillman - {{ $user->firstname }} </title>
@endsection


@section('page-styles')
@endsection


@section('content')


@include('layouts.client-header')
    <div class="container">
        <div class="row" style="margin-top: 50px">
            <div class="col-lg-9 dash-course-container">
                <div class="udb-sec udb-cour">
                    <h4><i class="fa fa-leanpub"></i>  הקורסים שלי </h4>
                    {{-- <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text.The point of using Lorem Ipsummaking it look like readable English.</p> --}}
                    <div class="sdb-cours">
                        @if ($courses)
                        <ul class="course-wrapper">                            
                            @foreach ($courses as $course)
                                @if($course->pivot->end_date)
                                    אין קורסים                                  
                                @else
                                    <li>
                                        <a href="{{ route('coursedetail', $course) }}">
                                            <div class="list-mig-like-com com-mar-bot-30">
                                                <div class="list-mig-lc-img"> 
                                                    <img src="{{asset($course->cover_image)}}" alt=""> 
                                                </div>
                                                <div class="list-mig-lc-con">
                                                    <h5>{{ $course->course_name }}</h5>
                                                    <p>{{ Str::limit($course->overview, 30) }}</p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                        @else
                           <h6 class="mt-4"> אין קורס </h6> 
                        @endif
                    </div>
                </div> 
                <div class="udb-sec udb-cour-stat">
                    <h4><i class="fa fa-list"></i>  סטטוס קורסים </h4>
                    <div class="pro-con-table">
                        <table class="bordered responsive-table">
                            <thead>
                                <tr>
                                    <th> קורס </th>
                                    <th> תאריך רכישה </th>
                                    <th class="tot-lesson"> מס' שיעורים </th>
                                    <th class="cur-lesson"> השיעור הנוכחי </th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @forelse ($courses as $course)
                                    @if($course->pivot->end_date)
                                    @else
                                        @php
                                            $current_lesson = '';
                                            foreach($course->lessons as $lesson){
                                                if($course->pivot->active && $course->pivot->lesson_number == $lesson->lesson_number) {
                                                    $current_lesson = $lesson;
                                                }
                                            }
                                            $start_date =substr($course->pivot->created_at,0,10); 
    
                                        @endphp
                                        <tr>
                                            <td>{{ $course->course_name }}</td>
                                            <td> {{ $start_date }}</td>
                                            <td class="tot-lesson"><span > {{ $course->lessons->count() }} </span></td>
                                            <td class="cur-lesson" data-tooltip="Go to Lesson"><a href=" {{ route('lessondetail', $current_lesson) }} " > {{ $current_lesson ->lesson_number }} </a> </td>
                                        </tr>
                                    @endif
                                @empty
                                @endforelse                                
                                                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                @include('client.includ-profile-data')
            </div>
        </div>
    </div>
@endsection





@section('scripts')

<script>
    $(document).ready(function() {
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    });
</script>

@endsection