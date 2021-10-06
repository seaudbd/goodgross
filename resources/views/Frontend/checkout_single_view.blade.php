@extends('Layouts.frontend')
@section('content')
    <style type="text/css">
        .page_identity_line {
            color: #333333;
        }
        .page_identity_line a {
            color: #999999;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mx-auto">


                <div class="row mt-4">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 border-bottom pb-2" style="border-color: #e8f3ed !important;">
                        <div class="page_identity_line">
                            <a href="{{ url('/') }}">Home</a> . Checkout <sub>{{ count($checkoutItems) }} Item(s)</sub>
                        </div>
                    </div>
                </div>


                <div class="row mt-4">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-4">
                        <div class="text-secondary fw-bold p-2 mb-4" style="background-color: #efefef;">Billing To</div>
                        <div class="row mb-4">
                            <div class="col-12 col-sm-6">
                                <div class="form-floating mb-4 mb-sm-0">
                                    <input type="text" class="form-control" id="first_name_for_billing" name="first_name" placeholder="First Name">
                                    <label for="first_name_for_billing">First Name</label>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="last_name_for_billing" name="last_name" placeholder="Last Name">
                                    <label for="last_name_for_billing">Last Name</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-12 col-sm-6">
                                <div class="form-floating mb-4 mb-sm-0">
                                    <textarea class="form-control" id="address_line_1_for_billing" name="address_line_1" placeholder="Address Line 1"></textarea>
                                    <label for="address_line_1_for_billing">Address Line 1</label>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-floating">
                                    <textarea class="form-control" id="address_line_2_for_billing" name="address_line_2" placeholder="Address Line 2"></textarea>
                                    <label for="address_line_2_for_billing">Address Line 2</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-12 col-sm-6">
                                <div class="form-floating mb-4 mb-sm-0">
                                    <select class="form-select" name="country_id" id="country_id_for_billing">
                                        <option value="">Select Country</option>
                                        @foreach($countries as $country)
                                            @if($country->country === $userCountry)
                                                <option value="{{ $country->id }}" selected>{{ $country->country }}</option>
                                            @else
                                                <option value="{{ $country->id }}">{{ $country->country }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <label for="country_id_for_billing">Country</label>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-floating">
                                    @if($userCountry === 'United States')
                                        <select class="form-select" name="state" id="state_for_billing">
                                            <option value="">Select State</option>
                                            @foreach($states as $state)
                                                @if($state->state === $userState)
                                                    <option value="{{ $state->state }}" selected>{{ $state->state }}</option>
                                                @else
                                                    <option value="{{ $state->state }}">{{ $state->state }}</option>
                                                @endif
                                            @endforeach

                                        </select>
                                    @else
                                        <input type="text" class="form-control" name="state" id="state_for_billing" placeholder="State">
                                    @endif
                                    <label for="state_for_billing">State</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-12 col-sm-6">
                                <div class="form-floating mb-4 mb-sm-0">
                                    <input type="text" class="form-control" name="city" id="city_for_billing" placeholder="City">
                                    <label for="city_for_billing">City</label>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="postal_code" id="postal_code_for_billing" placeholder="Postal Code">
                                    <label for="postal_code_for_billing">Postal Code</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-12 col-sm-6">
                                <div class="form-floating mb-4 mb-sm-0">
                                    <input type="text" class="form-control" name="phone" id="phone_for_billing" placeholder="Phone">
                                    <label for="phone_for_billing">Phone</label>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="email" id="email_for_billing" placeholder="Email">
                                    <label for="email_for_billing">Email</label>
                                </div>
                            </div>
                        </div>




                        <div class="text-secondary fw-bold p-2 mb-4" style="background-color: #efefef;">Shipping To</div>

                        <div class="form-check mb-4">
                            <input type="checkbox" class="form-check-input" id="ship_to_same_as_billing_address" checked>
                            <label class="form-check-label" for="ship_to_same_as_billing_address">Ship to Same as Billing Address</label>
                        </div>

                        <div id="shipping_to_container">


                            <div class="row mb-4">
                                <div class="col-12 col-sm-6">
                                    <div class="form-floating mb-4 mb-sm-0">
                                        <input type="text" class="form-control" id="first_name_for_shipping" name="first_name" placeholder="First Name">
                                        <label for="first_name_for_shipping">First Name</label>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="last_name_for_shipping" name="last_name" placeholder="Last Name">
                                        <label for="last_name_for_shipping">Last Name</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-12 col-sm-6">
                                    <div class="form-floating mb-4 mb-sm-0">
                                        <textarea class="form-control" id="address_line_1_for_shipping" name="address_line_1" placeholder="Address Line 1"></textarea>
                                        <label for="address_line_1_for_shipping">Address Line 1</label>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-floating">
                                        <textarea class="form-control" id="address_line_2_for_shipping" name="address_line_2" placeholder="Address Line 2"></textarea>
                                        <label for="address_line_2_for_shipping">Address Line 2</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-12 col-sm-6">
                                    <div class="form-floating mb-4 mb-sm-0">
                                        <select class="form-select" name="country_id" id="country_id_for_shipping">
                                            <option value="">Select Country</option>
                                            @foreach($countries as $country)
                                                @if($country->country === $userCountry)
                                                    <option value="{{ $country->id }}" selected>{{ $country->country }}</option>
                                                @else
                                                    <option value="{{ $country->id }}">{{ $country->country }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <label for="country_id_for_shipping">Country</label>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-floating">
                                        @if($userCountry === 'United States')
                                            <select class="form-select" name="state" id="state_for_shipping">
                                                <option value="">Select State</option>
                                                @foreach($states as $state)
                                                    @if($state->state === $userState)
                                                        <option value="{{ $state->state }}" selected>{{ $state->state }}</option>
                                                    @else
                                                        <option value="{{ $state->state }}">{{ $state->state }}</option>
                                                    @endif
                                                @endforeach

                                            </select>
                                        @else
                                            <input type="text" class="form-control" name="state" id="state_for_shipping" placeholder="State">
                                        @endif
                                        <label for="state_for_shipping">State</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-12 col-sm-6">
                                    <div class="form-floating mb-4 mb-sm-0">
                                        <input type="text" class="form-control" name="city" id="city_for_shipping" placeholder="City">
                                        <label for="city_for_shipping">City</label>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="postal_code" id="postal_code_for_shipping" placeholder="Postal Code">
                                        <label for="postal_code_for_shipping">Postal Code</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-12 col-sm-6">
                                    <div class="form-floating mb-4 mb-sm-0">
                                        <input type="text" class="form-control" name="phone" id="phone_for_shipping" placeholder="Phone">
                                        <label for="phone_for_shipping">Phone</label>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" name="email" id="email_for_shipping" placeholder="Email">
                                        <label for="email_for_shipping">Email</label>
                                    </div>
                                </div>
                            </div>


                        </div>













                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-4">
                        <div class="text-secondary fw-bold p-2 mb-4" style="background-color: #efefef;">Payment</div>




                        <div class="border mb-3 py-3 px-3">
                            <div class="row">
                                <div class="col">
                                    <div class="form-check mb-2">
                                        <input type="radio" class="form-check-input payment_method" id="payment_method_paypal" name="payment_method" value="PayPal">
                                        <label class="form-check-label font-italic" for="payment_method_paypal" style="font-weight: 600;">
                                            PayPal
                                        </label>
                                    </div>
                                    <div style="color: #91a1a5; font-size: small; padding-left: 20px;">You will be redirected to PayPal website to complete your purchase securely.</div>
                                </div>
                                <div class="col">
                                    <img src="{{ asset('storage/img/application/paypal_cut.png') }}" class="img-fluid" alt="PayPal">
                                </div>
                            </div>
                        </div>
                        <div class="border py-3 px-3">
                            <div class="row">
                                <div class="col">
                                    <div class="form-check mb-2">
                                        <input type="radio" class="form-check-input payment_method" id="payment_method_card" name="payment_method" value="Card">
                                        <label class="form-check-label font-italic" for="payment_method_card" style="font-weight: 600;">
                                            Debit or Credit Card
                                        </label>
                                    </div>
                                    <div style="color: #91a1a5; font-size: small; padding-left: 20px;">Safe money transfer using Visa, Maestro, Discover, American Express.</div>
                                </div>
                                <div class="col">
                                    <img src="{{ asset('storage/img/application/cards.png') }}" class="img-fluid" alt="PayPal">
                                </div>
                            </div>


                            <div class="mt-4" id="payment_method_card_details">

                                <div class="row mb-4">
                                    <div class="col-9 pe-0">
                                        <div class="form-floating">
                                            <input autocomplete="off" class="form-control" type="text" name="card_number" id="card_number" placeholder="Card Number">
                                            <label for="card_number">Card Number</label>
                                        </div>
                                    </div>
                                    <div class="col-3 ps-0">
                                        <div class="form-floating">
                                            <input type="text" autocomplete="off" class="form-control" size="4" name="card_cvc" id="card_cvc" placeholder="CVC">
                                            <label for="card_cvc">CVC</label>
                                        </div>
                                    </div>
                                </div>



                                <div class="input-group mb-4">
                                    <span class="input-group-text" style="font-size: small; color: #615f75; width: 25%;">Expiry Date</span>
                                    <div class="form-floating" style="width: 38%;">
                                        <select class="form-select" name="expiry_month" id="expiry_month">
                                            <option value="">Select Month</option>
                                            <option value="01">January</option>
                                            <option value="02">February</option>
                                            <option value="03">March</option>
                                            <option value="04">April</option>
                                            <option value="05">May</option>
                                            <option value="06">June</option>
                                            <option value="07">July</option>
                                            <option value="08">August</option>
                                            <option value="09">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select>
                                        <label for="expiry_month">Month</label>
                                    </div>
                                    <div class="form-floating" style="width: 37%;">
                                        <select class="form-select" name="expiry_year" id="expiry_year">
                                            <option value="">Select Year</option>
                                            @for($i = date('Y'); $i <= date('Y') + 10; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                        <label for="expiry_year">Year</label>
                                    </div>

                                </div>


                            </div>






                        </div>


                        <div class="text-secondary fw-bold p-2 mt-4" style="background-color: #efefef;">Shipping Method</div>



                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 col-xxl-4">
                        <div class="text-secondary fw-bold p-2 mb-4" style="background-color: #efefef;">Order Review</div>
                        <div id="checkout_items_container">

                        </div>

                        <div class="text-secondary fw-bold p-2 mb-4" style="background-color: #efefef;">Order Summary</div>
                        <div id="order_summary_container">

                        </div>
                    </div>
                </div>


            </div>
        </div>

{{--        <div class="row">--}}
{{--            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mx-auto mt-3">--}}
{{--                @if($checkoutItems)--}}
{{--                <form id="checkout_form">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-md-2 col-lg-2 col-xl-2">--}}
{{--                            <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; height: 100%; box-shadow: 0 0 10px -3px lightblue; padding: 10px 0;">--}}
{{--                                <i class="far fa-list-alt fa-2x primary_text_color_default"></i>--}}
{{--                                <span style="font-weight: 600;">Order Summary</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-10 col-lg-10 col-xl-10 pt-2 pb-2">--}}
{{--                            <table width="100%">--}}
{{--                                <tbody>--}}
{{--                                @php--}}
{{--                                    $subtotal = 0;--}}
{{--                                @endphp--}}
{{--                                @foreach($checkoutItems as $key => $checkoutItem)--}}
{{--                                    <tr style="border-bottom: 1px solid #dee2e6;">--}}
{{--                                        <td><img style="max-width: 150px; max-height: 75px;" src="{{ asset('storage/' . $checkoutItem->productProperties->where('property', 'Image')->first('value')->value) }}" alt="Image"></td>--}}
{{--                                        <td>--}}
{{--                                            <div style="font-weight: 600;">--}}
{{--                                                {{ $checkoutItem->productProperties->where('property', 'Title')->first('value')->value }}--}}
{{--                                            </div>--}}
{{--                                            <div>Seller: {{ $checkoutItem->account->business_name }}</div>--}}
{{--                                            <div><a href="{{ url('/') }}">Message to Seller</a></div>--}}
{{--                                        </td>--}}
{{--                                        <td><input type="number" style="width: 60px; border: 1px solid #cccccc; border-radius: 5px; padding: 4px 7px; font-size: small;" min="1" value="{{ $checkoutItem->quantity }}"> x US ${{ number_format($checkoutItem->productProperties->where('property', 'Price')->first('value')->value, 2) }}</td>--}}
{{--                                        <td style="font-weight: 600;" class="text-right">US ${{ number_format($checkoutItem->quantity * $checkoutItem->productProperties->where('property', 'Price')->first('value')->value, 2) }}</td>--}}
{{--                                    </tr>--}}
{{--                                    @php--}}
{{--                                        $subtotal += $checkoutItem->productProperties->where('property', 'Price')->first('value')->value * $checkoutItem->quantity;--}}
{{--                                    @endphp--}}
{{--                                @endforeach--}}
{{--                                <tr>--}}
{{--                                    <td colspan="2">Subtotal</td>--}}
{{--                                    <td colspan="2" class="text-right" style="font-weight: 600;">US ${{ number_format($subtotal, 2) }}</td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td colspan="2">Shipping</td>--}}
{{--                                    <td colspan="2" class="text-right" style="font-weight: 600;">Free</td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <td colspan="2">Order Total</td>--}}
{{--                                    <td colspan="2" class="text-right" style="font-weight: 600;">US ${{ number_format($subtotal, 2) }}</td>--}}
{{--                                </tr>--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="row mt-3">--}}
{{--                        <div class="col-md-2 col-lg-2 col-xl-2">--}}
{{--                            <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; height: 100%; box-shadow: 0 0 10px -3px lightblue; padding: 10px 0;">--}}
{{--                                <i class="fas fa-shipping-fast fa-2x primary_text_color_default"></i>--}}
{{--                                <span style="font-weight: 600;">Shipping Information</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-10 col-lg-10 col-xl-10 pt-2 pb-2">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-12 col-sm-12 col-md-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="first_name_for_shipping" class="sr-only">First Name</label>--}}
{{--                                        <input id="first_name_for_shipping" name="first_name_for_shipping" class="form-control" placeholder="First Name">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-12 col-sm-12 col-md-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="last_name_for_shipping" class="sr-only">Last Name</label>--}}
{{--                                        <input id="last_name_for_shipping" name="last_name_for_shipping" class="form-control" placeholder="Last Name">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="address_line_1_for_shipping" class="sr-only">Address Line 1</label>--}}
{{--                                <textarea id="address_line_1_for_shipping" name="address_line_1_for_shipping" class="form-control" placeholder="Address Line 1"></textarea>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="address_line_2_for_shipping" class="sr-only">Address Line 2</label>--}}
{{--                                <textarea id="address_line_2_for_shipping" name="address_line_2_for_shipping" class="form-control" placeholder="Address Line 2"></textarea>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-12 col-sm-12 col-md-6">--}}
{{--                                    <div class="input-group">--}}
{{--                                        <div class="input-group-prepend">--}}
{{--                                            <label class="input-group-text" for="country_for_shipping" style="font-size: small;">Country</label>--}}
{{--                                        </div>--}}
{{--                                        <select id="country_for_shipping" name="country_for_shipping" class="form-control">--}}
{{--                                            <option>USA</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-12 col-sm-12 col-md-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="city_for_shipping" class="sr-only">City</label>--}}
{{--                                        <input id="city_for_shipping" name="city_for_shipping" class="form-control" placeholder="City">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-12 col-sm-12 col-md-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="region_for_shipping" class="sr-only">State/Province/Region</label>--}}
{{--                                        <input id="region_for_shipping" name="region_for_shipping" class="form-control" placeholder="State/Province/Region">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-12 col-sm-12 col-md-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="postal_code_for_shipping" class="sr-only">Postal Code</label>--}}
{{--                                        <input id="postal_code_for_shipping" name="postal_code_for_shipping" class="form-control" placeholder="Postal Code">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-12 col-sm-12 col-md-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label for="email_for_shipping" class="sr-only">Email</label>--}}
{{--                                        <input id="email_for_shipping" name="email_for_shipping" class="form-control" placeholder="Email">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-12 col-sm-12 col-md-6">--}}
{{--                                    <div class="input-group">--}}
{{--                                        <div class="input-group-prepend">--}}
{{--                                            <span class="input-group-text">+1</span>--}}
{{--                                        </div>--}}
{{--                                        <input id="phone_for_shipping" name="phone_for_shipping" class="form-control" placeholder="Phone">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="row mt-3">--}}
{{--                        <div class="col-md-2 col-lg-2 col-xl-2">--}}
{{--                            <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; height: 100%; box-shadow: 0 0 10px -3px lightblue; padding: 10px 0;">--}}
{{--                                <i class="fas fa-money-bill fa-2x primary_text_color_default"></i>--}}
{{--                                <span style="font-weight: 600;">Billing Information</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-10 col-lg-10 col-xl-10 pt-2 pb-2">--}}
{{--                            <div class="custom-control custom-checkbox">--}}
{{--                                <input type="checkbox" class="custom-control-input" id="different_from_shipping_information" name="different_from_shipping_information">--}}
{{--                                <label class="custom-control-label" for="different_from_shipping_information">My Billing Information is Different from My Shipping Information</label>--}}
{{--                            </div>--}}
{{--                            <div id="billing_information_details">--}}
{{--                                <div class="row my-3">--}}
{{--                                    <div class="col-12 col-sm-12 col-md-6">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="first_name_for_billing" class="sr-only">First Name</label>--}}
{{--                                            <input id="first_name_for_billing" name="first_name_for_billing" class="form-control" placeholder="First Name">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-12 col-sm-12 col-md-6">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="last_name_for_billing" class="sr-only">Last Name</label>--}}
{{--                                            <input id="last_name_for_billing" name="last_name_for_billing" class="form-control" placeholder="Last Name">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="address_line_1_for_billing" class="sr-only">Address Line 1</label>--}}
{{--                                    <textarea id="address_line_1_for_billing" name="address_line_1_for_billing" class="form-control" placeholder="Address Line 1"></textarea>--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="address_line_2_for_billing" class="sr-only">Address Line 2</label>--}}
{{--                                    <textarea id="address_line_2_for_billing" name="address_line_2_for_billing" class="form-control" placeholder="Address Line 2"></textarea>--}}
{{--                                </div>--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-12 col-sm-12 col-md-6">--}}
{{--                                        <div class="input-group">--}}
{{--                                            <div class="input-group-prepend">--}}
{{--                                                <label class="input-group-text" for="country_for_billing" style="font-size: small;">Country</label>--}}
{{--                                            </div>--}}
{{--                                            <select id="country_for_billing" name="country_for_billing" class="form-control">--}}
{{--                                                <option>USA</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-12 col-sm-12 col-md-6">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="city_for_billing" class="sr-only">City</label>--}}
{{--                                            <input id="city_for_billing" name="city_for_billing" class="form-control" placeholder="City">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-12 col-sm-12 col-md-6">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="region_for_billing" class="sr-only">State/Province/Region</label>--}}
{{--                                            <input id="region_for_billing" name="region_for_billing" class="form-control" placeholder="State/Province/Region">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-12 col-sm-12 col-md-6">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="postal_code_for_billing" class="sr-only">Postal Code</label>--}}
{{--                                            <input id="postal_code_for_billing" name="postal_code_for_billing" class="form-control" placeholder="Postal Code">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-12 col-sm-12 col-md-6">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="email_for_billing" class="sr-only">Email</label>--}}
{{--                                            <input id="email_for_billing" name="email_for_billing" class="form-control" placeholder="Email">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-12 col-sm-12 col-md-6">--}}
{{--                                        <div class="input-group">--}}
{{--                                            <div class="input-group-prepend">--}}
{{--                                                <span class="input-group-text">+1</span>--}}
{{--                                            </div>--}}
{{--                                            <input id="phone_for_billing" name="phone_for_billing" class="form-control" placeholder="Phone">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="row mt-3">--}}
{{--                        <div class="col-md-2 col-lg-2 col-xl-2">--}}
{{--                            <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; height: 100%; box-shadow: 0 0 10px -3px lightblue; padding: 10px 0;">--}}
{{--                                <i class="fas fa-money-check-alt fa-2x primary_text_color_default"></i>--}}
{{--                                <span style="font-weight: 600;">Payment Method</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-10 col-lg-10 col-xl-10 pt-2 pb-2">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col text-danger" id="payment_method_error_message">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="border mb-3 py-3 px-3">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col">--}}
{{--                                        <div class="custom-control custom-radio mb-2">--}}
{{--                                            <input type="radio" class="custom-control-input payment_method" id="payment_method_paypal" name="payment_method" value="PayPal">--}}
{{--                                            <label class="custom-control-label font-italic" for="payment_method_paypal" style="font-weight: 600;">--}}
{{--                                                PayPal--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                        <div style="color: #91a1a5; font-size: small; padding-left: 25px;">You will be redirected to PayPal website to complete your purchase securely.</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col">--}}
{{--                                        <img src="{{ \App\Models\Base64Image::where('name', 'PayPal')->first()->value }}" alt="PayPal" height="20" width="100">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="border  py-3 px-3">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col">--}}
{{--                                        <div class="custom-control custom-radio">--}}
{{--                                            <input type="radio" class="custom-control-input payment_method" id="payment_method_card" name="payment_method" value="Card">--}}
{{--                                            <label class="custom-control-label font-italic" for="payment_method_card" style="font-weight: 600;">--}}
{{--                                                Debit or Credit Card--}}
{{--                                            </label>--}}
{{--                                        </div>--}}
{{--                                        <div style="color: #91a1a5; font-size: small; padding-left: 25px;">Safe money transfer using Visa, Maestro, Discover, American Express.</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col">--}}
{{--                                        <i class="fab fa-cc-visa fa-2x" style="color: #192061;"></i>--}}
{{--                                        <i class="fab fa-cc-mastercard fa-2x" style="color: #ff5f00;"></i>--}}
{{--                                        <i class="fab fa-cc-amex fa-2x" style="color: #629F86;"></i>--}}
{{--                                        <i class="fab fa-cc-discover fa-2x" style="color: #F9A021;"></i>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="row mt-3" id="payment_method_card_details">--}}
{{--                                    <div class="col">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <label for="card_number" style="font-size: small; color: #615f75;">Card Number</label>--}}
{{--                                            <div class="input-group">--}}
{{--                                                <input autocomplete="off" class="form-control" type="text" name="card_number" id="card_number" placeholder="0000 0000 0000 0000" style="border-right: none;">--}}
{{--                                                <div class="input-group-append">--}}
{{--                                                    <span class="input-group-text" style="font-size: small; border-left: none; background: none;"><i class="far fa-credit-card primary_text_color_default"></i></span>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <label for="expiry_date" style="font-size: small; color: #615f75;">Expiry Date</label>--}}
{{--                                                    <div class="input-group">--}}
{{--                                                        <input type="text" aria-label="month" class="form-control" name="expiry_month" id="expiry_month" placeholder="MM">--}}
{{--                                                        <input type="text" aria-label="year" class="form-control" name="expiry_year" id="expiry_year" placeholder="YYYY">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col">--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <label for="card_cvc" style="font-size: small; color: #615f75;">CVC Code</label>--}}
{{--                                                    <div class="input-group">--}}
{{--                                                        <input autocomplete="off" class="form-control" size="4" type="text" name="card_cvc" id="card_cvc" placeholder="CVC" style="border-right: none;">--}}
{{--                                                        <div class="input-group-append">--}}
{{--                                                            <span class="input-group-text" style="font-size: small; border-left: none; background: none; cursor: pointer;"><i class="far fa-question-circle primary_text_color_default" title="CVC CODE"></i></span>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    @if ($accountLoginStatus === false)--}}
{{--                        <div class="row mt-3">--}}
{{--                            <div class="col-md-2 col-lg-2 col-xl-2">--}}
{{--                                <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; text-align: center; height: 100%; box-shadow: 0 0 10px -3px lightblue; padding: 10px 0;">--}}
{{--                                    <i class="far fa-user-circle fa-2x primary_text_color_default"></i>--}}
{{--                                    <span style="font-weight: 600;">Account Information</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-10 col-lg-10 col-xl-10 pt-2 pb-2">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col">--}}
{{--                                        <div class="custom-control custom-checkbox">--}}
{{--                                            <input type="checkbox" class="custom-control-input" id="create_an_account" name="create_an_account">--}}
{{--                                            <label class="custom-control-label" for="create_an_account">Create an Account</label>--}}
{{--                                        </div>--}}
{{--                                        <div style="color: #91a1a5; font-size: small; padding-left: 25px;">This will Create a Personal Account with GoodGross.</div>--}}
{{--                                        <div id="account_information_details">--}}
{{--                                            <div class="row my-3">--}}
{{--                                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-3">--}}
{{--                                                    <input type="text" class="form-control" name="first_name_for_account" id="first_name_for_account" placeholder="First Name">--}}
{{--                                                </div>--}}
{{--                                                <div class="col-12 col-sm-6 col-md-6 col-lg-6">--}}
{{--                                                    <input type="text" class="form-control" name="last_name_for_account" id="last_name_for_account" placeholder="Last Name">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="row mb-3">--}}
{{--                                                <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-3">--}}
{{--                                                    <input type="text" class="form-control" name="email_for_account" id="email_for_account" placeholder="Email Address">--}}
{{--                                                </div>--}}
{{--                                                <div class="col-12 col-sm-6 col-md-6 col-lg-6">--}}
{{--                                                    <div class="input-group">--}}
{{--                                                        <input type="password" class="form-control" name="password_for_account" id="password_for_account" placeholder="Password">--}}
{{--                                                        <div class="input-group-append">--}}
{{--                                                            <span class="input-group-text" style="cursor: pointer;" id="password_show_hide_icon_holder_for_personal"><i id="password_show_hide_icon_for_personal" class="fas fa-eye"></i></span>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col">--}}
{{--                                        Creating an Account with GoodGross--}}
{{--                                        <ul>--}}
{{--                                            <li>makes repeat purchases easier</li>--}}
{{--                                            <li>provides faster checkout</li>--}}
{{--                                            <li>gives you more interactive experiences</li>--}}
{{--                                            <li>offers tracking your order easier</li>--}}
{{--                                            <li>deals your access to special offers</li>--}}
{{--                                            <li>gives rewarded for your loyalty</li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    <div class="row mt-3">--}}
{{--                        <div class="col-md-2 col-lg-2 col-xl-2 pt-2 pb-2">--}}

{{--                        </div>--}}
{{--                        <div class="ccol-md-10 col-lg-10 col-xl-10 pt-2 pb-2">--}}
{{--                            <button type="submit" class="btn primary_btn_default btn-block mt-3">Confirm and Place My Order</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--                @else--}}
{{--                    <div class="alert alert-info">No Checkout Items Found!</div>--}}
{{--                @endif--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
    <div class="mt-3"></div>
    <script type="text/javascript">

        function loadCheckoutItems() {
            $.ajax({
                method: 'get',
                url: '{{ url('checkout/get/items') }}',

                success: function (result) {
                    console.log(result);
                    $('#checkout_items_container').empty();
                    $('#order_summary_container').empty();
                    if (result.payload !== null && Object.keys(result.payload).length > 0) {

                        let subtotal = 0;
                        $.each(result.payload, function (key, cartItem) {

                            let title = cartItem.product_properties.find(obj => obj.property.property === 'Title');
                            let images = cartItem.product_properties.find(obj => obj.property.property === 'Images');
                            let price = cartItem.product_properties.find(obj => obj.property.property === 'Price');
                            let quantity = cartItem.product_properties.find(obj => obj.property.property === 'Quantity');
                            let shippingTime = cartItem.product_properties.find(obj => obj.property.property === 'Shipping Time');
                            let daysIncreased = shippingTime.value === 'Same Business Day' ? 0 : shippingTime.value === '1 Business Days - 10 Business Days' ? 10 : shippingTime.value === '15 Business Days' ? 15 : shippingTime.value === '20 Business Days' ? 20 : 30;
                            let accountInfo = cartItem.account.type === 'Personal' ? (cartItem.account.personal_account.first_name + ' ' + cartItem.account.personal_account.last_name) : cartItem.account.business_account.name;

                            let imgSrc = '{{ asset('storage') }}/' + images.value.split(',')[0];


                            subtotal += parseFloat(price.value) * parseFloat(cartItem.quantity);



                            $('#checkout_items_container').append(`

                                <div class="card shadow-sm border-0 mb-4">
                                    <div class="card-header border-0 py-3" style="background-color: #56dbff21;">
                                        <div class="row">
                                            <div class="col">
                                                <div class="small">Seller: <span class="primary_text_color_default fw-bold">` + accountInfo + `</span></div>
                                            </div>
                                            <div class="col">
                                                <div class="text-end"><a href="#" class="text-decoration-none text-primary small">Message to Seller</a></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-0 p-3">
                                        <div class="col-12 col-sm-3 col-md-4 col-lg-4 col-xl-4 col-xxl-3">
                                            <img src="` + imgSrc + `" class="img-fluid rounded" alt="` + title.value + `">
                                        </div>
                                        <div class="col-12 col-sm-9 col-md-8 col-lg-8 col-xl-8 col-xxl-9">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12 col-sm-8">
                                                        <div class="card-title fw-bold"><div class="mb-2 primary_text_color_default  font-weight-bold" style="font-size: 120%;">` + title.value + `</div></div>
                                                    </div>
                                                    <div class="col-12 col-sm-4 pe-0">
                                                        <div class="text-end text-warning">US $` + (parseFloat(price.value) * parseFloat(cartItem.quantity)).toFixed(2) + `</div>
                                                    </div>
                                                </div>

                                                <div class="mt-2">
                                                    <span class="fw-bold small">Price per Unit:</span>
                                                    <span class="small">US $` + parseFloat(price.value).toFixed(2) + `</span>
                                                </div>
                                                <div class="mt-1">
                                                    <span class="fw-bold small">In Stock:</span>
                                                    <span class="small">` + quantity.value + ` Unit</span>
                                                </div>
                                                <div  class="mt-1">
                                                    <span class="fw-bold small">Est. Delivery:</span>
                                                    <span class="small">` + $.datepicker.formatDate('MM d, yy', new Date(new Date().setDate(new Date().getDate() + daysIncreased))) + `</span>
                                                </div>
                                                <div class="mt-3">
                                                    <button type="button" style="padding: 8px 15px; border: none; background-color: #cccccc; font-size: small; cursor: pointer;" class="quantity_minus" data-item_id="` + cartItem.id + `">-</button>
                                                    <span style="padding: 10px 30px; background-color: #fff5f2; font-size: small;"><span class="quantity">` + cartItem.quantity + `</span></span>
                                                    <button type="button" style="padding: 8px 15px; border: none; background-color: #cccccc; font-size: small; cursor: pointer;" class="quantity_plus" data-item_id="` + cartItem.id + `">+</button>
                                                </div>
                                                <div class="mt-4">
                                                    <a class="text-primary text-decoration-none small delete_item" data-item_id="` + cartItem.id + `" href="javascript:void(0)">Delete</a> | <a href="#" class="text-primary text-decoration-none small">Move to Wishlist</a>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `);

                        });




                        $('#order_summary_container').append(`
                            <div class="card border-0 shadow-sm">
                                <div class="card-body">


                                    <div class="">Subtotal: <b>US $` + subtotal.toFixed(2) + `</b></div>
                                    <div class="mt-1">Shipping: <b>Free</b></div>
                                    <div class="mt-1">Estimated Tax: <b>US $0.00</b></div>
                                    <hr style="color: #a5d4ba;">
                                    <div class="mb-3">Grand Total : <b>US $` + subtotal.toFixed(2) + `</b></div>
                                    <div class="mb-3 d-grid gap-3">
                                        <button class="btn primary_btn_default" id="place_order">Place Order</button>
                                        <button class="btn btn-outline-primary" style="background-color: #27a0ff1a; border-color: #27a0ff1a;">Continue Shopping</button>
                                    </div>
                                </div>
                            </div>

                        `);

                    } else {
                        $('#checkout_items_container').append(`
                            <div class="alert alert-info">
                                No Item Found!
                            </div>
                        `);
                    }


                },
                error: function (xhr) {
                    console.log(xhr)
                }
            });
        }

        $(document).ready(function () {
            loadCheckoutItems();


            $('#shipping_to_container').hide();
            $('#first_name_for_shipping').attr('disabled', true);
            $('#last_name_for_shipping').attr('disabled', true);
            $('#address_line_1_for_shipping').attr('disabled', true);
            $('#address_line_2_for_shipping').attr('disabled', true);
            $('#country_id_for_shipping').attr('disabled', true);
            $('#city_for_shipping').attr('disabled', true);
            $('#state_for_shipping').attr('disabled', true);
            $('#postal_code_for_shipping').attr('disabled', true);
            $('#email_for_shipping').attr('disabled', true);
            $('#phone_for_shipping').attr('disabled', true);


            $('#payment_method_card_details').hide();
            $('#card_number').attr('disabled', true);
            $('#card_cvc').attr('disabled', true);
            $('#expiry_month').attr('disabled', true);
            $('#expiry_year').attr('disabled', true);


        })




        $(document).on('click', '#ship_to_same_as_billing_address', function () {
            if ($(this).is(':checked') === false) {
                $('#first_name_for_shipping').removeAttr('disabled');
                $('#last_name_for_shipping').removeAttr('disabled');
                $('#address_line_1_for_shipping').removeAttr('disabled');
                $('#address_line_2_for_shipping').removeAttr('disabled');
                $('#country_id_for_shipping').removeAttr('disabled');
                $('#city_for_shipping').removeAttr('disabled');
                $('#region_for_shipping').removeAttr('disabled');
                $('#postal_code_for_shipping').removeAttr('disabled');
                $('#email_for_shipping').removeAttr('disabled');
                $('#phone_for_shipping').removeAttr('disabled');
                $('#shipping_to_container').show(1000);
            } else {
                $('#first_name_for_shipping').attr('disabled', true);
                $('#last_name_for_shipping').attr('disabled', true);
                $('#address_line_1_for_shipping').attr('disabled', true);
                $('#address_line_2_for_shipping').attr('disabled', true);
                $('#country_id_for_shipping').attr('disabled', true);
                $('#city_for_shipping').attr('disabled', true);
                $('#region_for_shipping').attr('disabled', true);
                $('#postal_code_for_shipping').attr('disabled', true);
                $('#email_for_shipping').attr('disabled', true);
                $('#phone_for_shipping').attr('disabled', true);
                $('#shipping_to_container').hide(1000);
            }
            return true;
        });

        $(document).on('click', '.payment_method', function () {
            $('#card_number').val('').attr('disabled', true);
            $('#card_cvc').val('').attr('disabled', true);
            $('#expiry_month').val('').attr('disabled', true);
            $('#expiry_year').val('').attr('disabled', true);
            if ($(this).val() === 'Card') {
                $('#card_number').val('').removeAttr('disabled');
                $('#card_cvc').val('').removeAttr('disabled');
                $('#expiry_month').val('').removeAttr('disabled');
                $('#expiry_year').val('').removeAttr('disabled');
                $('#payment_method_card_details').show(1000);
            } else {
                $('#payment_method_card_details').hide(1000);
            }
            return true;
        });

        $(document).on('change', '#create_an_account', function () {
            if ($(this).is(':checked') === true) {
                $('#first_name_for_account').removeAttr('disabled');
                $('#last_name_for_account').removeAttr('disabled');
                $('#email_for_account').removeAttr('disabled');
                $('#password_for_account').removeAttr('disabled');
                $('#create_an_account').parent().css('padding-top', '0');
                $('#account_information_details').show(1000);
            } else {
                $('#first_name_for_account').attr('disabled', true);
                $('#last_name_for_account').attr('disabled', true);
                $('#email_for_account').attr('disabled', true);
                $('#password_for_account').attr('disabled', true);
                $('#create_an_account').parent().css('padding-top', '75px');
                $('#account_information_details').hide(1000);
            }
            return true;
        });


        $(document).on('click', '#place_order', function () {
            let formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: 'post',
                url: '{{ url('checkout') }}',
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (result) {
                    console.log(result);
                    {{--if (result.success === false) {--}}
                    {{--    $('#payment_method_error_message').text(result.message);--}}
                    {{--} else if (result.success === true) {--}}
                    {{--    location = '{{ url('checkout/success') }}/' + result.message.id;--}}
                    {{--}--}}
                },
                error: function (xhr) {
                    console.log(xhr);
                    if (xhr.hasOwnProperty('responseJSON')) {
                        if (xhr.responseJSON.hasOwnProperty('errors')) {
                            $.each(xhr.responseJSON.errors, function (key, value) {

                                if (key !== 'phone' && key !== 'payment_method' && key !== 'country' && key !== 'expiry_month' && key !== 'expiry_year') {
                                    $('#' + key).after('<div class="invalid-feedback"></div>');
                                    $('#' + key).addClass('is-invalid');
                                    $.each(value, function (k, v) {
                                        $('#' + key).parent().find('.invalid-feedback').append(v + ' ');
                                    });
                                } else {
                                    if (key === 'phone' || key === 'country') {
                                        $('#' + key).after('<div class="invalid-feedback"></div>');
                                        $('#' + key).addClass('is-invalid');
                                        $.each(value, function (k, v) {
                                            $('#' + key).parent().find('.invalid-feedback').append( v + ' ');
                                        });
                                    }
                                    if (key === 'expiry_month' || key === 'expiry_year') {
                                        if ($('#' + key).parent().find('.invalid-feedback').length === 0) {
                                            $('#' + key).parent().append('<span class="invalid-feedback"></span>');
                                        }
                                        $('#' + key).addClass('is-invalid');
                                        $.each(value, function (k, v) {
                                            $('#' + key).parent().find('.invalid-feedback').append(v + ' ');
                                        });
                                    }
                                    if (key === 'payment_method') {

                                        $('#payment_method_error_message').text('Please Select a Payment Method');
                                    }



                                }



                            });
                        }
                    }
                }
            });
        });

        $(document).on('submit', '#checkout_form', function () {
            $('#checkout_form').find('.is-invalid').removeClass('is-invalid');
            $('#checkout_form').find('.invalid-feedback').remove();
            $('#payment_method_error_message').empty();
            let formData = new FormData(this);
            formData.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: 'post',
                url: '{{ url('checkout') }}',
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (result) {
                    console.log(result);
                    if (result.success === false) {
                        $('#payment_method_error_message').text(result.message);
                    } else if (result.success === true) {
                        location = '{{ url('checkout/success') }}/' + result.message.id;
                    }
                },
                error: function (xhr) {
                    console.log(xhr);
                    if (xhr.hasOwnProperty('responseJSON')) {
                        if (xhr.responseJSON.hasOwnProperty('errors')) {
                            $.each(xhr.responseJSON.errors, function (key, value) {

                                if (key !== 'phone' && key !== 'payment_method' && key !== 'country' && key !== 'expiry_month' && key !== 'expiry_year') {
                                    $('#' + key).after('<div class="invalid-feedback"></div>');
                                    $('#' + key).addClass('is-invalid');
                                    $.each(value, function (k, v) {
                                        $('#' + key).parent().find('.invalid-feedback').append(v + ' ');
                                    });
                                } else {
                                    if (key === 'phone' || key === 'country') {
                                        $('#' + key).after('<div class="invalid-feedback"></div>');
                                        $('#' + key).addClass('is-invalid');
                                        $.each(value, function (k, v) {
                                            $('#' + key).parent().find('.invalid-feedback').append( v + ' ');
                                        });
                                    }
                                    if (key === 'expiry_month' || key === 'expiry_year') {
                                        if ($('#' + key).parent().find('.invalid-feedback').length === 0) {
                                            $('#' + key).parent().append('<span class="invalid-feedback"></span>');
                                        }
                                        $('#' + key).addClass('is-invalid');
                                        $.each(value, function (k, v) {
                                            $('#' + key).parent().find('.invalid-feedback').append(v + ' ');
                                        });
                                    }
                                    if (key === 'payment_method') {

                                        $('#payment_method_error_message').text('Please Select a Payment Method');
                                    }



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
