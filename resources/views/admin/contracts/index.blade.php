@extends ('layouts.admin')


@section('page-title')
    <title>Admin - Contracts List</title>
@endsection


@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/custom_dt_html5.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/dt-global_style.css')}}">
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.users') }}">Users</a></li>
<li class="breadcrumb-item active"><a href="{{ route('admin.contracts') }}">Contracts</a></li>
@endsection

@section('content')

    <div class="row layout-top-spacing">
                
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="table-responsive mb-4 mt-4">
                
                    <table id="userslist" class="table table-hover non-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sign Date</th>
                                <th>User</th>
                                <th>Course</th>
                                <th>Sign</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($contracts as $contract)
                                @php
                                    $user = \App\Models\User::find($contract->user_id);
                                    $course = \App\Models\Course::find($contract->course_id);
                                @endphp
                                <tr>
                                    <td>{{$contract->created_at}}</td>
                                    <td>
                                        <div class="media">
                                            <img class="rounded-circle" src="{{ $user->profile->getImage() }}" width="35px">
                                            <span class="ml-2 ">{{ $user->firstname }} {{ $user->lastname }}</span>
                                        </div>
                                    </td>
                                    <td>{{$course->course_name }} | ₪{{$course->course_price }}</td>
                                    
                                    
                                    <td>
                                        <img class="" src="{{$contract->sign_data}}" style="width: 300px; height: auto">
                                    </td>
                                    <td>
                                        <a href="{{route('admin.download_contract', [$user, $course])}}" class="bs-tooltip" title="Download Contract">
                                            <i class="fa fa-file-pdf-o text-danger" style="font-size:22px"></i>
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
    
    $('#userslist').DataTable( {
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