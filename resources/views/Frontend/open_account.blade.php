<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $title }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('storage/img/favicon.ico') }}" />
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <link href="{{ asset('css/font-awesome.all.css') }}" type="text/css" rel="stylesheet">
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.toaster.js') }}"></script>




    <style type="text/css">

        body {
            background-color: #ffffff;
        }

        ::-webkit-input-placeholder {
            font-size: 13px!important;
        }

        :-moz-placeholder { /* Firefox 18- */
            font-size: 13px!important;
        }
        ::-moz-placeholder {  /* Firefox 19+ */
            font-size: 13px!important;
        }

        .form-control {
            height: calc(2em + .75rem + 2px);
        }

        .primary_btn_default {
            background: #003871;
        }

        .custom-file-label::after {

            height: calc(2em + .75rem);
            padding: 0.575rem .75rem;
        }

        .custom-file-label {
            height: calc(2em + .75rem + 2px);
            padding: .575rem .75rem;
        }






    </style>
</head>
<body>

<div class="container-fluid fixed-top" style="padding-top: 30px; background-color: #fdfdfe;">
    <div class="row">
        <div class="col-sm-10 mx-auto text-center">
            <img src="{{ asset('storage/img/logo.png') }}" width="50px" height="50px" style="margin-top: -30px;">
            <span style="color: #041a75; font-size: 2rem;">WorldBank</span>
        </div>
    </div>
</div>

<div class="container-fluid" style="margin-top: 120px">
    <div class="row">
        <div class="col-sm-10 mx-auto">
            <hr style="color: #ccc;">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-10 mx-auto">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-8 col-lg-8" style="border-right: 1px solid #ccc;">

                    <div id="open_account_form_message" class="text-danger text-center"></div>

                    <form id="open_account_form">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6" style="padding-top: 10px;">
                                <div class="row mb-3">
                                    <div class="col">
                                        Account Type
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input account_type" name="account_type" value="Personal" id="account_type_personal">
                                            <label class="custom-control-label" for="account_type_personal">Personal</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input account_type" name="account_type" value="Investment" id="account_type_investment">
                                            <label class="custom-control-label" for="account_type_investment">Investment</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="account_name">Name</label>
                                    <input name="account_name" type="text" class="form-control" id="account_name">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input name="email" type="text" class="form-control" id="email">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="contact_number">Contact Number</label>
                                    <input name="contact_number" type="text" class="form-control" id="contact_number">
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="current_address">Current Address</label>
                                    <textarea name="current_address" class="form-control" id="current_address"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="state_id">State ID</label>
                                    <input name="state_id" type="text" class="form-control" id="state_id">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="passport_or_birth_certificate">Passport/Birth Certificate</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="passport_or_birth_certificate" name="passport_or_birth_certificate">
                                        <label class="custom-file-label" for="passport_or_birth_certificate">Choose File</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="lease_or_utility_bill">Lease/Utility Bill</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="lease_or_utility_bill" name="lease_or_utility_bill">
                                        <label class="custom-file-label" for="lease_or_utility_bill">Choose File</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 text-right" style="padding-top: 35px;">
                                <button type="submit" class="btn btn-primary primary_btn_default" id="open_account_form_submit">Open Account</button>
                            </div>
                        </div>


                    </form>

                    <div class="row mt-5">

                        <div class="col">
                            Signed Up Already? <a href="{{ url('login') }}">Sign On</a> | Account Holder? <a href="{{ url('register') }}">Sign Up</a>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                    <img src="{{ asset('storage/img/open_account.png') }}" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>

<div style="margin-bottom: 150px;"></div>



<div class="container-fluid fixed-bottom" style="padding-top: 15px; padding-bottom: 15px; background-color: #fdfdfe;">
    <div class="row">
        <div class="col text-center">
            World Bank &copy; {{ date('Y') }}
        </div>

    </div>
</div>
</body>
</html>




<script language="JavaScript">



    $(document).on('submit', '#open_account_form', function() {
        $('#open_account_form_submit').attr('disabled', 'disabled');
        $('#open_account_form_message').empty();

        let formData = new FormData(this);
        formData.append('_token', '{{ csrf_token() }}');
        $.ajax({
            method: 'post',
            url: '{{ url('open/account') }}',
            data: formData,
            contentType: false,
            processData: false,
            success: function (result) {
                console.log(result);
                $('#open_account_form_submit').removeAttr('disabled');
                if (result === 'Account Created Successfully') {
                    $('#open_account_form').trigger('reset');
                    $.toaster({ title: 'Success', priority : 'success', message : result });
                } else {
                    $('#open_account_form_message').text(result);
                }
            },
            error: function (xhr) {
                console.log(xhr);
                $('#open_account_form_submit').removeAttr('disabled');
                if (xhr.hasOwnProperty('responseJSON')) {
                    if (xhr.responseJSON.hasOwnProperty('errors')) {
                        $.each(xhr.responseJSON.errors, function (key, value) {
                            if (key !== 'account_type') {
                                $('#' + key).after('<span></span>');
                                $('#' + key).parent().find('label').addClass('text-danger');
                                $('#' + key).addClass('is-invalid');
                                $.each(value, function (k, v) {
                                    $('#' + key).parent().find('span').addClass('text-danger').append('<p>' + v + '</p>');
                                });
                            } else {
                                $.each(value, function (k, v) {
                                    $('#open_account_form_message').append('<p>' + v + '</p>');
                                });
                            }
                        });
                    }
                }
            }
        });
        return false;
    });
</script>

