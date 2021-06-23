@extends('Layouts.account')

@section('content')


    <div class="row mb-5">
        <div class="col">
            <div class="table-responsive">
        {{--<table class="table">--}}
            {{--<tbody>--}}
            {{--<tr class="text-dark secondary_background_color_default">--}}
                {{--<td style="padding-top: 10px; padding-bottom: 10px; font-weight: 500;" colspan="2">Account Information</td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
                {{--<td>Account Type</td>--}}
                {{--<td>--}}
                    {{--{{ $accountDetails->type }}--}}
                    {{--@if ($accountDetails->type === 'Personal')--}}
                        {{--<div class="mt-2 small">--}}
                            {{--<a href="javascript:void(0)" class="change_from_personal_to_business" data-account_type="Retail">Change to Business (Retail)</a>--}}
                            {{--|--}}
                            {{--<a href="javascript:void(0)" class="change_from_personal_to_business" data-account_type="Wholesale">Change to Business (Wholesale)</a></div>--}}
                    {{--@endif--}}
                    {{--@if ($accountDetails->type === 'Retail')--}}
                        {{--<div class="mt-2 small"><a href="javascript:void(0)" id="change_from_retail_to_wholesale">Change to Business (Wholesale)</a></div>--}}
                    {{--@endif--}}
                {{--</td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
                {{--<td>Log in ID</td>--}}
                {{--<td>{{ $accountDetails->login_id }}</td>--}}

            {{--</tr>--}}
            {{--@if ($accountDetails->type === 'Personal')--}}
                {{--<tr>--}}
                    {{--<td>Name</td>--}}
                    {{--<td>{{ $accountDetails->first_name }} {{ $accountDetails->last_name }}</td>--}}
                {{--</tr>--}}
            {{--@else--}}
                {{--<tr>--}}
                    {{--<td>Business Name</td>--}}
                    {{--<td>{{ $accountDetails->business_name }}</td>--}}

                {{--</tr>--}}
            {{--@endif--}}


            {{--<tr class="text-dark secondary_background_color_default">--}}
                {{--<td style="padding-top: 10px; padding-bottom: 10px; font-weight: 500;" colspan="2">Contact Information</td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
                {{--<td>@if ($accountDetails->type === 'Personal') Home Address @else Business Address @endif</td>--}}
                {{--<td>{{ $accountDetails->address }}</td>--}}

            {{--</tr>--}}
            {{--<tr>--}}
                {{--<td>@if ($accountDetails->type === 'Personal') Email Address @else Business Email Address @endif</td>--}}
                {{--<td>{{ $accountDetails->email }}</td>--}}

            {{--</tr>--}}
            {{--<tr>--}}
                {{--<td>@if ($accountDetails->type === 'Personal') Phone Number @else Business Phone Number @endif</td>--}}
                {{--<td>{{ $accountDetails->contact_number }}</td>--}}
            {{--</tr>--}}

            {{--@if ($accountDetails->type !== 'Personal')--}}
                {{--<tr>--}}
                    {{--<td>City/State</td>--}}
                    {{--<td>{{ $accountDetails->state }}</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<td>Country</td>--}}
                    {{--<td>{{ $accountDetails->country }}</td>--}}
                {{--</tr>--}}
            {{--@endif--}}

            {{--<tr class="text-dark secondary_background_color_default">--}}
                {{--<td style="padding-top: 10px; padding-bottom: 10px; font-weight: 500;" colspan="2">Security and Status</td>--}}
            {{--</tr>--}}

            {{--<tr>--}}
                {{--<td>Account Status</td>--}}
                {{--<td>{{ $accountDetails->status }}</td>--}}

            {{--</tr>--}}
            {{--</tbody>--}}
        {{--</table>--}}
    </div>


    <div class="modal fade" id="change_from_personal_to_business_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">From Personal to Retail Conversion</h5>
                    <button type="button" class="close change_from_personal_to_business_modal_close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" style="padding-left: 30px; padding-right: 30px; padding-bottom: 50px;">
                    <form id="change_from_personal_to_business_form">
                        <input type="hidden" id="account_type" name="account_type">
                        <div class="form-group">
                            <label for="business_name">Business Name</label>
                            <input type="text" class="form-control" name="business_name" id="business_name" placeholder="Business Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Business Email</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Business Email">
                        </div>
                        <div class="form-group">
                            <label for="contact_number">Business Phone Number</label>
                            <input type="text" class="form-control" name="contact_number" id="contact_number" placeholder="Business Phone Number">
                        </div>
                        <div class="row mt-2">
                            <div class="col text-right">
                                <button type="button" class="btn btn-sm btn-primary change_from_personal_to_business_modal_close" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-sm primary_btn_default ml-3">Confirm</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="change_from_retail_to_wholesale_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">From Personal to Retail Conversion</h5>
                    <button type="button" class="close change_from_retail_to_wholesale_modal_close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" style="padding-left: 30px; padding-right: 30px; padding-bottom: 50px;">
                    <form id="change_from_retail_to_wholesale_form">
                        <div class="form-group">
                            <label for="business_name">Business Name</label>
                            <input type="text" class="form-control" name="business_name" id="business_name_for_retail_to_wholesale" placeholder="Business Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Business Email</label>
                            <input type="text" class="form-control" name="email" id="email_for_retail_to_wholesale" placeholder="Business Email">
                        </div>
                        <div class="form-group">
                            <label for="contact_number">Business Phone Number</label>
                            <input type="text" class="form-control" name="contact_number" id="contact_number_for_retail_to_wholesale" placeholder="Business Phone Number">
                        </div>
                        <div class="row mt-2">
                            <div class="col text-right">
                                <button type="button" class="btn btn-sm btn-primary change_from_retail_to_wholesale_modal_close" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-sm primary_btn_default ml-3">Confirm</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>

    <script type="text/javascript">

        function clearChangeFormPersonalToBusinessForm() {
            $('#change_from_personal_to_business_form').trigger('reset');
            $('#change_from_personal_to_business_form').find('.text-danger').removeClass('text-danger');
            $('#change_from_personal_to_business_form').find('.is-invalid').removeClass('is-invalid');
            $('#change_from_personal_to_business_form').find('span').remove();
            return true;
        }

        function clearChangeFormRetailToWholesaleForm() {
            $('#change_from_personal_to_business_form').trigger('reset');
            $('#change_from_personal_to_business_form').find('.text-danger').removeClass('text-danger');
            $('#change_from_personal_to_business_form').find('.is-invalid').removeClass('is-invalid');
            $('#change_from_personal_to_business_form').find('span').remove();
            return true;
        }

        $(document).on('click', '.change_from_personal_to_business', function () {
            clearChangeFormPersonalToBusinessForm();
            $('#account_type').val($(this).data('account_type'));
            $('#change_from_personal_to_business_modal').modal('show').on('shown.bs.modal', function () {
                $('#business_name').focus();
            });
            return false;
        });

        {{--$(document).on('click', '#change_from_retail_to_wholesale', function () {--}}
            {{--clearChangeFormRetailToWholesaleForm();--}}
            {{--$('#business_name_for_retail_to_wholesale').val('{{ $accountDetails->business_name }}');--}}
            {{--$('#email_for_retail_to_wholesale').val('{{ $accountDetails->email }}');--}}
            {{--$('#contact_number_for_retail_to_wholesale').val('{{ $accountDetails->contact_number }}');--}}
            {{--$('#change_from_retail_to_wholesale_modal').modal('show').on('shown.bs.modal', function () {--}}
                {{--$('#business_name_for_retail_to_wholesale').focus();--}}
            {{--});--}}
            {{--return false;--}}
        {{--});--}}

        $(document).on('submit', '#change_from_personal_to_business_form', function () {
            $('#change_from_personal_to_business_form').find('.text-danger').removeClass('text-danger');
            $('#change_from_personal_to_business_form').find('.is-invalid').removeClass('is-invalid');
            $('#change_from_personal_to_business_form').find('span').remove();
            let formData = new FormData(this);
            formData.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: 'post',
                url: '{{ url('account/change/from/personal/to/business/account') }}',
                data: formData,
                contentType: false,
                processData: false,
                cache: false,
                success: function (result) {
                    console.log(result);
                    $('.change_from_personal_to_business_modal_close').trigger('click');
                    $.toaster({ title: 'Success', priority : 'success', message : 'Account Type Conversion Successful' });
                    setTimeout(function () {
                        location.reload();
                    }, 1000);
                },
                error: function (xhr) {
                    console.log(xhr);
                    if (xhr.hasOwnProperty('responseJSON')) {
                        if (xhr.responseJSON.hasOwnProperty('errors')) {
                            $.each(xhr.responseJSON.errors, function (key, value) {
                                $('#' + key).after('<span></span>');
                                $('#' + key).parent().find('label').addClass('text-danger');
                                $('#' + key).addClass('is-invalid');
                                $.each(value, function (k, v) {
                                    $('#' + key).parent().find('span').addClass('text-danger').append('<p>' + v + '</p>');
                                });
                            });
                        }
                    }
                }
            });
            return false;
        });

        $(document).on('submit', '#change_from_retail_to_wholesale_form', function () {
            $('#change_from_retail_to_wholesale_form').find('.text-danger').removeClass('text-danger');
            $('#change_from_retail_to_wholesale_form').find('.is-invalid').removeClass('is-invalid');
            $('#change_from_retail_to_wholesale_form').find('span').remove();
            let formData = new FormData(this);
            formData.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: 'post',
                url: '{{ url('account/change/from/retail/to/wholesale/account') }}',
                data: formData,
                contentType: false,
                processData: false,
                cache: false,
                success: function (result) {
                    console.log(result);
                    $('.change_from_retail_to_wholesale_modal_close').trigger('click');
                    $.toaster({ title: 'Success', priority : 'success', message : 'Account Type Conversion Successful' });
                    setTimeout(function () {
                        location.reload();
                    }, 1000);
                },
                error: function (xhr) {
                    console.log(xhr);
                    if (xhr.hasOwnProperty('responseJSON')) {
                        if (xhr.responseJSON.hasOwnProperty('errors')) {
                            $.each(xhr.responseJSON.errors, function (key, value) {
                                $('#' + key).after('<span></span>');
                                $('#' + key).parent().find('label').addClass('text-danger');
                                $('#' + key).addClass('is-invalid');
                                $.each(value, function (k, v) {
                                    $('#' + key).parent().find('span').addClass('text-danger').append('<p>' + v + '</p>');
                                });
                            });
                        }
                    }
                }
            });
            return false;
        });
    </script>



@endsection
