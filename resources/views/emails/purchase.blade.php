@component('mail::message')
<table class="action" align="center" width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td align="center">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td align="center">
                        <table border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td>
                                    <h1 style="color:#a79344" data-en="Thanks for purchasing our product!"> תודה שרכשת את המוצר שלנו! </h1>         
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td align="right">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td align="right">
                        <table border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td>
                                    <p style="color:#444; direction: rtl; text-align: right;"> היי, {{ $user->firstname }} </p>      
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td align="right">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td align="right">
                        <table border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td colspan="2" align="right" style="direction:rtl; padding:7px 0px;" data-en="Your purchased course information is the following.">
                                    פרטי הקורס שלך שנרכשו הם הבאים.
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="middle" style=""> <img src="{{ asset($course->cover_image) }} " alt="course image" style="width:150px; height: auto" /> </td>
                            </tr>
                            <tr>
                                <td align="right" style="direction: rtl"> {{$course->course_name}} </td>
                                <td align="right" style="direction: rtl" data-en="Course Name"> שם קורס </td>
                            </tr>
                            <tr>
                                <td align="right" style="direction: rtl"> ₪{{ $course->course_price }}</td>
                                <td align="right" style="direction: rtl" data-en="Course Price"> מחיר קורס </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td align="left">
            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td align="left">
                        <table border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td>
                                    <span style="color:#444; margin-top: 24px" data-en="Enjoying your learning!"> נהנה מהלימוד שלך! </span>         
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    
</table>
@endcomponent
