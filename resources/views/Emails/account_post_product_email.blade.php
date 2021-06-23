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
            Hi {{ $account->business_name }},
        </div>
        <div style="margin-top: 10px; padding-left: 15px; text-align: justify;">
            Thanks for posting product as a <b>{{ $account->type }}</b> account with GoodGross.
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
