@extends('Layouts.frontend')
@section('content')
    <style type="text/css">

    </style>

<div class="container-fluid bg-white">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mx-auto">
            <div class="text-center mt-5 mb-3">
                <i class="far fa-user-circle primary_text_color_default fa-3x"></i>
            </div>
            <div class="text-center border-bottom pb-3" style="border-color: #e8f3ed !important;">
                <div class="h4">Create Account with GoodGross</div>
            </div>
            <div class="row mt-4">
                <div class="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-6 mx-auto">
                    <div id="registration_form_message" class="text-center text-danger d-none mb-4"></div>
                    <div class="row mb-4">
                        <div class="col-6">
                            <div class="form-check" style="width: 100%; border: 1px solid #ced4da; padding: 10px 0 10px 35px; border-radius: 5px;">
                                <input type="radio" class="form-check-input" id="personal_account" name="account_type">
                                <label class="form-check-label fw-bold" for="personal_account">Personal</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-check" style="width: 100%; border: 1px solid #ced4da; padding: 10px 0 10px 35px; border-radius: 5px;">
                                <input type="radio" class="form-check-input" id="business_account" name="account_type">
                                <label class="form-check-label fw-bold" for="business_account">Business</label>
                            </div>
                        </div>
                    </div>






                    <div id="personal_account_content">


                        <form id="registration_form_for_personal_account">



                            <div class="row mb-4">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4 mb-sm-4 mb-md-4 mb-lg-4 mb-xl-0">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="first_name" id="first_name_for_personal_account" placeholder="First Name">
                                        <label for="first_name_for_personal_account">First Name</label>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="last_name" id="last_name_for_personal_account" placeholder="Last Name">
                                        <label for="last_name_for_personal_account">Last Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4 mb-sm-4 mb-md-4 mb-lg-4 mb-xl-0">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="phone" id="phone_for_personal_account" placeholder="Personal Phone">
                                        <label for="phone_for_personal_account">Personal Phone</label>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="email" id="email_for_personal_account" placeholder="Personal Email">
                                        <label for="email_for_personal_account">Personal Email</label>
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-4">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4 mb-sm-4 mb-md-4 mb-lg-4 mb-xl-0">
                                    <div class="input-group">
                                        <div class="form-floating" style="width: 70%;">
                                            <input type="password" class="form-control" name="password" id="password_for_personal_account" placeholder="Password" style="border-right: none; border-top-right-radius: 0; border-bottom-right-radius: 0;">
                                            <label for="password_for_personal_account">Password</label>
                                        </div>
                                        <div class="input-group-text text-right" style="background-color: #ffffff; width: 30%; justify-content: flex-end;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="password_show_hide_for_personal_account">
                                                <label class="form-check-label small" for="password_show_hide_for_personal_account">Show</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                    <div class="input-group">
                                        <div class="form-floating" style="width: 70%;">
                                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation_for_personal_account" placeholder="Retype Password" style="border-right: none; border-top-right-radius: 0; border-bottom-right-radius: 0;">
                                            <label for="password_for_personal_account">Retype Password</label>
                                        </div>
                                        <div class="input-group-text text-right" style="background-color: #ffffff; width: 30%; justify-content: flex-end;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="password_confirmation_show_hide_for_personal_account">
                                                <label class="form-check-label small" for="password_confirmation_show_hide_for_personal_account">Show</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="terms_of_service_for_personal_account">
                                        <label class="form-check-label small" for="terms_of_service_for_personal_account">I agree to GoodGross's <a href="#" style="color: #328C59;">Terms of Service</a></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="privacy_policy_for_personal_account">
                                        <label class="form-check-label small" for="privacy_policy_for_personal_account">I accept GoodGross's use of my data for the service and everything else described in the <a href="#" style="color: #328C59;">Privacy Policy</a></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col d-grid gap-2">
                                    <button type="submit" class="btn primary_btn_default pr-3 pl-3" id="registration_form_submit_for_personal_account">
                                        <span id="registration_form_submit_text_for_personal_account">Register</span>
                                        <span id="registration_form_submit_processing_for_personal_account" class="sr-only">
                                            <span class="spinner-grow spinner-grow-sm text-info" role="status" aria-hidden="true"></span>
                                            Processing...
                                        </span>
                                    </button>
                                </div>
                            </div>


                            <div class="row mb-5">
                                <div class="col text-center">
                                    <span class="me-3" style="font-size: 14px;">Already have an account?</span>
                                    <a class="btn btn-outline-info" href="{{ url('account/sign/in') }}" style="color: #328C59;">Sign in</a>
                                </div>
                            </div>

                        </form>
                    </div>




                    <div id="business_account_content">


                        <form id="registration_form_for_business_account">


                            <div class="row mb-4">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4 mb-sm-4 mb-md-4 mb-lg-4 mb-xl-0">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="name" id="name_for_business_account" placeholder="Business Name">
                                        <label for="name_for_business_account">Business Name</label>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <select class="form-select" name="type" id="type_for_business_account">
                                            <option value="">Select Business Type</option>
                                            <option value="Retail">Retail</option>
                                            <option value="Wholesale">Wholesale</option>
                                        </select>
                                        <label for="type_for_business_account">Business Type</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4 mb-sm-4 mb-md-4 mb-lg-4 mb-xl-0">
                                    <div class="form-floating">
                                        <select class="form-select" name="country_id" id="country_id_for_business_account">
                                            <option value="">Select Country</option>
                                            @foreach($countries as $country)
                                                @if($country->country === $userCountry)
                                                    <option value="{{ $country->id }}" selected>{{ $country->country }}</option>
                                                @else
                                                    <option value="{{ $country->id }}">{{ $country->country }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <label for="country_id_for_business_account">Country</label>
                                    </div>

                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                    <div id="state_field_holder_for_business_account">
                                        <div class="form-floating">
                                            @if($userCountry === 'United States')
                                                <select class="form-select" name="state" id="state_for_business_account">
                                                    <option value="">Select State</option>
                                                    @foreach($states as $state)
                                                        @if($state->state === $userState)
                                                            <option value="{{ $state->state }}" selected>{{ $state->state }}</option>
                                                        @else
                                                            <option value="{{ $state->state }}">{{ $state->state }}</option>
                                                        @endif
                                                    @endforeach

                                                </select>
                                            @else
                                                <input type="text" class="form-control" name="state" id="state_for_business_account" placeholder="State">
                                            @endif
                                            <label for="state_for_business_account">State</label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-4">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4 mb-sm-4 mb-md-4 mb-lg-4 mb-xl-0">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="phone" id="phone_for_business_account" placeholder="Business Phone">
                                        <label for="phone_for_business_account">Business Phone</label>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="email" id="email_for_business_account" placeholder="Business Email">
                                        <label for="email_for_business_account">Business Email</label>
                                    </div>
                                </div>
                            </div>





                            <div class="row mb-4">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4 mb-sm-4 mb-md-4 mb-lg-4 mb-xl-0">
                                    <div class="input-group">
                                        <div class="form-floating" style="width: 70%;">
                                            <input type="password" class="form-control" name="password" id="password_for_business_account" placeholder="Password" style="border-right: none; border-top-right-radius: 0; border-bottom-right-radius: 0;">
                                            <label for="password_for_business_account">Password</label>
                                        </div>
                                        <div class="input-group-text text-right" style="background-color: #fff !important; width: 30%; justify-content: flex-end;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="password_show_hide_for_business_account">
                                                <label class="form-check-label small" for="password_show_hide_for_business_account">Show</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                    <div class="input-group">
                                        <div class="form-floating" style="width: 70%;">
                                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation_for_business_account" placeholder="Retype Password" style="border-right: none; border-top-right-radius: 0; border-bottom-right-radius: 0;">
                                            <label for="password_confirmation_for_business_account">Retype Password</label>
                                        </div>
                                        <div class="input-group-text text-right" style="background-color: #fff !important; width: 30%; justify-content: flex-end;">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="password_confirmation_show_hide_for_business_account">
                                                <label class="form-check-label small" for="password_confirmation_show_hide_for_business_account">Show</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="terms_of_service_for_business_account">
                                        <label class="form-check-label small" for="terms_of_service_for_business_account">I agree to GoodGross's <a href="#" style="color: #328C59;">Terms of Service</a></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="privacy_policy_for_business_account">
                                        <label class="form-check-label small" for="privacy_policy_for_business_account">I accept GoodGross's use of my data for the service and everything else described in the <a href="#" style="color: #328C59;">Privacy Policy</a></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col d-grid gap-2">
                                    <button type="submit" class="btn primary_btn_default pr-3 pl-3" id="registration_form_submit_for_business_account">
                                        <span id="registration_form_submit_text_for_business_account">Sign up</span>
                                        <span id="registration_form_submit_processing_for_business_account" class="sr-only">
                                            <span class="spinner-grow spinner-grow-sm text-info" role="status" aria-hidden="true"></span>
                                            Processing...
                                        </span>
                                    </button>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col text-center">
                                    <span class="me-3" style="font-size: 14px;">Already have an account?</span>
                                    <a class="btn btn-outline-info" href="{{ url('login') }}" style="color: #328C59;">Log in</a>
                                </div>
                            </div>

                        </form>
                    </div>







                </div>
            </div>
        </div>

    </div>
</div>



<div style="height: 25px;"></div>
<script type="text/javascript">




    $(document).ready(function () {
        let user = JSON.parse('{!! $user !!}');
        console.log(user);
        if (user) {
            if (user.account.type === 'Personal') {
                $('#first_name_for_personal_account').val(user.account.personal_account.first_name).prop('disabled', true);
                $('#last_name_for_personal_account').val(user.account.personal_account.last_name).prop('disabled', true);
                $('#phone_for_personal_account').val(user.account.personal_account.phone).prop('disabled', true);
                $('#email_for_personal_account').val(user.account.personal_account.email).prop('disabled', true);
                $('#personal_account').prop('checked', true);
                $('#business_account').prop('checked', false);
                $('#personal_account_content').removeClass('sr-only');
                $('#business_account_content').addClass('sr-only');
            } else if (user.account.type === 'Business') {
                $('#name_for_business_account').val(user.account.business_account.name).prop('disabled', true);
                $('#type_for_business_account').val(user.account.business_account.type).prop('disabled', true);
                $('#phone_for_business_account').val(user.account.business_account.phone).prop('disabled', true);
                $('#email_for_business_account').val(user.account.business_account.email).prop('disabled', true);
                $('#personal_account').prop('checked', false);
                $('#business_account').prop('checked', true);
                $('#personal_account_content').addClass('sr-only');
                $('#business_account_content').removeClass('sr-only');
            }
        } else {
            $('#personal_account').attr('checked', true);
            $('#business_account').attr('checked', false);
            $('#personal_account_content').removeClass('sr-only');
            $('#business_account_content').addClass('sr-only');
        }


        $("input[type='password']").focus(function(){
            $(this).parent().parent().find('.input-group-text').css("border-color", "rgba(82, 168, 236, 0.8)");
        });

        $("input[type='password']").focusout(function(){
            $(this).parent().parent().find('.input-group-text').css("border-color", "#ced4da");
        });
    });

    $(document).on('click', '#personal_account', function () {
        $('#personal_account').attr('checked', true);
        $('#business_account').attr('checked', false);
        $('#personal_account_content').removeClass('sr-only');
        $('#business_account_content').addClass('sr-only');
    });

    $(document).on('click', '#business_account', function () {
        $('#personal_account').attr('checked', false);
        $('#business_account').attr('checked', true);
        $('#personal_account_content').addClass('sr-only');
        $('#business_account_content').removeClass('sr-only');
    });




    $(document).on('click', '#password_show_hide_for_personal_account', function () {
        if ($(this).prop('checked') === true) {
            $('#password_for_personal_account').attr('type', 'text');
        } else {
            $('#password_for_personal_account').attr('type', 'password');
        }
    });

    $(document).on('click', '#password_confirmation_show_hide_for_personal_account', function () {
        if ($(this).prop('checked') === true) {
            $('#password_confirmation_for_personal_account').attr('type', 'text');
        } else {
            $('#password_confirmation_for_personal_account').attr('type', 'password');
        }
    });

    $(document).on('click', '#password_show_hide_for_business_account', function () {
        if ($(this).prop('checked') === true) {
            $('#password_for_business_account').attr('type', 'text');
        } else {
            $('#password_for_business_account').attr('type', 'password');
        }
    });

    $(document).on('click', '#password_confirmation_show_hide_for_business_account', function () {
        if ($(this).prop('checked') === true) {
            $('#password_confirmation_for_business_account').attr('type', 'text');
        } else {
            $('#password_confirmation_for_business_account').attr('type', 'password');
        }
    });







    $(document).on('submit', '#registration_form_for_personal_account', function(event) {



        event.preventDefault();
        {{--grecaptcha.ready(function() {--}}
            {{--grecaptcha.execute('{{ env('RECAPTCHA_SITE_KEY') }}', {action: 'personal_registration_submit'}).then(function(token) {--}}

                $('#registration_form_message').addClass('d-none').empty();

                $('#registration_form_submit_for_personal_account').addClass('disabled');
                $('#registration_form_submit_text_for_personal_account').addClass('sr-only');
                $('#registration_form_submit_processing_for_personal_account').removeClass('sr-only');


                $('#registration_form_for_personal_account').find('.is-invalid').removeClass('is-invalid');
                $('#registration_form_for_personal_account').find('.input_group_text_invalid_border_color').removeClass('input_group_text_invalid_border_color');
                $('#registration_form_for_personal_account').find('.invalid-feedback').remove();
                let formData = new FormData($('#registration_form_for_personal_account')[0]);
                formData.append('terms_of_service', $('#terms_of_service_for_personal_account').prop('checked'));
                formData.append('privacy_policy', $('#privacy_policy_for_personal_account').prop('checked'));
                formData.append('user', '{!! $user !!}');
                // formData.append('g_recaptcha_token', token);
                formData.append('_token', '{{ csrf_token() }}');

                $.ajax({
                    method: 'post',
                    url: '{{ url('register/personal/account') }}',
                    data: formData,
                    contentType: false,
                    processData: false,
                    cache: false,
                    global: false,
                    success: function (result) {
                        console.log(result);
                        $('#registration_form_submit_for_personal_account').removeClass('disabled');
                        $('#registration_form_submit_text_for_personal_account').removeClass('sr-only');
                        $('#registration_form_submit_processing_for_personal_account').addClass('sr-only');

                        if (result.success === true) {
                            location = '{{ url('email/verification') }}/' + result.user.id;
                        } else {
                            $('#registration_form_message').removeClass('d-none').text(result.message);
                        }
                    },
                    error: function (xhr) {
                        console.log(xhr);
                        $('#registration_form_submit_for_personal_account').removeClass('disabled');
                        $('#registration_form_submit_text_for_personal_account').removeClass('sr-only');
                        $('#registration_form_submit_processing_for_personal_account').addClass('sr-only');

                        if (xhr.responseJSON.hasOwnProperty('errors')) {
                            $.each(xhr.responseJSON.errors, function (key, value) {
                                if (key !== 'password' && key !== 'password_confirmation') {
                                    if (key === 'terms_of_service') {
                                        $('#terms_of_service_for_personal_account').parent().after('<div class="invalid-feedback" style="display: block;"></div>');
                                        $.each(value, function (k, v) {
                                            $('#terms_of_service_for_personal_account').parent().parent().find('.invalid-feedback').append('<div>' + v + '</div>');
                                        });
                                    } else if (key === 'privacy_policy') {
                                        $('#privacy_policy_for_personal_account').parent().after('<div class="invalid-feedback" style="display: block;"></div>');
                                        $.each(value, function (k, v) {
                                            $('#privacy_policy_for_personal_account').parent().parent().find('.invalid-feedback').append('<div>' + v + '</div>');
                                        });
                                    } else {
                                        $('#' + key + '_for_personal_account').after('<div class="invalid-feedback"></div>');
                                        $('#' + key + '_for_personal_account').addClass('is-invalid');
                                        $.each(value, function (k, v) {
                                            $('#' + key + '_for_personal_account').parent().find('.invalid-feedback').append('<div>' + v + '</div>');
                                        });
                                    }

                                } else {

                                    $('#' + key + '_for_personal_account').parent().parent().after('<div class="invalid-feedback d-block"></div>');
                                    $('#' + key + '_for_personal_account').addClass('is-invalid');
                                    $('#' + key + '_for_personal_account').parent().parent().find('.input-group-text').addClass('input_group_text_invalid_border_color');

                                    $.each(value, function (k, v) {
                                        $('#' + key + '_for_personal_account').parent().parent().parent().find('.invalid-feedback').append('<div>' + v + '</div>');
                                    });
                                }
                            });
                        }
                    }
                });
        //     });
        // });
    });


    $(document).on('change', '#country_id_for_business_account', function () {
        $.ajax({
            method: 'get',
            url: '{{ url('get/states/by/country/id') }}',
            data: {
                country_id: $(this).val()
            },
            cache: false,
            success: function (result) {
                console.log(result);
                $('#state_field_holder_for_business_account').empty();
                if (result.length > 0) {
                    $('#state_field_holder_for_business_account').append('<div class="form-floating"><select class="form-select" name="state" id="state_for_business_account"><option value="">Select State</option></select><label for="state_for_business_account">State</label></div>');
                    $.each(result, function (key, state) {
                        $('#state_for_business_account').append('<option value="' + state.state + '">' + state.state + '</option>');
                    });
                } else {
                    $('#state_field_holder_for_business_account').append('<div class="form-floating"><input type="text" class="form-control" name="state" id="state_for_business_account" placeholder="State"><label for="state_for_business_account">State</label></div>');
                }
            },
            error: function (xhr) {
                console.log(xhr);
            }
        });
    });

    $(document).on('submit', '#registration_form_for_business_account', function(event) {
        event.preventDefault();
        {{--grecaptcha.ready(function() {--}}
            {{--grecaptcha.execute('{{ env('RECAPTCHA_SITE_KEY') }}', {action: 'business_registration_submit'}).then(function(token) {--}}
                $('#registration_form_message').addClass('d-none').empty();
                $('#registration_form_submit_for_business_account').addClass('disabled');
                $('#registration_form_submit_text_for_business_account').addClass('sr-only');
                $('#registration_form_submit_processing_for_business_account').removeClass('sr-only');


                $('#registration_form_for_business_account').find('.is-invalid').removeClass('is-invalid');
                $('#registration_form_for_business_account').find('.input_group_text_invalid_border_color').removeClass('input_group_text_invalid_border_color');
                $('#registration_form_for_business_account').find('.invalid-feedback').remove();

                let formData = new FormData($('#registration_form_for_business_account')[0]);
                formData.append('terms_of_service', $('#terms_of_service_for_business_account').prop('checked'));
                formData.append('privacy_policy', $('#privacy_policy_for_business_account').prop('checked'));
                formData.append('_token', '{{ csrf_token() }}');
                // formData.append('g_recaptcha_token', token);
                formData.append('user', '{!! $user !!}');
                formData.append('user_country', '{{ $userCountry }}');
                $.ajax({
                    method: 'post',
                    url: '{{ url('register/business/account') }}',
                    data: formData,
                    contentType: false,
                    processData: false,
                    cache: false,
                    global: false,
                    success: function (result) {
                        console.log(result);
                        $('#registration_form_submit_for_business_account').removeClass('disabled');
                        $('#registration_form_submit_text_for_business_account').removeClass('sr-only');
                        $('#registration_form_submit_processing_for_business_account').addClass('sr-only');

                        if (result.success === true) {
                            location = '{{ url('email/verification') }}/' + result.user.id;
                        } else {
                            $('#registration_form_message').removeClass('d-none').text(result.message);
                        }
                    },
                    error: function (xhr) {
                        console.log(xhr);
                        $('#registration_form_submit_for_business_account').removeClass('disabled');
                        $('#registration_form_submit_text_for_business_account').removeClass('sr-only');
                        $('#registration_form_submit_processing_for_business_account').addClass('sr-only');

                        if (xhr.responseJSON.hasOwnProperty('errors')) {
                            $.each(xhr.responseJSON.errors, function (key, value) {
                                if (key !== 'password' && key !== 'password_confirmation') {
                                    if (key === 'terms_of_service') {
                                        $('#terms_of_service_for_business_account').parent().after('<div class="invalid-feedback" style="display: block;"></div>');
                                        $.each(value, function (k, v) {
                                            $('#terms_of_service_for_business_account').parent().parent().find('.invalid-feedback').append('<p>' + v + '</p>');
                                        });
                                    } else if (key === 'privacy_policy') {
                                        $('#privacy_policy_for_business_account').parent().after('<div class="invalid-feedback" style="display: block;"></div>');
                                        $.each(value, function (k, v) {
                                            $('#privacy_policy_for_business_account').parent().parent().find('.invalid-feedback').append('<p>' + v + '</p>');
                                        });
                                    } else {
                                        $('#' + key + '_for_business_account').after('<div class="invalid-feedback"></div>');
                                        $('#' + key + '_for_business_account').addClass('is-invalid');
                                        $.each(value, function (k, v) {
                                            $('#' + key + '_for_business_account').parent().find('.invalid-feedback').append('<p>' + v + '</p>');
                                        });
                                    }

                                } else {

                                    $('#' + key + '_for_business_account').parent().parent().after('<div class="invalid-feedback d-block"></div>');
                                    $('#' + key + '_for_business_account').addClass('is-invalid');
                                    $('#' + key + '_for_business_account').parent().parent().find('.input-group-text').addClass('input_group_text_invalid_border_color');

                                    $.each(value, function (k, v) {
                                        $('#' + key + '_for_business_account').parent().parent().parent().find('.invalid-feedback').append('<p>' + v + '</p>');
                                    });
                                }
                            });
                        }
                    }
                });
        //     });
        // });
    });

</script>
@endsection
