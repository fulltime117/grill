@extends ('layouts.admin')


@section('page-title')
    <title>Admin - Users Logs</title>
@endsection


@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/custom_dt_html5.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/dt-global_style.css')}}">
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="javascript:void(0)">Users</a></li>
<li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);"> Logs </a> </li>
@endsection

@section('content')

    <div class="row layout-top-spacing">
                
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="table-responsive mb-4 mt-4">
                    @if(isset($view_all))
                        <div class="d-flex align-items-center justify-content-between mb-2 mx-3">
                            <a href="{{ route('admin.logs') }}" class="text-info">
                                <i class="fa fa-file-text-o"></i>
                                View All Logs
                            </a>
                            <div class="media">
                                <div class="mr-2">
                                    <div>Logs detail for </div>
                                    <span class="text-info">{{ $user->firstname }} {{ $user->lastname }}</span>
                                </div>
                                <img src="{{ $user->profile->getImage() }}" width="45" class="rounded-circle">
                            </div>
                        </div>
                    @endif
                    <table id="userslist" class="table table-hover non-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Avatar</th>
                                <th>Email</th>
                                <th>Name</th>
                                <th>IP address</th>
                                <th>Login Date</th>
                                <th>Online Time</th>
                                <th>Blocked</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($logs as $log)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('admin.user.logs', $log->user) }}">
                                                <div class="avatar avatar-md avatar-indicators mr-2
                                                    @if($log->login)
                                                        avatar-online
                                                    @else
                                                        avatar-offline
                                                    @endif
                                                ">
                                                    <img alt="avatar" src="{{asset($log->user->profile->getImage())}}" class="rounded-circle" />
                                                </div>
                                            </a>
                                        </div>
                                    </td>
                                    <td>{{$log->user->email}}</td>
                                    <td>{{$log->user->firstname}} {{$log->user->lastname}}</td>
                                    <td>
                                        <span class="
                                            @if(!$log->user->status) 
                                                text-danger
                                            @endif
                                        ">{{ $log->ip }}</span>
                                    </td>
                                    <td>{{ $log->created_at }}</td>
                                    <td>{{ $log->getOnlineTime() }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <label class="switch s-icons s-outline s-outline-danger mb-0" style="pointer-events: none">
                                                <input type="checkbox" readonly="readonly"
                                                    @if(!$log->user->status) 
                                                        checked
                                                    @endif
                                                >
                                                <span class="slider"></span>
                                            </label>
                                        </div>
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
        // dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
        // buttons: {
        //     buttons: [
        //         { extend: 'copy', className: 'btn' },
        //         { extend: 'csv', className: 'btn' },
        //         { extend: 'excel', className: 'btn' },
        //         { extend: 'print', className: 'btn' }
        //     ]
        // },
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