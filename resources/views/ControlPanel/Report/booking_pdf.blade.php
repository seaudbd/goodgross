<!DOCTYPE html>
<html>
<head>
    <title>Booking Report</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>

<style>
    @page { margin: 60px 40px; }
    header { position: fixed; top: 0px; left: 0px; right: 0px; height: 50px; }
    footer { position: fixed; bottom: -50px; left: 0px; right: 0px; height: 50px; text-align: center; }

    table, th, td {
        border-collapse: collapse;
        font-size: 12px;
    }

    table {
        width: 100%;
    }



</style>

<body>

<header>
    <div>
        <div style="float: left; width: 2%;">
            <img src="{{ storage_path('app/public/img/logo.png') }}" height="50px" width="50px">
        </div>
        <div style="float: right; margin-top: 10px; width: 90%;">
            Venue Booking System
        </div>
        <div style="clear: both"></div>
    </div>
</header>
<footer>
    Generated on {{ date('d-F-Y') }} at {{ date('H:i:s') }} by {{ session('login_id') }} ({{ session('name') }})
</footer>




<div style="margin-top: 50px;">
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
        <tbody>
        @foreach($response as $key => $booking)
            <tr>
                <td>{{ ++$key }}</td>
                <td>{{ date('d-M-y', strtotime($booking->created_at)) }}</td>
                <td>{{ $booking->invoice_number }}</td>
                <td>{{ $booking->customer->number }}-{{ $booking->customer->name }}</td>
                <td>{{ $booking->venue->number }}-{{ $booking->venue->venue }}</td>
                <td>{{ date('d-M-y H:i:s', strtotime($booking->starting_date_time)) }}</td>
                <td>{{ date('d-M-y H:i:s', strtotime($booking->ending_date_time)) }}</td>
                <td>${{ $booking->price_per_hour }}</td>
                <td>${{ $booking->total_hour }}</td>
                <td>${{ $booking->cleaning_fee }}</td>
                <td>${{ $booking->city_fee }}</td>
                <td>${{ $booking->security_deposit_amount }}</td>
                <td>${{ (($booking->price_per_hour * $booking->total_hour) + ($booking->cleaning_fee + $booking->city_fee + $booking->security_deposit_amount)) }}</td>
                <td>{{ $booking->status }}</td>
            </tr>

        @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
