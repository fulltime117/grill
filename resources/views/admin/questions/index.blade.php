@extends ('layouts.admin')


@section('page-title')
    <title>Admin - lessons List</title>
@endsection


@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/custom_dt_html5.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/dt-global_style.css')}}">
    
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="javascript:void(0);">Questions</a> </li>
<li class="breadcrumb-item active"><a href="javascript:void(0);">List</a> </li>
@endsection

@section('content')
    <div class="row layout-top-spacing">
                
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="d-flex justify-content-between px-4 align-items-center border-bottom">
                    <h4 class="">Questions List</h4>
                    <a href="javascript:void(0);"
                        id="display_add_question_form"
                        data-toggle="modal" 
                        data-target="#addQuestion" 
                        class="bs-tooltip" title="Add Question for Lesson"> 
                        Add <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0066ff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg> 
                    </a>
                </div>
            
                <div class="table-responsive mb-4 mt-4">
                    @if(isset($lesson))
                        <div class="d-flex align-items-center justify-content-between mb-2 mx-3">
                            <div class="d-flex">
                                <div class="" style="max-width: 450px">
                                    <div class="mb-2">
                                        
                                        <a href="{{ route('admin.courses') }}" class="text-info">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
                                            View All Courses
                                        </a>
                                    </div>
                                    
                                    <select name="course" id="select-course" class="form-control" data-url="{{ route('admin.questions.lesson', 'lesson_id') }}">
                                        @forelse($courses as $c)
                                            @if($c->lessons->count())
                                                <option @if($c->id == $lesson->course_id) selected @endif 
                                                    value="{{ $c->lessons()->first()->id}}"
                                                    data-url="{{ route('admin.questions.lesson', 'lesson_id') }}"
                                                    >{{ $c->course_name }} | #{{ $c->id }}</option>
                                                
                                            @endif
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                                <div class="ml-2" style="max-width: 450px">
                                    <div class="mb-2">
                                        
                                        <a href="{{ route('admin.lessons.course', $lesson->course_id) }}" class="text-info">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
                                            View lessons
                                        </a>
                                    </div>
                                    
                                    <select name="lesson" id="select-lesson" class="form-control" data-url="{{ route('admin.questions.lesson', 'lesson_id') }}">
                                        @forelse($lesson->course->lessons as $le)
                                            <option @if($le->id == $lesson->id) selected @endif 
                                                value="{{ $le->id }}"
                                                data-url="{{ route('admin.questions.lesson', 'lesson_id') }}"
                                                >#{{$le->lesson_number}} | {{ $le->lesson_name }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="media">
                                <div class="mr-2">
                                    <div>Questions for </div>
                                    <span class="text-info">{{ $lesson->lesson_name }} {{ $lesson->lesson_number }}</span>
                                </div>
                                <img src="{{ $lesson->lesson_image }}" width="120" class="rounded-circle">
                            </div>
                        </div>
                    @endif
                    
                    <table id="questionlist" class="table table-hover non-hover" style="width:100%">
                        <thead>
                            <tr>        
                                <th>ID</th>
                                <th>Question</th>
                                <th>Lesson</th>
                                <th>Option1</th>
                                <th>Option2</th>
                                <th>Option3</th>
                                <th>Option4</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($questions as $question)
                                <tr>
                                    <td>{{$question->id}}</td>
                                    <td>
                                        {{ $question->q }}
                                    </td>
                                    <td><a href="{{ route('admin.lessons.show', $question->lesson) }}" class="text-info">{{$question->lesson->lesson_name}}</a></td>
                                    <td class="@if($question->answer_number == 1) text-success @endif">{{$question->opt1}}</td>
                                    <td class="@if($question->answer_number == 2) text-success @endif">{{$question->opt2}}</td>
                                    <td class="@if($question->answer_number == 3) text-success @endif">{{$question->opt3}}</td>
                                    <td class="@if($question->answer_number == 4) text-success @endif">{{$question->opt4}}</td>
                                    <td>
                                        <form action="{{ route('admin.questions.active', $question) }}" method="post">
                                            @csrf
                                            <input type="hidden" name="active" value="{{ $question->active}}"/>
                                            <button type="submit" class="border-0 bg-transparent">
                                                @if($question->active) <span class="badge badge-success">active</span> 
                                                @else <span class="badge badge-danger">inactive</span> 
                                                @endif</button>
                                        </form>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-center" style="width:80px">
                                            <a href="{{ route('admin.questions.edit', $question) }}" data-target="#editQuestion" data-toggle="modal"
                                                class="display_edit_question_form bs-tooltip" title="edit {{ $question->q }}"
                                                >
                                                <i class="fa fa-edit text-primary"></i>
                                            </a>
                                            
                                            <form action="{{ route('admin.questions.delete', $question) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="javascript:void(0);" class="delete-row bs-tooltip" title="delete {{ $question->q }}" ><i class="far fa-trash-alt text-danger"></i></a>
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
    
    
    <!-- Modal -->
    <div id="app">
        
        <div class="modal fade animated fadeInLeft" id="addQuestion" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Question</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="add_question_form" action="{{ route('admin.questions.store') }}" method="post">
                            <ul class="display_form_errors d-none my2"></ul>
                            @csrf
                            @if(isset($lesson))
                                <add-question :courses="{{$courses}}" :lessons="{{$lessons}}" :lesson="{{$lesson}}"></add-question>
                            @else
                                <add-question :courses="{{$courses}}" :lessons="{{$lessons}}"></add-question>
                            @endif
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                        <button type="submit" id="add_question" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade animated fadeInLeft" id="editQuestion" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Question</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="edit_question_form" action="{{ route('admin.questions.update', 'question_id') }}" method="post">
                            <ul class="display_form_errors d-none my2"></ul>
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="q">Question <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="e_q" name="q" placeholder="fill in question">
                            </div>
                            
                            <div class="form-group row">
                                
                                <div class="col-md-6">
                                    <label for="course">Selected Course</label>
                                    <input type="text" disabled class="selected_course form-control">
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="lesson">Select Lesson <span class="text-danger">*</span></label>
                                    <input type="text" disabled class="selected_lesson form-control">
                                    <input type="hidden" name="lesson_id">
                                </div>
                    
                            </div>
                                
                                
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <div class="n-chk align-self-end">
                                            <label class="new-control new-radio radio-success" style="height: 21px; margin-bottom: 0; margin-left: 0">
                                              <input type="radio" class="new-control-input click-option" name="radio-button" data-option="1">
                                              <span class="new-control-indicator"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <input type="text" name="opt1" class="form-control" aria-label="radio">
                            </div>
                            
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <div class="n-chk align-self-end">
                                            <label class="new-control new-radio radio-success" style="height: 21px; margin-bottom: 0; margin-left: 0">
                                              <input type="radio" class="new-control-input click-option" name="radio-button" data-option="2">
                                              <span class="new-control-indicator"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <input type="text" name="opt2" class="form-control" aria-label="radio">
                            </div>
                            
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <div class="n-chk align-self-end">
                                            <label class="new-control new-radio radio-success" style="height: 21px; margin-bottom: 0; margin-left: 0">
                                              <input type="radio" class="new-control-input click-option" name="radio-button"  data-option="3">
                                              <span class="new-control-indicator"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <input type="text" name="opt3" class="form-control" aria-label="radio">
                            </div>
                            
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <div class="n-chk align-self-end">
                                            <label class="new-control new-radio radio-success" style="height: 21px; margin-bottom: 0; margin-left: 0">
                                              <input type="radio" class="new-control-input click-option" name="radio-button" data-option="4">
                                              <span class="new-control-indicator"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <input type="text" name="opt4" class="form-control" aria-label="radio">
                            </div>
                            
                            <div class="form-group">
                                <input type="text" name="answer_number" readonly class="form-control" placeholder="Please select Correct Answer">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                        <button type="submit" id="edit_question" class="btn btn-primary">Save</button>
                    </div>
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
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script> -->
@endsection


