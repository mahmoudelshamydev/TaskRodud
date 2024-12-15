<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <!-- utf-8 works for most cases -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Forcing initial-scale shouldn't be necessary -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Use the latest (edge) version of IE rendering engine -->
        <title>Tire Shop</title>
        <!-- The title tag shows in email notifications, like Android 4.4. -->
        <!-- Please use an inliner tool to convert all CSS to inline as inpage or external CSS is removed by email clients -->
        <!-- important in CSS is used to prevent the styles of currently inline CSS from overriding the ones mentioned in media queries when corresponding screen sizes are encountered -->

        <!-- CSS Reset -->
        <style type="text/css">
            /* What it does: Remove spaces around the email design added by some email clients. */
            /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
            html,  body {
                margin: 0 !important;
                padding: 0 !important;
                height: 100% !important;
                width: 100% !important;
            }
            /* What it does: Stops email clients resizing small text. */
            * {
                -ms-text-size-adjust: 100%;
                -webkit-text-size-adjust: 100%;
            }
            /* What it does: Forces Outlook.com to display emails full width. */
            .ExternalClass {
                width: 100%;
            }
            /* What is does: Centers email on Android 4.4 */
            div[style*="margin: 16px 0"] {
                margin: 0 !important;
            }
            /* What it does: Stops Outlook from adding extra spacing to tables. */
            table,  td {
                mso-table-lspace: 0pt !important;
                mso-table-rspace: 0pt !important;
            }
            /* What it does: Fixes webkit padding issue. Fix for Yahoo mail table alignment bug. Applies table-layout to the first 2 tables then removes for anything nested deeper. */
            table {

                border-collapse: collapse !important;
                table-layout: fixed !important;
                margin: 0 auto !important;
            }
            table table table {
                table-layout: auto;
            }
            /* What it does: Uses a better rendering method when resizing images in IE. */
            img {
                -ms-interpolation-mode: bicubic;
            }
            /* What it does: Overrides styles added when Yahoo's auto-senses a link. */
            .yshortcuts a {
                border-bottom: none !important;
            }
            /* What it does: Another work-around for iOS meddling in triggered links. */
            a[x-apple-data-detectors] {
                color: inherit !important;
            }
        </style>
    </head>
    <body bgcolor="#e0e0e0" width="100%" style="margin: 0;" yahoo="yahoo">
        <table bgcolor="#e0e0e0" cellpadding="0" cellspacing="0" border="0" height="100%" width="100%" style="border-collapse:collapse;">
            <tr>
                <td valign="top">
                    <center style="width: 100%;">
                        <!-- Visually Hidden Preheader Text : BEGIN -->
                        <div style="display:none;font-size:1px;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;mso-hide:all;font-family: sans-serif;"> (Optional) This text will appear in the inbox preview, but not the email body. </div>
                        <!-- Visually Hidden Preheader Text : END -->
                        <table width="600px"  border="0" cellspacing="0" cellpadding="0" style="border: solid 5px #fcc10d; background-color: #fff">
                            <tbody>
                                <tr>
                                    <td>
                                        <!-- Email Header : BEGIN -->
                                        <table align="center" width="100%" class="email-container">
                                            <tr>
                                                <td align="left" valign="middle" bgcolor="#FFFFFF" style="padding: 20px 0; text-align: center"><img src="{{ asset('img/logo.jpg') }}" width="200" height="113" alt="alt_text" border="0"></td>
                                            </tr>
                                        </table>
                                        <!-- Email Header : END -->

                                        <!-- Email Body : BEGIN -->
                                        <table cellspacing=""  cellpadding="10" border="0" align="center" bgcolor="#ffffff" width="100%" style="border: so" class="email-container">
                                            <tr>
                                                <td width="100%" height="349" align="center" valign="top" style="padding: 10px;">
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                            <tr>
                                                            <td height="39">&nbsp;</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                                                        <tbody>
                                                        <tr>
                                                            <td height="34" align="left" valign="middle" style="padding: 0px; color:#1d1d1b; text-align: center; font-family: sans-serif; font-size: 22px; mso-height-rule: exactly; line-height: 20px;">
                                                                <strong>password code</strong>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                        <tbody>
                                                            <tr>
                                                                <td height="61" align="left" valign="middle" style="font-family: sans-serif; font-size: 15px;">&nbsp;</td>
                                                            </tr>
                                                            <tr>
                                                                <td height="34" align="left" valign="middle" style="padding: 0px; color:#1d1d1b; text-align: center; font-family: sans-serif; font-size: 26px; mso-height-rule: exactly; line-height: 20px; ">
                                                                    <strong>your code is</strong>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td height="2" align="left" valign="middle" style="padding: 0px; color:#1d1d1b; text-align: center; font-family: sans-serif; font-size: 26px; mso-height-rule: exactly; line-height: 20px; background: #">
                                                                    <span style="padding: 20px 0; text-align: center"><img src="{{ asset('img/dash_design.jpg') }}" width="310" height="12" alt="alt_text" border="0"></span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td height="150" align="left" valign="middle" style="padding: 0px; color:#1d1d1b; text-align: center; font-family: sans-serif; font-size: 70px; mso-height-rule: exactly; line-height: 20px; ">
                                                                    <strong>{{ $user['otp'] }}</strong>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td height="60" align="left" valign="middle" style="padding: 0px; color:#878787; text-align: center; font-family: sans-serif; font-size: 16px; mso-height-rule: exactly; line-height: 20px; ">&nbsp;</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <!-- Three Even Columns : END -->
                                        </table>
                                        <!-- Email Body : END -->

                                        <!-- Email Footer : BEGIN -->
                                        <table width="100%" border="0" cellspacing="5" cellpadding="0">
                                            <tbody>
                                                <tr>
                                                    <td width="78%" align="left" valign="middle" style="font-weight: bold; font-size: 20px; font-family: sans-serif; mso-height-rule: exactly; line-height:18px; text-align: left; color: #000000; padding: 0 20px 0 20px;">
                                                        Contact us
                                                    </td>
                                                    <td width="22%">&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td height="52" align="left" valign="middle" style=" font-size: 14px; font-family: sans-serif; mso-height-rule: exactly; line-height:18px; text-align: left; color: #000000; padding: 0 20px 0 20px;">
                                                        {{ $setting['call_phone'].' '.$setting['whatsapp'].' '.$setting['email_contact_us'] }}
                                                    </td>
                                                    <td align="right" valign="middle">
                                                        <a href="{{ $setting['instagram'] }}">
                                                            <img src="{{ asset('img/instagram_img.jpg') }}" width="125" height="43" alt=""/>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table width="100%" border="0" cellspacing="5" cellpadding="5" style="background-color: #000000">
                                            <tbody>
                                                <tr>
                                                    <td width="47%" height="98" align="left" valign="middle" style=" font-size: 15px; font-family: sans-serif; mso-height-rule: exactly; line-height:18px; text-align: left; color: #ffffff; padding: 0 20px 0 20px;">what are you waiting for download our app                    and enjoy the best services that your car can have</td>
                                                    <td width="27%" align="right" valign="middle">
                                                        <a href="{{ $setting['google_store_link'] }}">
                                                            <img src="{{ asset('img/google_play.jpg') }}" width="140" height="50" alt=""/>
                                                        </a>
                                                    </td>
                                                    <td width="26%" align="right" valign="middle">
                                                        <a href="{{ $setting['app_store_link'] }}">
                                                            <img src="{{ asset('img/app_store.jpg') }}" width="140" height="50" alt=""/>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!-- Email Footer : END -->
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </center>
                </td>
            </tr>
        </table>

        <map name="Map">
        <area shape="rect" coords="298,30,429,51" href="#">
        <area shape="rect" coords="481,25,584,54" href="#">
        <area shape="rect" coords="326,76,448,121" href="#">
        <area shape="rect" coords="454,77,573,122" href="#">
        </map>
    </body>
</html>
