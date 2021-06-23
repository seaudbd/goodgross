@extends('Layouts.admin')

@section('content')
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col">
                    {{ $activeMenuValue }} | {{ $activeSubMenuValue }}
                </div>
            </div>

            <div class="row" style="margin-top: 15px;">

                <div class="col" id="search_section">
                    <form id="search_form">
                        <div class="row">
                            <div class="col-sm-11">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="booking_date_from">Booking Date From</label>
                                            <input type="text" class="form-control" id="booking_date_from" placeholder="Date From">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="booking_date_to">Booking Date To</label>
                                            <input type="text" class="form-control" id="booking_date_to" placeholder="Date To">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="start_date">Start Date</label>
                                            <input type="text" class="form-control" id="start_date" placeholder="Start Date">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="end_date">End Date</label>
                                            <input type="text" class="form-control" id="end_date" placeholder="End Date">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="venue_id">Venue</label>
                                            <select class="form-control" id="venue_id">
                                                <option value="">Select a Venue</option>
                                                @foreach($venues as $venue)
                                                    <option value="{{ $venue->id }}">{{ $venue->venue }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control" id="status">
                                                <option value="">Select a Status</option>
                                                <option value="Booked">Booked</option>
                                                <option value="Reserved">Reserved</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-1" style="padding-top: 28px;">
                                <button class="btn btn-sm primary_btn_default btn-block" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>



            <div class="row sr-only" style="" id="record_section">
                <div class="col">
                    <i class="fa fa-print fa-2x mb-2 text_default" style="cursor: pointer;" aria-hidden="true" id="generate_report"></i>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Booking Date</th>
                            <th>Invoice Number</th>
                            <th>Customer</th>
                            <th>Venue</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Rate Per Hour</th>
                            <th>Total Hour</th>
                            <th>Cleaning Fee</th>
                            <th>City Fee</th>
                            <th>Security Deposit</th>
                            <th>Total</th>
                            <th>Status</th>
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

        </div>
    </div>

    <script language="JavaScript">




        function setPageDefaults() {
            $('#record_section').addClass('sr-only');
            $('#records').empty();
            $('#no_record_section').addClass('sr-only');
            return true;
        }
        function gets(url) {
            setPageDefaults();
            $.ajax({
                method: 'get',
                url: url,
                success: function (result) {
                    console.log(result);
                    if (result.length > 0) {
                        $.each(result, function (key, value) {
                            $('#records').append($('<tr></tr>')
                                .append('<td><input type="checkbox" class="bulk_record" value="' + value.id + '"> ' + ++key + '</td>')
                                .append('<td>' + $.datepicker.formatDate('dd-M-yy', new Date(value.created_at)) + '</td>')
                                .append('<td>' + value.invoice_number + '</td>')
                                .append('<td>' + value.customer.number + '-' + value.customer.name + '</td>')
                                .append('<td>' + value.venue.number + '-' + value.venue.venue + '</td>')
                                .append('<td>' + $.datepicker.formatDate('dd-M-yy', new Date(value.starting_date_time)) + ' ' + value.starting_date_time.split(' ')[1] + '</td>')
                                .append('<td>' + $.datepicker.formatDate('dd-M-yy', new Date(value.ending_date_time)) + ' ' + value.ending_date_time.split(' ')[1] + '</td>')
                                .append('<td>$' + value.price_per_hour + '</td>')
                                .append('<td>' + value.total_hour + '</td>')
                                .append('<td>$' + value.cleaning_fee + '</td>')
                                .append('<td>$' + value.city_fee + '</td>')
                                .append('<td>$' + value.security_deposit_amount + '</td>')
                                .append('<td>$' + ((parseFloat(value.price_per_hour) * parseFloat(value.total_hour)) + (parseFloat(value.cleaning_fee) + parseFloat(value.city_fee) + parseFloat(value.security_deposit_amount))) + '</td>')
                                .append('<td>' + value.status + '</td>')

                            );
                        });
                        $('#record_section').removeClass('sr-only');
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




        $(document).ready(function () {
            $('#booking_date_from').datepicker();
            $('#booking_date_to').datepicker();
            $('#start_date').datepicker();
            $('#end_date').datepicker();

            let bookingDateFrom = $('#booking_date_from').val() === '' ? 'null' : $('#booking_date_from').val();
            let bookingDateTo = $('#booking_date_to').val() === '' ? 'null' : $('#booking_date_to').val();
            let startDate = $('#start_date').val() === '' ? 'null' : $('#start_date').val();
            let endDate = $('#end_date').val() === '' ? 'null' : $('#end_date').val();
            let venueId = $('#venue_id').val() === '' ? 'null' : $('#venue_id').val();
            let status = $('#status').val() === '' ? 'null' : $('#status').val();
            gets('{{ url('admin/report/booking/gets') }}/' + bookingDateFrom + '/' + bookingDateTo + '/' + startDate + '/' + endDate + '/' + venueId + '/' + status);

        });

        $(document).on('submit', '#search_form', function () {
            let bookingDateFrom = $('#booking_date_from').val() === '' ? 'null' : $('#booking_date_from').val();
            let bookingDateTo = $('#booking_date_to').val() === '' ? 'null' : $('#booking_date_to').val();
            let startDate = $('#start_date').val() === '' ? 'null' : $('#start_date').val();
            let endDate = $('#end_date').val() === '' ? 'null' : $('#end_date').val();
            let venueId = $('#venue_id').val() === '' ? 'null' : $('#venue_id').val();
            let status = $('#status').val() === '' ? 'null' : $('#status').val();
            gets('{{ url('admin/report/booking/gets') }}/' + bookingDateFrom + '/' + bookingDateTo + '/' + startDate + '/' + endDate + '/' + venueId + '/' + status);
            return false;
        });


        $(document).on('click', '#generate_report', function () {
            let bookingDateFrom = $('#booking_date_from').val() === '' ? 'null' : $('#booking_date_from').val();
            let bookingDateTo = $('#booking_date_to').val() === '' ? 'null' : $('#booking_date_to').val();
            let startDate = $('#start_date').val() === '' ? 'null' : $('#start_date').val();
            let endDate = $('#end_date').val() === '' ? 'null' : $('#end_date').val();
            let venueId = $('#venue_id').val() === '' ? 'null' : $('#venue_id').val();
            let status = $('#status').val() === '' ? 'null' : $('#status').val();
            $.ajax({
                method: 'get',
                url: '{{ url('admin/report/booking/generate/report') }}',
                data: {
                    'booking_date_from': bookingDateFrom,
                    'booking_date_to': bookingDateTo,
                    'start_date': startDate,
                    'end_date': endDate,
                    'venue_id': venueId,
                    'status': status
                },
                cache: false,
                success: function (result) {
                    console.log(result);
                    window.open(result);
                },
                error: function (xhr) {
                    console.log(xhr);
                }
            });
            return false;
        });


    </script>
@endsection
