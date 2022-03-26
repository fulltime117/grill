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
                                    <h1 style="color:#a79344" data-en="Thanks for using our website!"> תודה על השימוש באתר שלנו! </h1>         
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
                                <td colspan="2" align="right" style="direction:rtl; padding:7px 0px;" data-en="We are sorry to notify that your purchasing was failed.">
                                    אנו מצטערים להודיע שרכישתך נכשלה.
                                </td>
                                <tr>
                                    <td colspan="2" align="right" style="direction: rtl" 
                                        data-en="If you have any trouble for using our website, please don't hesitate to contact to us anytime.">
                                        אם יש לך בעיה להשתמש באתר שלנו, אל תהסס לפנות אלינו בכל עת.
                                        </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="right" style="direction:rtl; padding: 7px 0px" data-en="To contact us, please visit url">
                                        <p style="text-align: right; direction: rtl;"> ליצירת קשר אנא בקר בכתובת url <span><a href="https://grillman.co.il/contactus"> פה </a></span></p> 
                                    </td>   
                                </tr>
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
                                    <span style="color:#444; margin-top: 24px" data-en="Best Regards"> כל טוב </span>         
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
