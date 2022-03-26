@extends ('layouts.admin')


@section('page-title')
    <title>Admin - Coupon List</title>
@endsection


@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/custom_dt_html5.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/dt-global_style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/apps/todolist.css')}}">
    <link href="{{asset('plugins/flatpickr/flatpickr.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/flatpickr/custom-flatpickr.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css" />
    
    <style>
        .flatpickr-calendar.open {
            display: inline-block;
            z-index: 1052;
        }
        
        .new-control.new-checkbox > input:checked ~ span.new-control-indicator {
            background: #ffffff!important;
            border: 2px solid #8dbf42!important;
        }
        .modal-content svg.close {
            color: #8dbf42!important;
        }
        
        
        new-control.new-checkbox span.new-control-indicator:after {
            border: solid #8dbf42!important;
        }
        
    </style>
    
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('cu.coupons') }}">Coupon</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">Coupon List</a></li>
    
@endsection

@section('content')

    <div class="row layout-top-spacing">
                
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="d-flex justify-content-between px-4 align-items-center border-bottom">
                    <h4 class="">Coupon List</h4>
                    <a href=""  
                        data-toggle="modal" 
                        data-target="#addCoupanModal" 
                        class="bs-tooltip" title="Create new coupon"> 
                        Add <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0066ff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg> 
                    </a>
                </div>
                <div class="table-responsive mb-4 mt-4">
                
                    <table id="courselist" class="table table-hover non-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Email Type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @if(isset($emailtypes))
                                @foreach ($emailtypes as $emailtype)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $emailtype->type }}</td>
                                        <td>
                                            <div class="d-flex justify-content-between align-items-center" style="width:80px">
                                                <a href="{{ route('emailtypes.store') }}" 
                                                    class="open-addusers" 
                                                    data-url="{{ route('emailtypes.store') }}" 
                                                    data-toggle="modal" 
                                                    data-target="#addUserModal">
                                                    <i class="fa fa-user-plus text-success"></i>
                                                </a>
                                                
                                                <a href="javascript:void(0);" class="open-edit" 
                                                    data-name="{{ $emailtype->name }}"
                                                    data-url="{{ route('emailtypes.update', $emailtype) }}" 
                                                    data-toggle="modal" 
                                                    data-target="#editCoupanModal">
                                                    <i class="far fa-edit text-primary"></i>
                                                </a>
                                                
                                                <form action="{{ route('emailtypes.delete', $emailtype) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="javascript:void(0);" class="delete-row" ><i class="far fa-trash-alt text-danger"></i></a>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                @endforeach
                            @endif
                        </tbody>
                        
                    </table>
                
                </div>
            </div>
        </div>
        
    </div>
    
    
    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalTitle"aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" >
                <div class="modal-body" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="modal"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    <div class="compose-box">
                        <div class="compose-content" id="addUserModalTitle">
                            <h5 class="">Add Users</h5>
                            <form id="add-users-form" action="" method="post">
                                
    
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-success" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                    <button id="add-users" class="btn btn-success ">Add Users</button>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="modal fade" id="editCoupanModal" tabindex="-1" role="dialog" aria-labelledby="addTaskModalTitle"aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="modal"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    <div class="compose-box">
                        <div class="compose-content" id="addTaskModalTitle">
                            <h5 class="">Edit Coupan</h5>
                            <form id="edit-coupon-form" action="" method="post">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex mail-to mb-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3 flaticon-notes"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                            <div class="w-100">
                                                <input id="name" type="text" placeholder="Coupon Name" class="form-control" name="name" value="">
                                                <span class="validation-text"></span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="d-flex mail-to mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text flaticon-menu-list"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                            <div class="w-100">
                                                <textarea id="body" type="text" class="form-control" name="body">
                                                </textarea>
                                                <span class="validation-text"></span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="d-flex mail-to mb-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                            <div class="w-100">
                                                <label class="dob-input">Expired Date</label>
                                                <div class="form-group mb-0">
                                                    <input id="expired" name="expired" value="" class="form-control flatpickr flatpickr-input " type="text" placeholder="Select Date..">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="d-flex mail-to mb-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3 flaticon-notes"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                            <div class="w-100">
                                                <label class="dob-input">Discount </label>
                                                <div class="form-group mb-0">
                                                    <input id="discount" name="discount" value="" class="form-control" type="text" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
    
                                
    
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-primary" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                    <button id="edit-coupon" class="btn btn-primary ">Update</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="addCoupanModal" tabindex="-1" role="dialog" aria-labelledby="addTaskModalTitle"aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="modal"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    <div class="compose-box">
                        <div class="compose-content" id="addTaskModalTitle">
                            <h5 class="">Add Coupan</h5>
                            <form id="add-coupon-form" action="{{ route('cu.coupons.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex mail-to mb-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3 flaticon-notes"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                            <div class="w-100">
                                                <input type="text" placeholder="Coupon Name" class="form-control" name="name" >
                                                <span class="validation-text"></span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="d-flex mail-to mb-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text flaticon-menu-list"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                            <div class="w-100">
                                                <textarea type="text" class="form-control" name="body">
                                                </textarea>
                                                <span class="validation-text"></span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="d-flex mail-to mb-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                            <div class="w-100">
                                                <label class="dob-input">Expired Date</label>
                                                <div class="form-group mb-0">
                                                    <input id="expired2" name="expired"  class="form-control flatpickr flatpickr-input " type="text" placeholder="Select Date..">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="d-flex mail-to mb-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3 flaticon-notes"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                            <div class="w-100">
                                                <label class="dob-input">Discount </label>
                                                <div class="form-group mb-0">
                                                    <input name="discount" class="form-control" type="text" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
    
                                
    
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-primary" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                    <button id="add-coupon" class="btn btn-primary">Add Coupon</button>
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
    <script src="{{asset('plugins/fullcalendar/flatpickr.js')}}"></script>
    <script src="{{asset('plugins/bootstrap-select/bootstrap-select.min.js')}}"></script>
        
@endsection


@section('scripts')
<script>
    var f1 = flatpickr(document.getElementById('expired'));
    var f2 = flatpickr(document.getElementById('expired2'));
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
    
    
    $('.open-edit').click(function() {
        $('#edit-coupon-form').attr('action', $(this).attr('data-url'));
        $('#name').val($(this).attr('data-name'));
        $('#body').val($(this).attr('data-body'));
        $('#expired').val($(this).attr('data-expired'));
        $('#discount').val($(this).attr('data-discount'));
    });
    
    
    $('#edit-coupon').click(function() {
        $('#edit-coupon-form').submit();
    });
    
    
    $('#add-coupon').click(function() {
        $('#add-coupon-form').submit();
    });
    
    
    $('.open-addusers').click(function(e) {
        e.preventDefault();
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: $(this).attr('href'),
            method: 'POST',
            success: function(res){
                if(res){
                    $('#add-users-form').html(res);
                }
            }
        })
        
        $('#add-users').attr('data-url', $(this).attr('data-url')) ;
    });
    
    $('#add-users').click(function(e) {
        e.preventDefault();
        let users = [];
        $('.new-control-input').each(function() {
            if($(this).prop('checked')) {
                users.push($(this).attr('data-id'));   
            }
        })
        
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: $(this).attr('data-url'),
            method: 'POST',
            dataType: 'json',
            data: {users},
            success: function(res){
                if(res){
                    location.reload();
                }
            }
        })
        
    })
    
    

</script>
@endsection