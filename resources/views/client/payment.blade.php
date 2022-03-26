@extends ('layouts.front')

@section('page-title')
    <title> Grillman - {{ $user->firstname }} </title>
@endsection


@section('page-styles')
@endsection


@section('content')


<div class="client-dashboard">
    
    @include('layouts.client-header')

    <div class="stu-db">
        <div class="container pg-inn">
            <div class="row">
                <div class="col-md-3">
                    @include('client.includ-profile-data')
                </div>
                <div class="col-lg-9">
                    <div class="udb">
                        <div class="udb-sec udb-prof">
                            <h4 style="border:none;" class="mb-0"><i class="fa fa-money"></i>  היסטוריית תשלומים </h4>
                            <div class="dash-contact-container">
                                <table class="table responsive-table">
                                    <thead>
                                        <tr>
                                            <th> קורס שנרכש </th>
                                            <th> מחיר </th>
                                            <th> סטטוס </th>
                                            <th>תאריך  </th>
                                            <th> חוזה הצטרפות </th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @foreach($courses as $course)
                                            <tr>
                                                <td><a href="{{route('coursedetail', $course)}}">{{$course->course_name}}</a> </td>
                                                <td>₪{{ $course->course_price }}</td>
                                                <td>
                                                    @if($course->pivot->active)
                                                        <span class="badge badge-success"> פָּעִיל </span>
                                                    @else
                                                        <span class="badge badge-warning"> לֹא פָּעִיל </span>
                                                    @endif
                                                </td>
                                                
                                                <td>{{ substr($course->pivot->created_at, 0, 10) }}</td>
                                                <td>
                                                    <a href="{{ route('client.download_contract', [auth()->user(), $course]) }}">
                                                    הורדה  
                                                    <i class="fa fa-file-pdf-o text-danger mr-2" style="font-size:22px"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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







@section('scripts')

<script>

</script>

@endsection