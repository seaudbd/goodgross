@extends('Layouts.public')
@section('content')

    <style type="text/css">
        .category_identity_line {
            color: #333333;
        }
        .category_identity_line a {
            color: #999999;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mx-auto">

                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3 category_identity_line">
                        <div class="border-bottom pb-2">
                            <a href="{{ url('/') }}">Home</a> . Cart [ <span>@if($cartCounter) {{ $cartCounter }} @else 0 @endif Item(s)</span> ]
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-3">
                        @if($cartItems)
                            <div class="row mt-3">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-8">
                                    @php
                                        $subtotal = 0;
                                    @endphp
                                    @foreach($cartItems as $cartItem)
                                        @php
                                            $subtotal += $cartItem->quantity * $cartItem->productProperties->where('property', 'Price')->first('value')->value;
                                        @endphp
                                        <div class="row">
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="secondary_background_color_default p-2">
                                                    <div class="row">
                                                        <div class="col-8">
                                                            <div>Seller: <span class="primary_text_color_default ">{{ $cartItem->account->business_name }}</span></div>
                                                            <div class="primary_text_color_default ">
                                                                <i class="mr-1 fas fa-star"></i><i class="mr-1 fas fa-star"></i><i class="mr-1 fas fa-star"></i><i class="mr-1 fas fa-star"></i><i class="mr-1 fas fa-star"></i>
                                                                (25)
                                                            </div>
                                                        </div>
                                                        <div class="col-4"><a href="{{ url('/') }}">Message to Seller</a></div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-8">
                                                <div class="row">
                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-4">
                                                        <img class="img-fluid" src="{{ asset('storage/' . $cartItem->productProperties->where('property', 'Image')->first('value')->value) }}" alt="{{ $cartItem->productProperties->where('property', 'Title')->first('value')->value }}">
                                                    </div>
                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-8">
                                                        <div class="mb-2 primary_text_color_default  font-weight-bold" style="font-size: 120%;">{{ $cartItem->productProperties->where('property', 'Title')->first('value')->value }}</div>
                                                        <div class="mb-2 small">{{ $cartItem->productProperties->where('property', 'Descriptive Title')->first('value')->value }}</div>
                                                        <div class="mb-2 font-weight-lighter">Industry: {{ $cartItem->account->type }}</div>
                                                        <div class="mb-2 font-weight-bold primary_text_color_default ">In Stock: {{ $cartItem->productProperties->where('property', 'Quantity')->first('value')->value }}</div>
                                                        <div  class="mb-2 font-weight-bold">Est. Delivery: {{ date_format($cartItem->created_at, 'Y-M-d') }}</div>
                                                        <div class="font-weight-bold">
                                                            <a href="{{ url('cart/delete/product') }}/{{ $cartItem->id }}">Delete</a> | <a href="#">Save for later</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-4">
                                                <div class="row">
                                                    <div class="col-7 font-weight-bold">Price Per Unit:</div>
                                                    <div class="col-5">US ${{ number_format($cartItem->productProperties->where('property', 'Price')->first('value')->value, 2) }}</div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-7 font-weight-bold">Quantity:</div>
                                                    <div class="col-5"><input type="number" class="form-control" style="height: calc(1.25em + .75rem + 2px);" id="qty" min="1" value="{{ $cartItem->productProperties->where('property', 'Quantity')->first('value')->value }}"></div>
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach
                                    <hr>
                                    <div class="row text-right">
                                        <div class="col">
                                            <p class="font-weight-lighter">Subtotal [{{ count($cartItems) }} Item(s)]: <b>US ${{ number_format($subtotal, 2) }}</b></p>
                                            <p class="font-weight-lighter">Shipping: <b>Free</b></p>
                                            <p class="font-weight-lighter">Estimated Tax: <b>US $0.00</b></p>
                                            <hr>
                                            <p class="font-weight-lighter">Total : <b>US ${{ number_format($subtotal, 2) }}</b></p>
                                        </div>
                                    </div>
                                    <div class="row my-2 float-right">
                                        <div class="col">
                                            <button class="btn btn-outline-primary" style="background-color: #E1EEFF; border: none; color: black">Continue Shopping</button>
                                            <button class="btn primary_btn_default proceed_to_checkout">Proceed to Checkout</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-4">
                                    <div class="border rounded p-3" style="border-color: #eeeeee">
                                        <p class="font-weight-lighter">Subtotal [{{ count($cartItems) }} Item(s)]: <b>US ${{ number_format($subtotal, 2) }}</b></p>
                                        <p class="font-weight-lighter">Shipping: <b>Free</b></p>
                                        <p class="font-weight-lighter">Estimated Tax: <b>US $0.00</b></p>
                                        <hr>
                                        <p class="font-weight-lighter">Total : <b>US ${{ number_format($subtotal, 2) }}</b></p>
                                        <div class="text-center">
                                            <button class="btn primary_btn_default proceed_to_checkout">Proceed to Checkout</button>
                                            <p class="font-weight-bolder my-2">Our Money Back Guarantee <a href="#">See Terms</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @else
                            <div class="row">
                                <div class="col alert alert-info">
                                    No Item Found!
                                </div>
                            </div>
                        @endif
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="mt-3"></div>
    <div class="modal" id="checkout_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-primary w-100 sign_in_to_checkout">Sign in to Checkout</button>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <button class="btn btn-info w-100 checkout_as_guest">Checkout as Guest</button>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col">
                            <button class="btn btn-danger w-100" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="modal" id="sign_in_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center primary_text_color_default  py-3 border-bottom" style="font-weight: bold;">Sign in to GoodGross</div>
                    <div style="padding: 30px 20px 20px 20px;">
                        <input type="hidden" id="password_show_hide_icon_status">
                        <div id="login_form_message" class="text-center text-danger" style="font-size: 0.9rem;"></div>
                        <form id="login_form">

                            <div class="row mb-3">
                                <div class="col">
                                    <input type="text" class="form-control" name="login_id" id="login_id" placeholder="User ID">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col">
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                        <div class="input-group-append">
                                            <span class="input-group-text" style="cursor: pointer;" id="password_show_hide_icon_holder"><i id="password_show_hide_icon" class="fas fa-eye"></i></span>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row mb-3">
                                <div class="col text-center">
                                    <button type="submit" class="btn primary_btn_default btn-sm pr-3 pl-3" style="font-weight: 500;" id="login_form_submit">Sign in</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col text-center">
                                    <div id="login_with"><span>Sign in with</span></div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col text-center">
                                    <a href="https://www.facebook.com"><i class="fab fa-facebook-square fa-2x" style="color: #3b5998;"></i></a>
                                    &nbsp;&nbsp;&nbsp;
                                    <a href="https://www.twitter.com"><i class="fab fa-twitter-square fa-2x" style="color: #00acee;"></i></a>
                                    &nbsp;&nbsp;&nbsp;
                                    <a href="https://www.plus.google.com"><i class="fab fa-google-plus-square fa-2x" style="color: #db4a39;"></i></a>
                                    &nbsp;&nbsp;&nbsp;
                                    <a href="https://www.plus.google.com"><i class="fab fa-linkedin fa-2x" style="color: #0e76a8;"></i></a>
                                </div>
                            </div>

                            <div class="row mb-4" style="font-size: 0.9rem;">
                                <div class="col">
                                    <a href="{{ url('forgot/password') }}" style="color: #000000;">Forgot Password?</a>
                                </div>
                                <div class="col text-right">
                                    <input type="checkbox"> Remember Me
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col text-center" style="font-size: 0.9rem;">
                                    Don't have an account? <a href="{{ url('register/personal') }}" style="color: #328C59;">Sign up</a>
                                </div>
                            </div>

                        </form>
                        <div class="row">
                            <div class="col"><button type="button" class="btn btn-info checkout_as_guest">Checkout as Guest</button></div>
                            <div class="col text-right"><button type="button" class="btn btn-danger" data-dismiss="modal">Close</button></div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).on('click', '.proceed_to_checkout', function () {
            $.ajax({
                method: 'get',
                url: '{{ url('check/account/login/status') }}',
                success: function (result) {
                    console.log(result);
                    if (result.account_login_status === true) {

                        $.ajax({
                            method: 'get',
                            url: '{{ url('cart/copy/product/to/checkout') }}',
                            success: function (result) {
                                console.log(result);
                                location = '{{ url('checkout') }}';
                            },
                            error: function (xhr) {
                                console.log(xhr)
                            }
                        });
                    } else {
                        $('#checkout_modal').modal('show');
                    }
                },
                error: function (xhr) {
                    console.log(xhr)
                }
            });
            return false;
        });

        $(document).on('click', '.checkout_as_guest', function () {
            $.ajax({
                method: 'get',
                url: '{{ url('cart/copy/product/to/checkout') }}',
                success: function (result) {
                    console.log(result);
                    location = '{{ url('checkout') }}';
                },
                error: function (xhr) {
                    console.log(xhr)
                }
            });
        });




        $(document).on('click', '.sign_in_to_checkout', function () {
            $('#checkout_modal').modal('hide');
            $('#sign_in_modal').modal('show');
            return false;
        });



        $(document).ready(function () {
            $('#password_show_hide_icon_status').val(0);
        });

        $(document).on('click', '#password_show_hide_icon_holder', function () {
            let value = parseInt($('#password_show_hide_icon_status').val());
            if (value === 0) {
                $('#password').attr('type', 'text');
                $('#password_show_hide_icon_status').val(1);
                $(this).children('i').removeClass('fa-eye').addClass('fa-eye-slash');
            } else {
                $('#password').attr('type', 'password');
                $('#password_show_hide_icon_status').val(0);
                $(this).children('i').removeClass('fa-eye-slash').addClass('fa-eye');
            }
            return false;

        });

        $(document).on('submit', '#login_form', function() {
            $('#login_form_message').empty();
            let formData = new FormData(this);
            formData.append('_token', '{{ csrf_token() }}');
            $.ajax({
                method: 'post',
                url: '{{ url('login') }}',
                data: formData,
                contentType: false,
                processData: false,
                success: function (result) {
                    console.log(result);
                    if (result.message === 'Authorized Account Access') {
                        location = '{{ url('checkout') }}';
                    } else if (result.message === 'Account Status Pending Found') {
                        location = '{{ url('load/email/verification') }}/' + result.account.id;
                    } else {
                        $('#login_form_message').text(result.message);
                    }
                },
                error: function (xhr) {
                    console.log(xhr);
                    if (xhr.responseJSON.hasOwnProperty('errors')) {
                        if (xhr.responseJSON.errors.hasOwnProperty('login_id') || xhr.responseJSON.errors.hasOwnProperty('password')) {
                            $('#login_form_message').text('Unauthorized Access!');
                        }
                    }
                }
            });
            return false;
        });



    </script>
@endsection
