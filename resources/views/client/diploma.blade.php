{{-- <h1>Congratulations to finish Course: {{$course->course_name}}</h1>
<h1>Congratulations to finish Course: {{$course->course_name}}</h1>
<h1>Congratulations to finish Course: {{$course->course_name}}</h1>
<h1>Congratulations to finish Course: {{$course->course_name}}</h1>
<h1>Congratulations to finish Course: {{$course->course_name}}</h1>
<h1>Congratulations to finish Course: {{$course->course_name}}</h1> --}}



@extends ('layouts.front')

@section('page-title')
    <title> Grillman - {{ $user->firstname }} </title>
@endsection


@section('page-styles')
<style>
    .responsive-table a{
        color: #203245d1;
    }

    .responsive-table a:hover{
        color: #203245;
    }

    .responsive-table a i{
        font-size: 19px;
    }


    [data-tooltip]{
        --tooltip-distance: 100%;
    }
</style>

@endsection


@section('content')


@include('layouts.client-header')
    <div class="container">
        <div class="row" style="margin-top: 50px">
            <div class="col-lg-9 dash-course-container">
                <div class="udb">
                    <div class="udb-sec udb-prof">
                        <h4 style="border:none;" class="mb-2"><i class="fa fa-graduation-cap" ></i>  דיפלומה </h4>
                        <div class="dash-contact-container">                                
                            <table class="table responsive-table">
                                <thead>
                                    <tr>
                                        <th> שם קורס </th>
                                        <th> תאריך קבלה </th>
                                        <th> פעולה </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($diplomas as $diploma)
                                        <tr>
                                            <td> {{\App\Models\Course::find($diploma->course_id)->course_name}} </td>
                                            <td> {{ substr($diploma->updated_at, 0, 10) }} </td>
                                            <td>
                                                @if($diploma->diploma)
                                                    <a href="{{ asset($diploma->diploma) }}" download data-tooltip="download your Diploma">
                                                    הורדה 
                                                    <i class="fa fa-file-pdf-o text-danger mr-2" style="font-size:22px"></i>
                                                    </a> 
                                                @else
                                                    -
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
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
    
</script>

@endsection