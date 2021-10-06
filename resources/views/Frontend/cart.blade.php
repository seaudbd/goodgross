@extends('Layouts.frontend')
@section('content')

    <style type="text/css">
        .page_identity_line {
            color: #333333;
        }
        .page_identity_line a {
            color: #999999;
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
                        <div class="page_identity_line">
                            <a href="{{ url('/') }}">Home</a> . Cart <sub>@if($cartCounter) {{ $cartCounter }} @else 0 @endif Item(s)</sub>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 col-xxl-12">
                        <div id="cart_item_container">

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="mt-3"></div>


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





    <script type="text/javascript">
        let whichAction;


        function loadCartItems() {
            $.ajax({
                method: 'get',
                url: '{{ url('cart/get/items') }}',

                success: function (result) {
                    console.log(result);
                    $('#cart_item_container').empty();
                    if (result.payload !== null && Object.keys(result.payload).length > 0) {
                        $('#cart_item_container').append(`
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-8">
                                    <div id="cart_items"></div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-4">
                                    <div id="cart_summary"></div>
                                </div>
                            </div>
                        `);
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



                            $('#cart_items').append(`

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

                        $('#cart_items').append(`

                            <div class="row d-none d-sm-none d-md-none d-lg-none d-xl-block d-xxl-block">
                                <div class="col">
                                    <hr style="color: #a5d4ba;">
                                    <div class="">Subtotal: <b>US $` + subtotal.toFixed(2) + `</b></div>
                                    <div class="mt-1">Shipping: <b>Free</b></div>
                                    <div class="mt-1">Estimated Tax: <b>US $0.00</b></div>
                                    <hr style="color: #a5d4ba;">
                                    <div class="">Grand Total : <b>US $` + subtotal.toFixed(2) + `</b></div>
                                    <div class="mt-4">
                                        <button class="btn primary_btn_default me-3 proceed_to_checkout">Proceed to Checkout</button>
                                        <button class="btn btn-outline-primary" style="background-color: #27a0ff1a; border-color: #27a0ff1a;">Continue Shopping</button>
                                    </div>
                                </div>
                            </div>

                        `);


                        $('#cart_summary').append(`
                            <div class="card border-0 shadow-sm">
                                <div class="card-body">
                                    <div class="card-title fw-bold">Order Summary</div>
                                    <hr style="color: #a5d4ba">
                                    <div class="">Subtotal: <b>US $` + subtotal.toFixed(2) + `</b></div>
                                    <div class="mt-1">Shipping: <b>Free</b></div>
                                    <div class="mt-1">Estimated Tax: <b>US $0.00</b></div>
                                    <hr style="color: #a5d4ba;">
                                    <div class="mb-3">Grand Total : <b>US $` + subtotal.toFixed(2) + `</b></div>
                                    <div class="mb-3 d-grid gap-3">
                                        <button class="btn primary_btn_default proceed_to_checkout">Proceed to Checkout</button>
                                        <button class="btn btn-outline-primary" style="background-color: #27a0ff1a; border-color: #27a0ff1a;">Continue Shopping</button>
                                    </div>
                                </div>
                            </div>

                        `);

                    } else {
                        $('#cart_item_container').append(`
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
            $("input[type='password']").focus(function(){
                $(this).parent().parent().find('.input-group-text').css("border-color", "rgba(82, 168, 236, 0.8)");
            });
            $("input[type='password']").focusout(function(){
                $(this).parent().parent().find('.input-group-text').css("border-color", "#ced4da");
            });
            loadCartItems();
        });

        $(document).on('click', '#password_show_hide', function () {
            if ($(this).prop('checked') === true) {
                $('#password').attr('type', 'text');
            } else {
                $('#password').attr('type', 'password');
            }
        });

        $(document).on('click', '.quantity_minus', function () {
            let quantity = parseInt($(this).next().text());

            if (quantity > 1) {
                quantity = quantity - 1;
                let itemId = $(this).data('item_id');
                $.ajax({
                    method: 'get',
                    url: '{{ url('cart/update/item/quantity') }}',
                    data: {
                        item_id: itemId,
                        quantity: quantity
                    },
                    success: function (result) {
                        console.log(result);
                        loadCartItems();

                    },
                    error: function (xhr) {
                        console.log(xhr)
                    }
                });

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

        $(document).on('click', '.quantity_plus', function () {
            let quantity = parseInt($(this).prev().text());
            quantity = quantity + 1;
            let itemId = $(this).data('item_id');
            $.ajax({
                method: 'get',
                url: '{{ url('cart/update/item/quantity') }}',
                data: {
                    item_id: itemId,
                    quantity: quantity
                },
                success: function (result) {
                    console.log(result);
                    loadCartItems()

                },
                error: function (xhr) {
                    console.log(xhr)
                }
            });
        });


        $(document).on('click', '.delete_item', function () {

            let itemId = $(this).data('item_id');
            $.ajax({
                method: 'get',
                url: '{{ url('cart/delete/item') }}',
                data: {
                    item_id: itemId
                },
                success: function (result) {
                    console.log(result);
                    $('#cart_counter').text(result.payload);
                    loadCartItems()

                },
                error: function (xhr) {
                    console.log(xhr)
                }
            });
        });


        $(document).on('click', '.proceed_to_checkout', function () {
            $.ajax({
                method: 'get',
                url: '{{ url('check/account/login/status') }}',
                success: function (loginStatusResult) {
                    console.log(loginStatusResult);
                    if (loginStatusResult.account_login_status === true) {
                        $.ajax({
                            method: 'get',
                            url: '{{ url('cart/copy/items/to/checkout') }}',
                            success: function (checkoutResult) {
                                console.log(checkoutResult);
                                $.ajax({
                                    method: 'get',
                                    url: '{{ url('is/shipping/address/available') }}',
                                    success: function (shippingAddressResult) {
                                        console.log(shippingAddressResult);
                                        if (shippingAddressResult.payload.length > 0) {
                                            location = '{{ url('checkout') }}';
                                        } else {
                                            location = '{{ url('delivery/address') }}';
                                        }
                                    },
                                    error: function (xhr) {
                                        console.log(xhr)
                                    }
                                });
                            },
                            error: function (xhr) {
                                console.log(xhr)
                            }
                        });
                    } else {
                        whichAction = 'proceed_to_checkout';
                        $('#sign_in_modal').modal('show');
                    }
                },
                error: function (xhr) {
                    console.log(xhr)
                }
            });
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
                success: function (authenticationResult) {
                    console.log(authenticationResult);
                    $('#sign_in_form_submit').removeClass('disabled');
                    $('#sign_in_form_submit_text').removeClass('sr-only');
                    $('#sign_in_form_submit_processing').addClass('sr-only');
                    if (authenticationResult.success === true) {


                        $('#sign_in_modal .btn-close').click();

                        $.ajax({
                            method: 'get',
                            url: '{{ url('regenerate/csrf/token') }}',
                            global: false,
                            success: function (token) {
                                console.log(token);

                                if (whichAction === 'proceed_to_checkout') {
                                    $.ajax({
                                        method: 'get',
                                        url: '{{ url('cart/copy/items/to/checkout') }}',
                                        success: function (checkoutResult) {
                                            console.log(checkoutResult);
                                            $.ajax({
                                                method: 'get',
                                                url: '{{ url('is/shipping/address/available') }}',
                                                success: function (shippingAddressResult) {
                                                    console.log(shippingAddressResult);
                                                    if (shippingAddressResult.payload.length > 0) {
                                                        location = '{{ url('checkout') }}';
                                                    } else {
                                                        location = '{{ url('delivery/address') }}';
                                                    }
                                                },
                                                error: function (xhr) {
                                                    console.log(xhr)
                                                }
                                            });
                                        },
                                        error: function (xhr) {
                                            console.log(xhr)
                                        }
                                    });

                                    {{--location = '{{ url('checkout') }}';--}}

                                } else {
                                    {{--let addToWatchFormData = new FormData();--}}
                                    {{--addToWatchFormData.append('_token', token);--}}
                                    {{--addToWatchFormData.append('product_id', '{{ $product->id }}');--}}
                                    {{--$.ajax({--}}
                                    {{--    method: 'post',--}}
                                    {{--    url: '{{ url('product/add/to/watch') }}',--}}
                                    {{--    data: addToWatchFormData,--}}
                                    {{--    processData: false,--}}
                                    {{--    contentType: false,--}}
                                    {{--    success: function (response) {--}}
                                    {{--        console.log(response);--}}


                                    {{--        $('#sign_in_modal .btn-close').click();--}}
                                    {{--        $('#add_to_watch').text('View Watch List').attr('id', 'view_watch_list');--}}
                                    {{--        $.toast({--}}
                                    {{--            text : result.message,--}}
                                    {{--            showHideTransition : 'slide',--}}
                                    {{--            bgColor : 'green',--}}
                                    {{--            textColor : '#eee',--}}
                                    {{--            allowToastClose : true,--}}
                                    {{--            hideAfter : 5000,--}}
                                    {{--            stack : 5,--}}
                                    {{--            textAlign : 'left',--}}
                                    {{--            position : 'bottom-left'--}}
                                    {{--        });--}}
                                    {{--        location.reload();--}}
                                    {{--    },--}}
                                    {{--    error: function (xhr) {--}}
                                    {{--        console.log(xhr)--}}
                                    {{--    }--}}
                                    {{--});--}}
                                }



                            },
                            error: function (xhr) {
                                console.log(xhr)
                            }
                        });

                    } else {
                        if (authenticationResult.message === 'Pending Account') {
                            location = '{{ url('email/verification') }}/' + authenticationResult.account.id;
                        } else {
                            $('#sign_in_form_message').text(authenticationResult.message).addClass('mb-3');
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













        {{--$(document).on('click', '.checkout_as_guest', function () {--}}
        {{--    $.ajax({--}}
        {{--        method: 'get',--}}
        {{--        url: '{{ url('cart/copy/product/to/checkout') }}',--}}
        {{--        success: function (result) {--}}
        {{--            console.log(result);--}}
        {{--            location = '{{ url('checkout') }}';--}}
        {{--        },--}}
        {{--        error: function (xhr) {--}}
        {{--            console.log(xhr)--}}
        {{--        }--}}
        {{--    });--}}
        {{--});--}}













    </script>
@endsection
