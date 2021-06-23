@extends('Layouts.frontend')
@section('content')

    <div class="container-fluid mt-5">
        <div class="row">

            <div class="col-12 col-sm-12 col-md-12 col-lg-11 col-xl-11 mx-auto">
                <div class="text-center primary_text_color_default border-bottom py-3" style="font-weight: bold;">Sign in to GoodGross Control Panel</div>
                <div class="row">
                    <div class="col-12 col-sm-7 col-md-6 col-lg-5 col-xl-4 mx-auto">



                        <div style="padding: 30px 0 10px 0;">

                            <div id="sign_in_form_message" class="text-center text-danger" style="font-size: 0.9rem;"></div>
                            <form id="sign_in_form">
                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control" name="email" id="email" placeholder="User ID">
                                    <label for="email">User ID</label>
                                </div>
                                <div class="form-floating mb-4">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                    <label for="password">Password</label>
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
                                            <span id="sign_in_form_submit_processing" class="sr-only">
                                            <span class="spinner-grow spinner-grow-sm text-info" role="status" aria-hidden="true"></span>
                                            Processing...
                                        </span>
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div style="height: 150px;"></div>
    <script language="JavaScript">


        $(document).on('submit', '#sign_in_form', function(event) {
            event.preventDefault();
            {{--grecaptcha.ready(function() {--}}
                {{--grecaptcha.execute('{{ env('RECAPTCHA_SITE_KEY') }}', {action: 'control_panel_sign_in_form_submit'}).then(function (token) {--}}
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
                        url: '{{ url('authenticate/control/panel/sign/in') }}',
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
                                location = '{{ url('control/panel/dashboard') }}';
                            } else {
                                $('#sign_in_form_message').text(result.message).addClass('mb-3');
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
            //     });
            // });


        });
    </script>
@endsection
