@extends('Layouts.admin')

@section('content')
    <div class="row">
        <div class="col">
            Configuration | {{ $activeMenu }}

            <div class="row mt-3">
                <div class="col">
                    <div class="row sr-only" id="bulk_action_section">
                        <div class="col-sm-3">
                            <input type="checkbox" id="bulk_records"> All Check
                        </div>
                        <div class="col-sm-4">
                            <select name="bulk_status" id="bulk_status" class="form-control">
                                <option value="">Select an Action</option>
                                <option value="Approved">Make Read</option>
                                <option value="Declined">Make Unread</option>
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

            <div class="row sr-only mt-3" id="record_section">
                <div class="col">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Title</th>
                            <th>Read at</th>
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
                                            <td style="font-weight: 600;">Buyer</td>
                                            <td id="notification_details_buyer_info"></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: 600;">Seller</td>
                                            <td id="notification_details_seller_info"></td>
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



    <script language="JavaScript">


        function setPageDefaults() {
            $('#record_section').addClass('sr-only');
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
                                let linkUrl = '{{ url('admin/miscellaneous/notification/get/records') }}/' + searchKey + '/{{ $recordPerPage }}?page=' + i;
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

                        let notificationRecordClassValue;
                        let notificationReadStatus;
                        let notificationReadAtValue;
                        $.each(result.data, function (key, value) {
                            notificationRecordClassValue = (value.read_at === null) ? 'text-danger' : 'text-dark';
                            notificationReadStatus = (value.read_at === null) ? 'Unread' : 'Read';
                            notificationReadAtValue = (value.read_at === null) ? '---' : $.datepicker.formatDate('MM d, yy', new Date(value.read_at));

                            $('#records').append($('<tr class="' + notificationRecordClassValue + '"></tr>')
                                .append('<td><input type="checkbox" class="bulk_record" value="' + value.id + '"> ' + sl[key] + '</td>')
                                .append('<td>' + $.datepicker.formatDate('MM d, yy', new Date(value.created_at)) + '</td>')
                                .append('<td>' + value.type + '</td>')
                                .append('<td>' + value.title + '</td>')
                                .append('<td>' + notificationReadAtValue + '</td>')
                                .append('<td>' + notificationReadStatus + '</td>')
                                .append('<td><i class="fab fa-readme primary_text_color_default notification_details" title="Read" style="cursor: pointer; font-size: 140%;" data-id="' + value.id + '"></i><i class="fas fa-trash ml-3 delete text-danger" style="cursor: pointer; font-size: 120%;" title="Delete" data-id="' + value.id + '"></i></td>')

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
            currentPageUrl = '{{ url('admin/miscellaneous/notification/get/records') }}/null/{{ $recordPerPage }}';
            gets(currentPageUrl);

        });

        $(document).on('click', '.page-link', function () {
            currentPageUrl = $(this).data('url');
            gets(currentPageUrl);
            return false;
        });

        $(document).on('submit', '#search_form', function () {
            let searchKey = $('#search_key').val() === '' ? 'null' : $('#search_key').val();
            currentPageUrl = '{{ url('admin/miscellaneous/notification/get/records') }}/' + searchKey + '/{{ $recordPerPage }}';
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
            data.append('ids', ids);
            data.append('status', status);
            data.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: 'post',
                url: '{{ url('admin/configuration/category/type/apply/bulk/operation') }}',
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
            return false;
        });



        $(document).on('click', '.notification_details', function () {

            let id = $(this).data('id');
            $.ajax({
                method: 'get',
                url: '{{ url('admin/miscellaneous/notification/get/record') }}',
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
                    $('#notification_details_seller_info').text(result.transaction.product.account.number + '-' + result.transaction.product.account.business_name);
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
                        gets(currentPageUrl);
                    });
                },
                error: function (xhr) {
                    console.log(xhr);
                }
            });
            return true;
        });



        $(document).on('click', '.delete', function () {
            {{--let id = $(this).data('id');--}}
            {{--let data = new FormData();--}}
            {{--data.append('id', id);--}}
            {{--data.append('_token', '{{ csrf_token() }}');--}}
            {{--$.ajax({--}}
                {{--method: 'post',--}}
                {{--url: '{{ url('admin/configuration/category/type/delete/record') }}',--}}
                {{--data: data,--}}
                {{--contentType: false,--}}
                {{--processData: false,--}}
                {{--cache: false,--}}
                {{--success: function (result) {--}}
                    {{--console.log(result);--}}
                    {{--gets(currentPageUrl);--}}
                {{--},--}}
                {{--error: function (xhr) {--}}
                    {{--console.log(xhr);--}}
                {{--}--}}
            {{--});--}}
            return false;
        });

        $(document).on('change', '#jump_pagination', function () {
            let pageNumber = parseInt($('#jump_pagination').val());
            console.log(pageNumber);
            if (isPositiveInteger(pageNumber) && pageNumber <= lastPageNumber) {
                let searchKey = $('#search_key').val() === '' ? 'null' : $('#search_key').val();
                currentPageUrl = '{{ url('admin/configuration/category/type/get/records') }}/' + searchKey + '/{{ $recordPerPage }}?page=' + pageNumber;
                gets(currentPageUrl);
            } else {
                $.toaster({ title: 'Warning', priority : 'danger', message : 'Invalid Page Number!' });
            }
            return false;
        });
    </script>
@endsection
