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

        <div style="margin-top: 15px; padding-left: 15px;">
            Hi
            @if($user->account->type === 'Personal')
                {{ $user->account->personalAccount->first_name }} {{ $user->account->personalAccount->last_name }},
            @else
                {{ $user->account->businessAccount->name }},
            @endif
        </div>
        <div style="margin-top: 15px; padding-left: 15px; padding-right: 15px; text-align: justify;">
            Thanks for registering as a <b>{{ $user->account->type }}</b> account with GoodGross. To activate your account, you need to verify your E-mail. Your account Verification Code is as follows.
        </div>
        <div style="margin-top: 15px; padding-left: 15px;">
            Verification Code: {{ $user->account->verification_code }}
        </div>

        <div style="margin-top: 15px; padding-left: 15px; padding-right: 15px; text-align: justify;">
            Note that the verification code will expire within an hour. So you have to use it within this time period.
        </div>
        <div style="margin-top: 15px; padding-left: 15px;">
            Best Regards,<br>
            GoodGross Support Team
        </div>

        <div style="margin-top: 30px; padding-top: 15px; text-align: center; color: #636363; height: 40px; font-size: 0.7rem;">
            &copy; {{ date('Y') }} GoodGross. All Rights Reserved.
        </div>

    </body>
</html>
