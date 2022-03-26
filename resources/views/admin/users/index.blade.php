@extends ('layouts.admin')


@section('page-title')
    <title>Admin - Users List</title>
@endsection


@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/custom_dt_html5.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/dt-global_style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/tables/table-basic.css')}}">
    <style>
        .number-boder{
            width: 50px;
            height: 50px;
            -webkit-box-shadow: -1px 2px 12px 0 rgb(31 45 61 / 10%);
            box-shadow: -1px 2px 12px 0 rgb(31 45 61 / 10%);
            border-radius: 6px;
            display: flex;
            justify-content: center;
            flex-direction: column;
            border: 1px solid #e0e6ed;
        }
        .table-bordered {
            border: 1px solid #f1f2f3!important;
        }
        .online-circle{
            top:0; right:-5px; width:14px; height:14px; background: lightgray; border-radius:50%; border: 1px solid #fff;
        }
    </style>
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="javascript:void(0);">Users</a></li>
<li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">List</a> </li>
@endsection

@section('content')

    <div class="row layout-top-spacing">
                
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="d-flex justify-content-between px-4 align-items-center border-bottom">
                    <h4 class="">User List</h4>
                    <a href="{{route('admin.users.create')}}" class="bs-tooltip" title="New User"> 
                        Add <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0066ff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg> 
                    </a>
                </div>
                <div class="table-responsive mb-4 mt-4">
                
                    <table id="userslist" class="table table-hover non-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Account</th>
                                <th>Identity & Phone</th>
                                <th>Company</th>
                                <th>Address</th>
                                <th>Registered Date</th>
                                <th>Last Login</th>
                                <th class="bs-tooltip" title="View all IPs and count">IP</th>
                                <th>Coupon</th>
                                <th>Diploma</th>
                                <th class="bs-tooltip" title="View Courses that user already purchased">Courses</th>
                                <th class="bs-tooltip" title="View current lesson name that user is learning now">Lesson Progress</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td data-id="{{$user->id}}">{{$loop->iteration}}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="usr-img-frame mr-2 rounded-circle position-relative">
                                                <img alt="avatar" class="rounded-circle" src="{{asset($user->profile->getImage())}}">
                                                <span class="position-absolute online-circle" 
                                                    style="@if($user->locations->count() > 0 && $user->locations->last()->login) background:#8dbf42 @endif">
                                                </span>
                                            </div>
                                            <a href="{{ route('admin.users.show', $user) }}">
                                                <p class="mb-0"> {{ $user->firstname }} {{ $user->lastname }}</p>
                                                <p class="mb-0">{{$user->email}}</p>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="mb-0"> <i class="fa fa-phone"></i> {{ $user->phone }}</p>
                                        <p class="mb-0"><i class="fa fa-lock"></i> {{$user->identity}}</p>
                                    </td>
                                    <td>{{$user->company ?? '-'}}</td>
                                    <td>{{ $user->address }}</td>
                                    <td>{{ substr($user->created_at, 0, 10) }}</td>
                                    <td>
                                        @if($user->locations->count() > 0)
                                            <a href="javascript:void(0)" 
                                                class="bs-tooltip" 
                                                title="{{ $user->locations->last()->created_at}}"
                                            >
                                                {{$user->locations->last()->created_at->diffForHumans() }}
                                            </a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->locations->pluck('ip')->unique()->count() > 0)
                                        <a href="javascript:void(0);" 
                                            data-target="#viewIpsModal_{{$user->id}}"
                                            data-toggle="modal"
                                            class="" title="View all IPs user logged in until now">
                                            
                                            <span class="text-info" style="font-size:20px; text-decoration:underline; font-weight:bold">{{ $user->locations->pluck('ip')->unique()->count() }}</span>
                                            
                                        </a>
                                        @else
                                            -
                                        @endif
                                        <div class="modal fade" id="viewIpsModal_{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            <img src="{{$user->profile->getImage() }}" width="35px">
                                                            View all logs history </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                                            <h6> Count </h6>
                                                            <div class="number-boder justify-content-center ">
                                                                <span style="font-size:24px; text-align:center">{{$user->locations->pluck('ip')->unique()->count()}}</span>
                                                            </div>
                                                        </div>
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered mb-4" >
                                                                <thead>
                                                                    <tr>
                                                                        <th>IP</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($user->locations->pluck('ip')->unique() as $ip)
                                                                        <tr>
                                                                            <td>{{$ip}}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if($user->coupons->count() > 0)
                                            <a href="javascript:void(0);"
                                                data-target="#viewCouponModal{{$user->id}}"
                                                data-toggle="modal"
                                                class="bs-tooltip text-info"
                                                title="View Coupons"> View 
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-tag"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7.01" y2="7"></line></svg>
                                                </a>
                                        @else
                                            -
                                        @endif
                                        <div class="modal fade" id="viewCouponModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 900px!important">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            Coupons for user</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        
                                                        <div class="table-responsive mt-4">
                                                            <table class="table table-bordered mb-4" >
                                                                <thead>
                                                                    <tr>
                                                                        <th>Coupon Name</th>
                                                                        <th>Description</th>
                                                                        <th>Discount</th>
                                                                        <th>Coupon Code</th>
                                                                        <th>Course Name</th>
                                                                        <th>Expired Date</th>
                                                                        <th>Use Date</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($user->coupons as $coupon)
                                                                        <tr>
                                                                            <td>{{$coupon->name}}</td>
                                                                            <td>{{$coupon->body}}</td>
                                                                            <td>{{$coupon->discount}}</td>
                                                                            <td>{{$coupon->pivot->coupon_code}}</td>
                                                                            <td>{{\App\Models\Course::find($coupon->pivot->course_id)->course_name}}</td>
                                                                            <td>{{$coupon->expired}}</td>
                                                                            <td>
                                                                                {{$coupon->pivot->use_date ?? '-'}}
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </td>
                                    <td> 
                                        @forelse($user->diplomas as $diploma)
                                            <a href="{{route('diploma.index')}}" class="bs-tooltip" title="course: {{\App\Models\Course::find($diploma->course_id)->course_name}} {{substr($diploma->updated_at, 0, 10)}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#e7af1e" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bookmark"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path></svg>
                                            </a>
                                        @empty
                                            -
                                        @endforelse
                                    </td>
                                    <td>
                                        @forelse($user->userCourses as $course)
                                            @if(!$course->pivot->end_date)
                                            <a href="{{ route('admin.courses.show', $course->id)}}"
                                                class="bs-tooltip badge @if($course->pivot->active) outline-badge-success @else outline-badge-warning @endif"
                                                title="@if($course->pivot->active) active @else pending @endif">{{ $course->course_name }}</a>
                                            @else
                                                <!-- <span class="text-success bs-tooltip" title="$course->course_name">Finished</span> -->
                                            @endif
                                        @empty
                                            -
                                        @endforelse
                                    </td>
                                    <td>
                                        <!-- progress lesson  -->
                                        @forelse($user->userCourses as $course)
                                            
                                            @foreach($course->lessons as $lesson)
                                                @if($course->pivot->active && $lesson->lesson_number == $course->pivot->lesson_number)
                                                    <a href="{{ route('admin.lessons.show', $lesson->id) }}">{{ $lesson->lesson_name }}</a>
                                                @endif
                                            @endforeach
                                        @empty
                                            -
                                        @endforelse
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <form action="{{ route('admin.users.active', $user) }}" method="post">
                                                @csrf
                                                <input type="hidden" name="active" value="{{ $user->status}}"/>
                                                <label class="switch s-icons s-outline s-outline-success mb-0">
                                                    <input type="checkbox"
                                                        onchange="this.form.submit()"
                                                        @if($user->status) 
                                                            checked
                                                        @endif
                                                    >
                                                    <span class="slider"></span>
                                                </label>
                                            </form>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-center" style="width:80px">
                                            <a href="{{ route('admin.users.show', $user) }}" 
                                                class="bs-tooltip" title="view {{ $user->firstname }}"
                                                >
                                                <i class="fa fa-eye text-secondary"></i>
                                            </a>
                                            
                                            <a href="{{ route('admin.users.edit', $user) }}" 
                                                class="bs-tooltip" title="edit {{ $user->firstname }}"
                                                >
                                                <i class="fa fa-edit text-primary"></i>
                                            </a>
                                            
                                            <form action="{{ route('admin.users.delete', $user) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="javascript:void(0);" class="delete-row bs-tooltip" title="delete {{ $user->firstname }}" ><i class="far fa-trash-alt text-danger"></i></a>
                                            </form>
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