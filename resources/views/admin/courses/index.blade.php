@extends ('layouts.admin')


@section('page-title')
    <title>Admin - Courses List</title>
@endsection


@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/custom_dt_html5.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/dt-global_style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/elements/avatar.css')}}">
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="javascript:void(0);">Courses</a></li>
    <li class="breadcrumb-item active"><a href="javascript:void(0);"> List </a> </li>
@endsection

@section('content')

    <div class="row layout-top-spacing">
                
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="d-flex justify-content-between px-4 align-items-center border-bottom">
                    <h4 class="">Courses List 
                        <span class="ml-2 bs-tooltip text-warning" title="If course status is active, user can see, buy and learn this course. If course has at least one more user, please consider enough it inactive, edit or delete. Make it active after course is ready enough. If need to edit some lesson or something, please contact to developer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                        </span>
                    </h4> 
                    
                    <a href="{{route('admin.courses.create')}}" class="bs-tooltip" title="Add Course"> 
                        Add <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0066ff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg> 
                    </a>
                </div>
                <div class="table-responsive mb-4 mt-4">
                
                    <table id="courselist" class="table table-hover non-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th class="bs-tooltip" title="View all Lessons for this course">View Lessons</th>
                                <th class="bs-tooltip" title="View all users that are learning this course now">Learning Users</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($courses as $course)
                                <tr>
                                    <td>{{ $course->id }}</td>
                                    <td>
                                        <a class="text-info bs-tooltip" title="View course" href="{{ route('admin.courses.show', $course->id) }}">
                                            {{ Str::limit($course->course_name, 30, '...') }}
                                        </a>
                                    </td>
                                    <td>
                                        @if($course->discounted())
                                            <span style="text-decoration:line-through">₪{{ $course->course_price }}</span>
                                            <span class="text-secondary px-3">{{$course->discounted()}}</span>
                                        @else()
                                            ₪{{ $course->course_price }}
                                        @endif
                                    </td>
                                    <td>
                                        <div class="spinner-border text-success align-self-center @if($course->lessons->count() < 5) text-danger @endif" style="display: flex; justify-content: center;align-items: center;animation: spinner-border 0s linear infinite;!important">
                                            <a href="{{ route('admin.lessons.course', $course) }}" class="bs-tooltip text-info" title="{{ $course->course_name }} has [{{ $course->lessons->count() }}] lessons. please see all [{{ $course->lessons->count() }}] lessons for this course" style="font-size:20px; direction: ltr!important">
                                            {{ $course->lessons->count() }}
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="avatar--group">
                                            @forelse($course->courseUsers as $user)
                                                @if(!$user->pivot->end_date)
                                                <div class="avatar translateY-axis" style="width: 35px!important; height:35px">
                                                    <a href="{{ route('admin.users.show', $user->id)}}"
                                                        class="bs-tooltip"
                                                        title="@if($user->pivot->active) {{ $user->firstname }} @else pending @endif">
                                                        <img src="{{ $user->profile->getImage() }}" width="35px" class="rounded-circle">
                                                    </a>
                                                </div>
                                                @endif
                                            @empty
                                                -
                                            @endforelse
                                        </div>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.courses.active', $course) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="active" value="{{ $course->active}}"/>
                                            <button type="submit" class="border-0 bg-transparent" @if($course->courseUsers->count() > 0) disabled @endif>
                                                @if($course->active) <span class="badge badge-success">active</span> 
                                                @else <span class="badge badge-danger">inactive</span> 
                                                @endif</button>
                                        </form>
                                    </td>
                                    <td>
                                        
                                        <div class="d-flex justify-content-between align-items-center" style="width:80px">
                                            <a href="{{ route('admin.courses.show', $course) }}" 
                                                class="bs-tooltip" title="view {{ $course->course_name }}"
                                                >
                                                <i class="fa fa-eye text-secondary"></i>
                                            </a>
                                            
                                            <a href="{{ route('admin.courses.edit', $course) }}" 
                                                class="bs-tooltip" title="edit {{ $course->course_name }}"
                                                >
                                                <i class="fa fa-edit text-primary"></i>
                                            </a>
                                            
                                            <form action="{{ route('admin.courses.delete', $course) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="javascript:void(0);" class="delete-row bs-tooltip" title="delete {{ $course->course_name }}" ><i class="far fa-trash-alt text-danger"></i></a>
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
    
    $('#courselist').DataTable( {
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