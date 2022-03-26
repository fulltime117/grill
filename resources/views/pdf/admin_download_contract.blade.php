<?php
    use Illuminate\Support\Facades\DB;
?>
<html lang="hb">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">    
    <title>Grill | Contarct</title>

    <style>
        *{
            font-family: DejaVu Sans, sans-serif;
        }
        body {font-family: DejaVu Sans, sans-serif;}
    </style>
</head>
<body>
    <div class="invoice-box" style="direction: rtl; text-align: right; max-width: 800px;margin: auto;padding: 30px;border: 1px solid #eee;font-size: 16px;line-height: 18px;">
        <table cellpadding="0" cellspacing="0" style="width: 100%;line-height: inherit;text-align: left;">
            <tr class="top">
                <td colspan="2" style="padding: 5px;vertical-align: top;">
                    <table style="width: 100%;line-height: inherit;text-align: left;">
                        <tr>
                            <td style="direction:rtl; padding: 5px;vertical-align: top;text-align: right;padding-bottom: 20px; width: 40%;">
                                <table>
                                    <tr>
                                        <td style="text-align: right"> שם הלקוח </td>
                                        <td style="text-align: center"> : </td>
                                        <td style="text-align: right">{{$user->firstname}}</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right">  אימייל </td>
                                        <td style="text-align: center"> : </td>
                                        <td style="text-align: right">{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: right"> טלפון </td>
                                        <td style="text-align: center"> : </td>
                                        <td style="text-align: right">{{ $user->phone }}</td>
                                    </tr>

                                    <tr>
                                        <td style="text-align: right"> תַאֲרִיך </td>
                                        <td style="text-align: center"> : </td>
                                        <td style="text-align: right"> {{ substr($contract->created_at, 0, 10)  }}</td>
                                    </tr>

                                    <tr>
                                        <td style="text-align: right"> זְמַן </td>
                                        <td style="text-align: center"> : </td>
                                        <td style="text-align: right"> {{ substr($contract->created_at, 11)  }} </td>
                                    </tr>                                    
                                </table>                                
                            </td>
                            
                            <td style="padding: 5px;vertical-align: middle; padding-bottom: 20px;  text-align: center;">
                                <img id='sign_image' src='{{ $logo }}' style="width: 150px; "/>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
           
            <tr class="heading" >
                <td style="padding: 5px;vertical-align: top;text-align: right;background: #eee;border-bottom: 1px solid #ddd;font-weight: bold;">
                    קוּרס
                </td>
                <td style="padding: 5px;vertical-align: top;background: #eee;border-bottom: 1px solid #ddd;font-weight: bold;">
                    מחיר
                </td>
            </tr>
            
            <tr class="item">
                <td style="padding: 5px;vertical-align: top;text-align: right;border-bottom: 1px solid #eee;">
                    {{ $course->course_name }}
                </td>
                <td style="padding: 5px;vertical-align: top;border-bottom: 1px solid #eee;">
                    ₪ {{ $course->course_price}}
                </td>
            </tr>  
            
            <tr class="sign-data">
                <td colspan="2">
                    @php
                        $contract = DB::table('course_user')->where('course_id', $course->id)
                            ->where('user_id', $user->id)->first();
                    @endphp
                    
                    <img src='{{ $contract->sign_data }}' style="
                        border: 1px solid #eee ;
                        width: 100%;
                        margin-top:40px;
                    "/>
                </td>
            </tr>

        </table>
        
        <p style="margin-top:24px; direction: rtl; text-align: right;">
            {!! $contract_content !!}
        </p>
    </div>

</body>
</html>



