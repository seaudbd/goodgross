@extends('Layouts.account')

@section('content')
    <div class="row mb-3">
        <div class="col primary_text_color_default font-weight-bold secondary_background_color_default py-2">
           {{ $activeNav }}
        </div>
    </div>


    <div class="row mt-3">
        <div class="col table-responsive" id="notification_record_section">
            <table class="table">
                <thead>
                <tr>

                    <th>Date</th>
                    <th>Type</th>
                    <th>Title</th>
                    <th>Read at</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody id="notification_records">

                </tbody>
            </table>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col" id="notification_no_record_section">
            <div class="alert alert-info text-center">No Notification Found!</div>
        </div>
    </div>










    <div class="modal" tabindex="-1" id="notification_details_modal">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Notification Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body py-4 px-5">
                    <div class="row">
                        <div class="col" id="notification_details_type"></div>
                        <div class="col text-right" id="notification_details_date"></div>
                    </div>
                    <div class="card mb-3 mt-3">
                        <div class="row no-gutters">
                            <div class="col-4">
                                <img class="card-img" id="notification_details_product_image">
                            </div>
                            <div class="col-8">
                                <div class="card-body">
                                    <h6 class="card-title" id="notification_details_title"></h6>
                                    <table class="table">

                                        <tbody>
                                        <tr>
                                            <td style="font-weight: 600;">Order Number</td>
                                            <td id="notification_details_order_number"></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: 600;">Transaction ID</td>
                                            <td id="notification_details_transaction_id"></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: 600;">Buyer Info</td>
                                            <td id="notification_details_buyer_info"></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: 600;">Item Title</td>
                                            <td id="notification_details_item_title"></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: 600;">Quantity</td>
                                            <td id="notification_details_item_quantity"></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: 600;">Price Per Unit</td>
                                            <td id="notification_details_item_price_per_unit"></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: 600;">Total Price</td>
                                            <td id="notification_details_item_total_price"></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: 600;">Transact Through</td>
                                            <td id="notification_details_item_transaction_through"></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: 600;">Payment Status</td>
                                            <td id="notification_details_item_payment_status"></td>
                                        </tr>

                                        <tr>
                                            <td style="font-weight: 600;">Payout Status</td>
                                            <td id="notification_details_item_payout_status"></td>
                                        </tr>

                                        <tr>
                                            <td style="font-weight: 600;">Delivery Status</td>
                                            <td id="notification_details_item_delivery_status"></td>
                                        </tr>

                                        <tr>
                                            <td style="font-weight: 600;">Transaction Status</td>
                                            <td id="notification_details_item_transaction_status"></td>
                                        </tr>


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


    <script type="text/javascript">


        $(document).ready(function () {
            loadPage();
        });


        function loadPage() {
            $('#notification_record_section').parent().addClass('sr-only');
            $('#notification_no_record_section').parent().addClass('sr-only');
            $('#notification_records').empty();
            $.ajax({
                method: 'get',
                url: '{{ url('account/notification/get/records') }}',
                cache: false,
                success: function (result) {
                    console.log(result);
                    if (result.length > 0) {
                        let notificationRecordClassValue;
                        let notificationReadStatus;
                        let notificationReadAtValue;
                        $.each(result, function (key, notification) {
                            notificationRecordClassValue = (notification.read_at === null) ? 'text-danger' : 'text-dark';
                            notificationReadStatus = (notification.read_at === null) ? 'Unread' : 'Read';
                            notificationReadAtValue = (notification.read_at === null) ? '---' : $.datepicker.formatDate('MM d, yy', new Date(notification.read_at));
                            $('#notification_records').append($('<tr class="' + notificationRecordClassValue + '"></tr>')
                                .append('<td>' + $.datepicker.formatDate('MM d, yy', new Date(notification.created_at)) + '</td>')
                                .append('<td>' + notification.type + '</td>')
                                .append('<td>' + notification.title + '</td>')
                                .append('<td>' + notificationReadAtValue + '</td>')
                                .append('<td>' + notificationReadStatus + '</td>')
                                .append('<td><i class="fab fa-readme fa-2x primary_text_color_default notification_details" title="Read" style="cursor: pointer;" data-id="' + notification.id + '"></i></td>')
                            );
                        });
                        $('#notification_record_section').parent().removeClass('sr-only');
                    } else {
                        $('#notification_no_record_section').parent().removeClass('sr-only');
                    }
                },
                error: function (xhr) {
                    console.log(xhr);
                }
            });
        }

        $(document).on('click', '.notification_details', function () {

            let id = $(this).data('id');
            $.ajax({
                method: 'get',
                url: '{{ url('account/notification/get/record') }}',
                data: {
                    id: id
                },
                success: function (result) {
                    console.log(result);

                    $('#notification_details_type').empty().append('Type: <span style="font-weight: 600;">' + result.type + '</span>');
                    $('#notification_details_date').empty().append('Date: <span style="font-weight: 600;">' + $.datepicker.formatDate('MM d, yy', new Date(result.created_at)) + '</span>');
                    $('#notification_details_title').text(result.title);

                    let propertyValues = JSON.parse(result.transaction.product.property_values);
                    $('#notification_details_product_image').attr('src', '{{ asset('storage') }}/' + propertyValues.Image);

                    $('#notification_details_order_number').text(result.transaction.order.number);
                    $('#notification_details_transaction_id').text(result.transaction.id);
                    $('#notification_details_buyer_info').text(result.transaction.order.guest.first_name + ' ' + result.transaction.order.guest.last_name);
                    $('#notification_details_item_title').text(propertyValues.Title);
                    $('#notification_details_item_quantity').text(result.transaction.quantity);
                    $('#notification_details_item_price_per_unit').text('US $' + parseFloat(result.transaction.price_per_unit).toFixed(2));
                    $('#notification_details_item_total_price').text('US $' + (parseFloat(result.transaction.price_per_unit) * parseFloat(result.transaction.quantity)).toFixed(2));
                    $('#notification_details_item_transaction_through').text(result.transaction.order.transact_through);
                    $('#notification_details_item_payment_status').text(result.transaction.payment_status);
                    $('#notification_details_item_payout_status').text(result.transaction.payout_status);
                    $('#notification_details_item_delivery_status').text(result.transaction.delivery_status);
                    $('#notification_details_item_transaction_status').text(result.transaction.status);


                    $('#notification_details_modal').modal('show').on('hidden.bs.modal', function () {
                        loadPage();
                    });
                },
                error: function (xhr) {
                    console.log(xhr);
                }
            });
            return true;
        });


    </script>

@endsection
