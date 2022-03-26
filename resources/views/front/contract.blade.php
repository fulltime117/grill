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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>
    <style>
        .time-traker {
            text-align: center;
            position: relative;
            margin-top: 30px;
        }
        #timer {
            position: relative;
            display: flex;
            justify-content: center;
            column-gap: 5px;
            border: 1px solid #7b6b2b;
            width: 121px;
            margin-left: auto;
            margin-right: auto;
            font-size: 25px;
            background: linear-gradient(
        5deg
        , rgba(167,147,68,1) 0%, rgba(167,143,50,1) 35%, rgba(236,222,144,1) 100%);
            border-radius: 7px;
            padding: 8px;
            color: white;
        }

        #timer::before{
            content: '';
            width: 16px;
            height: 9px;
            background-color: #a08c3f;
            position: absolute;
            bottom:-9px;
            left: 17px;
            border-bottom-left-radius: 3px;
            border-bottom-right-radius: 6px;            
        }

        
        #timer::after{
            content: '';
            width: 16px;
            height: 9px;
            background-color: #a78f32;
            position: absolute;
            bottom:-9px;
            right: 17px;
            border-bottom-right-radius: 3px;            
            border-bottom-left-radius: 6px;
        }

        #timer.sticky{
            position: fixed;
            top: 25px;
            left: 50%;
            transform: translate(-50%, 0);
            z-index: 20;
        }

        @media only screen and (max-width: 480px){
            .gradient-box {
                margin-top: 20px;
            }
        }

    </style>    
