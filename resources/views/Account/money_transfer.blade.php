@extends('Layouts.customer')

@section('content')

    <div class="container-fluid" style="margin-top: 10px;">
        <div class="row">
            <div class="col mx-auto">
                <div class="card">

                    <div class="card-header" style="font-size: 150%">
                        <div class="row">
                            <div class="col">{{ $customerAccount->account_type }} <sup style="font-size: 0.9rem;">{{ $customerAccount->status }}</sup></div>
                            <div class="col text-right">
                                {{ $customerAccount->account_number }}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6" style="border-right: 1px solid #cccccc;">

                                <div class="card" style="border: none;">
                                    <div class="card-header" style="background-color: #ffffff;">Domestic Wire Transfer</div>
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <div class="col">
                                                <button type="button" class="btn btn-primary primary_btn_default" id="initiate_domestic_wire_transfer">Initiate Domestic Wire Transfer</button>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-5">
                                                <div class="row">
                                                    <div class="col-sm-5 pt-2">Date From</div>
                                                    <div class="col-sm-7"><input type="text" id="domestic_search_date_from" value="{{ date('01-M-Y') }}" class="form-control"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="row">
                                                    <div class="col-sm-5 pt-2">Date To</div>
                                                    <div class="col-sm-7"><input type="text" id="domestic_search_date_to" value="{{ date('d-M-Y') }}" class="form-control"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <button type="button" class="btn btn-primary primary_btn_default" id="domestic_search">Search</button>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Ref. Number</th>
                                                    <th>Amount</th>
                                                    <th>Recipient</th>
                                                    <th>Bank</th>
                                                    <th>Status</th>
                                                </tr>
                                                </thead>
                                                <tbody id="domestic_wire_transfer_records">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6" style="border-left: 1px solid #cccccc;">

                                <div class="card" style="border: none;">
                                    <div class="card-header" style="background-color: #ffffff;">International Wire Transfer</div>
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <div class="col">
                                                <button type="button" class="btn btn-primary primary_btn_default" id="initiate_international_wire_transfer">Initiate International Wire Transfer</button>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-5">
                                                <div class="row">
                                                    <div class="col-sm-5 pt-2">Date From</div>
                                                    <div class="col-sm-7"><input type="text" id="international_search_date_from" value="{{ date('01-M-Y') }}" class="form-control"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="row">
                                                    <div class="col-sm-5 pt-2">Date To</div>
                                                    <div class="col-sm-7"><input type="text" id="international_search_date_to" value="{{ date('d-M-Y') }}" class="form-control"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <button type="button" class="btn btn-primary primary_btn_default" id="international_search">Search</button>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Ref. Number</th>
                                                    <th>Amount</th>
                                                    <th>Recipient</th>
                                                    <th>Bank</th>
                                                    <th>Status</th>
                                                </tr>
                                                </thead>
                                                <tbody id="international_wire_transfer_records">

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal" id="domestic_wire_transfer_modal">
        <div class="modal-dialog modal-dialog-centered modal_eighty">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Domestic Wire Transfer</h4>
                    <button type="button" class="close domestic_wire_transfer_modal_close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body" style="padding: 30px 50px 30px 50px;">

                    <div id="domestic_wire_transfer_form_message" class="text-danger text-center mb-3"></div>
                    <form id="domestic_wire_transfer_form">

                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="transfer_from">Transfer From</label>
                                    <input type="text" class="form-control" value="{{ $customerAccount->account_number }} ({{ $customerAccount->account_type }})" disabled>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="recipient_bank_name">Recipient Bank Name</label>
                                    <input type="text" class="form-control" name="recipient_bank_name" id="recipient_bank_name" placeholder="Recipient Bank Name">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="transfer_date">Transfer Date</label>
                                    <input type="text" class="form-control" name="transfer_date" id="transfer_date" placeholder="Transfer Date">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="transfer_amount">Transfer Amount</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text" style="display: inline;">$</div>
                                        </div>
                                        <input type="text" class="form-control" name="transfer_amount" id="transfer_amount" placeholder="Transfer Amount">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="recipient_account_number">Recipient Account Number</label>
                                    <input type="text" class="form-control" name="recipient_account_number" id="recipient_account_number" placeholder="Recipient Account Number">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="recipient_account_type">Recipient Account Type</label>
                                    <input type="text" class="form-control" name="recipient_account_type" id="recipient_account_type" placeholder="Recipient Account Type">
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="recipient_name">Recipient Full Name</label>
                                    <input type="text" class="form-control" name="recipient_name" id="recipient_name" placeholder="Recipient Full Name">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="recipient_routing_number">Recipient Routing Number</label>
                                    <input type="text" class="form-control" name="recipient_routing_number" id="recipient_routing_number" placeholder="Recipient Routing Number">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="recipient_address">Recipient Address</label>
                                    <textarea class="form-control" name="recipient_address" id="recipient_address" placeholder="Recipient Address"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="recipient_city">Recipient City</label>
                                    <input type="text" class="form-control" name="recipient_city" id="recipient_city" placeholder="Recipient City">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="recipient_country">Recipient Country</label>
                                    <input type="text" class="form-control" value="USA" disabled>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="recipient_bank_bic_or_swift_code">Recipient Bank BIC/Swift Code</label>
                                    <input type="text" class="form-control" name="recipient_bank_bic_or_swift_code" id="recipient_bank_bic_or_swift_code" placeholder="Recipient Bank BIC/Swift Code">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="recipient_bank_address">Recipient Bank Address</label>
                                    <textarea class="form-control" name="recipient_bank_address" id="recipient_bank_address" placeholder="Recipient Bank Address"></textarea>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-8 col-lg-8 text-right" style="padding-top: 55px;">
                                <button type="button" class="btn btn-primary domestic_wire_transfer_modal_close" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary primary_btn_default ml-3" id="domestic_wire_transfer_form_submit">Transfer</button>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>




    <div class="modal" id="international_wire_transfer_modal">
        <div class="modal-dialog modal-dialog-centered modal_eighty">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">International Wire Transfer</h4>
                    <button type="button" class="close international_wire_transfer_modal_close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body" style="padding: 30px 50px 30px 50px;">

                    <div id="international_wire_transfer_form_message" class="text-danger text-center mb-3"></div>
                    <form id="international_wire_transfer_form">

                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="transfer_from">Transfer From</label>
                                    <input type="text" class="form-control" value="{{ $customerAccount->account_number }} ({{ $customerAccount->account_type }})" disabled>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="international_recipient_bank_name">Recipient Bank Name</label>
                                    <input type="text" class="form-control" name="international_recipient_bank_name" id="international_recipient_bank_name" placeholder="Recipient Bank Name">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="international_transfer_date">Transfer Date</label>
                                    <input type="text" class="form-control" name="international_transfer_date" id="international_transfer_date" placeholder="Transfer Date">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="international_transfer_amount">Transfer Amount</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text" style="display: inline;">$</div>
                                        </div>
                                        <input type="text" class="form-control" name="international_transfer_amount" id="international_transfer_amount" placeholder="Transfer Amount">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="international_recipient_account_number">Recipient Account Number</label>
                                    <input type="text" class="form-control" name="international_recipient_account_number" id="international_recipient_account_number" placeholder="Recipient Account Number">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="international_recipient_account_type">Recipient Account Type</label>
                                    <input type="text" class="form-control" name="international_recipient_account_type" id="international_recipient_account_type" placeholder="Recipient Account Type">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="international_recipient_name">Recipient Full Name</label>
                                    <input type="text" class="form-control" name="international_recipient_name" id="international_recipient_name" placeholder="Recipient Full Name">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="international_recipient_routing_number">Recipient Routing Number</label>
                                    <input type="text" class="form-control" name="international_recipient_routing_number" id="international_recipient_routing_number" placeholder="Recipient Routing Number">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="international_recipient_address">Recipient Address</label>
                                    <textarea class="form-control" name="international_recipient_address" id="international_recipient_address" placeholder="Recipient Address"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="international_recipient_city">Recipient City</label>
                                    <input type="text" class="form-control" name="international_recipient_city" id="international_recipient_city" placeholder="Recipient City">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="international_recipient_country">Recipient Country</label>
                                    <input type="text" class="form-control" name="international_recipient_country" id="international_recipient_country" placeholder="Recipient Country">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="international_recipient_bank_bic_or_swift_code">Recipient Bank BIC/Swift Code</label>
                                    <input type="text" class="form-control" name="international_recipient_bank_bic_or_swift_code" id="international_recipient_bank_bic_or_swift_code" placeholder="Recipient Bank BIC/Swift Code">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                                <div class="form-group">
                                    <label for="international_recipient_bank_address">Recipient Bank Address</label>
                                    <textarea class="form-control" name="international_recipient_bank_address" id="international_recipient_bank_address" placeholder="Recipient Bank Address"></textarea>
                                </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-8 col-lg-8 text-right" style="padding-top: 55px;">
                                <button type="button" class="btn btn-primary international_wire_transfer_modal_close" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary primary_btn_default ml-3" id="international_wire_transfer_form_submit">Transfer</button>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#domestic_search_date_from').datepicker({
                dateFormat: 'dd-M-yy',
            });
            $('#domestic_search_date_to').datepicker({
                dateFormat: 'dd-M-yy',
            });
            $('#international_search_date_from').datepicker({
                dateFormat: 'dd-M-yy',
            });
            $('#international_search_date_to').datepicker({
                dateFormat: 'dd-M-yy',
            });

            $('#transfer_date').datepicker({
                dateFormat: 'dd-M-yy',
            });

            $('#international_transfer_date').datepicker({
                dateFormat: 'dd-M-yy',
            });

            let domesticDateFrom = $('#domestic_search_date_from').val();
            let domesticDateTo = $('#domestic_search_date_to').val();
            let internationalDateFrom = $('#international_search_date_from').val();
            let internationalDateTo = $('#international_search_date_to').val();

            let url = '{{ url('customer/money/transfer/get/transfers') }}';

            getTransfers('domestic', url, domesticDateFrom, domesticDateTo);
            getTransfers('international', url, internationalDateFrom, internationalDateTo);
        });



        function getTransfers(transferType, url, dateFrom, dateTo) {
            $.ajax({
                method: 'get',
                url: url,
                data: {
                    date_from: dateFrom,
                    date_to: dateTo,
                    transfer_type: transferType
                },
                cache: false,
                success: function (result) {
                    console.log(result);
                    $('#' + transferType + '_wire_transfer_records').empty();
                    if (result.customer_account_transfers.length > 0) {
                        $.each(result.customer_account_transfers, function (key, transfer) {
                            $('#' + transferType + '_wire_transfer_records').append($('<tr></tr>')
                                .append('<td>' + $.datepicker.formatDate('dd-M-yy', new Date(transfer.transfer_date)) + '</td>')
                                .append('<td>' + transfer.reference_number + '</td>')
                                .append('<td>' + transfer.transfer_amount + '</td>')
                                .append('<td>' + transfer.recipient_account_number + ' - ' + transfer.recipient_name + '</td>')
                                .append('<td>' + transfer.recipient_bank_bic_or_swift_code + ' - ' + transfer.recipient_bank_name + '</td>')
                                .append('<td>' + transfer.status + '</td>')
                            );
                        });
                    } else {
                        $('#' + transferType + '_wire_transfer_records').append($('<tr></tr>')
                            .append('<td colspan="6" class="text-center">No Transfer Found!</td>')
                        );
                    }
                },
                error: function (xhr) {
                    console.log(xhr);
                }
            });
        }

        $(document).on('click', '#domestic_search', function () {
            let domesticDateFrom = $('#domestic_search_date_from').val();
            let domesticDateTo = $('#domestic_search_date_to').val();
            let url = '{{ url('customer/money/transfer/get/transfers') }}';
            getTransfers('domestic', url, domesticDateFrom, domesticDateTo);
            return false;
        });

        $(document).on('click', '#international_search', function () {
            let internationalDateFrom = $('#international_search_date_from').val();
            let internationalDateTo = $('#international_search_date_to').val();
            let url = '{{ url('customer/money/transfer/get/transfers') }}';
            getTransfers('international', url, internationalDateFrom, internationalDateTo);
            return false;
        });

        function clearDomesticWireTransferForm() {
            $('#domestic_wire_transfer_form').trigger('reset');
            $('#domestic_wire_transfer_form_message').empty();
            $('#domestic_wire_transfer_form').find('.text-danger').removeClass('text-danger');
            $('#domestic_wire_transfer_form').find('.is-invalid').removeClass('is-invalid');
            $('#domestic_wire_transfer_form').find('span').remove();
        }

        function clearInternationalWireTransferForm() {
            $('#international_wire_transfer_form').trigger('reset');
            $('#international_wire_transfer_form_message').empty();
            $('#international_wire_transfer_form').find('.text-danger').removeClass('text-danger');
            $('#international_wire_transfer_form').find('.is-invalid').removeClass('is-invalid');
            $('#international_wire_transfer_form').find('span').remove();
        }

        $(document).on('click', '#initiate_domestic_wire_transfer', function () {
            clearDomesticWireTransferForm();
            $('#domestic_wire_transfer_modal').modal('show');
            return false;
        });

        $(document).on('submit', '#domestic_wire_transfer_form', function () {
            $('#domestic_wire_transfer_form_message').empty();
            $('#domestic_wire_transfer_form').find('.text-danger').removeClass('text-danger');
            $('#domestic_wire_transfer_form').find('.is-invalid').removeClass('is-invalid');
            $('#domestic_wire_transfer_form').find('span').remove();
            $('#domestic_wire_transfer_form_submit').attr('disabled', 'disabled');
            let data = new FormData(this);
            data.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: 'post',
                url: '{{ url('customer/money/transfer/save/domestic/transfer') }}',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                success: function (result) {
                    console.log(result);
                    $('#domestic_wire_transfer_form_submit').removeAttr('disabled');
                    $('.domestic_wire_transfer_modal_close').trigger('click');
                    let domesticDateFrom = $('#domestic_search_date_from').val();
                    let domesticDateTo = $('#domestic_search_date_to').val();
                    let url = '{{ url('customer/money/transfer/get/transfers') }}';
                    getTransfers('domestic', url, domesticDateFrom, domesticDateTo);

                },
                error: function (xhr) {
                    console.log(xhr);
                    $('#domestic_wire_transfer_form_submit').removeAttr('disabled');
                    if (xhr.hasOwnProperty('responseJSON')) {
                        if (xhr.responseJSON.hasOwnProperty('errors')) {
                            $.each(xhr.responseJSON.errors, function (key, value) {
                                if (key !== 'transaction_amount') {
                                    $('#' + key).after('<span></span>');
                                    $('#' + key).parent().find('label').addClass('text-danger');
                                    $('#' + key).addClass('is-invalid');
                                    $.each(value, function (k, v) {
                                        $('#' + key).parent().find('span').addClass('text-danger').append('<p>' + v + '</p>');
                                    });
                                } else {
                                    $('#' + key).parent().after('<span></span>');
                                    $('#' + key).parent().parent().find('label').addClass('text-danger');
                                    $('#' + key).addClass('is-invalid');
                                    $.each(value, function (k, v) {
                                        $('#' + key).parent().parent().find('span').addClass('text-danger').append('<p>' + v + '</p>');
                                    });
                                }
                            });
                        }
                    }
                }
            });
            return false;
        });


        $(document).on('click', '#initiate_international_wire_transfer', function () {
            clearInternationalWireTransferForm();
            $('#international_wire_transfer_modal').modal('show');
            return false;
        });

        $(document).on('submit', '#international_wire_transfer_form', function () {
            $('#international_wire_transfer_form_message').empty();
            $('#international_wire_transfer_form').find('.text-danger').removeClass('text-danger');
            $('#international_wire_transfer_form').find('.is-invalid').removeClass('is-invalid');
            $('#international_wire_transfer_form').find('span').remove();
            $('#international_wire_transfer_form_submit').attr('disabled', 'disabled');
            let data = new FormData(this);
            data.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: 'post',
                url: '{{ url('customer/money/transfer/save/international/transfer') }}',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                success: function (result) {
                    console.log(result);
                    $('#international_wire_transfer_form_submit').removeAttr('disabled');
                    $('.international_wire_transfer_modal_close').trigger('click');
                    let internationalDateFrom = $('#international_search_date_from').val();
                    let internationalDateTo = $('#international_search_date_to').val();
                    let url = '{{ url('customer/money/transfer/get/transfers') }}';
                    getTransfers('international', url, internationalDateFrom, internationalDateTo);

                },
                error: function (xhr) {
                    console.log(xhr);
                    $('#international_wire_transfer_form_submit').removeAttr('disabled');
                    if (xhr.hasOwnProperty('responseJSON')) {
                        if (xhr.responseJSON.hasOwnProperty('errors')) {
                            $.each(xhr.responseJSON.errors, function (key, value) {
                                if (key !== 'transaction_amount') {
                                    $('#' + key).after('<span></span>');
                                    $('#' + key).parent().find('label').addClass('text-danger');
                                    $('#' + key).addClass('is-invalid');
                                    $.each(value, function (k, v) {
                                        $('#' + key).parent().find('span').addClass('text-danger').append('<p>' + v + '</p>');
                                    });
                                } else {
                                    $('#' + key).parent().after('<span></span>');
                                    $('#' + key).parent().parent().find('label').addClass('text-danger');
                                    $('#' + key).addClass('is-invalid');
                                    $.each(value, function (k, v) {
                                        $('#' + key).parent().parent().find('span').addClass('text-danger').append('<p>' + v + '</p>');
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

@endsection
