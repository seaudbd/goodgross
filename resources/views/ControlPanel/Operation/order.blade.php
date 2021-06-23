@extends('Layouts.control_panel')

@section('content')
    <div class="row">
        <div class="col">
            Operation | {{ $activeMenu }}


            <div class="row mt-3">
                <div class="col">
                    <div class="row sr-only" id="bulk_action_section">
                        <div class="col-sm-3">
                            <input type="checkbox" id="bulk_records"> All Check
                        </div>
                        <div class="col-sm-4">
                            <select name="bulk_status" id="bulk_status" class="form-control">
                                <option value="">Select an Action</option>
                                <option value="Approved">Make Approved</option>
                                <option value="Declined">Make Declined</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <button type="button" id="bulk_apply" class="btn btn-sm primary_btn_default">Apply</button>
                        </div>
                    </div>
                </div>
                <div class="col" id="search_section">
                    <form id="search_form">
                        <div class="input-group">
                            <input type="text" id="search_key" class="form-control border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn primary_btn_default" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row mt-3 sr-only" id="record_section">
                <div class="col">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Number</th>
                            <th>Buyer</th>
                            <th>Item</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody id="records"></tbody>
                    </table>
                </div>
            </div>

            <div class="row sr-only" id="no_record_section">
                <div class="col text-center mt-3">
                    No Record Found
                </div>
            </div>

            <div class="row sr-only" style="margin-top: 15px; margin-bottom: 50px;">
                <div class="sr-only" id="pagination_section">
                    <ul class="pagination" role="navigation" id="pagination_links">

                    </ul>
                </div>
                <div class="text-right" id="record_count_section">

                </div>
            </div>
        </div>
    </div>


    <div class="modal" id="order_details_modal" data-backdrop="static" data-keyboard="false" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table" style="font-size: small;">
                        <thead>
                        <tr>
                            <th>Transaction ID</th>
                            <th>Seller</th>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Price Per Unit</th>
                            <th>Total</th>
                            <th>Transact Through</th>
                            <th>Payment Status</th>
                            <th>Payout Status</th>
                            <th>Delivery Status</th>
                            <th>Transaction Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>






    <script language="JavaScript">




        function setPageDefaults() {
            $('#record_section').addClass('sr-only');
            $('#bulk_action_section').addClass('sr-only');
            $('#bulk_records').prop('checked', false);
            $('#bulk_status').val('');
            $('#records').empty();
            $('#no_record_section').addClass('sr-only');
            $('#record_count_section').removeClass('col-sm-12 col-sm-2');
            $('#pagination_section').removeClass('col-sm-10');
            $('#pagination_section').parent().addClass('sr-only');
            $('#pagination_section').addClass('sr-only');
            $('#pagination_links').empty();
            $('#record_count_section').empty();
            return true;
        }
        function gets(url) {
            setPageDefaults();
            $.ajax({
                method: 'get',
                url: url,
                success: function (result) {
                    console.log(result);
                    totalRecord = result.total;
                    lastPageUrl = result.last_page_url;
                    lastPageNumber = result.last_page;
                    let firstItem = result.current_page - 4;
                    let lastItem = result.current_page + 4;
                    if (result.total > 0) {
                        $('#record_count_section').append('Record: ' + result.from + ' ~ ' + result.to + ' of ' + result.total);
                        if (result.total > '{{ $recordPerPage }}') {
                            let searchKey = $('#search_key').val() === '' ? 'null' : $('#search_key').val();
                            let link = [];
                            for (let i=1; i<=result.last_page; i++) {
                                let linkUrl = '{{ url('control/panel/operation/order/get/records') }}/' + searchKey + '/{{ $recordPerPage }}?page=' + i;
                                if (result.current_page === i) {
                                    link[i] = '<a href="#" class="page-link primary_btn_default pagination_active" data-url="' + linkUrl + '">' + i + '</a>';
                                } else {
                                    link[i] = '<a href="#" class="page-link primary_btn_default" data-url="' + linkUrl + '">' + i + '</a>';
                                }
                            }

                            if (result.last_page <= 9) {
                                for (let i = 1; i<=result.last_page; i++){
                                    $('#pagination_links').append('<li class="page-item">' + link[i] + '<li>');
                                }
                            } else {
                                if (result.current_page <= 5) {
                                    firstItem = 1;
                                } else if (lastItem >= lastPageNumber) {
                                    firstItem = lastPageNumber - 8;
                                }
                                for (let i=0; i<9; i++) {
                                    $('#pagination_links').append('<li class="page-item">' + link[firstItem+i] + '<li>');
                                }
                                let jumpOver = '<div class="form-inline"><label for="jump_pagination">Go To</label><input type="text" pattern="\d+" class="form-control form-control-sm mx-2" id="jump_pagination"><label for="jump_pagination">Page</label></div>';
                                $('#pagination_links').append(jumpOver);
                            }
                            $('#record_count_section').addClass('col-sm-2');
                            $('#pagination_section').addClass('col-sm-10');
                            $('#pagination_section').removeClass('sr-only');
                        } else {
                            $('#record_count_section').addClass('col-sm-12');
                        }
                        let sl = [];
                        for (let j = result.from; j <= result.to; j++) {
                            sl.push(j);
                        }
                        let orderItems;
                        let propertyValues;
                        let orderAction;
                        let recordInitialPoint;
                        let orderTotal;
                        $.each(result.data, function (key, value) {
                            orderTotal = 0;
                            orderItems = '';
                            $.each(value.transactions, function (transactionKey, transaction) {
                                propertyValues = JSON.parse(transaction.product.property_values);
                                orderItems += propertyValues.Title + ' [Seller: ' + transaction.product.account.number + '-' + transaction.product.account.business_name + ']<br>';
                                orderTotal += parseFloat(transaction.price_per_unit) * parseFloat(transaction.quantity);
                            });

                            recordInitialPoint = value.status !== 'Completed' ? '<input type="checkbox" class="bulk_record" value="' + value.id + '"> ' + sl[key] : sl[key];

                            orderAction = '<i class="fas fa-bars fa-2x text-info order_details" data-id="' + value.id + '" style="cursor: pointer;"></i>';


                            $('#records').append($('<tr></tr>')
                                .append('<td>' + recordInitialPoint + '</td>')
                                .append('<td>' + value.number + '</td>')
                                .append('<td>' + value.guest.first_name + ' ' + value.guest.last_name + '</td>')

                                .append('<td>' + orderItems + '</td>')
                                .append('<td>US $' + orderTotal.toFixed(2) + '</td>')
                                .append('<td>' + value.status + '</td>')
                                .append('<td>' + orderAction + '</td>')

                            );
                        });

                        $('#record_section').removeClass('sr-only');
                        $('#pagination_section').parent().removeClass('sr-only');
                        $('#bulk_action_section').removeClass('sr-only');
                    } else {
                        $('#no_record_section').removeClass('sr-only');
                    }
                },
                error: function (xhr) {
                    console.log(xhr);
                }
            });
            return true;
        }

        var currentPageUrl = '';
        var lastPageUrl = '';
        var totalRecord = 0;

        $(document).ready(function () {
            $('#search_key').val('');
            currentPageUrl = '{{ url('control/panel/operation/order/get/records') }}/null/{{ $recordPerPage }}';
            gets(currentPageUrl);

        });

        $(document).on('click', '.page-link', function () {
            currentPageUrl = $(this).data('url');
            gets(currentPageUrl);
            return false;
        });

        $(document).on('submit', '#search_form', function () {
            let searchKey = $('#search_key').val() === '' ? 'null' : $('#search_key').val();
            currentPageUrl = '{{ url('control/panel/operation/order/get/records') }}/' + searchKey + '/{{ $recordPerPage }}';
            gets(currentPageUrl);
            return false;
        });

        $('#bulk_records').click(function () {
            $('.bulk_record').not(this).prop('checked', this.checked);
            $('#bulk_records').not(this).prop('checked', this.checked);
            return true;
        });

        $(document).on('click', '#bulk_apply', function () {
            let data = new FormData(),
                status = $('#bulk_status').val(),
                ids = [];
            $('.bulk_record:checkbox:checked').each(function () {
                ids.push($(this).val());
            });
            if (status !== '' && ids.length > 0) {
                data.append('ids', ids);
                data.append('status', status);
                data.append('_token', '{{ csrf_token() }}');
                $.ajax({
                    method: 'post',
                    url: '{{ url('control/panel/operation/order/apply/bulk/operation') }}',
                    data: data,
                    contentType: false,
                    processData: false,
                    cache: false,
                    success: function (result) {
                        console.log(result);
                        gets(currentPageUrl);
                    },
                    error: function (xhr) {
                        console.log(xhr);
                        let message = '';
                        if (xhr.hasOwnProperty('responseJSON')) {
                            if (xhr.responseJSON.hasOwnProperty('errors')) {
                                $.each(xhr.responseJSON.errors, function (key, value) {
                                    $.each(value, function (k, v) {
                                        message += v + '<br>';
                                    });
                                });
                            }
                        }
                        $.toaster({ title: 'Warning', priority : 'danger', message : message });
                    }
                });
            } else {
                $.toaster({ title: 'Warning', priority : 'danger', message : 'You must have to select a Bulk Action and make at least a single record checked.' });
            }

            return false;
        });



        $(document).on('click', '.order_details', function () {
            let orderId = $(this).data('id');
            $.ajax({
                method: 'get',
                url: '{{ url('control/panel/operation/order/get/order/details/records') }}',
                data: {
                    id: orderId
                },
                success: function (result) {
                    console.log(result);
                    $('#order_details_modal .modal-title').text('Order Details of ' + result.number + ' [' + result.guest.first_name + ' ' + result.guest.last_name + ']');
                    let propertyValues;
                    let storagePath = '{{ asset('storage') }}';
                    let transactionTotal;
                    let transactionAction;
                    $.each(result.transactions, function (key, transaction) {
                        propertyValues = JSON.parse(transaction.product.property_values);
                        transactionTotal = parseFloat(transaction.price_per_unit) * parseFloat(transaction.quantity);
                        if (transaction.payout_status !== 'Paid') {
                            transactionAction = '<button type="button" class="btn btn-primary btn-sm payout_to_seller" data-id="' + transaction.id + '">Payout</button>';
                        } else {
                            transactionAction = 'No Action';
                        }
                        $('#order_details_modal tbody').empty().append($('<tr id="transaction_id_' + transaction.id + '"></tr>')
                            .append('<td>' + transaction.id + '</td>')
                            .append('<td>' + transaction.product.account.number + ' - ' + transaction.product.account.business_name + '</td>')
                            .append('<td><img src="' + storagePath + '/' + propertyValues.Image + '" style="max-width: 30px;"> ' + propertyValues.Title + '</td>')
                            .append('<td>' + transaction.quantity + '</td>')
                            .append('<td>US $' + parseFloat(transaction.price_per_unit).toFixed(2) + '</td>')
                            .append('<td>US $' + transactionTotal.toFixed(2) + '</td>')
                            .append('<td>' + result.transact_through + '</td>')
                            .append('<td>' + transaction.payment_status + '</td>')
                            .append('<td>' + transaction.payout_status + '</td>')
                            .append('<td>' + transaction.delivery_status + '</td>')
                            .append('<td>' + transaction.status + '</td>')
                            .append('<td>' + transactionAction + '</td>')
                        );
                    });

                    $('#order_details_modal').modal('show');
                },
                error: function (xhr) {
                    console.log(xhr);
                }
            });
            return false;
        });

        $(document).on('click', '.payout_to_seller', function () {
            let transactionId = $(this).data('id');
            let formData = new FormData();
            formData.append('id', transactionId);
            formData.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: 'post',
                url: '{{ url('control/panel/operation/order/payout/to/seller') }}',
                data: formData,
                contentType: false,
                processData: false,
                success: function (result) {
                    console.log(result);
                    $('#transaction_id_' + transactionId).children('td').eq(10).text(result.payout_status);
                    $('#transaction_id_' + transactionId).children('td').eq(11).text('No Action');
                    $.toaster({ title: 'Success', priority : 'success', message : 'Transfer Successful!' });
                },
                error: function (xhr) {
                    console.log(xhr);
                }
            });
        });






        $(document).on('change', '#jump_pagination', function () {
            let pageNumber = parseInt($('#jump_pagination').val());
            console.log(pageNumber);
            if (isPositiveInteger(pageNumber) && pageNumber <= lastPageNumber) {
                let searchKey = $('#search_key').val() === '' ? 'null' : $('#search_key').val();
                currentPageUrl = '{{ url('control/panel/operation/order/get/records') }}/' + searchKey + '/{{ $recordPerPage }}?page=' + pageNumber;
                gets(currentPageUrl);
            } else {
                $.toaster({ title: 'Warning', priority : 'danger', message : 'Invalid Page Number!' });
            }
            return false;
        });
    </script>
@endsection