</head>
<body>
    

    <section style="direction: rtl; text-align: right;" class="contarct-page-area">
        
        <div class="time-traker" >
            <h4>חתמו על החוזה תוך 15 דקות</h4>
            <div id="timer">
                <div class="min"><span class="count">--</span></div>
                <div> : </div>
                <div class="sec"><span class="count">--</span></div>
            </div>
        </div>
        
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
                            מחיר קורס : ₪ {{ $course->course_price}}
                        </div>
                    </div>
                </div>

                <div class="row cancellation-title-area">
                    <div class="col-lg-12">
                        <div class="site-logo text-center">
                            <img src ={{asset('front-assets/images/gold-logo.svg') }} alt="gold logo" width="150">
                        </div>

                        <div class="my-4" style="display: flex; justify-content: center;">
                            @if($user->lessons || $user->coupon_code)
                            <div class="col-lg-8 pb-2" style="border: 3px #c5ac35 dashed; padding: 24px;">
                                @if($user->lessons)
                                    <h4 class="text-center mb-3">Spilt Payment</h4>
                                    <table width="100%" class="table mb-0" style="color: #655a5a">
                                        @php
                                            $lessons_arr = json_decode($user->lessons); 
                                        @endphp
                                        <tbody>
                                            <tr>
                                                <td style="width: 35%;">Order Lesson</td>
                                                <td style="display: flex"> 
                                                    <div >   From  : </div>
                                                    <div class="mr-2"> {{ $lessons_arr[0] }} </div> 
                                                </td>
                                                <td style="display: flex"> 
                                                    <div >   To  : </div>
                                                    <div class="mr-2"> {{ $lessons_arr[count($lessons_arr) - 1] }} </div> 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Amount to Pay</td>
                                                <td colspan="2">₪<span style="font-size: 18px;
                                                    font-weight: 600; color: #292929;">  {{ $user->amount }} </span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                @endif
                                
                                
                                @if($user->coupon_code)
                                    <h5 class="text-center mb-3">Coupon Apply</h5>
                                    <table width="100%" class="table mb-0" style="color: #655a5a">
                                        <tbody>
                                            <tr style="font-size: 14px;">
                                                <td style="width: 50%">Course Price</td>
                                                <td style="width:1%; text-align:left"><span style="text-decoration:line-through">₪{{$course->course_price}}</span></td>
                                                <td></td>
                                            </tr>
                                            <tr style="font-size: 14px;">
                                                <td style="width: 50%"> הנחה<span id="discount"> ({{ $discount }}%) </span>  </td>
                                                <td style="text-align: left"><span id="discounted">₪{{ strval($user->amount) - (strval($user->amount) * $discount / 100 ) }}</span></td>
                                                <td style="font-weight:bold; text-align:left">-</td>
                                            </tr>
                                            {{-- <tr><td colspan="3" height="12px"></td></tr> --}}
                                            <tr style="font-size: 16px; border-top: 1px solid #dedede;">
                                                <td > Amount to Pay </td>
                                                <td colspan="2" style="width: 50%;"> <span id="amountToPay_2"> ₪ <span style="font-size: 18px;
                                                    font-weight: 600; color: #292929;">{{ $user->amount }}</span></span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                @endif
                            </div>        
                            @endif
                        </div>

                        <div class="">
                            <h2 class="text-center">מדיניות ביטולים וגילוי נאות</h2>
                        </div>
                    </div>
                </div>
                
                @php 
                
                @endphp
                
                
                
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        {!! $contract_content !!}
                    </div>
                    <div class="col-lg-12 text-center" style="margin-bottom:80px; z-index: 3;">
                        <p>(אנא חתמו את שמכם באמצעות העכבר לאחר קריאת התנאים וההגבלות.)</p>
                        <!--<p>(Please sign your name with mouse after read the terms and conditions.)</p>-->
                        <canvas id="canvas" style="border:2px dashed #ece194; background-color:#ffffd8; width:100%; height:170px" ontouchstart="handleStart(event)" ontouchmove="handleMove(event)" ontouchend="handleEnd(event)"></canvas>
                        <img id='sign_image' src='' style="display:none;border:1px solid blue;width:100%;height:170px"/>
                        <div class="sign-submit-btn-wrapper">
                            @php 
                                $action = $user->ask_pay ? route('charge', $user->phone_token) : route('complete_contract', $user->phone_token);
                            @endphp
                            <form id="signup_form" action="{{ $action }}" method="post">
                                @csrf
                                <input type="hidden" name="sign_data" id="sign_data">
                                <button id="signup" type="submit" class="btn" data-text="I agree">אני מסכים</button>
                                
                                @if(session('alert'))
                                    <div class="alert alert-danger">
                                        {{ session('alert')}}
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                    
                </div> 
                
                
            </div>

            <div class="overall-bottom-left"></div>
            <div class="overall-bottom-right"></div>
        </div>
    </section>


    <script src="{{ asset('assets/js/custom-canvas.js') }}"></script>
    <script src="{{asset('assets/js/libs/jquery-3.1.1.min.js')}}"></script>
    
    <script>
        $('#signup').click(function(e) {
            e.preventDefault();
            document.getElementById('sign_image').src = canvas.toDataURL();
            document.getElementById('sign_data').value = document.getElementById('sign_image').src;
        
            if (is_signed == false)
                swal("Error", "Please sign your name with mouse.", "error");
            else
                document.getElementById("signup_form").submit();
        });
        
        
        // Set the date we're counting down to
        
        
        var countDownDate = new Date().getTime() + 15*60*1000;
        
        
        // Update the count down every 1 second
        var countdownfunction = setInterval(function() {
        
          // Get todays date and time
          var now = new Date().getTime();
          
          // Find the distance between now an the count down date
          var distance = countDownDate - now;
          
          // Time calculations for days, hours, minutes and seconds
          var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);
          
          // Output the result in an element with id="demo"
          document.getElementById("timer").innerHTML = 
          '<div class="sec"><span class="count">'+ seconds +'</span></div>' +
          '<div> : </div>' +
         '<div class="min"><span class="count">'+ minutes +'</span></div>' ;
          
          // If the count down is over, write some text 
          if (distance < 0) {
            clearInterval(countdownfunction);
            document.getElementById("timer").innerHTML = "EXPIRED";
          }
        }, 1000);



        window.onscroll = function() {myFunction()};

        var header = document.getElementById("timer");
        var sticky = header.offsetTop;

            function myFunction() {
            if (window.pageYOffset > sticky) {
                header.classList.add("sticky");
            } else {
                header.classList.remove("sticky");
            }
        }
    </script>
</body>
</html>



