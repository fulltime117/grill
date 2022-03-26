@extends ('layouts.admin')


@section('page-title')
    <title>Admin - Diploma List</title>
@endsection


@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/custom_dt_html5.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/dt-global_style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/apps/todolist.css')}}">
    <link href="{{asset('plugins/flatpickr/flatpickr.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/flatpickr/custom-flatpickr.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/components/custom-modal.css')}}" rel="stylesheet" type="text/css" />
    <style>
        .flatpickr-calendar.open {
            display: inline-block;
            z-index: 1052;
        }
    </style>
    
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.users') }}">Users</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('diploma.index') }}">Diploma List</a></li>
@endsection

@section('content')

    <div class="row layout-top-spacing">
                
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="d-flex justify-content-between px-4 align-items-center border-bottom">
                    <h4 class="">Diploma List</h4>
                </div>
                <div class="table-responsive mb-4 mt-4">
                
                    <table id="courselist" class="table table-hover non-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User Name</th>
                                <th>Identity</th>
                                <th>Course Name</th>
                                <th>End Date</th>
                                <th>Uploaded</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            
                            @forelse ($diplomas as $diploma)
                                @php
                                    $user = \App\Models\User::find($diploma->user_id);
                                    $course = \App\Models\Course::find($diploma->course_id);
                                @endphp
                                <tr>
                                    <td>{{$loop->iteration }}</td>
                                    <td>{{$user->firstname}} {{$user->lastname}}</td>
                                    <td>{{$user->identity}}</td>
                                    <td>{{$course->course_name}}</td>
                                    <td>{{substr($diploma->updated_at, 0, 10)}}</td>
                                    <td>
                                        @if($diploma->diploma)
                                            <a href="{{asset($diploma->diploma)}}" class="bs-tooltip text-info" style="font-size:16px; text-decoration:underline" title="Download Diploma" download>Download</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        <form action="{{route('ajax_diploma_upload', $diploma->id)}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="d-flex justify-content-around">
                                                <div>
                                                    <input type="file" class="form-control-file" name="diploma">
                                                    @error('diploma')
                                                        <div class="text-danger">{{$message}}</div>
                                                    @enderror
                                                </div>
                                                
                                                <button type="submit" class="btn btn-outline-warning">Upload</button>
                                            </div>
                                        </form>
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
    {{--
    <div class="modal fade" id="editCoupanModal" tabindex="-1" role="dialog" aria-labelledby="addTaskModalTitle"aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="modal"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    <div class="compose-box">
                        <div class="compose-content" id="addTaskModalTitle">
                            <h5 class="">Edit FAQ</h5>
                            <form id="edit_coupon_form" action="" method="post">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex mail-to mb-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3 flaticon-notes"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                            <div class="w-100">
                                                <input id="question" type="text" placeholder="Questions..." class="form-control" name="question" value="">
                                                <span class="validation-text"></span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="d-flex mail-to mb-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text flaticon-menu-list"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                            <div class="w-100">
                                                <textarea id="answer" type="text" class="form-control" name="answer">
                                                </textarea>
                                                <span class="validation-text"></span>
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
                    <button id="edit_coupon" class="btn btn-primary ">Update</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal animated custo-zoomInUp zoomInUp" id="addCoupanModal" tabindex="-1" role="dialog" aria-labelledby="addTaskModalTitle"aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-dismiss="modal"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    <div class="compose-box">
                        <div class="compose-content" id="addTaskModalTitle">
                            <h5 class="">Add FAQ</h5>
                            <form id="add_faq_form" action="{{ route('admin.faqs.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="d-flex mail-to mb-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3 flaticon-notes"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                            <div class="w-100">
                                                <input type="text" placeholder="Question..." class="form-control" name="question" value="{{ '' }}">
                                                <span class="validation-text"></span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="d-flex mail-to mb-4">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text flaticon-menu-list"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                            <div class="w-100">
                                                <textarea class="form-control" id="add_answer" name="answer">
                                                </textarea>
                                                <span class="validation-text"></span>
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
                    <button id="add_faq" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    --}}

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
    
    
    $('.open-edit').click(function() {
        $('#edit_coupon_form').attr('action', $(this).attr('data-url'));
        $('#question').val($(this).attr('data-question'));
        $('#answer').val($(this).attr('data-answer'));
    });
    
    
    $('#edit_coupon').click(function() {
        $('#edit_coupon_form').submit();
    });
    
    
    $('#add_faq').click(function() {
        const question = $('#add_faq_form input[name="question"]')
        const answer = $('#add_faq_form textarea')
        if(!question.val()){
            question.css('border', '1px solid #ff0000');
            return false;
        }
        if(!$('#add_answer').val().trim()){
            // console.log($('#add_answer').val().trim()); 
            $('#add_answer').css('border', '1px solid #ff0000');
            return false;
        }
        $('#add_faq_form').submit();
    });
    
    

</script>
@endsection