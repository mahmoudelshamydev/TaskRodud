<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Tire Shop</title>
</head>

<body>
<table width="100%" style="min-width:1000px;" border="0" cellspacing="0" cellpadding="20">
    <tr>
        <td height="130" align="center" valign="top" bgcolor="#cfd6de">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="50%" height="68" style="padding:5px;" bgcolor="#FFFFFF">
                        <img src="{{ asset('img/logo.jpg') }}" width="160" height="99"/>
                    </td>
                    <td width="50%" align="right" valign="middle" bgcolor="#FFFFFF"
                        style="font-family:Verdana, Geneva, sans-serif; font-size:16px; line-height:normal; padding:5px">

                </tr>
                <tr>
                    <td><label>Number Request : </label></td>
                    <td> {{ $data['number_request'] }}</td>
                </tr>
                <tr>
                    <td><label>Request Date : </label></td>
                    <td> {{ $data['req_date'] }}</td>
                </tr>
                <tr>
                    <td><label>Request Time : </label></td>
                    <td> {{ $data['req_time'] }}</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
