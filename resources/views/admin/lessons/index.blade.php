@extends ('layouts.admin')


@section('page-title')
    <title>Admin - lessons List</title>
@endsection


@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/custom_dt_html5.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/dt-global_style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/elements/avatar.css')}}">
@endsection

@section('breadcrumb')
    @if(isset($courses))
        <li class="breadcrumb-item"><a href="{{ route('admin.courses') }}">Courses</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('admin.courses', $course) }}">{{ $course->course_name }}</a></li>
    @endif
    <li class="breadcrumb-item"><a href="javascript:void(0);"> Lessons </a> </li>
    <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">All</a> </li>
@endsection

@section('content')

    <div class="row layout-top-spacing">
                
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="d-flex justify-content-between px-4 align-items-center border-bottom">
                    <h4 class="">Lessons List
                        <span class="ml-2 bs-tooltip text-warning" title="If this lesson status is active, it will be ordered in its course. If this lesson has current user please consider to it inactive, edit, delete. if it is need to do some action for this lesson in case it has users, please contact to developer.">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                        </span>
                    </h4>
                    <a href="{{route('admin.lessons.create')}}" class="bs-tooltip" title="Add Lessons"> 
                        Add <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0066ff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg> 
                    </a>
                </div>
                
                <div class="table-responsive mb-4 mt-4">
                    
                    @if(isset($courses))
                        <div class="d-flex align-items-center justify-content-between mb-2 mx-3">
                            <div class="" style="max-width: 450px">
                                <div class="mb-2">
                                    
                                    <a href="{{ route('admin.courses') }}" class="text-info">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
                                        View All Courses
                                    </a>
                                </div>
                                
                                <select name="course" id="select-course" class="form-control" data-url="{{ route('admin.lessons.course', 'course_id') }}">
                                    @forelse($courses as $c)
                                        <option @if($c->id == $course->id) selected @endif 
                                            value="{{ $c->id }}"
                                            data-url="{{ route('admin.lessons.course', $c->id) }}"
                                            >{{ $c->course_name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                            <div class="media">
                                <div class="mr-2">
                                    <div>All Lessons for </div>
                                    <span class="text-info">{{ $course->course_name }}</span>
                                </div>
                                <img src="{{ $course->cover_image }}" width="120" class="rounded-circle">
                            </div>
                        </div>
                    @endif
                    
                    <table id="lessonlist" class="table table-hover non-hover" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Course Name</th>
                                <th>Lesson Name</th>
                                <th>View Questions</th>
                                <th>Status</th>
                                <th>Current Users</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @forelse ($lessons as $lesson)
                                <tr>
                                    <td>{{$lesson->id}}</td>
                                    <td><a href="{{ route('admin.courses.show', $lesson->course->id) }}" class="text-info">#{{$lesson->course->id}} | {{ Str::limit($lesson->course->course_name, 30, '...') }}</a></td>
                                    <td>
                                        <a class="text-info bs-tooltip" title="View Lesson"href="{{ route('admin.lessons.show', $lesson->id) }}">
                                            #{{$lesson->lesson_number}} | {{ $lesson->lesson_name }}
                                        </a>
                                    </td>
                                    <td>
                                        
                                        <div class="spinner-border text-success align-self-center @if($lesson->questions->count() < 4) text-warning @endif" style="display: flex; justify-content: center;align-items: center;animation: spinner-border 0s linear infinite;!important">
                                            <a href="{{ route('admin.questions.lesson', $lesson) }}" class="bs-tooltip text-info" title="View Questions" style="font-size:20px">
                                                {{ $lesson->questions->count() }}
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.lessons.active', $lesson) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="active" value="{{ $lesson->active}}"/>
                                            <button type="submit" class="border-0 bg-transparent">
                                                @if($lesson->active) <span class="badge badge-success">active</span> 
                                                @else <span class="badge badge-danger">inactive</span> 
                                                @endif</button>
                                        </form>
                                    </td>
                                    
                                    <td>
                                        @forelse($lesson->course->courseUsers as $user)
                                            @if($user->pivot->lesson_number == $lesson->lesson_number && !$user->pivot->end_date)
                                                <a href="{{ route('admin.users.show', $user->id) }}" class="bs-tooltip" title="{{ $user->firstname }} {{ $user->lastname }}">
                                                    <img src="{{$user->profile->getImage() }}" width="35px"  class="rounded-circle">
                                                </a>
                                            @endif
                                        @empty
                                        @endforelse
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-center" style="width:80px">
                                            <a href="{{ route('admin.lessons.show', $lesson) }}" 
                                                class="bs-tooltip" title="view {{ $lesson->lesson_name }}"
                                                >
                                                <i class="fa fa-eye text-secondary"></i>
                                            </a>
                                            
                                            <a href="{{ route('admin.lessons.edit', $lesson) }}" 
                                                class="bs-tooltip" title="edit {{ $lesson->lesson_name }}"
                                                >
                                                <i class="fa fa-edit text-primary"></i>
                                            </a>
                                            
                                            <form action="{{ route('admin.lessons.delete', $lesson) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="javascript:void(0);" class="delete-row bs-tooltip" title="delete {{ $lesson->lesson_name }}" ><i class="far fa-trash-alt text-danger"></i></a>
                                            </form>
                                        </div>
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
        "pageLength": 7,
        "order": [[ 1, "asc" ], [2, 'asc']],
    } );
    
    $('#select-course').change(function() {
        const url = $(this).attr('data-url').replace('course_id', $(this).val());
        location.href = url;
    });

</script>
@endsection