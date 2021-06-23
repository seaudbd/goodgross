@extends('Layouts.frontend')
@section('content')





    <div class="container-fluid bg-white">
        <div class="row">

            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mx-auto">
                <div class="text-center mt-5 mb-3">
                    <i class="fas fa-envelope-open-text primary_text_color_default fa-3x"></i>
                </div>
                <div class="text-center border-bottom pb-3" style="border-color: #e8f3ed !important;">
                    <div class="h4">
                        Just One More Step, Let's Verify Your Email
                    </div>
                    <div class="text-center text-secondary small">
                        Don't worry. It's only one time. Once your email is verified, you don't need to do this anymore.
                    </div>
                </div>




                <div class="row">
                    <div class="col-12 col-sm-10 col-md-8 col-lg-7 col-xl-6 col-xxl-5 mx-auto">



                        <div class="my-4 text-center small text-secondary">
                            We already sent a verification code to <span class="fw-bold">{{ $user->email }}</span>. Please check your email inbox and enter the code you received in the form below to verity your email.
                        </div>



                        <div id="email_verification_form_message" class="text-center text-danger"></div>

                        <form id="email_verification_form">

                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" name="verification_code" id="verification_code" placeholder="Verification Code">
                                <label for="verification_code">Verification Code</label>
                            </div>


                            <div class="row mb-4">
                                <div class="col d-grid gap-2">
                                    <button type="submit" class="btn primary_btn_default pr-3 pl-3" id="email_verification_form_submit">
                                        <span id="email_verification_form_submit_text">Continue</span>
                                        <span id="email_verification_form_submit_processing" class="sr-only">
                                            <span class="spinner-grow spinner-grow-sm text-info" role="status" aria-hidden="true"></span>
                                            Processing...
                                        </span>
                                    </button>
                                </div>
                            </div>



                            <div class="row my-5">
                                <div class="col text-center">
                                    <span class="me-3" style="font-size: 14px;">Didn't you get the code?</span>
                                    <a class="btn btn-outline-info" href="{{ url('registration') }}" style="color: #328C59;">Resend</a>
                                </div>
                            </div>



                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <div style="height: 25px;"></div>





    <script language="JavaScript">


        $(document).on('submit', '#email_verification_form', function() {


            event.preventDefault();
            {{--grecaptcha.ready(function() {--}}
                {{--grecaptcha.execute('{{ env('RECAPTCHA_SITE_KEY') }}', {action: 'email_verification_form_submit'}).then(function (token) {--}}


                    $('#email_verification_form_submit').addClass('disabled');
                    $('#email_verification_form_submit_text').addClass('sr-only');
                    $('#email_verification_form_submit_processing').removeClass('sr-only');

                    $('#email_verification_form_message').empty().removeClass('mb-3');

                    let formData = new FormData($('#email_verification_form')[0]);
                    formData.append('user_id', '{{ $user->id }}');
                    //formData.append('g_recaptcha_token', token);
                    formData.append('_token', '{{ csrf_token() }}');


                    $.ajax({
                        method: 'post',
                        url: '{{ url('verify/email') }}',
                        data: formData,
                        contentType: false,
                        processData: false,
                        cache: false,
                        global: false,
                        success: function (result) {
                            console.log(result);
                            $('#email_verification_form_submit').removeClass('disabled');
                            $('#email_verification_form_submit_text').removeClass('sr-only');
                            $('#email_verification_form_submit_processing').addClass('sr-only');
                            if (result.success === true) {
                                location = '{{ url('account/dashboard') }}';
                            } else {
                                $('#email_verification_form_message').text(result.message).addClass('mb-3');
                            }
                        },
                        error: function (xhr) {
                            console.log(xhr);
                            $('#email_verification_form_submit').removeClass('disabled');
                            $('#email_verification_form_submit_text').removeClass('sr-only');
                            $('#email_verification_form_submit_processing').addClass('sr-only');
                            if (xhr.responseJSON.hasOwnProperty('errors')) {
                                if (xhr.responseJSON.errors.hasOwnProperty('id') || xhr.responseJSON.errors.hasOwnProperty('verification_code')) {
                                    $('#email_verification_form_message').text('Invalid Verification Code Entered!').addClass('mb-3');
                                }
                            }
                        }
                    });

            //     });
            // });
        });
    </script>
@endsection