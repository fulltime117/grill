@extends ('layouts.front')

@section('page-title')
    <title> Responsibility </title>
@endsection


@section('page-styles')
@endsection


@section('content')


<div class="banner-area about">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <h2>אחריות בית עסק</h2>
                </div>
            </div>
        </div>
    </div>
</div>


<section style="direction: rtl; text-align: right; margin-top: 50px;">
    <div class="container">
        <div class="col-md-12 col-sm-12">
            <div class="aboutcontent">
                {!! $responsibility !!}
            </div>
        </div>
    </div>
</section>

    

@endsection





@section('scripts')

<script>

</script>

@endsection