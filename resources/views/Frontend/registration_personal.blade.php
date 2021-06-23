@extends('Layouts.public')
@section('content')
<style type="text/css">
    #sign_up_with {
        width: 100%;
        text-align: center;
        border-bottom: 1px solid #dddddd;
        line-height: 0.1em;
        margin: 10px 0 20px;
        font-size: 0.9rem;
    }

    #sign_up_with span {
        background:#fff;
        padding: 0 10px;
    }

    #registration_personal_content {
        margin-top: 70px;
    }

    @media only screen and (max-device-width: 768px) {
        #registration_personal_content {
            margin-top: 20px;
        }
    }
</style>
<div class="container-fluid" id="registration_personal_content">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-8 col-lg-6 mx-auto" style="box-shadow: 1px 1px 3px 1px #cccccc; padding: 0;">
            <div class="text-center primary_text_color_default " style="padding: 20px 50px 20px 50px; font-weight: bold;">Create GoodGross Account</div>
            <hr style="margin: 0;">
            <nav class="navbar navbar-expand-sm navbar-light justify-content-center" style="padding: 0;">
                <ul class="navbar-nav">
                    <li class="nav-item active primary_background_color_default" style="line-height: 1; padding-left: 15px; padding-right: 15px;">
                        <a class="nav-link" href="{{ url('register/personal') }}" style="color: #ffffff; font-weight: 500;">Personal</a>
                    </li>
                    <li class="nav-item" style="line-height: 1; padding-left: 15px; padding-right: 15px;">
                        <a class="nav-link" href="{{ url('register/business') }}" style="color: #328C59; font-weight: 500;">Business</a>
                    </li>
                </ul>
            </nav>
            <div style="padding: 30px 50px 30px 50px;">
                <input type="hidden" id="password_show_hide_icon_status">
                <div id="registration_personal_form_message" class="text-center text-danger pb-3"></div>
                <form id="registration_personal_form">
                    <div class="row mb-3">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                            <input type="text" class="form-control" name="first_name" id="first_name" @if ($account !== null) value="{{ $account->first_name }}" @endif placeholder="First Name">
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                            <input type="text" class="form-control" name="last_name" id="last_name" @if ($account !== null) value="{{ $account->last_name }}" @endif placeholder="Last Name">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                            <input type="text" class="form-control" name="email" id="email" @if ($account !== null) value="{{ $account->login_id }}" @endif placeholder="Email Address">
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="input-group">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                <div class="input-group-append">
                                    <span class="input-group-text" style="cursor: pointer;" id="password_show_hide_icon_holder"><i id="password_show_hide_icon" class="fas fa-eye"></i></span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row mb-4">
                        <div class="col text-center" style="font-size: 0.9rem;">
                            <input type="checkbox"> By creating an account, you agree to our <a href="#" style="color: #328C59;">Terms</a> and read our <a href="#" style="color: #328C59;">Privacy Policy</a>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col text-center">
                            <button type="submit" class="btn primary_btn_default btn-sm pr-3 pl-3" style="font-weight: 500;" id="registration_personal_form_submit">Create Account</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center" style="padding: 0 150px;">
                            <div id="sign_up_with"><span>Sign Up With</span></div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col text-center" style="font-size: 1.2rem;">
                            <a href="https://www.facebook.com"><i class="fab fa-facebook-square primary_text_color_default "></i></a>
                            <a href="https://www.twitter.com"><i class="fab fa-twitter-square primary_text_color_default "></i></a>
                            <a href="https://www.plus.google.com"><i class="fab fa-google-plus-square primary_text_color_default "></i></a>
                            <a href="https://www.plus.google.com"><i class="fab fa-linkedin primary_text_color_default "></i></a>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col text-center" style="font-size: 0.9rem;">
                            Already have an account? <a href="{{ url('login') }}" style="color: #328C59;">Log in</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<div style="height: 150px;"></div>
<script type="text/javascript">

    $(document).ready(function () {
        $('#password_show_hide_icon_status').val(0);
    });

    $(document).on('click', '#password_show_hide_icon_holder', function () {
        let value = parseInt($('#password_show_hide_icon_status').val());
        if (value === 0) {
            $('#password').attr('type', 'text');
            $('#password_show_hide_icon_status').val(1);
            $(this).children('i').removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
            $('#password').attr('type', 'password');
            $('#password_show_hide_icon_status').val(0);
            $(this).children('i').removeClass('fa-eye-slash').addClass('fa-eye');
        }
        return false;

    });

    $(document).on('submit', '#registration_personal_form', function() {
        $('#registration_personal_form_submit').attr('disabled', 'disabled');
        $('#registration_personal_form_message').empty();
        $('#registration_personal_form').find('.is-invalid').removeClass('is-invalid');
        $('#registration_personal_form').find('.error_message').remove();
        let formData = new FormData(this);

        formData.append('_token', '{{ csrf_token() }}');
        formData.append('account', '{!! $account !!}');
        $.ajax({
            method: 'post',
            url: '{{ url('register/personal') }}',
            data: formData,
            contentType: false,
            processData: false,
            success: function (result) {
                console.log(result);
                $('#registration_personal_form_submit').removeAttr('disabled');
                if (result.message === 'Account Created Successfully') {
                    location = '{{ url('load/email/verification') }}/' + result.account.id;
                } else {
                    $('#registration_personal_form_message').text(result.message);
                }
            },
            error: function (xhr) {
                console.log(xhr);
                $('#registration_personal_form_submit').removeAttr('disabled');
                if (xhr.responseJSON.hasOwnProperty('errors')) {
                    $.each(xhr.responseJSON.errors, function (key, value) {
                        if (key === 'password') {
                            $('#' + key).parent().after('<span class="error_message"></span>');
                            $('#' + key).addClass('is-invalid');
                            $.each(value, function (k, v) {
                                $('#' + key).parent().parent().find('.error_message').addClass('text-danger').append('<p>' + v + '</p>');
                            });
                        } else {
                            $('#' + key).after('<span class="error_message"></span>');
                            $('#' + key).addClass('is-invalid');
                            $.each(value, function (k, v) {
                                $('#' + key).parent().find('.error_message').addClass('text-danger').append('<p>' + v + '</p>');
                            });
                        }

                    });
                }
            }
        });
        return false;
    });
</script>
@endsection