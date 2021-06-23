@extends('Layouts.public')
@section('content')
    @php
        $propertyValues = json_decode($product->property_values);
    @endphp
    <div class="container">
        <div class="row mt-5 border p-3">
            <div class="col" style="border-color: #eeeeee">
                <p style="color: #076706" class="mb-1 font-weight-bold">
                    <i class="mr-1 fas fa-star"></i>
                    <i class="mr-1 fas fa-star"></i>
                    <i class="mr-1 fas fa-star"></i>
                    <i class="mr-1 fas fa-star"></i>
                    <i class="mr-1 fas fa-star"></i>
                     {{ $product->account->business_name }}
                </p>
            </div>
        </div>
        <div class="row border p-3">
            <div class="col-sm-12 col-md-8">
                <div class="row">
                    <div class="col-3">
                        <img class="img-fluid" src="{{ asset('storage/' . $propertyValues->Image) }}" alt="{{ $propertyValues->Title }}">
                    </div>
                    <div class="col-9">
                        <p class="font-weight-bold mb-1">{{ $propertyValues->Title }}</p>
                        <p class="mb-1">
                            Make Deposit
                            <select class="form-control-sm" id="deposit" >
                                <option value="20">20%</option>
                                <option value="30">30%</option>
                                <option value="40">40%</option>
                                <option value="50">50%</option>
                            </select>
                        </p>
                        <p class="mb-1">
                            PO# <input type="text" class="form-control-sm" id="po" value="0012548" >
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <p>Price</p>
                    </div>
                    <div class="col-9">
                        <p>: $5540</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <p>Quantity</p>
                    </div>
                    <div class="col-9">
                        <select class="form-control-sm" id="quantity" >
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="40">40</option>
                            <option value="50">50</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <p>Tax</p>
                    </div>
                    <div class="col-9">
                        <select class="form-control-sm" id="quantity" >
                            <option value="20">20%</option>
                            <option value="30">30%</option>
                            <option value="40">40%</option>
                            <option value="50">50%</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <p class="mb-1 font-weight-bold">Bill To</p>
                <p class="mb-1 font-weight-lighter">{{ $user['first_name'] }} {{ $user['last_name'] }}</p>
                <p class="mb-1 font-weight-lighter">{{ $user['city'] }}</p>
                <p class="mb-1 font-weight-lighter">{{ $user['zipcode'] }}</p>
            </div>
        </div>
        <div class="row border p-3">
            <div class="col-sm-12 col-md-6"> 
                <div class="row">
                    <div class="col">
                        <p class="m-1">Order Subtotal</p>
                    </div><div class="col">
                        <p class="m-1"> : us $8000.00</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p class="m-1">Deposit Payment</p>
                    </div><div class="col">
                        <p class="m-1"> : us $1000.00</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p class="m-1">Payment Terms:</p>
                    </div><div class="col">
                        <select name="payment_terms" id="payment_terms" class="form-control-sm m-1">
                            <option value="7">7 Days</option>
                            <option value="15">15 Days</option>
                            <option value="30">30 Days</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <button style="background-color: #328C58" class="btn btn-primary float-right my-auto">Make a Deposit Payment</button>
            </div>
        </div>
        <div class="row border p-3">
            <div class="col">
                <h5 class="font-weight-bold">Comments</h5>
                <p>Sample Comments Text</p>
            </div>
        </div>
    </div>
@endsection
