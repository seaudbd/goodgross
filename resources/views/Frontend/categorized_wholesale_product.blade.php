@extends('Layouts.frontend')
@section('content')

    <style type="text/css">



        #thumbnail_images .slick-current img {
            border: 3px solid #02ab02;
            border-radius: 5px;
        }

        .slick-prev:before {
            content: url("{{ asset('storage/img/application/prev_arrow.png') }}");
        }

        .slick-next:before {
            content: url("{{ asset('storage/img/application/next_arrow.png') }}");
        }


        .btn-google {
            color: #fff;
            background-color: #dd4b39;
            border-color: #dd4b39;
        }
        .btn-facebook {
            color: #fff;
            background-color: #3b5998;
            border-color: #3b5998;
        }
        .btn-twitter {
            color: #fff;
            background-color: #00aced;
            border-color: #00aced;
        }

        .btn-icon--2 {
            position: relative;
            padding-left: 40px !important;
        }
        .btn-styled {

            letter-spacing: 0;

            padding: 0.6rem 1.5rem;
        }

        .btn {
            position: relative;
            font-size: 0.875rem;
            font-family: "Open Sans", sans-serif;
            font-style: normal;
            text-align: center;
            border-radius: 2px;
            outline: none;
            -webkit-transition: all 0.2s linear;
            transition: all 0.2s linear;
        }
        .btn-block {
            display: block;
            width: 100%;
        }

        .btn-icon--2 .icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            left: 0;
            top: 0;
            width: 40px;
            height: 100%;
            background: rgba(0, 0, 0, 0.2);
        }


    </style>



    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mx-auto">



                <div class="row mt-4">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 border-bottom pb-2" style="border-color: #e8f3ed !important;">
                        <div class="category_identity_line">
                            @php
                                $rootCategories = array_reverse($rootCategories)
                            @endphp
                            <a href="{{ url('/') }}">Home</a> . <a href="{{ url('/') }}">{{ $product->category->categoryType->category_type }}</a> .
                            @foreach($rootCategories as $rootCategory)
                                <a href="{{ url('/') }}">{{ $rootCategory }}</a> .
                            @endforeach
                            @foreach($product->productProperties as $productProperty)

                                @switch($productProperty->property->property)
                                    @case('Title')
                                    @php
                                        $title = $productProperty->value;
                                    @endphp
                                    @break

                                    @case('Min Order')
                                    @php
                                        $minOrder = json_decode($productProperty->value, true);

                                    @endphp
                                    @break

                                    @case('Max Order')
                                    @php
                                        $maxOrder = json_decode($productProperty->value, true);

                                    @endphp
                                    @break

                                    @case('Quantity')
                                    @php
                                        $quantity = $productProperty->value;
                                    @endphp
                                    @break

                                    {{--@case('Condition')--}}
                                    {{--@php--}}
                                        {{--$condition = $productProperty->value;--}}
                                    {{--@endphp--}}
                                    {{--@break--}}

                                    {{--@case('Shipping Time')--}}
                                    {{--@php--}}
                                        {{--$shippingTime = $productProperty->value;--}}
                                    {{--@endphp--}}
                                    {{--@break--}}

                                    {{--@case('Shipping Cost')--}}
                                    {{--@php--}}
                                        {{--$shippingCost = $productProperty->value;--}}
                                    {{--@endphp--}}
                                    {{--@break--}}

                                    @case('Images')
                                    @php
                                        $images = explode(',', $productProperty->value);
                                    @endphp
                                    @break

                                    @default
                                    @break
                                @endswitch
                            @endforeach

                            <a href="{{ url('/') }}">{{ $product->category->category }}</a> . {{ $title}}
                        </div>
                    </div>
                </div>


                <div class="row mt-4">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">

                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-4" style="padding-left: 25px; padding-right: 25px;">
                                <div id="preview_images">
                                    @foreach($images as $key => $image)
                                        <div>
                                            <img src="{{ asset('storage/img/application/img_loading.gif') }}" data-lazy="{{ asset('storage/' . $image) }}" style="cursor: pointer;" class="rounded img-fluid" alt="{{ $title }}">
                                        </div>
                                    @endforeach
                                </div>



                                @if(count($images) > 1)
                                    <div class="mt-3" id="thumbnail_images">
                                        @foreach($images as $key => $image)
                                            <div class="px-1">
                                                <img src="{{ asset('storage/img/application/img_loading.gif') }}" data-lazy="{{ asset('storage/' . str_replace('original', '200x150', $image)) }}" style="cursor: pointer;" class="rounded img-fluid" alt="{{ $title }}">
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 col-xxl-8 ps-xxl-4 ps-xl-4 ps-lg-4 ps-md-4">
                                <div class="font-weight-bold h3 mt-3">{{ $title }}</div>

                                <div class="row">
                                    <div class="col-sm-6 col-md-12 col-lg-12 col-xl-6 col-xxl-4">
                                        <hr style="width: 50px; height: 2px;" class="primary_text_color_default">
                                        <div class="row">
                                            <div class="col-2"><div class="fw-bold">Price</div></div>
                                            <div class="col-5">
                                                {{ $minOrder["Quantity From"] }} - {{ $minOrder["Quantity To"] }} {{ $minOrder["Unit"] }}<br>{{ $minOrder["Currency"] }}{{ number_format($minOrder["Price"], 2) }} / {{ $minOrder["Per Unit"] }}
                                            </div>
                                            <div class="col-5">
                                                {{ $maxOrder["Quantity From"] }} - {{ $maxOrder["Quantity To"] }} {{ $maxOrder["Unit"] }}<br>{{ $maxOrder["Currency"] }}{{ number_format($maxOrder["Price"], 2) }} / {{ $maxOrder["Per Unit"] }}
                                            </div>
                                        </div>



                                        <div class="mt-2">
                                            <span style="color: #076706; font-size: 12px;" >
                                                <i class="mr-0 fas fa-star"></i>
                                                <i class="mr-0 fas fa-star"></i>
                                                <i class="mr-0 fas fa-star"></i>
                                                <i class="mr-0 fas fa-star"></i>
                                                <i class="mr-0 fas fa-star"></i>
                                            </span>
                                            <span style="font-size: 12px;"> [441 Reviews | 12 Answered]</span>
                                        </div>

                                        <div class="mt-3">
                                            <button type="button" style="padding: 8px 15px; border: none; background-color: #cccccc; font-size: small; cursor: pointer;" id="quantity_minus">-</button>
                                            <span style="padding: 10px 30px; background-color: #ffffff; font-size: small;"><span id="quantity">1</span></span>
                                            <button type="button" style="padding: 8px 15px; border: none; background-color: #cccccc; font-size: small; cursor: pointer;" id="quantity_plus">+</button>
                                        </div>
                                        <div class="d-grid gap-3 mt-4">
                                            <button class="btn primary_btn_default" type="button" id="contact_seller">Contact the Seller</button>
                                            <button class="btn primary_btn_default" type="button" id="place_an_order">Place an Order</button>
                                            <button class="btn primary_btn_default" type="button" id="make_offer">Make an Offer</button>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-12 col-lg-12 col-xl-6 col-xxl-8 ps-xxl-4 ps-xl-4 pt-xxl-0 pt-xl-0 pt-lg-4 pt-md-4 pt-sm-0 pt-4 small">
                                        <div class="row">
                                            <div class="col-3 text-secondary">Quantity:</div>
                                            <div class="col-9 fw-bold">{{ $quantity }} Available</div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-3 text-secondary">Condition:</div>
                                            {{--<div class="col-9 fw-bold">{{ $condition }}</div>--}}
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-3 text-secondary">Seller:</div>
                                            <div class="col-9 fw-bold">
                                                <div>
                                                    @php
                                                        $seller = $product->account->type === 'Personal' ? $product->account->personalAccount->first_name . ' ' . $product->account->personalAccount->last_name : $product->account->businessAccount->name;
                                                    @endphp
                                                    {{ $product->account->number }} [{{ $seller }}]
                                                </div>
                                                <div class="small text-secondary">
                                                    95% Positive Review
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-3 text-secondary">Delivery:</div>
                                            <div class="col-9 fw-bold">
                                                <div>
                                                    {{--@php--}}
                                                        {{--$daysIncreased = $shippingTime === 'Same Business Day' ? 0 : ($shippingTime === '1 Business Days - 10 Business Days' ? 10 : ($shippingTime === '15 Business Days' ? 15 : ($shippingTime === '20 Business Days' ? 20 : 30)));--}}
                                                    {{--@endphp--}}
                                                    {{--Est. {{ date('F d, Y', strtotime(date('Y-m-d'), '+' . $daysIncreased)) }}--}}
                                                </div>
                                                <div class="small text-secondary">
                                                    From United States
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-3 text-secondary">Return:</div>
                                            <div class="col-9 fw-bold">Buyer Pays Return Postage</div>
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-3 text-secondary">Shipping:</div>
                                            {{--<div class="col-9 fw-bold">{{ (int)$shippingCost === 0 ? 'Free Shipping' : 'US $' . $shippingCost }}</div>--}}
                                        </div>

                                    </div>
                                </div>

                                <div class="mt-2">
                                    {{--@if ($size = $product->productProperties->where('property', 'Size')->first())--}}
                                    {{--<span style="font-weight: 600;">Size</span>:--}}
                                    {{--@foreach(json_decode($size->value, true) as $sizeKey => $sizeValue)--}}
                                    {{--<div class="custom-control custom-radio custom-control-inline">--}}
                                    {{--<input type="radio" class="custom-control-input" id="size_{{ strtolower($sizeKey) }}" name="size" value="{{ $sizeKey }}">--}}
                                    {{--<label class="custom-control-label" for="size_{{ strtolower($sizeKey) }}">{{ $sizeKey }}</label>--}}
                                    {{--</div>--}}
                                    {{--@endforeach--}}
                                    {{--@endif--}}
                                </div>

                                <div class="mt-2">
                                    {{--@if ($color = $product->productProperties->where('property', 'Color')->first())--}}
                                    {{--<span style="font-weight: 600;">Color</span>:--}}
                                    {{--@foreach(json_decode($color->value, true) as $colorKey => $colorValue)--}}
                                    {{--<div class="custom-control custom-radio custom-control-inline">--}}
                                    {{--<input type="radio" class="custom-control-input" id="size_{{ strtolower($colorKey) }}" name="size" value="{{ $colorKey }}">--}}
                                    {{--<label class="custom-control-label" for="size_{{ strtolower($colorKey) }}">{{ $colorKey }}</label>--}}
                                    {{--</div>--}}
                                    {{--@endforeach--}}
                                    {{--@endif--}}
                                </div>







                                <div class="row mt-3">
                                    {{--<div class="col-sm-12 col-md-4 mb-3">--}}
                                    {{----}}
                                    {{--<button id="add_to_cart" style="border-color: #B4BFBB; color: #498665" type="button"--}}
                                    {{--class="btn btn-sm btn-block">Add to Cart--}}
                                    {{--</button>--}}
                                    {{--<button style="border-color: #B4BFBB; color: #498665" type="button"--}}
                                    {{--class="btn btn-sm btn-block">Add to Watch--}}
                                    {{--</button>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-sm-12 col-md-8">--}}
                                    {{--<table class="table">--}}
                                    {{--<tbody>--}}
                                    {{--<tr>--}}
                                    {{--<td>Quantity</td>--}}
                                    {{--<td class="font-weight-bold">{{ $product->productProperties->where('property', 'Quantity')->first('value')->value }} Available</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                    {{--<td>Condition</td>--}}
                                    {{--<td class="font-weight-bold">{{ $product->productProperties->where('property', 'Condition')->first('value')->value }}</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                    {{--<td>Seller</td>--}}
                                    {{--<td class="font-weight-bold">{{ $product->account->business_name }}<br>99% Positive Feedback</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                    {{--<td>Delivery</td>--}}
                                    {{--<td class="font-weight-bold">Contact Seller</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                    {{--<td>Return</td>--}}
                                    {{--<td class="font-weight-bold">Buyer will Pay Return Postage</td>--}}
                                    {{--</tr>--}}
                                    {{--<tr>--}}
                                    {{--<td>Shipping</td>--}}
                                    {{--<td class="font-weight-bold">Free</td>--}}
                                    {{--</tr>--}}

                                    {{--</tbody>--}}
                                    {{--</table>--}}
                                    {{--</div>--}}
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5 mb-3">
                            <div class="col">
                                <div style="border-bottom: 1px solid #d1f9e2;">
                                    <h6 class="d-inline-block primary_btn_default" style="margin: 0; color: white; padding: 10px;padding-right: 50px; border-top-right-radius: 50px">Overall Details</h6>
                                </div>
                            </div>
                        </div>
                        <div id="content">
                            <div class="row">
                                <div class="col-sm-12 col-md-4">
                                    <div style="float: left; width: 40%">
                                        <p class="font-weight-light p-2 m-0 border-bottom ">Type:</p>
                                        <p class="font-weight-light p-2 m-0 border-bottom ">Specific Type:</p>
                                        <p class="font-weight-light p-2 m-0 border-bottom ">Variety:</p>
                                        <p class="font-weight-light p-2 m-0 border-bottom ">Fressness:</p>
                                        <p class="font-weight-light p-2 m-0 border-bottom ">Certification:</p>
                                        <p class="font-weight-light p-2 m-0 border-bottom ">MOQ:</p>
                                        <p class="font-weight-light p-2 m-0 border-bottom ">FOB:</p>
                                        <p class="font-weight-light p-2 m-0 border-bottom ">Cultivation Type:</p>
                                    </div>
                                    <div style="float: right; width: 60%">
                                        {{--<p class="font-weight-bold p-2 m-0 border-bottom ">{{ $product->productProperties->where('property', 'Title')->first('value')->value }}</p>--}}
                                        <p class="font-weight-bold p-2 m-0 border-bottom ">data</p>
                                        <p class="font-weight-bold p-2 m-0 border-bottom ">data</p>
                                        <p class="font-weight-bold p-2 m-0 border-bottom ">data</p>
                                        <p class="font-weight-bold p-2 m-0 border-bottom ">data</p>
                                        <p class="font-weight-bold p-2 m-0 border-bottom ">data</p>
                                        <p class="font-weight-bold p-2 m-0 border-bottom ">data</p>
                                        <p class="font-weight-bold p-2 m-0 border-bottom ">data</p>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div style="float: left; width: 40%">
                                        <p class="font-weight-light p-2 m-0 border-bottom ">Color:</p>
                                        <p class="font-weight-light p-2 m-0 border-bottom ">Maturity:</p>
                                        <p class="font-weight-light p-2 m-0 border-bottom ">Expiration:</p>
                                        <p class="font-weight-light p-2 m-0 border-bottom ">Date Of Production:</p>
                                        <p class="font-weight-light p-2 m-0 border-bottom ">Grade:</p>
                                        <p class="font-weight-light p-2 m-0 border-bottom ">Shelf Life:</p>
                                        <p class="font-weight-light p-2 m-0 border-bottom ">Size:</p>
                                        <p class="font-weight-light p-2 m-0 border-bottom ">Weight:</p>
                                    </div>
                                    <div style="float: right; width: 60%">
                                        <p class="font-weight-bold p-2 m-0 border-bottom ">data</p>
                                        <p class="font-weight-bold p-2 m-0 border-bottom ">data</p>
                                        <p class="font-weight-bold p-2 m-0 border-bottom ">data</p>
                                        <p class="font-weight-bold p-2 m-0 border-bottom ">data</p>
                                        <p class="font-weight-bold p-2 m-0 border-bottom ">data</p>
                                        <p class="font-weight-bold p-2 m-0 border-bottom ">data</p>
                                        <p class="font-weight-bold p-2 m-0 border-bottom ">data</p>
                                        <p class="font-weight-bold p-2 m-0 border-bottom ">data</p>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div style="float: left; width: 40%">
                                        <p class="font-weight-light p-2 m-0 border-bottom ">Place of Origin:</p>
                                        <p class="font-weight-light p-2 m-0 border-bottom ">Brand Name:</p>
                                        <p class="font-weight-light p-2 m-0 border-bottom ">Taste:</p>
                                        <p class="font-weight-light p-2 m-0 border-bottom ">Name:</p>
                                        <p class="font-weight-light p-2 m-0 border-bottom ">Location:</p>
                                        <p class="font-weight-light p-2 m-0 border-bottom ">Packing:</p>
                                        <p class="font-weight-light p-2 m-0 border-bottom ">Delivery Details:</p>
                                        <p class="font-weight-light p-2 m-0 border-bottom ">Packaging Details:</p>
                                    </div>
                                    <div style="float: right; width: 60%">
                                        <p class="font-weight-bold p-2 m-0 border-bottom ">data</p>
                                        <p class="font-weight-bold p-2 m-0 border-bottom ">data</p>
                                        <p class="font-weight-bold p-2 m-0 border-bottom ">data</p>
                                        <p class="font-weight-bold p-2 m-0 border-bottom ">data</p>
                                        <p class="font-weight-bold p-2 m-0 border-bottom ">data</p>
                                        <p class="font-weight-bold p-2 m-0 border-bottom ">data</p>
                                        <p class="font-weight-bold p-2 m-0 border-bottom ">data</p>
                                        <p class="font-weight-bold p-2 m-0 border-bottom ">data</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col text-right">
                                <a id="show_less" href="#" class="text-right primary_text_color_default  font-weight-bold">Show Less</a>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-sm-12">
                                <div style="border-bottom: 1px solid #d1f9e2;"><h6 class="d-inline-block primary_btn_default" style="margin: 0; color: white; padding: 10px;padding-right: 50px; border-top-right-radius: 50px">Description</h6></div>
                            </div>
                        </div>
                    </div>
                </div>






            </div>
        </div>
    </div>


    <div class="modal" tabindex="-1" id="sign_in_modal">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">



                    <div class="text-center mb-3">
                        <i class="fas fa-sign-in-alt primary_text_color_default fa-3x"></i>
                    </div>
                    <div class="text-center border-bottom pb-3" style="border-color: #e8f3ed !important;">
                        <div class="h4">Sign in to GoodGross</div>
                    </div>



                    <div class="row mt-5">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-7 px-lg-5 border-end" style="border-color: #e8f3ed !important;">
                            <div id="sign_in_form_message" class="text-center text-danger">{{ \Illuminate\Support\Facades\Session::get('error') }}</div>
                            <form id="sign_in_form">

                                <div class="form-floating mb-4">
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Email">
                                    <label for="sign_in_id">Email</label>
                                </div>
                                <div class="input-group mb-4">
                                    <div class="form-floating" style="width: 70%;">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" style="border-right: none; border-top-right-radius: 0; border-bottom-right-radius: 0;">
                                        <label for="password">Password</label>
                                    </div>
                                    <div class="input-group-text text-right" style="background-color: #ffffff; width: 30%; justify-content: flex-end;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="password_show_hide">
                                            <label class="form-check-label small" for="password_show_hide">Show</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="remember_me">
                                            <label class="form-check-label" for="remember_me">
                                                Remember me
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col text-end" style="font-size: 14px;">
                                        <a href="{{ url('forgot/password') }}" class="text-decoration-none" style="color: #636363;">Forgot Password?</a>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col d-grid gap-2">
                                        <button type="submit" class="btn primary_btn_default pr-3 pl-3" id="sign_in_form_submit">
                                            <span id="sign_in_form_submit_text">Sign in</span>
                                            <span id="sign_in_form_submit_processing" class="sr-only">
                                            <span class="spinner-grow spinner-grow-sm text-info" role="status" aria-hidden="true"></span>
                                            Processing...
                                        </span>
                                        </button>
                                    </div>
                                </div>








                            </form>

                        </div>


                        <div class="col-12 col-sm-12 col-md-12 col-lg-5 px-lg-5">


                            <div class="mt-3">Or, Sign in with</div>
                            <a href="{{ url('auth/redirect/to/google/dashboard') }}" class="btn btn-styled btn-block btn-google btn-icon--2 btn-icon-left px-4 my-4">
                                <i class="icon fab fa-google"></i> Google
                            </a>
                            <a href="{{ url('auth/redirect/to/facebook/dashboard') }}" class="btn btn-styled btn-block btn-facebook btn-icon--2 btn-icon-left px-4 my-4">
                                <i class="icon fab fa-facebook-f"></i> Facebook
                            </a>
                            <a href="{{ url('auth/redirect/to/twitter/dashboard') }}" class="btn btn-styled btn-block btn-twitter btn-icon--2 btn-icon-left px-4 my-4">
                                <i class="icon fab fa-twitter"></i> Twitter
                            </a>
                        </div>
                    </div>


                    <div class="row my-5">
                        <div class="col text-center">
                            <span class="me-3" style="font-size: 14px;">Need an account with GoodGross?</span>
                            <a class="btn btn-outline-info" href="{{ url('registration') }}" style="color: #328C59;">Register</a>
                        </div>
                    </div>

                    <div style="width: 100%; text-align: center; border-bottom: 1px solid #e8f3ed; line-height: 0.1em; margin: 10px 0 20px;"><span style="background:#fff; padding:0 10px;">Or</span></div>
                    <div class="text-center my-4"><button type="button" class="btn primary_btn_default">Continue as Guest</button></div>



                </div>
            </div>
        </div>
    </div>


    <div class="mt-3"></div>

    <script type="text/javascript">


        let whichAction;


        $(document).ready(function () {
            $("input[type='password']").focus(function(){
                $(this).parent().parent().find('.input-group-text').css("border-color", "rgba(82, 168, 236, 0.8)");
            });

            $("input[type='password']").focusout(function(){
                $(this).parent().parent().find('.input-group-text').css("border-color", "#ced4da");
            });
        });

        $(document).on('click', '#password_show_hide', function () {
            if ($(this).prop('checked') === true) {
                $('#password').attr('type', 'text');
            } else {
                $('#password').attr('type', 'password');
            }
        });

        $(document).on('submit', '#sign_in_form', function(event) {

            event.preventDefault();

            $('#sign_in_form_submit').addClass('disabled');
            $('#sign_in_form_submit_text').addClass('sr-only');
            $('#sign_in_form_submit_processing').removeClass('sr-only');

            $('#sign_in_form_message').empty().removeClass('mb-3');

            let signInFormData = new FormData(this);
            signInFormData.append('_token', '{{ csrf_token() }}');
            signInFormData.append('remember_me', $('#remember_me').prop('checked') ? 1 : 0);


            $.ajax({
                method: 'post',
                url: '{{ url('authenticate/account/sign/in') }}',
                data: signInFormData,
                contentType: false,
                processData: false,
                cache: false,
                global: false,
                success: function (result) {
                    console.log(result);
                    $('#sign_in_form_submit').removeClass('disabled');
                    $('#sign_in_form_submit_text').removeClass('sr-only');
                    $('#sign_in_form_submit_processing').addClass('sr-only');
                    if (result.success === true) {


                        $.ajax({
                            method: 'get',
                            url: '{{ url('regenerate/csrf/token') }}',
                            global: false,
                            success: function (token) {
                                console.log(token);

                                if (whichAction === 'place_an_order') {

                                    let buyItNowFormData = new FormData();
                                    buyItNowFormData.append('_token', token);
                                    buyItNowFormData.append('product_id', '{{ $product->id }}');
                                    buyItNowFormData.append('quantity', parseInt($('#quantity').text()));


                                    $.ajax({
                                        method: 'post',
                                        url: '{{ url('product/add/to/session') }}',
                                        data: buyItNowFormData,
                                        processData: false,
                                        contentType: false,
                                        global: false,
                                        success: function (response) {
                                            console.log(response);
                                            location = '{{ url('place/order') }}';

                                        },
                                        error: function (xhr) {
                                            console.log(xhr)
                                        }
                                    });
                                } else {
                                    let addToWatchFormData = new FormData();
                                    addToWatchFormData.append('_token', token);
                                    addToWatchFormData.append('product_id', '{{ $product->id }}');
                                    $.ajax({
                                        method: 'post',
                                        url: '{{ url('product/add/to/watch') }}',
                                        data: addToWatchFormData,
                                        processData: false,
                                        contentType: false,
                                        success: function (response) {
                                            console.log(response);


                                            $('#sign_in_modal .btn-close').click();
                                            $('#add_to_watch').text('View Watch List').attr('id', 'view_watch_list');
                                            $.toast({
                                                text : result.message,
                                                showHideTransition : 'slide',
                                                bgColor : 'green',
                                                textColor : '#eee',
                                                allowToastClose : true,
                                                hideAfter : 5000,
                                                stack : 5,
                                                textAlign : 'left',
                                                position : 'bottom-left'
                                            });
                                            location.reload();
                                        },
                                        error: function (xhr) {
                                            console.log(xhr)
                                        }
                                    });
                                }



                            },
                            error: function (xhr) {
                                console.log(xhr)
                            }
                        });

                    } else {
                        if (result.message === 'Pending Account') {
                            location = '{{ url('email/verification') }}/' + result.account.id;
                        } else {
                            $('#sign_in_form_message').text(result.message).addClass('mb-3');
                        }

                    }
                },
                error: function (xhr) {
                    console.log(xhr);
                    $('#sign_in_form_submit').removeClass('disabled');
                    $('#sign_in_form_submit_text').removeClass('sr-only');
                    $('#sign_in_form_submit_processing').addClass('sr-only');
                    if (xhr.responseJSON.hasOwnProperty('errors')) {
                        if (xhr.responseJSON.errors.hasOwnProperty('email') || xhr.responseJSON.errors.hasOwnProperty('password')) {
                            $('#sign_in_form_message').text('Unauthorized Access!').addClass('mb-3');
                        }
                    }
                }
            });

        });





        $('#preview_images').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            fade: true,
            lazyLoad: 'ondemand',
            asNavFor: '#thumbnail_images'
        });
        $('#thumbnail_images').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: false,
            asNavFor: '#preview_images',
            dots: false,
            arrows: true,
            centerMode: true,
            focusOnSelect: true,
            lazyLoad: 'ondemand',
        });



                {{--$(document).on('change', '#quantity', function () {--}}
                {{--let quantity = parseFloat($(this).val());--}}
                {{--let pricePerUnit = parseFloat('{{ $product->productProperties->where('property', 'Price')->first('value')->value }}');--}}
                {{--$('#total_price').text(quantity * pricePerUnit);--}}
                {{--return false;--}}
                {{--});--}}

        let hide = false;
        $(document).on('click', '#show_less', function () {
            if (hide === false){
                $(this).text('Show More');
                $('#content').addClass('sr-only');
                hide = true;
            } else {
                $(this).text('Show Less');
                $('#content').removeClass('sr-only');
                hide = false;
            }
            return false;
        });

        $(document).on('click', '#quantity_minus', function () {
            let quantity = parseInt($('#quantity').text());
            if (quantity > 1) {
                quantity = quantity - 1;
                $('#quantity').text(quantity);
            } else {
                $.toast({
                    text : 'Quantity cannot be less than 1',
                    showHideTransition : 'slide',
                    bgColor : 'red',
                    textColor : '#eee',
                    allowToastClose : true,
                    hideAfter : 5000,
                    stack : 5,
                    textAlign : 'left',
                    position : 'bottom-left'
                });
            }
        });

        $(document).on('click', '#quantity_plus', function () {
            let quantity = parseInt($('#quantity').text());
            quantity = quantity + 1;
            $('#quantity').text(quantity);
        });




        $(document).on('click', '#add_to_cart', function () {
            let formData = new FormData();
            formData.append('_token', '{{ csrf_token() }}');
            formData.append('product_id', '{{ $product->id }}');
            formData.append('quantity', parseInt($('#quantity').text()));
            $.ajax({
                method: 'post',
                url: '{{ url('product/add/to/cart') }}',
                data: formData,
                processData: false,
                contentType: false,
                success: function (result) {
                    console.log(result);
                    $('#cart_counter').text(result.data);
                    $('#add_to_cart').text('View Cart').attr('id', 'view_cart');
                    $.toast({
                        text : result.message,
                        showHideTransition : 'slide',
                        bgColor : 'green',
                        textColor : '#eee',
                        allowToastClose : true,
                        hideAfter : 5000,
                        stack : 5,
                        textAlign : 'left',
                        position : 'bottom-left'
                    });

                },
                error: function (xhr) {
                    console.log(xhr)
                }
            });
        });

        $(document).on('click', '#place_an_order', function () {


            $.ajax({
                method: 'get',
                url: '{{ url('product/check/account/login/status') }}',
                success: function (result) {
                    console.log(result);
                    if (result.account_login_status === true) {
                        let formData = new FormData();
                        formData.append('_token', '{{ csrf_token() }}');
                        formData.append('product_id', '{{ $product->id }}');
                        formData.append('quantity', parseInt($('#quantity').text()));
                        $.ajax({
                            method: 'post',
                            url: '{{ url('product/add/to/cart') }}',
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function (result) {
                                console.log(result);
                                $('#cart_counter').text(result.data);
                                $('#add_to_cart').text('View Cart').attr('id', 'view_cart');
                                location = '{{ url('checkout') }}';
                            },
                            error: function (xhr) {
                                console.log(xhr)
                            }
                        });
                    } else {
                        whichAction = 'place_an_order'
                        $('#sign_in_modal').modal('show');
                    }
                },
                error: function (xhr) {
                    console.log(xhr)
                }
            });

        });

        $(document).on('click', '.checkout_as_guest', function () {
            let quantity = $('#quantity').val();
            let productId = '{{ $product->id }}';
            $.ajax({
                method: 'get',
                url: '{{ url('checkout/add/product') }}',
                data: {
                    quantity: quantity,
                    product_id: productId
                },

                success: function (result) {
                    console.log(result);
                    location = '{{ url('checkout') }}';
                },
                error: function (xhr) {
                    console.log(xhr)
                }
            });
        });

        $(document).on('click', '#add_to_watch', function () {



            $.ajax({
                method: 'get',
                url: '{{ url('product/check/account/login/status') }}',
                success: function (result) {
                    console.log(result);
                    if (result.account_login_status === true) {

                        let formData = new FormData();
                        formData.append('_token', '{{ csrf_token() }}');
                        formData.append('product_id', '{{ $product->id }}');
                        $.ajax({
                            method: 'post',
                            url: '{{ url('product/add/to/watch') }}',
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function (result) {
                                console.log(result);

                                $('#add_to_watch').text('View Watch List').attr('id', 'view_watch_list');
                                $.toast({
                                    text : result.message,
                                    showHideTransition : 'slide',
                                    bgColor : 'green',
                                    textColor : '#eee',
                                    allowToastClose : true,
                                    hideAfter : 5000,
                                    stack : 5,
                                    textAlign : 'left',
                                    position : 'bottom-left'
                                });
                            },
                            error: function (xhr) {
                                console.log(xhr)
                            }
                        });
                    } else {
                        whichAction = 'add_to_watch';
                        $('#sign_in_modal').modal('show');
                    }
                },
                error: function (xhr) {
                    console.log(xhr)
                }
            });

        });








    </script>
@endsection
