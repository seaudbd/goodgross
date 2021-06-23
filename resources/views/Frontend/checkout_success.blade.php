@extends('Layouts.public')
@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mx-auto">


                <div class="row mt-3">
                    <div class="col">
                        Congrats! Your Order is Confirmed.
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col">
                        Hi {{ $order->account->first_name . ' ' . $order->account->last_name }}
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col text-justify">
                        Thank you so much for shopping with us. We will email you the order confirmation soon. Estimated delivery: {{ date('F d, Y', strtotime('+7 days', strtotime(date('Y-m-d')))) }} - {{ date('F d, Y', strtotime('+10 days', strtotime(date('Y-m-d')))) }}.
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        Order Number: <span class="font-weight-bold">{{ $order->number }}</span>
                        <p><a href="{{ url('/') }}">Track My Order</a></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Seller</th>
                                <th>Item</th>
                                <th>Quantity</th>
                                <th>Price Per Unit</th>
                                <th>Item Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $orderTotal = 0;
                            @endphp
                            @foreach($order->orderTransactions as $orderTransaction)
                                @php
                                    $orderTotal += $orderTransaction->quantity * $orderTransaction->price_per_unit;
                                @endphp
                                <tr>
                                    <td>{{ $orderTransaction->product->account->business_name }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $orderTransaction->product->productProperties->where('property', 'Image')->first('value')->value) }}" height="50" alt="Image">
                                        {{ $orderTransaction->product->productProperties->where('property', 'Title')->first('value')->value }}
                                    </td>
                                    <td>{{ $orderTransaction->quantity }}</td>
                                    <td>US ${{ number_format($orderTransaction->price_per_unit, 2) }}</td>
                                    <td>US ${{ number_format($orderTransaction->price_per_unit * $orderTransaction->quantity, 2) }}</td>
                                </tr>



                            @endforeach
                            <tr>
                                <td colspan="3"></td>
                                <td class="font-weight-bold">Subtotal</td>
                                <td>US ${{ number_format($orderTotal, 2) }}</td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <td class="font-weight-bold">Tax Total</td>
                                <td>US ${{ number_format(0, 2) }}</td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <td class="font-weight-bold">Order Total</td>
                                <td>US ${{ number_format($orderTotal, 2) }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>












            </div>
        </div>
    </div>
    <div class="mt-3"></div>






@endsection
