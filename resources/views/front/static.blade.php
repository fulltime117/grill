@extends ('layouts.front')

@section('page-title')
    <title> {{ $page->page_name }} </title>
@endsection


@section('page-styles')
    <style>
        #app .banner-area{
            background-image: url( "{{ asset($page->banner) }}" ) !important;
            background-position: bottom;
            background-attachment: unset;
        }
    </style>
@endsection


@section('content')


<div class="banner-area">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <h2> {{ $page->banner_title }} </h2>
                </div>
            </div>
        </div>
    </div>
</div>


<section style="direction: rtl; text-align: right; margin-top: 50px;">
    <div class="container">
        <div class="col-md-12 col-sm-12">
            <div class="aboutcontent">
                <h2 style="text-align: center; width:100%">
                    {!! $page->title !!}
                </h2>
                {!! $page->body !!}
                <br/>
                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>

    

@endsection





@section('scripts')

<script>

</script>

@endsection