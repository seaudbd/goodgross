@extends('Layouts.frontend')
@section('content')
    <style type="text/css">
        .page_identity_line {
            color: #333333;
        }
        .page_identity_line a {
            color: #999999;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mx-auto">
                <div class="row mt-4">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 border-bottom pb-2" style="border-color: #e8f3ed !important;">
                        <div class="page_identity_line">
                            <a href="{{ url('/') }}">Home</a> . Place Order
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxl-12">
                        @if($wholesaleItem)

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-8">
                                    <div class="row">
                                        <div class="col-4 col-sm-3">
                                            <img src="{{ asset('storage/' . explode(',', $wholesaleItem->productProperties->where('property.property', 'Images')->first()->value)[0]) }}" class="img-fluid">
                                        </div>
                                        <div class="col-8 col-sm-9">
                                            <div class="text-dark h4">{{ $wholesaleItem->productProperties->where('property.property', 'Title')->first()->value }}</div>
                                            <div class="row mt-3">
                                                <div class="col-auto">Make Deposit</div>
                                                <div class="col-auto">
                                                    <select class="form-select">
                                                        <option value="20" selected>20%</option>
                                                        <option value="30">30%</option>
                                                        <option value="40">40%</option>
                                                        <option value="50">50%</option>
                                                        <option value="100">Full Amount 100%</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-4">

                                </div>
                            </div>


                            <div class="card shadow-sm border-0 bg-white">
                                <div class="card-header bg-white">
                                    {{ $wholesaleItem->account->businessAccount->name }}
                                </div>
                                <div class="card-body">

                                </div>
                            </div>
                        @else
                            <div class="alert alert-info">No Checkout Items Found!</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="mt-3"></div>
    <script type="text/javascript">
        $(document).ready(function () {


        });

        $(document).on('change', '#different_from_shipping_information', function () {
            if ($(this).is(':checked') === true) {
                $('#first_name_for_billing').removeAttr('disabled');
                $('#last_name_for_billing').removeAttr('disabled');
                $('#address_line_1_for_billing').removeAttr('disabled');
                $('#address_line_2_for_billing').removeAttr('disabled');
                $('#country_for_billing').removeAttr('disabled');
                $('#city_for_billing').removeAttr('disabled');
                $('#region_for_billing').removeAttr('disabled');
                $('#zip_code_for_billing').removeAttr('disabled');
                $('#email_for_billing').removeAttr('disabled');
                $('#phone_for_billing').removeAttr('disabled');
                $('#different_from_shipping_information').parent().css({'padding-top': '0', 'padding-bottom': '0'});
                $('#billing_information_details').show(1000);
            } else {
                $('#first_name_for_billing').attr('disabled', true);
                $('#last_name_for_billing').attr('disabled', true);
                $('#address_line_1_for_billing').attr('disabled', true);
                $('#address_line_2_for_billing').attr('disabled', true);
                $('#country_for_billing').attr('disabled', true);
                $('#city_for_billing').attr('disabled', true);
                $('#region_for_billing').attr('disabled', true);
                $('#zip_code_for_billing').attr('disabled', true);
                $('#email_for_billing').attr('disabled', true);
                $('#phone_for_billing').attr('disabled', true);
                $('#different_from_shipping_information').parent().css({'padding-top': '50px', 'padding-bottom': '50px'});
                $('#billing_information_details').hide(1000);
            }
            return true;
        });

        $(document).on('click', '.payment_method', function () {
            $('#card_number').val('').attr('disabled', true);
            $('#card_cvc').val('').attr('disabled', true);
            $('#expiry_month').val('').attr('disabled', true);
            $('#expiry_year').val('').attr('disabled', true);
            if ($(this).val() === 'Card') {
                $('#card_number').val('').removeAttr('disabled');
                $('#card_cvc').val('').removeAttr('disabled');
                $('#expiry_month').val('').removeAttr('disabled');
                $('#expiry_year').val('').removeAttr('disabled');
                $('#payment_method_card_details').show(1000);
            } else {
                $('#payment_method_card_details').hide(1000);
            }
            return true;
        });

        $(document).on('change', '#create_an_account', function () {
            if ($(this).is(':checked') === true) {
                $('#first_name_for_account').removeAttr('disabled');
                $('#last_name_for_account').removeAttr('disabled');
                $('#email_for_account').removeAttr('disabled');
                $('#password_for_account').removeAttr('disabled');
                $('#create_an_account').parent().css('padding-top', '0');
                $('#account_information_details').show(1000);
            } else {
                $('#first_name_for_account').attr('disabled', true);
                $('#last_name_for_account').attr('disabled', true);
                $('#email_for_account').attr('disabled', true);
                $('#password_for_account').attr('disabled', true);
                $('#create_an_account').parent().css('padding-top', '75px');
                $('#account_information_details').hide(1000);
            }
            return true;
        });

        $(document).on('submit', '#checkout_form', function () {
            $('#checkout_form').find('.is-invalid').removeClass('is-invalid');
            $('#checkout_form').find('.invalid-feedback').remove();
            $('#payment_method_error_message').empty();
            let formData = new FormData(this);
            formData.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: 'post',
                url: '{{ url('checkout') }}',
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (result) {
                    console.log(result);
                    if (result.success === false) {
                        $('#payment_method_error_message').text(result.message);
                    } else if (result.success === true) {
                        location = '{{ url('checkout/success') }}/' + result.message.id;
                    }
                },
                error: function (xhr) {
                    console.log(xhr);
                    if (xhr.hasOwnProperty('responseJSON')) {
                        if (xhr.responseJSON.hasOwnProperty('errors')) {
                            $.each(xhr.responseJSON.errors, function (key, value) {

                                if (key !== 'phone' && key !== 'payment_method' && key !== 'country' && key !== 'expiry_month' && key !== 'expiry_year') {
                                    $('#' + key).after('<div class="invalid-feedback"></div>');
                                    $('#' + key).addClass('is-invalid');
                                    $.each(value, function (k, v) {
                                        $('#' + key).parent().find('.invalid-feedback').append(v + ' ');
                                    });
                                } else {
                                    if (key === 'phone' || key === 'country') {
                                        $('#' + key).after('<div class="invalid-feedback"></div>');
                                        $('#' + key).addClass('is-invalid');
                                        $.each(value, function (k, v) {
                                            $('#' + key).parent().find('.invalid-feedback').append( v + ' ');
                                        });
                                    }
                                    if (key === 'expiry_month' || key === 'expiry_year') {
                                        if ($('#' + key).parent().find('.invalid-feedback').length === 0) {
                                            $('#' + key).parent().append('<span class="invalid-feedback"></span>');
                                        }
                                        $('#' + key).addClass('is-invalid');
                                        $.each(value, function (k, v) {
                                            $('#' + key).parent().find('.invalid-feedback').append(v + ' ');
                                        });
                                    }
                                    if (key === 'payment_method') {

                                        $('#payment_method_error_message').text('Please Select a Payment Method');
                                    }



                                }



                            });
                        }
                    }
                }
            });

            return false;
        });
    </script>



@endsection
