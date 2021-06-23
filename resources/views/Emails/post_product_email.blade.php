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
            Hi {{ $user->name }}
        </div>
        <div style="margin-top: 15px; padding-left: 15px; padding-right: 15px; text-align: justify;">
            Thanks for posting the product with GoodGross.
            @if(auth()->check())
                We will review your posted product and you will be informed about the status of the product soon. Stay with us and have fun.
            @else
                We will review your posted product and you will be informed about the status of the product as soon as you will completed the registration process. Please get registered with the link below.
            @endif
        </div>
        @if( ! auth()->check())
            <div style="margin-top: 15px; padding-left: 15px;">
                @if($user->account->type === 'Personal')
                    <a href="{{ url('registration') }}/{{ $user->id }}">Register for Personal Account</a>
                @else
                    <a href="{{ url('registration') }}/{{ $user->id }}">Register for Business Account</a>
                @endif
            </div>
        @endif

        <div style="margin-top: 15px; padding-left: 15px;">
            Best Regards,<br>
            GoodGross Support Team
        </div>

        <div style="margin-top: 30px; padding-top: 15px; text-align: center; color: #636363; height: 40px; font-size: 0.7rem;">
            &copy; {{ date('Y') }} GoodGross. All Rights Reserved.
        </div>

    </body>
</html>