@section('scripts')
<script>
    const action = $('#edit_question_form').attr('action');
    let add_form_errors = [];
    let edit_form_errors = [];
    
    setTimeout(() => {
        $('#question_id').attr('question_id', 'hi');
    }, 2000);
    
    $('#questionlist').DataTable( {
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
    
    
    $('#select-course').change(function() {
        const url = $(this).attr('data-url').replace('lesson_id', $(this).val());
        location.href = url;
    });
    
    $('#select-lesson').change(function() {
        const url = $(this).attr('data-url').replace('lesson_id', $(this).val());
        location.href = url;
    });
    
    
    
    //modal section
    $('.display_edit_question_form').click(function() {
        
        const $this = $(this);
        edit_form_errors = [];
        $('#edit_question_form :input').removeClass('border-danger');
        $('#edit_question_form .display_form_errors').addClass('d-none');
        
        $.ajax({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            url: $this.attr('href'),
            dataType: 'json',
            success: function(data){
                $('#edit_question_form .selected_course').val('#' + data.course.id + ' | ' + data.course.course_name);
                $('#edit_question_form .selected_lesson').val('#' + data.lesson.lesson_number + ' | ' + data.lesson.lesson_name);
                $('#edit_question_form input[name="lesson_id"]').val(data.lesson.id);
                $('#edit_question_form input[name="q"]').val(data.question.q);
                $('#edit_question_form input[name="opt1"]').val(data.question.opt1);
                $('#edit_question_form input[name="opt2"]').val(data.question.opt2);
                $('#edit_question_form input[name="opt3"]').val(data.question.opt3);
                $('#edit_question_form input[name="opt4"]').val(data.question.opt4);
                $('#edit_question_form input[name="answer_number"]').val(data.question.answer_number);
                $('#edit_question_form .click-option').each(function() {
                    if($(this).attr('data-option') == data.question.answer_number){
                        $(this).prop('checked', true);
                    }
                });
                const _action = action.replace('question_id', data.question.id);
                $('#edit_question_form').attr('action', _action);
                
            },
        })
    });
    
    $('#edit_question_form .click-option').click(function() {
        $('#edit_question_form input[name="answer_number"]').val($(this).attr('data-option'));
    });
    
    $('#edit_question').click(function(e) {
        e.preventDefault();
        if(!$('#edit_question_form input[name="q"]').val()) {
            $('#edit_question_form input[name="q"]').addClass('border-danger');
            edit_form_errors.push('Please fill question');
        }
        if(!$('#edit_question_form input[name="opt1"]').val()) {
            $('#edit_question_form input[name="opt1"]').addClass('border-danger');
            edit_form_errors.push('Please fill option1');
        }
        if(!$('#edit_question_form input[name="opt2"]').val()) {
            $('#edit_question_form input[name="opt2"]').addClass('border-danger');
            edit_form_errors.push('Please fill option2');
        }
        if(!$('#edit_question_form input[name="opt3"]').val()) {
            $('#edit_question_form input[name="opt3"]').addClass('border-danger');
            edit_form_errors.push('Please fill option3');
        }
        if(!$('#edit_question_form input[name="opt4"]').val()) {
            $('#edit_question_form input[name="opt4"]').addClass('border-danger');
            edit_form_errors.push('Please fill option4');
        }
        if(edit_form_errors.length){
            let output = '';
            edit_form_errors.forEach(err => {
                output += `<li>${err}</li>`;
            });
            $('#edit_question_form .display_form_errors').removeClass('d-none');
            $('#edit_question_form .display_form_errors').html(output);
            return false;
        }
        $('#edit_question_form').submit();
    })
    
    
    
    
    
    
    $('#display_add_question_form').click(function() {
        $('#add_question_form :input').removeClass('border-danger');
        $('#add_question_form .display_form_errors').addClass('d-none');
        add_form_errors = [];
    })
    
    $('#add_question').click(function(e) {
        e.preventDefault();
        
        if(!$('#add_question_form input[name="q"]').val()) {
            $('#add_question_form input[name="q"]').addClass('border-danger');
            add_form_errors.push('Please fill question');
        }
        if(!$('#lesson').val()) {
            $('#lesson').addClass('border-danger');
            add_form_errors.push('Please select lesson');
        }
        if(!$('#add_question_form input[name="opt1"]').val()) {
            $('#add_question_form input[name="opt1"]').addClass('border-danger');
            add_form_errors.push('Please fill option1');
        }
        if(!$('#add_question_form input[name="opt2"]').val()) {
            $('#add_question_form input[name="opt2"]').addClass('border-danger');
            add_form_errors.push('Please fill option2');
        }
        if(!$('#add_question_form input[name="opt3"]').val()) {
            $('#add_question_form input[name="opt3"]').addClass('border-danger');
            add_form_errors.push('Please fill option3');
        }
        if(!$('#add_question_form input[name="opt4"]').val()) {
            $('#add_question_form input[name="opt4"]').addClass('border-danger');
            add_form_errors.push('Please fill option4');
        }
        if(add_form_errors.length){
            let output = '';
            add_form_errors.forEach(err => {
                output += `<li>${err}</li>`;
            });
            $('#add_question_form .display_form_errors').removeClass('d-none');
            $('#add_question_form .display_form_errors').html(output);
            return false;
        }
        
        if(!$('input[name="answer_number"]').val()) {
            swal({
                title: 'Hey',
                text: "Select Correct Answer option",
                type: 'info',
                padding: '2em'
            });
            return false;
        }
        
        $('#add_question_form').submit();
        
    });

</script>
@endsection