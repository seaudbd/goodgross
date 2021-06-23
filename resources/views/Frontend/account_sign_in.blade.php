@extends('Layouts.frontend')
@section('content')

    <style type="text/css">
        .btn-google {
            color: #fff;
            background-color: #dd4b39;
            border-color: #dd4b39;
        }
        .btn-facebook {
            color: #fff;
            background-color: #3b5998;
            border-color: #3b5998;
        }
        .btn-twitter {
            color: #fff;
            background-color: #00aced;
            border-color: #00aced;
        }

        .btn-icon--2 {
            position: relative;
            padding-left: 40px !important;
        }
        .btn-styled {

            letter-spacing: 0;

            padding: 0.6rem 1.5rem;
        }

        .btn {
            position: relative;
            font-size: 0.875rem;
            font-family: "Open Sans", sans-serif;
            font-style: normal;
            text-align: center;
            border-radius: 2px;
            outline: none;
            -webkit-transition: all 0.2s linear;
            transition: all 0.2s linear;
        }
        .btn-block {
            display: block;
            width: 100%;
        }

        .btn-icon--2 .icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            left: 0;
            top: 0;
            width: 40px;
            height: 100%;
            background: rgba(0, 0, 0, 0.2);
        }
    </style>
    <div class="container-fluid bg-white">
        <div class="row">

            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mx-auto">
                <div class="text-center mt-5 mb-3">
                    <i class="fas fa-sign-in-alt primary_text_color_default fa-3x"></i>
                </div>
                <div class="text-center border-bottom pb-3" style="border-color: #e8f3ed !important;">
                    <div class="h4">Sign in to GoodGross</div>
                </div>



                <div class="row mt-4">
                    <div class="col-12 col-sm-8 col-md-12 col-lg-10 col-xl-8 col-xxl-7 mx-auto">

                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-7 px-md-5 border-end" style="border-color: #e8f3ed !important;">
                                <div id="sign_in_form_message" class="text-center text-danger">{{ \Illuminate\Support\Facades\Session::get('error') }}</div>
                                <form id="sign_in_form">

                                    <div class="form-floating mb-4">
                                        <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                                        <label for="sign_in_id">Email</label>
                                    </div>
                                    <div class="input-group mb-4">
                                        <div class="form-floating" style="width: 70%;">
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" style="border-right: none; border-top-right-radius: 0; border-bottom-right-radius: 0;">
                                            <label for="password">Password</label>
                                        </div>
                                        <div class="input-group-text text-right" style="background-color: #ffffff; width: 30%; justify-content: flex-end;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="password_show_hide">
                                                <label class="form-check-label small" for="password_show_hide">Show</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="remember_me">
                                                <label class="form-check-label" for="remember_me">
                                                    Remember me
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col text-end" style="font-size: 14px;">
                                            <a href="{{ url('forgot/password') }}" class="text-decoration-none" style="color: #636363;">Forgot Password?</a>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col d-grid gap-2">
                                            <button type="submit" class="btn primary_btn_default pr-3 pl-3" id="sign_in_form_submit">
                                                <span id="sign_in_form_submit_text">Sign in</span>
                                                <span id="sign_in_form_submit_processing" class="sr-only"><span class="spinner-grow spinner-grow-sm text-info" role="status" aria-hidden="true"></span>Processing...</span>
                                            </button>
                                        </div>
                                    </div>








                                </form>

                            </div>


                            <div class="col-12 col-sm-12 col-md-5 px-md-5">


                                <div class="mt-3">Or, Sign in with</div>
                                <a href="{{ url('auth/redirect/to/google/dashboard') }}" class="btn btn-styled btn-block btn-google btn-icon--2 btn-icon-left px-4 my-4">
                                    <i class="icon fab fa-google"></i> Google
                                </a>
                                <a href="{{ url('auth/redirect/to/facebook/dashboard') }}" class="btn btn-styled btn-block btn-facebook btn-icon--2 btn-icon-left px-4 my-4">
                                    <i class="icon fab fa-facebook-f"></i> Facebook
                                </a>
                                <a href="{{ url('auth/redirect/to/twitter/dashboard') }}" class="btn btn-styled btn-block btn-twitter btn-icon--2 btn-icon-left px-4 my-4">
                                    <i class="icon fab fa-twitter"></i> Twitter
                                </a>
                            </div>
                        </div>


                        <div class="row my-5">
                            <div class="col text-center">
                                <span class="me-3" style="font-size: 14px;">Need an account with GoodGross?</span>
                                <a class="btn btn-outline-info" href="{{ url('registration') }}" style="color: #328C59;">Register</a>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </div>
    </div>
    <div style="height: 25px;"></div>
    <script language="JavaScript">
        $(document).ready(function () {
            $("input[type='password']").focus(function(){
                $(this).parent().parent().find('.input-group-text').css("border-color", "rgba(82, 168, 236, 0.8)");
            });

            $("input[type='password']").focusout(function(){
                $(this).parent().parent().find('.input-group-text').css("border-color", "#ced4da");
            });
        });

        $(document).on('click', '#password_show_hide', function () {
            if ($(this).prop('checked') === true) {
                $('#password').attr('type', 'text');
            } else {
                $('#password').attr('type', 'password');
            }
        });

        $(document).on('submit', '#sign_in_form', function() {




            event.preventDefault();
            // grecaptcha.ready(function() {
                {{--grecaptcha.execute('{{ env('RECAPTCHA_SITE_KEY') }}', {action: 'account_sign_in_form_submit'}).then(function (token) {--}}


                    $('#sign_in_form_submit').addClass('disabled');
                    $('#sign_in_form_submit_text').addClass('sr-only');
                    $('#sign_in_form_submit_processing').removeClass('sr-only');

                    $('#sign_in_form_message').empty().removeClass('mb-3');

                    let formData = new FormData($('#sign_in_form')[0]);

                    // formData.append('g_recaptcha_token', token);
                    formData.append('_token', '{{ csrf_token() }}');

                    formData.append('remember_me', $('#remember_me').prop('checked') ? 1 : 0);


                    $.ajax({
                        method: 'post',
                        url: '{{ url('authenticate/account/sign/in') }}',
                        data: formData,
                        contentType: false,
                        processData: false,
                        cache: false,
                        global: false,
                        success: function (result) {
                            console.log(result);
                            $('#sign_in_form_submit').removeClass('disabled');
                            $('#sign_in_form_submit_text').removeClass('sr-only');
                            $('#sign_in_form_submit_processing').addClass('sr-only');
                            if (result.success === true) {
                                location = '{{ url('account/dashboard') }}';
                            } else {
                                if (result.message === 'Pending Account') {
                                    location = '{{ url('email/verification') }}/' + result.account.id;
                                } else {
                                    $('#sign_in_form_message').text(result.message).addClass('mb-3');
                                }

                            }
                        },
                        error: function (xhr) {
                            console.log(xhr);
                            $('#sign_in_form_submit').removeClass('disabled');
                            $('#sign_in_form_submit_text').removeClass('sr-only');
                            $('#sign_in_form_submit_processing').addClass('sr-only');
                            if (xhr.responseJSON.hasOwnProperty('errors')) {
                                if (xhr.responseJSON.errors.hasOwnProperty('email') || xhr.responseJSON.errors.hasOwnProperty('password')) {
                                    $('#sign_in_form_message').text('Unauthorized Access!').addClass('mb-3');
                                }
                            }
                        }
                    });

                // });
            // });


        });
    </script>
@endsection