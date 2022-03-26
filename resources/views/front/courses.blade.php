@extends ('layouts.front')

@section('page-title')
    <title> Course All </title>
@endsection




@section('page-styles')
    <style>
        #app .banner-area{
            background-image: url( "{{ asset($banners->banner) }}" ) !important;
            background-size: contain;
        }

                
        .course-detail-act{
            display: flex;
            width: 100%;
            border-top: 1px solid #ecf0f1;
            padding: 10px 0;
            justify-content: space-between;
        }

        .detail-course,
        .redemore-button{
            display: flex;
            width: 50%;
            padding: 7px;
        }

        .detail-course{
            display: flex;
            column-gap: 7px;
            padding-right: 20px;
            align-items: flex-end
        }

        .redemore-button{
            display: flex;
            justify-content: flex-end;
            padding-left: 20px 
        }

        .redemore-button a{
            color: #000;
            font-size: 18px;
            display: flex;
            align-items: center;
            column-gap: 4px;
        }

        .redemore-button a:hover{
            color: #a79344;
        }

        .redemore-button a i{
            font-size: 12px;
        }

        .cos-dis-cost,
        .cos-reg-cost{
            position: relative;
            display: flex;
        }

        .cos-dis-cost{
            font-weight: 600;
            color: #a79344;
            font-size: 18px;

        }

        .cos-reg-cost{
            font-size: 14px;
        }



        .cos-reg-cost::before {
            content: '';
            width: 100%;
            position: absolute;
            right: 0;
            top: 50%;
            border-bottom: 1px solid #333;
            -webkit-transform: skewY(-10deg);
            transform: skewY(-10deg);
        }

    
    .hot-onsale {
        position: absolute;
        top: 10px;
        left: 1px;
        z-index: 2;
    }

        .sale-ribbon {
        position: relative;
        margin-top: 15px;
        padding: 2px 15px;        
        width: fit-content;
        margin-left: -10px;
        font-size: 18px;
        color: white;
        font-weight: 200;
        box-shadow: 0px 3px 6px #00000033;
        background: #a79344;
        border-color: #a79344;
    }
    
    .sale-ribbon::before {
        content: "";
        position: absolute;
        height: 0;
        width: 0;
        top: -9px;
        left: 0.1px;
        border-bottom: 9px solid;
        border-color: inherit;
        border-left: 9px solid transparent;
        opacity: 0.7;
    }

    .sale-ribbon::after {
        content: "";
        position: absolute;
        height: 0;
        width: 0;
        bottom: -10px;
        left: 0;
        border-top: 10px solid;
        border-color: inherit;
        border-left: 10px solid transparent;
        opacity: 0.7    
    }


    </style>
@endsection


@section('content')
<div class="banner-area classes">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <h2> {{ $banners->title  }} </h2>
                    <ul>
                        <li>
                            <a href="{{ route('front') }}"> בית </a>
                            <i class="fa fa-angle-double-left"></i>
                            <p class="active">  קורסים  </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="class-area">
    <div class="container">
        <div class="row">
            
            @foreach($courses as $course)
                <div class="col-lg-4 col-md-6">
                    <a href="{{ route('coursedetail', $course) }}">
                        <div class="single-ragular-course">
                            <div class="course-img">
                                <img src="{{asset($course->cover_image)}}" alt="ragular" />
                                <h2>{{ $course->course_name }}</h2>
                                @if($course->discounted())
                                    <div class="hot-onsale">
                                        <div class="sale-ribbon"> Sale </div>
                                    </div>
                                @endif
                            </div>
                            <div class="course-content pb-0">
                                <p>                                        
                                    {{ Str::limit($course->overview, 55) }}
                                </p>                            
                            </div>
                            <div class="course-detail-act">
                                <div class="detail-course">
                                    @if($course->discounted())
                                        <div class="cos-dis-cost">₪{{ $course->discounted() }}</div>
                                        <div class="cos-reg-cost">₪{{ $course->course_price }}</div>
                                    @else
                                        <div class="cos-dis-cost"> ₪{{ $course->course_price }}</div>
                                    @endif
                                </div>
                                <div class="redemore-button">
                                    <a href="{{ route('coursedetail', $course) }}" >  קרא עוד <i class="flaticon-next"></i> </a>
                                </div>
                            </div>
    
                        </div>
                    </a>
                </div>
            @endforeach
            
        </div>
        <div class="d-flex justify-content-center">
            {!! $courses->links() !!}
        </div>
    </div>
</section>
@endsection





@section('scripts')

<script>

</script>

@endsection