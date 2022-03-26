@extends ('layouts.admin')


@section('page-title')
    <title>Admin - Test Results</title>
@endsection


@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/custom_dt_html5.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/dt-global_style.css')}}">
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.courses') }}">Courses</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">Test Result</a></li>
@endsection

@section('content')

    <div class="row layout-top-spacing">
                
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="d-flex justify-content-between px-4 align-items-center border-bottom">
                    <h4 class="">Test Result</h4>
                </div>
                
                <div class="table-responsive mb-4 mt-4">
                
                    <table id="lessonlist" class="table table-hover non-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Lesson</th>
                                <th>Score</th>
                                <th>Course</th>
                                <th>Passed</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        
                            @forelse ($test_results as $test)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <div class="media align-items-center">
                                            <img src="{{ asset($test['user']->profile->getImage()) }}" width="40px">
                                            <div class="pl-2">{{$test['user']->firstname}} {{$test['user']->lastname}}</div>    
                                        </div>
                                    </td>
                                    <td>
                                        <a class="" href="{{ route('admin.lessons.show', $test['lesson']->id) }}">
                                            {{ $test['lesson']->lesson_name }}
                                        </a>
                                    </td>
                                    <td>
                                        @if($test['score'] > 3)
                                            <span class="badge badge-success" style="font-size:16px">{{$test['score']}}</span>
                                        @else
                                            <span class="badge badge-danger" style="font-size:16px">{{$test['score']}}</span>
                                        @endif
                                    </td>
                                    <td>{{$test['lesson']->course->course_name}}</td>
                                    <td>
                                        @if($test['passed'])
                                            <span class="badge outline-badge-success">Passed</span>
                                        @else
                                            <span class="badge outline-badge-warning">Not Passed</span>
                                        @endif
                                    </td>
                                    <td>{{ $test['date'] }}</td>
                                </tr>
                            @empty    
                                <p>No Course</p>
                            @endforelse
                        </tbody>
                        
                    </table>
                
                </div>
            </div>
        </div>
        
    </div>
    

@endsection

@section('page-scripts')
    <script src="{{asset('plugins/table/datatable/datatables.js')}}"></script>
    <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
    <script src="{{asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('plugins/table/datatable/button-ext/jszip.min.js')}}"></script>    
    <script src="{{asset('plugins/table/datatable/button-ext/buttons.html5.min.js')}}"></script>
    <script src="{{asset('plugins/table/datatable/button-ext/buttons.print.min.js')}}"></script>
    
    <script src="{{asset('plugins/sweetalerts/custom-sweetalert.js')}}"></script>
@endsection


@section('scripts')
<script>
    
    $('#lessonlist').DataTable( {
        dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
        buttons: {
            buttons: [
                { extend: 'copy', className: 'btn' },
                { extend: 'csv', className: 'btn' },
                { extend: 'excel', className: 'btn' },
                { extend: 'print', className: 'btn' }
            ]
        },
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>' },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [7, 10, 20, 50],
        "pageLength": 7 
    } );

</script>
@endsection