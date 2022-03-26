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
    <li class="breadcrumb-item"><a href="javascript:void(0);">Coupons</a></li>
    <li class="breadcrumb-item active"><a href="javascript:void(0);"> List </a></li>
    
@endsection

@section('content')

    <div class="row layout-top-spacing">
                
        <div class="col-lg-8 layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="d-flex justify-content-between px-4 align-items-center border-bottom">
                    <h4 class="">Coupon List</h4>
                    <a href="{{route('cu.create')}}"  
                        class="bs-tooltip" title="Create new coupon"> 
                        Add <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0066ff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg> 
                    </a>
                </div>
                <div class="table-responsive mb-4 mt-4">
                
                    <table id="courselist" class="table table-hover non-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Expired Date</th>
                                <th>Discount</th>
                                <th>Created Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @if(isset($coupons))
                                @foreach ($coupons as $coupon)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $coupon->name }}</td>
                                        <td>{{ Str::limit($coupon->body, 30, '...')}}</td>
                                        <td>{{ $coupon->expired }}</td>
                                        <td>{{ $coupon->discount }}%</td>
                                        <td>{{ substr($coupon->created_at, 0, 10) }}</td>
                                        <td>
                                            
                                            @if(strtotime($coupon->expired) < strtotime("now")) 
                                                <span class="badge badge-danger bs-tooltip" title="Expired Date was already passed by">invalid</span>
                                            @else
                                                <span class="badge badge-success bs-tooltip" title="He can use this coupon because expired date is left">valid</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-between align-items-center" style="width:80px">
                                                <a href="javascript:void(0);"
                                                    data-toggle="modal" 
                                                    class="bs-tooltip" title="View applied users for this coupon"
                                                    data-target="#viewUsersModal_{{$coupon->id}}">
                                                    <i class="fa fa-eye text-secondary"></i>
                                                </a>
                                                <form action="{{ route('cu.delete', $coupon) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="javascript:void(0);" class="delete-row bs-tooltip" title="delete coupon"><i class="far fa-trash-alt text-danger"></i></a>
                                                </form>
                                            </div>
                                            
                                            <div class="modal fade" id="viewUsersModal_{{$coupon->id}}" tabindex="-1" role="dialog" aria-labelledby="addUserModalTitle"aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document"  style="max-width: 800px!important">
                                                    <div class="modal-content" >
                                                        <div class="modal-body" >
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="modal"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                            <div class="compose-box">
                                                                <div class="compose-content" id="addUserModalTitle">
                                                                    <h5 class="">View Users for This Coupon</h5>
                                                                    <div class="d-flex justify-content-around mb-4">
                                                                        <div>
                                                                            Coupon Name: <code>{{$coupon->name}}</code>
                                                                        </div>
                                                                        <div>
                                                                            Discount: <code>{{$coupon->discount}}%</code>
                                                                        </div>
                                                                        <div>
                                                                            Expired Date: <code>{{$coupon->expired}}</code>
                                                                        </div>
                                                                    </div>
                                                                    <div class="table-responsive mb-4 mt-4">
                                                                        <table class="table" style="">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>User Name</th>
                                                                                    <th>Course Name</th>
                                                                                    <th>Coupon Code</th>
                                                                                    <th>Status</th>
                                                                                    <th>Action</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @forelse($coupon->users as $user)
                                                                                    <tr>
                                                                                        <td>
                                                                                            <div class="d-flex align-items-center">
                                                                                                <div class="usr-img-frame mr-2 rounded-circle">
                                                                                                    <a href="{{ route('admin.users.show', $user) }}">
                                                                                                        <img alt="avatar" class="img-fluid rounded-circle" src="{{asset($user->profile->getImage())}}">
                                                                                                    </a>    
                                                                                                </div>
                                                                                                <a href="{{ route('admin.users.show', $user) }}">
                                                                                                    <p class="align-self-center mb-0 admin-name"> {{ $user->firstname }} {{ $user->lastname }}</p>
                                                                                                </a>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>{{\App\Models\Course::find($user->pivot->course_id)->course_name}}</td>
                                                                                        <td>{{$user->pivot->coupon_code}}</td>
                                                                                        <td>
                                                                                            @if($user->pivot->status)
                                                                                                <span class="badge badge-dangerous bs-tootil" title="used at 2022-12-3">Already Used</span>
                                                                                            @else
                                                                                                <span class="badge badge-success">Not Used yet</span>
                                                                                            @endif
                                                                                        </td>
                                                                                        <td>
                                                                                            <a href="javascript:void(0);" 
                                                                                                data-coupon_id="{{$coupon->id}}"
                                                                                                data-user_id="{{$user->id}}"
                                                                                                data-course_id="{{$user->pivot->course_id}}"
                                                                                                class="delete_coupon_pivot" ><i class="far fa-trash-alt text-danger"></i></a>
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
                                                        <div class="modal-footer">
                                                            <button class="btn btn-outline-success" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
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
        
        <div class="col-xl-4 layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="d-flex justify-content-between px-4 align-items-center border-bottom">
                    <h4 class="">User List</h4>
                </div>
                <div class="table-responsive mb-4 mt-4">
                
                    <table id="courselist" class="table table-hover non-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Account</th>
                                <th>Name</th>
                                <th>Coupon</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @if(isset($users))
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <a href="javascript:void(0);">
                                                <div class="d-flex">
                                                    <div class="usr-img-frame mr-2 rounded-circle">
                                                        <img alt="avatar" class="img-fluid rounded-circle" src="{{asset($user->profile->getImage())}}">
                                                    </div>
                                                    <p class="align-self-center mb-0 admin-name"> {{ $user->email }}</p> </p>
                                                </div>
                                            </a>
                                        </td>
                                        <td>{{ $user->firstname }} {{ $user->lastname }}</td>
                                        <td>
                                            @forelse($user->coupons as $coupon)
                                                <a href="javascript:void(0);" class="bs-tooltip" title="{{ $coupon->discount }}%">
                                                    <p class="badge badge-success">{{ $coupon->name }}</p> 
                                                </a>
                                            @empty
                                                
                                            @endforelse
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
    // var f1 = flatpickr(document.getElementById('expired'));
    // var f2 = flatpickr(document.getElementById('expired2'));
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
    
    $('.delete_coupon_pivot').click(function() {
        const $this = $(this);
        swal({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Delete',
          padding: '2em'
        }).then(function(result) {
          if (result.value) {
            
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "{{route('cu.pivot.delete')}}",
                method: 'POST',
                data: {
                    'coupon_id': $this.attr('data-coupon_id'),
                    'user_id': $this.attr('data-user_id'),
                    'course_id': $this.attr('data-course_id'),
                },
                success: function(data) {
                    $this.closest('tr').remove();
                    swal(
                      'Deleted!',
                      'coupon has been deleted.',
                      'success'
                    )
                }
            })
          }
        })
    });
    
    
    
    

</script>
@endsection