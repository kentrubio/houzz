<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head><title>{{ trans('app.welcome_to') }} {{$app_name}}!</title></head>
<body>
<div style="max-width: 800px; margin: 0; padding: 30px 0;">
    <table width="80%" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td width="5%"></td>
            <td align="left" width="95%" style="font: 13px/18px Arial, Helvetica, sans-serif;">
                <h2 style="font: normal 20px/23px Arial, Helvetica, sans-serif; margin: 0; padding: 0 0 18px; color: black;">{{ trans('app.welcome_to') }} {{$app_name}}!</h2>
                {{ trans('app.activate_user_1') }}. {{ trans('app.activate_user_2') }}<br />
                {{ trans('app.activate_user_3')  }}:<br />
                <br />
                <big style="font: 16px/18px Arial, Helvetica, sans-serif;"><b><a href="{{url('activate-user').'?email='.$email.'&activation_code='.$activation_code}}" style="color: #3366cc;">{{ trans('app.finish_your_registration') }}</a></b></big><br />
                <br />
                {{ trans('app.activate_user_4_link') }}:<br />
                <nobr><a href="{{url('activate-user').'?email='.$email.'&activation_code='.$activation_code}}" style="color: #3366cc;">{{url('activate-user').'?email='.$email.'&activation_code='.$activation_code}}</a></nobr><br />
                <br />
                <br />
                {{ trans('app.your_email_address') }}: {{$email}}<br />
                {{ trans('app.your_activation_code') }}: {{$activation_code}}<br />
                <br />
                <br />
                {{ trans('app.have_fun') }}<br />
                The {{$app_name}} Team
            </td>
        </tr>
    </table>
</div>
</body>
</html>