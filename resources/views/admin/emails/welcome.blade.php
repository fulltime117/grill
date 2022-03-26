@extends ('layouts.admin')


@section('page-title')
    <title>Admin - FAQ</title>
@endsection


@section('page-styles')
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/custom_dt_html5.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/table/datatable/dt-global_style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/apps/todolist.css')}}">
    <link href="{{asset('plugins/flatpickr/flatpickr.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/flatpickr/custom-flatpickr.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/components/custom-modal.css')}}" rel="stylesheet" type="text/css" />
   
    
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('emails') }}">Emails</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">Send Email</a></li>
    
@endsection

@section('content')

    <div class="row layout-top-spacing">
                
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="d-flex justify-content-between px-4 align-items-center border-bottom">
                    <h4 class="">Email Test</h4>
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#addCoupanModal"  class="bs-tooltip" title="New FAQ"> 
                        Add <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0066ff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg> 
                    </a>
                </div>
                
                <div class="row mt-4 mb-4">
                
                    <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                        @if(session('success'))
                            <div class="form-group">
                                <div class="alert alert-success">{{ session('success') }}</div>
                            </div>
                        @endif
                        
                        <form action="{{ route('emails.send') }}" method="post"> 
                            @csrf
                            <div class="form-group">
                                <label for="to">To:</label>
                                <input type="text" name="to" class="form-control" value="difficulttask@outlook.com">
                                @error('to')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="subject">Subject:</label>
                                <input type="text" name="subject" class="form-control" value=" ברוכים הבאים להרשם לאתר גרילמן שלנו! ">
                                @error('subject')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="body">Message:</label>
                                <textarea type="text" name="body" class="form-control"> אתה יכול ללחוץ כאן כדי לגשת לאתר שלנו. </textarea>
                                @error('body')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            
            </div>
        </div>
        
    </div>
    

@endsection

@section('page-scripts')
    
@endsection


@section('scripts')
<script>
    
   
    

</script>
@endsection