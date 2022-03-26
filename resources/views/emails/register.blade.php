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
                                    <h1 style="color:#a79344"> ברוכים הבאים להרשם לאתר גרילמן שלנו! </h1>         
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
                                <td colspan="2" align="right" style="direction:rtl; padding:7px 0px;" data-en="Your login information is the following.">
                                    פרטי הכניסה שלך הם הבאים.
                                </td>
                            </tr>
                            <tr>
                                <td align="right" style="direction: rtl"> {{$user->email}} </td>
                                <td align="right" style="direction: rtl"> Email: </td>
                            </tr>
                            <tr>
                                <td align="right" style="direction: rtl">{{ $user->password }}</td>
                                <td align="right" style="direction: rtl"> Password: </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="right" style="direction:rtl; padding: 7px 0px" data-en="To access our Grillman website, please visit url">
                                    <p style="text-align: right; direction: rtl;"> לגישה לאתר גרילמן, אנא בקרו באתר <span><a href="https://grillman.co.il/login"> פה </a></span></p> 
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
