<?php
    use Illuminate\Support\Facades\DB;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">    
    <title>Grill | Contarct</title>

    <link rel="stylesheet" type="text/css" href="{{asset('front-assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('front-assets/css/meanmenu.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('front-assets/css/flaticon.css')}}" />
    <link rel="stylesheet" href="{{asset('front-assets/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('front-assets/css/responsive.css')}}" />
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        .back-btn{
            border: 1px solid #a79344;
            border-radius: 100px;
            padding: 12px 40px;
            color: #a79344;
        }

        .back-btn:hover{
            background-color: #a79344;
            color: #ffffff
        }

        #sign_image{
            border: 7px solid #ffffff;
            width: 89%;
            border-radius: 8px;
            height: auto;           
            background-color: #e2c63c1f;
            box-shadow: 0px 0px 0px 1px #c5ac34;
            margin: 25px auto;
        }
        
        .hide-title h2.ql-align-justify{
            display: none;
        }
        



    </style>
</head>
<body>
    

    <section style="direction: rtl; text-align: right;" class="contarct-page-area">
        
        <div class="container gradient-box">

            <div class="overall-top-left"></div>
            <div class="overall-top-right"></div>

            
            <div class="contract-content"> 
                <div class="row">
                    <div class="col-lg-4 col-md-12 client-info">
                        <div>
                            שם הלקוח : {{$user->firstname}} {{ $user->lastname }}
                        </div>
                        <div>
                            טלפון : {{ $user->phone }}
                        </div>
                        <div>
                            אימייל : {{ $user->email }}
                        </div>
                        <div>
                            תַאֲרִיך : {{ substr($user->created_at, 0, 10)  }}
                        </div>
                        <div>
                            זְמַן : {{ substr($user->created_at, 11)  }}
                        </div>
                        <h6> שם קורס : {{ $course->course_name }}</h6>
                        <div>
                            מחיר קורס : ₪{{ $course->course_price}}
                        </div>
                    </div>
                </div>

                <div class="row cancellation-title-area">
                    <div class="col-lg-12">
                        <div class="site-logo text-center">
                            <img src ='/front-assets/images/gold-logo.svg' alt="gold logo" width="150">
                        </div>
                        <div class="">
                            <h2 class="text-center">מדיניות ביטולים וגילוי נאות</h2>
                        </div>
                    </div>
                </div>
                
                <div class="row hide-title">
                    <div class="col-lg-12 col-sm-12">
                        {!! $cancellation !!}
                    </div>
                    <div class="col-lg-12 text-center" style="margin-bottom:80px; z-index: 3;">
                        @php
                            $contract = DB::table('course_user')->where('course_id', $course->id)
                                ->where('user_id', $user->id)->first();
                        @endphp
                        <img id='sign_image' src='{{ $contract->sign_data }}'style=""/>
                        <div class="sign-submit-btn-wrapper">
                            
                            <form >
                                <a href="javascript:history.back()" type="submit" class="btn back-btn" data-text="I agree">
                                    חזור
                                </a>
                            </form>
                        </div>
                    </div>
                    
                </div> 
            </div>

            <div class="overall-bottom-left"></div>
            <div class="overall-bottom-right"></div>
        </div>
    </section>
    
</body>
</html>



