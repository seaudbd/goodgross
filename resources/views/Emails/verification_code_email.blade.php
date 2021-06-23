<!DOCTYPE html>
<html lang="en">
    <head>
        <style type="text/css">
            body {
                font-family: Arial;
                font-size: 0.9rem;
            }
        </style>
    </head>
    <body style="margin: 0;">
        <div style="height: 60px; width: 100%; text-align: center; padding-top: 30px;">
            <img src="{{ $message->embed(storage_path() . '/app/public/img/application/logo_with_slogan.png') }}" height="30">
        </div>

        <div style="margin-top: 10px; padding-left: 15px;">
            Hi
            @if($account->type === 'Personal')
                {{ $account->first_name }} {{ $account->last_name }},
            @else
                {{ $account->business_name }},
            @endif
        </div>
        <div style="margin-top: 10px; padding-left: 15px; text-align: justify;">
            Thanks for registering with GoodGross. To activate your account, you need to verify your E-mail. Your account Verification Code is as follows.
        </div>
        <div style="margin-top: 10px; padding-left: 15px; text-align: justify;">
            Verification Code: {{ $account->verification_code }}
        </div>

        <div style="margin-top: 10px; padding-left: 15px; text-align: justify;">
            Note that the Verification Code will expire within an hour. So you have to use it within this time period.
        </div>
        <div style="margin-top: 10px; padding-left: 15px;">
            Best Regards,
            GoodGross Support Team
        </div>

        <div style="margin-top: 30px; padding-top: 15px; text-align: center; color: white; height: 40px; font-size: 0.7rem;">
            &copy; {{ date('Y') }} GoodGross.com. All Rights Reserved.
        </div>

    </body>
</html>
