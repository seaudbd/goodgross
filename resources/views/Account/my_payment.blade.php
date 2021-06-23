@extends('Layouts.account')

@section('content')
    <div class="row mb-3">
        <div class="col primary_text_color_default font-weight-bold secondary_background_color_default py-2">
           {{ $activeNav }}
        </div>
    </div>

    <div class="row">
        <div class="col p-0">
            @foreach($connectedAccounts as $connectedAccount)
                @if($connectedAccount->status === 'Pending')
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Get Payment through {{ $connectedAccount->connected_account_origin }}</h5>
                            <p class="card-text text-justify">We have Created a Connected Account for You with GoodGross in {{ $connectedAccount->connected_account_origin }}. To Get Payment Through {{ $connectedAccount->connected_account_origin }}, You Need to Configure Your Connected {{ $connectedAccount->connected_account_origin }} Account. To Get Started, Please Click on the Button Below.</p>
                            <button class="btn primary_btn_default link_connected_account" data-id="{{ $connectedAccount->id }}">Configure {{ $connectedAccount->connected_account_origin }}</button>
                        </div>
                    </div>
                @endif
            @endforeach

        </div>
    </div>


    @if(count($transactions) > 0)
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Transaction ID</th>
                <th>Item</th>
                <th>Quantity</th>
                <th>Price Per Unit</th>
                <th>Total</th>
                <th>Transact Through</th>
                <th>Payment Status</th>
                <th>Payout Status</th>
                <th>Delivery Status</th>
                <th>Transaction Status</th>

            </tr>
            </thead>
            <tbody>
            @foreach($transactions as $transaction)

                @php
                $propertyValues = json_decode($transaction->product->property_values);
                @endphp
                <tr>
                    <td>{{ $transaction->id }}</td>
                    <td><img src="{{ asset('storage/' . $propertyValues->Image) }}" width="50" height="30"> {{ $propertyValues->Title }}</td>
                    <td>{{ $transaction->quantity }}</td>
                    <td>${{ number_format($transaction->price_per_unit, 2) }} USD</td>
                    <td>${{ number_format($transaction->price_per_unit * $transaction->quantity, 2) }} USD</td>
                    <td>{{ $transaction->order->transact_through }}</td>
                    <td>{{ $transaction->payment_status }}</td>
                    <td>{{ $transaction->payout_status }}</td>
                    <td>{{ $transaction->delivery_status }}</td>
                    <td>{{ $transaction->status }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @else
        <div class="alert alert-info text-center">No Transaction Found!</div>
    @endif




    <script type="text/javascript">


        $(document).on('click', '.link_connected_account', function () {

            let id = $(this).data('id');
            $.ajax({
                method: 'get',
                url: '{{ url('account/my/payment/link/connected/account') }}',
                data: {
                    id: id
                },
                success: function (result) {
                    console.log(result);
                    location = result.url;
                },
                error: function (xhr) {
                    console.log(xhr);
                }
            });
            return true;
        });

        $(document).on('submit', '#payment_method_form', function () {
            $(this).find('.invalid-feedback').remove();
            $(this).find('.is-invalid').removeClass('.is-invalid');
            let formData = new FormData(this);
            formData.append('_token', '{{ csrf_token() }}');

            $.ajax({
                method: 'post',
                url: '{{ url('account/payment/method/save') }}',
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (result) {
                    console.log(result);
                    location.reload();

                },
                error: function (xhr) {
                    console.log(xhr);
                    if (xhr.hasOwnProperty('responseJSON')) {
                        if (xhr.responseJSON.hasOwnProperty('errors')) {
                            $.each(xhr.responseJSON.errors, function (key, value) {
                                if (key === 'payment_method_id') {
                                    $('.payment_method').parent().parent().append('<div class="invalid-feedback d-block">Please Choose a Payment Method</div>');
                                } else {
                                    $('#' + key).addClass('is-invalid').attr('aria-describedby', key + '_validation_feedback');
                                    $('#' + key).after('<div id="' + key + '_validation_feedback" class="invalid-feedback"></div>');
                                    $.each(value, function (k, v) {
                                        $('#' + key + '_validation_feedback').append(v);
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
