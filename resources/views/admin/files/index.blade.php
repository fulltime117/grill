@extends ('layouts.admin')


@section('page-title')
    <title>Admin - File Management</title>
@endsection


@section('page-styles')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
    <style>
        .btn-group:last-child{
            display: none;
        }
        .fm-content .fm-content-body {
            height: 472px;
        }
    </style>
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">File Management</a></li>
@endsection

@section('content')

    <div class="row layout-top-spacing">
                
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-6" style="height: calc(100vh - 210px);">
                <div style="height:100%">
                    <div id="fm"></div>
                </div>
            </div>
        </div>
        
    </div>
    
@endsection

@section('page-scripts')
    <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
@endsection


@section('scripts')


@endsection