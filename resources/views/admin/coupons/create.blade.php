@extends ('layouts.admin')


@section('page-title')
    <title>Admin - New Coupon</title>
@endsection


@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/custom_dt_html5.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/dt-global_style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/apps/todolist.css')}}">
    <link href="{{asset('plugins/flatpickr/flatpickr.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/flatpickr/custom-flatpickr.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/animate/animate.css')}}" rel="stylesheet" type="text/css" />
    
    <style>
        /* .flatpickr-calendar.open {
            display: inline-block;
            z-index: 1052;
        } */
        .new-control.new-checkbox > input:checked ~ span.new-control-indicator {
            background: #ffffff!important;
            border: 2px solid #e7515a!important;
        }
        .modal-content svg.close {
            color: #e7515a!important;
        }
        /* new-control.new-checkbox span.new-control-indicator:after {
            border: solid #8dbf42!important;
        } */
    </style>
    
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('cu.coupons') }}">Coupon</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('cu.coupons') }}">Add</a></li>
    
@endsection

@section('content')

    <div class="row layout-top-spacing">
        <div class="col-lg-12 layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="d-flex justify-content-between px-4 align-items-center border-bottom">
                    <h4 class="">Add Coupon</h4>
                </div>
                
                <form id="add_coupon_form" action="{{route('cu.store')}}" method="post">
                    @csrf
                    <div class="d-flex flex-wrap justify-content-between mt-4 ">
                        <div class="form-group" style="width: 250px;">
                            <label for="name">Coupon Name</label>
                            <input type="text" class="form-control" name="name" required autocomplete="off">
                        </div>
                        
                        <div class="form-group" style="width: 400px;">
                            <label for="name">Coupon Description</label>
                            <input type="text" class="form-control" name="body">
                        </div>
                        
                        <div class="form-group" style="width: 250px;">
                            <label for="name">Coupon Discount(%)</label>
                            <input type="number" class="form-control" name="discount" required autocomplete="off">
                        </div>
                        
                        <div class="form-group" style="width: 250px;">
                            <label for="name">Expired Date</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <label for="expired"><i class="fa fa-calendar"></i></label>
                                    </div>
                                </div>
                                <input id="expired" name="expired" value="" class="form-control flatpickr flatpickr-input " type="text" placeholder="No Limit" required autocomplete="off">
                            </div>
                        </div>
                        
                    </div>
                    <div>
                        <input type="hidden" id="selected_users" name="selected_users">
                        <input type="hidden" id="selected_courses" name="selected_courses">
                        <button type="submit" class="btn btn-success">Save Coupon</button>
                    </div>
                </form>
                
            </div>
        </div>    
        
        
        <div class="col-lg-6 layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="d-flex justify-content-between px-4 align-items-center border-bottom">
                    <h4 class="">User List</h4>
                </div>
                <div class="table-responsive mb-4 mt-4">
                
                    <table id="userlist" class="table table-hover non-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="all_users"></th>
                                <th>User Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td><input type="checkbox" class="check_user" data-user_id="{{$user->id}}"></td>
                                    <td>{{$user->firstname}} {{$user->lastname}}</td>
                                    <td>{{$user->email}}</td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>                        
                        
                    </table>
                
                </div>
            </div>
        </div>
        
        <div class="col-lg-6 layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="d-flex justify-content-between px-4 align-items-center border-bottom">
                    <h4 class="">Course List</h4>
                </div>
                <div class="table-responsive mb-4 mt-4">
                
                    <table id="courselist" class="table table-hover non-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="all_courses"></th>
                                <th>Course Name</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($courses as $course)
                                <tr>
                                    <td><input type="checkbox" class="check_course" data-course_id="{{$course->id}}"></td>
                                    <td>{{$course->course_name}}</td>
                                    <td>{{$course->course_price}}</td>
                                </tr>
                            @empty
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
    <script src="{{asset('plugins/sweetalerts/custom-sweetalert.js')}}"></script>
    <script src="{{asset('plugins/fullcalendar/flatpickr.js')}}"></script>
@endsection


@section('scripts')
<script>
    var f1 = flatpickr(document.getElementById('expired'));
    
    
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
        "pageLength": 7,
        "columnDefs": [{
            "targets": 0,
            "orderable": false
        }]
    } );
    
    $('#userlist').DataTable( {
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
        "pageLength": 7,
        "columnDefs": [{
            "targets": 0,
            "orderable": false
        }]
    } );
    
    let users = [];
    let courses = [];
    $('#all_users').click(function() {
        if($(this).is(':checked')){
            $('.check_user').prop('checked', true);
            users = [];
            $('.check_user').each(function() {
                users.push($(this).attr('data-user_id'));
            });
        }else {
            $('.check_user').prop('checked', false);
            users = [];
        }
        $('#selected_users').val(JSON.stringify(users));
    });
    
    $('#all_courses').click(function() {
        if($(this).is(':checked')){
            $('.check_course').prop('checked', true);
            courses = [];
            $('.check_course').each(function() {
                courses.push($(this).attr('data-course_id'));
            });
        }else {
            $('.check_course').prop('checked', false);
            courses = [];
        }
        $('#selected_courses').val(JSON.stringify(courses));
    });
    
    $('.check_user').click(function(){
        users = [];
        $('.check_user').each(function() {
            if($(this).is(':checked')){
                users.push($(this).attr('data-user_id'));
            } 
        });
        $('#selected_users').val(JSON.stringify(users));
    });
    
    $('.check_course').click(function(){
        courses = [];
        $('.check_course').each(function() {
            if($(this).is(':checked')){
                courses.push($(this).attr('data-course_id'));
            } 
        });
        $('#selected_courses').val(JSON.stringify(courses));
    });
    
    
    $('#add_coupon_form').submit(function() {
        if(courses.length == 0) {
            swal({
                title: 'Please select course',
                animation: false,
                customClass: 'animated tada',
                padding: '2em'
            });
            return false;
        }
        if(users.length == 0) {
            swal({
                title: 'Please select user',
                animation: false,
                customClass: 'animated tada',
                padding: '2em'
            });
            return false;
        }
        
    })
    

</script>
@endsection