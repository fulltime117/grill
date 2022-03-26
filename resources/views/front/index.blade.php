@extends ('layouts.front')

@section('page-title')
    <title> ברוך הבא | בית </title>
@endsection






@section('page-styles')

<style>
    .nav-link:first-child{
        color: #a79344;
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

    
    .detail-course{
        display: flex;
        column-gap: 7px;
        justify-content: flex-end;
        align-items: flex-end;
    }
    
    .cos-dis-cost,
    .cos-reg-cost{
        position: relative;
        font-size: 14px;
    }

    .cos-dis-cost{
        font-weight: 600;
        color: #a79344;
        font-size: 20px;
    }



    .cos-reg-cost::before {
        content: '';
        width: 100%;
        position: absolute;
        right: 0;
        top: 46%;
        border-bottom: 1px solid #333;
        -webkit-transform: skewY(-10deg);
        transform: skewY(-10deg);
    }

    .course-content-bottom{
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-top: 10px;
        flex-direction: row-reverse;
        position: relative;
    }

    .co-view-detail {
        border: 1px solid #a79344;
        background-color: transparent;
        color: #a79344;
        padding: 10px 28px;
        border-radius: 100px;
    }

    .home-ragular-course .single-ragular-course:hover .co-view-detail{
        background-color: #a79344;
        color: #fff;
    }


    
</style>

@endsection


@section('content')
<section class="slider-area">
    <div class="home-slider owl-carousel owl-theme">
        <div class="single-slider single-slider-bg-2" style="background-image:url({{$welcome1->image}})">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-12 text-center">
                                <div class="slider-tittle one">
                                    <h1>
                                    {{-- {{ dd($welcome1) }} --}}
                                        {{ $welcome1->title }}
                                    </h1>
                                    <p style="height: 150px; text-align:center; display: flex;">
                                        <img src="{{asset('front-assets/images/gold-logo.svg')}}" alt="shape"  style="widows: 150px !important"/>
                                    </p>
                                </div>
                                <div class="slider-btn bnt1 text-center">
                                    <a href="{{ route('contactus') }}" class="box-btn">   יצירת קשר </a>
                                    <a href="{{ route('courses') }}" class="border-btn"> צפו בקורסים </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-slider single-slider-bg-1" style="background-image:url({{$welcome2->image}})">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-12 text-center">
                                <div class="slider-tittle one">
                                    <h1>
                                        {{ $welcome2->title }}
                                    </h1>
                                    <p style="height: 140px; text-align:center; display: flex; font-size: 1.25rem;">
                                       {{ $welcome2->body }}
                                    </p>
                                </div>
                                <div class="slider-btn bnt1 text-center">
                                    <a href="{{ route('contactus') }}" class="box-btn">  יצירת קשר </a>
                                    <a href="{{ route('courses') }}" class="border-btn"> צפו בקורסים </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</section>


<section class="service-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="single-service text-center">
                    <div class="service-icon">
                        <i class="fa fa-envelope-o"></i>
                    </div>
                    <div class="service-content">
                        <h2>דוא"ל ליצירת קשר</h2>
                        <p> {{ $contactus->email }} </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="single-service text-center">
                    <div class="service-icon">
                        <i class="flaticon-pin"></i>
                    </div>
                    <div class="service-content">
                        <h2>כתובת</h2>
                        <p>{{ $contactus->address }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="single-service text-center sst-10">
                    <div class="service-icon">
                        <i class="flaticon-telephone"></i>
                    </div>
                    <div class="service-content">
                        <h2>טלפון</h2>
                        <p>{{ $contactus->phone }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="shape-ellips">
    <img src="{{asset('front-assets/images/shape.png')}}" alt="shape" />
</div>

<section class="home-ragular-course pb-100">
    <div class="container">
        <div class="section-tittle text-center">
            <h2>{{ $frontcourse->title }}</h2>
            <p>
                {{ $frontcourse->body }}
            </p>
        </div>
        <div class="row" style="direction:rtl">
            @foreach($courses as $course)
                <div class="col-lg-4 col-md-6">    

                    <a href="{{ route('coursedetail', $course) }}">
                        <div class="single-ragular-course">
                            <div class="course-img">
                                <img src="{{asset($course->cover_image)}}" alt="ragular" />
                                @if($course->discounted())
                                    <div class="hot-onsale">
                                        <div class="sale-ribbon"> Sale </div>
                                    </div>
                                @endif
                            </div>
                            <div class="course-content">
                                <h3 style="color: #181818">{{ $course->course_name }}</h3>
                                <p class="mb-0">
                                    {{ Str::limit($course->overview, 50, '...') }}
                                </p>
                                <div class="course-content-bottom">
                                    <div style="position: absolute; top: 0;">
                                        <a  href="{{ route('coursedetail', $course) }}" class="co-view-detail">קרא עוד</a>
                                    </div>
                                    <div class="detail-course">
                                        @if($course->discounted())
                                            <div class="cos-dis-cost">₪{{ $course->discounted() }}</div>
                                            <div class="cos-reg-cost">₪{{ $course->course_price }}</div>
                                        @else
                                            <div class="cos-dis-cost"> ₪{{ $course->course_price }}</div>
                                        @endif
                                    </div>
                                </div>                                
                            </div>
                        </div>
                    </a>
                    

                </div>
            @endforeach
        </div>
    </div>
</section>


<section class="choose-area">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6 pl-0">
                <div class="home-choose-content">
                    <div class="section-tittle">
                        {{-- {{ dd($why) }} --}}
                        <h2>{{ $why->title }}</h2>
                        <p>
                            {{ $why->body }}
                        </p>
                    </div>
                    <div>
                        <ul class="choose-list-left">
                            @php
                                $items = $why->items == null ? [] : explode(chr(13) . chr(10), $why->items);
                            @endphp
                            @foreach ($items as $item)
                                <li><i class="flaticon-check-mark"></i>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <a href="{{ route('aboutus') }}" class="box-btn" title="Know More">יודע יותר</a>
                </div>
            </div>
            <div class="col-lg-6 home-choose">
                <div class="home-choose-img">
                    <img src="{{ $why->image }}" alt="choose" />
                </div>
            </div>
        </div>
    </div>
</section>

<section class="course-slider-area partnerarea alt-back" >
    <div class="container">    
        <div class="section-tittle text-center">
            <h2 class="mb-3"> השותפים שלנו </h2>
        </div>
        
        <div class="course-slider owl-carousel owl-theme">
            <div class="row align-items-center">
                <div class="partner-logo-container">
                    <img src="{{asset($partner1->image)}}" alt="partner" />
                </div>
            </div>
            <div class="row align-items-center">
                <div class="partner-logo-container">
                    <img src="{{asset($partner2->image)}}" alt="partner" />
                </div>
            </div>
            <div class="row align-items-center">
                <div class="partner-logo-container">
                    <img src="{{asset($partner3->image)}}" alt="partner" />
                </div>
            </div>
            <div class="row align-items-center">
                <div class="partner-logo-container">
                    <img src="{{asset($partner4->image)}}" alt="partner" />
                </div>
            </div>
        </div>
    </div>
</section>

<span class="left-shape">
    <img src="{{asset('front-assets/images/left-shape.png')}}" alt="shape" />
</span>

<section class="home-news pb-100 pt-100">
    <div class="container">
        <div class="section-tittle text-center">
            <h2>{{ $frontpost->title }}</h2>
            <p>
                {{$frontpost->body}}
            </p>
        </div>
        <div class="row">
            @foreach ($posts as $post)
                <div class="col-lg-4 col-md-6">
                    <div class="single-home-news">
                        <a href="{{ route('posts.show', $post) }}">
                            <img src="{{ $post->image }}" alt="news" />
                        </a>
                        <div class="single-home-content">
                            <h2>{{ $post->title }}</h2>
                            <p class="calender">
                                <i class="flaticon-calendar"></i> {{ $post->updated_at->diffForHumans() }} | {{ $post->user->firstname }}
                            </p>
                            <p>
                                {!! Str::limit($post->body, 90, '...') !!}
                            </p>
                            <a href="{{ route('posts.show', $post) }}" class="line-bnt" style="width: 100%; text-align: left;">   קרא עוד  <i class="flaticon-next"></i> </a>
                        </div>
                    </div>
                </div>
            @endforeach
            
        </div>
    </div>
</section>



@endsection





@section('scripts')

<script>

</script>

@endsection