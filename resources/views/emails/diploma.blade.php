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
                                    <h1 style="color:#a79344" data-en="Congratulations for your bounded success!"> מזל טוב להצלחה המוגבלת שלך! </h1>         
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
                                <td colspan="2" align="right" style="direction:rtl; padding:7px 0px;" data-en="You have finished your course successfully">
                                    סיימת את הקורס בהצלחה.
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
                                <td align="right" style="direction: rtl"> {{substr($course->created_at, 0, 10)}} </td>
                                <td align="right" style="direction: rtl" data-en="Start Date"> תאריך התחלה </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="right" style="direction:rtl; padding: 7px 0px" data-en="To download your Diploma, please visit url">
                                    <p style="text-align: right; direction: rtl;"> כדי להוריד את תעודת התואר שלך, בקר בכתובת url <span><a href="{{route('client.diploma', $user->id)}}"> פה </a></span></p> 
                                </td>
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
                                    <span style="color:#444"> תודה וכל טוב </span>         
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
