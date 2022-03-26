@extends ('layouts.admin')


@section('page-title')
    <title>Admin - Sales List</title>
@endsection


@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/custom_dt_html5.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/dt-global_style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/apps/todolist.css')}}">
    <link href="{{asset('plugins/flatpickr/flatpickr.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/flatpickr/custom-flatpickr.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/forms/theme-checkbox-radio.css')}}" rel="stylesheet" type="text/css" />
    
    
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
        
        .btn-outline-success:hover {
            color: #fff!important;
        }
        
    </style>
    
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="javascript:void(0);">Sales</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">Sales List</a></li>
    
@endsection

@section('content')

    <div class="row layout-top-spacing">
                
        <div class="col-lg-6 layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="d-flex justify-content-between px-4 align-items-center border-bottom">
                    <h4 class="">Sales List</h4>
                    <a href="javascript:void(0)"  
                        data-toggle="modal" 
                        data-target="#addSaleModal" 
                        class="bs-tooltip" title="Create new sale"> 
                        Add <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0066ff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg> 
                    </a>
                </div>
                <div class="table-responsive mb-4 mt-4">
                
                    <table id="salelist" class="table table-hover non-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Expired Date</th>
                                <th>Discount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @if(isset($sales))
                                @foreach ($sales as $sale)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $sale->name }}</td>
                                        <td>{{ Str::limit($sale->body, 30, '...')}}</td>
                                        <td>{{ $sale->expired }}</td>
                                        <td>{{ $sale->discount }}</td>
                                        <td>
                                            <form action="{{ route('sales.delete', $sale) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="javascript:void(0);" class="delete-row" ><i class="far fa-trash-alt text-danger"></i></a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                
                </div>
            </div>
        </div>
        <div class="col-lg-6 layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="d-flex justify-content-between px-4 align-items-center border-bottom">
                    <h4 class="">Courses List</h4>
                </div>
                <div class="table-responsive mb-4 mt-4">
                
                    <table id="courselist" class="table table-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>Course Name</th>
                                <th class="bs-tooltip" title="Regular price and discounted price">Price</th>
                                {{--
                                <th>Sale Name</th>
                                <th>Discount(%)</th>
                                --}}
                                <th>Add Discount</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @if(isset($courses))
                                @foreach ($courses as $course)
                                    <tr>
                                        @php
                                            $sale_name = '';
                                            $sale_discount = '';
                                            $sale_discounted = '';
                                            if($course->has_sale()){
                                                $selected_sale = $course->has_sale();
                                                $sale_name = $selected_sale->name;
                                                $sale_discount = $selected_sale->discount;
                                                $sale_discounted = number_format($course->course_price*(1 -$selected_sale->discount/100), 2);
                                            }
                                        @endphp
                                        <td>{{ $course->course_name }}</td>
                                        <td>
                                            @if($course->discounted())
                                                <span style="text-decoration:line-through">₪{{ $course->course_price }}</span>
                                                <span class="text-secondary px-3">{{$course->discounted()}}</span>
                                            @else()
                                                ₪{{ $course->course_price }}
                                            @endif
                                        </td>
                                        {{--
                                        <td>{{$sale_name}}</td>
                                        <td>{{$sale_discount}}</td>
                                        --}}
                                        <td>
                                            <a href="javascript:void(0)"
                                                class="openSelectSaleModal"
                                                class="bs-tooltip" title="Add discount for sale"
                                                data-url="{{route('sales.add_course', $course)}}"
                                                data-course_id="{{$course->id}}"
                                                data-target="#selectSaleModal"
                                                data-toggle="modal"
                                                >
                                                <span class="bg-success d-inline-block rounded-circle">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                                </span>
                                            </a>
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
    
    
    
    
    
    <div class="modal fade" id="addSaleModal" tabindex="-1" role="dialog" aria-labelledby="addTaskModalTitle"aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered"sale="document">
            <div class="modal-content">
                <div class="modal-body">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="modal"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    <div class="compose-box">
                        <div class="compose-content" id="addTaskModalTitle">
                            <h5 class_"">Add Sale</h5>
                            <form id="add_sale_form" >
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex mail-to mb-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3 flaticon-notes"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                            <div class="w-100">
                                                <input type="text" placeholder="Sale Name" class="form-control" name="name" required autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="d-flex mail-to mb-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text flaticon-menu-list"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                            <div class="w-100">
                                                <textarea type="text" class="form-control" name="body" placeholder="comment">
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="d-flex mail-to mb-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                            <div class="w-100">
                                                <label class="dob-input">Expired Date</label>
                                                <div class="form-group mb-0">
                                                    <input id="expired" name="expired"  class="form-control flatpickr flatpickr-input " type="text" placeholder="Select Date..">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="d-flex mail-to mb-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-percent"><line x1="19" y1="5" x2="5" y2="19"></line><circle cx="6.5" cy="6.5" r="2.5"></circle><circle cx="17.5" cy="17.5" r="2.5"></circle></svg>
                                            <div class="w-100">
                                                <label class="dob-input">Discount </label>
                                                <div class="form-group mb-0">
                                                    <input name="discount" class="form-control" type="number" required autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
    
                                <div class="modal-footer">
                                    <button id="add_sale" class="btn btn-primary">Add Sale</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="selectSaleModal" tabindex="-1" role="dialog" >
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" >
                <div class="modal-body" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="modal"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    <div class="compose-box">
                        <div class="compose-content">
                            <h5 class="">Select Sale for this Course</h5>
                            <form id="course_sale_form">
                            
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button id="course_sale" class="btn btn-success ">Apply</button>
                    <button id="reset_items" class="btn btn-outline-success">Reset</button>
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
    <script src="https://cdn.jsdelivr.net/npm/jquery-ajax-unobtrusive@3.2.6/dist/jquery.unobtrusive-ajax.min.js"></script>    
        
@endsection


@section('scripts')
<script>
    var f1 = flatpickr(document.getElementById('expired'));
    // var f2 = flatpickr(document.getElementById('expired2'));
    $('#salelist').DataTable( {
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
    
    
    // $('#edit-coupon').click(function() {
    //     $('#edit-coupon-form').submit();
    // });
    
    
    $('#add_sale').click(function() {
        
        $("#add_sale_form").attr({
            "data-ajax-url": "{{ route('sales.store') }}",
            "data-ajax-method": "post",
            "data-ajax": true,
            "data-ajax-complete": "saveSuccess",
        });
    });
    
    function saveSuccess(data) {
        if(data.status == '200') {
            window.location.reload();
        }
        console.log(data.status);
    }
    
    // + button
    let course = 0;
    $('.openSelectSaleModal').click(function(){
       course = $(this).attr('data-course_id'); 
       $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: $(this).attr('data-url'),
            method: 'POST',
            success: function(res){
                $('#selectSaleModal form').html(res);
            }
       }); 
    });
    
    // Apply button
    $('#course_sale').click(function(){
        let sale = 0;
        $('.selected_item').each(function(){
            if($(this).is(':checked')) {
                sale = $(this).attr('data-sale_id');
            }
        });
        
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: "{{ route('sales.course_sale') }}",
            method: 'POST',
            data: {sale, course},
            success: function(){
                window.location.reload();
            }
        })
    });
    
    $('#reset_items').click(function(){
    
        $('.selected_item').prop('checked', false);
    })

</script>
@endsection