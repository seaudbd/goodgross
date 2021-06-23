<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }} | {{ env('APP_NAME') }}</title>
    <link rel="shortcut icon" href="{{ asset('storage/img/application/favicon.ico') }}">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/jquery.toast.min.css') }}">
    <script src="{{ asset('js/jquery.toast.min.js') }}"></script>


    {{--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">--}}
    {{--<link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" rel="stylesheet">--}}

    {{--<link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css" rel="stylesheet">--}}
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <link href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" rel="stylesheet">
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    {{--<link href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" rel="stylesheet">--}}

    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js"></script>
    {{--<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">--}}
    {{--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">--}}





    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>


    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
    {{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>--}}
    {{--<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>--}}

    {{--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>--}}
    {{--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.7/jquery.jgrowl.min.js"></script>--}}
    {{--<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>--}}
    {{--<script src="{{ asset('js/tinymce/tinymce.min.js') }}" type="text/javascript"></script>--}}


    <script src="https://www.google.com/recaptcha/api.js?render={{ env('RECAPTCHA_SITE_KEY') }}"></script>








    <style type="text/css">



        .ui-slider-horizontal {
            height: 1px;
            border: none;
            background: #ccc;
        }

        .ui-slider-handle {
            outline: 0;
            border-radius: 50%;
            top: -.6em !important;
        }


        /*////////////////////////////////////////////////////////General///////////////////////////////////////////////////*/
        .grecaptcha-badge {
            visibility: hidden;
        }

        body {
            font-family: 'Roboto';
            color: #636363;
            background-color: #f8f8f8;
        }

        .col-xxl-12 {

            max-width: 1750px !important;
        }

        label {
            color: #636363;
            font-size: 14px;
        }

        .form-control {
            color: #636363;
            font-size: 14px;
        }

        .form-select {
            color: #636363;
            font-size: 14px;
        }

        .input-group-text {
            color: #636363;
            font-size: 14px;
        }

        input[type="text"]:focus, input[type="password"]:focus, select:focus, textarea:focus {
            border-color: rgba(82, 168, 236, 0.8);
            outline: none !important;
            -webkit-box-shadow: none !important;
            -moz-box-shadow: none !important;
            box-shadow: none !important;
        }

        .form-floating>.form-select {
            padding-top: 1.625rem;
            padding-bottom: .25rem;
            color: #636363;
        }

        .form-select:disabled {
            background-color: rgba(250, 250, 250, 0.51);
        }

        .form-control:disabled, .form-control[readonly] {
            background-color: rgba(250, 250, 250, 0.51);
        }

        .btn.disabled, .btn:disabled, fieldset:disabled .btn {
            pointer-events: none;
            opacity: 1;
        }

        .input_group_text_invalid_border_color {
            border-color: #dc3545 !important;
        }

        .primary_text_color_default  {
            color: #328C59;
        }

        .secondary_text_color_default  {
            color: #e9f5f2;
        }

        .footer_link_text_color {
            color: #3e8473;
        }

        .primary_background_color_default {
            background-color: #328C59;
        }

        .secondary_background_color_default {
            background-color: #e9f5f2;
        }


        .primary_btn_default {
            background-color: #328C59;
            color: #ffffff;
            border-radius: 2px;
        }

        .secondary_btn_default {
            background-color: #e9f5f2;
            color: #ffffff;
            border-radius: 2px;
        }



        /*////////////////////////////////////////Header///////////////////////////////////////////////*/


        #user_dropdown::after {
            display: none;
        }

        #notification_dropdown::after {
            display: none;
        }

        /*#cart_icon::after {*/
            /*border-right: none;*/
            /*border-bottom: 0;*/
            /*border-left: none;*/
        /*}*/

        #search_input:focus {
            border-color: #ced4da;
            outline: none !important;
            -webkit-box-shadow: none !important;
            -moz-box-shadow: none !important;
            box-shadow: none !important;
        }
        #search_input::-webkit-input-placeholder {
            font-size: 14px !important;
        }

        @media only screen and (min-width: 768px) {
            #top_right_nav {
                text-align: right;
                padding-top: 0;
            }
        }

        @media only screen and (max-width: 767px) {
            #top_right_nav {
                text-align: center;
                padding-top: 15px;
            }
        }

        @media only screen and (max-width: 1199px) {
            #logo {
                text-align: center;
                padding-bottom: 15px;
            }
        }

        /*#top_right_nav a {*/
            /*color: white;*/
        /*}*/

        @keyframes shadow-pulse
        {
            0% {
                box-shadow: -1px -1px 10px 10px #ff4f1b;;
            }
            100% {
                box-shadow: 0 0 0 1px #1e4580;
            }
        }

        #post_product_button {
            background: linear-gradient(-30deg, #0b3d24 50%, #082b1a 50%);
            padding: 12px 20px;

            display: inline-block;
            -webkit-transform: translate(0%, 0%);
            transform: translate(0%, 0%);
            overflow: hidden;
            color: #d4f7e6;

            letter-spacing: 2.5px;
            text-align: center;

            text-decoration: none;
            -webkit-box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);
            border-radius: 5px;
        }

        #post_product_button::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #85ad99;
            opacity: 0;
            -webkit-transition: .2s opacity ease-in-out;
            transition: .2s opacity ease-in-out;
        }

        #post_product_button:hover::before {
            opacity: 0.2;
        }

        #post_product_button span {
            position: absolute;
        }

        @if(\Illuminate\Support\Facades\Route::current()->uri() !== 'post/product')

                                    #post_product_button span:nth-child(1) {
            top: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: -webkit-gradient(linear, right top, left top, from(rgba(8, 43, 26, 0)), to(#26d980));
            background: linear-gradient(to left, rgba(8, 43, 26, 0), #26d980);
            -webkit-animation: 2s animateTop linear infinite;
            animation: 2s animateTop linear infinite;
        }

        @keyframes animateTop {
            0% {
                -webkit-transform: translateX(100%);
                transform: translateX(100%);
            }
            100% {
                -webkit-transform: translateX(-100%);
                transform: translateX(-100%);
            }
        }

        #post_product_button span:nth-child(2) {
            top: 0;
            right: 0;
            height: 100%;
            width: 2px;
            background: -webkit-gradient(linear, left bottom, left top, from(rgba(8, 43, 26, 0)), to(#26d980));
            background: linear-gradient(to top, rgba(8, 43, 26, 0), #26d980);
            -webkit-animation: 2s animateRight linear -1s infinite;
            animation: 2s animateRight linear -1s infinite;
        }

        @keyframes animateRight {
            0% {
                -webkit-transform: translateY(100%);
                transform: translateY(100%);
            }
            100% {
                -webkit-transform: translateY(-100%);
                transform: translateY(-100%);
            }
        }

        #post_product_button span:nth-child(3) {
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: -webkit-gradient(linear, left top, right top, from(rgba(8, 43, 26, 0)), to(#26d980));
            background: linear-gradient(to right, rgba(8, 43, 26, 0), #26d980);
            -webkit-animation: 2s animateBottom linear infinite;
            animation: 2s animateBottom linear infinite;
        }

        @keyframes animateBottom {
            0% {
                -webkit-transform: translateX(-100%);
                transform: translateX(-100%);
            }
            100% {
                -webkit-transform: translateX(100%);
                transform: translateX(100%);
            }
        }

        #post_product_button span:nth-child(4) {
            top: 0;
            left: 0;
            height: 100%;
            width: 2px;
            background: -webkit-gradient(linear, left top, left bottom, from(rgba(8, 43, 26, 0)), to(#26d980));
            background: linear-gradient(to bottom, rgba(8, 43, 26, 0), #26d980);
            -webkit-animation: 2s animateLeft linear -1s infinite;
            animation: 2s animateLeft linear -1s infinite;
        }

        @keyframes animateLeft {
            0% {
                -webkit-transform: translateY(-100%);
                transform: translateY(-100%);
            }
            100% {
                -webkit-transform: translateY(100%);
                transform: translateY(100%);
            }
        }

        @endif


        .category_identity_line {
            color: #333333;
            font-size: 14px;
        }
        .category_identity_line a {
            color: #999999;
        }

        .category_identity_line span {
            color: #636363;
        }

        .slick-dots li button:before {
            font-size: 12px;
        }

</style>
</head>
<body>

    <div class="container-fluid primary_background_color_default">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mx-auto">

                <div class="row pt-4 pb-4">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-4 pt-1" id="logo">
                        <a href="{{ url('/') }}"><span style="cursor: pointer; height: 30px;"><img src="{{ asset('storage/img/application/logo.png') }}" height="30"></span></a>
                    </div>

                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-8">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6">
                                <div class="input-group">
                                    <div class="input-group-text" id="search_filter" style="background-color: #ffffff; border-right: none;">
                                        <select class="form-select" id="search_filter_options" style="border: none; color: #636363;">
                                            <optgroup>
                                                <option value="">All</option>
                                                <option value="">Retail</option>
                                                <option value="">Wholesale</option>
                                            </optgroup>

                                        </select>
                                    </div>

                                    <input class="form-control" id="search_input" type="text" aria-describedby="search_filter search_button" placeholder="Search here..." style="border-left: none; border-right: none;">
                                    <div class="input-group-text" id="search_button" style="background-color: #ffffff; cursor: pointer;">
                                        <i class="fas fa-search primary_text_color_default"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6" id="top_right_nav">

                                <div class="row justify-content-end">
                                    <div class="col-sm-auto">
                                        <a href="{{ url('post/product') }}" id="post_product_button">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                            Post a Product
                                        </a>
                                    </div>
                                    <div class="col-sm-auto" style="padding-top: 12px;">
                                        @if( ! auth()->check() )
                                            <div class="d-inline-block">
                                                <a href="{{ url('account/sign/in') }}" class="text-decoration-none text-white">Sign in</a>
                                            </div>
                                            <div class="d-inline-block ms-3">
                                                <a href="{{ url('registration') }}" class="text-decoration-none text-white">Register</a>
                                            </div>
                                        @else
                                            <div class="dropdown d-inline-block">
                                                <i class="fas fa-bell dropdown-toggle" id="notification_dropdown" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 24px; color: #ffffff; cursor: pointer;"></i>
                                                <span class="badge bg-danger" style="margin-left: -8px; padding: .25em .5em;">{{ count(auth()->user()->notifications->where('is_dismissed', 0)) }}</span>
                                                <ul class="dropdown-menu dropdown-menu-end" style="padding: 0; border: 0;" aria-labelledby="notification_dropdown">
                                                    @foreach(auth()->user()->notifications as $notification)
                                                        @if($notification->is_dismissed === 0)
                                                            <li class="list-group-item" style="font-size: 14px;"><a class="dropdown-item" href="{{ url('member/profile') }}">{{ $notification->notification }}</a></li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>



                                            <div class="dropdown d-inline-block ms-3">

                                                <div class="dropdown-toggle" style="background-color: transparent; cursor: pointer;" id="user_dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                                    @if(auth()->user()->avatar !== null)
                                                        <div style="padding: 1px; border-radius: 50%; border: 1px solid #ffffff;">
                                                            <img src="{{ asset('storage/' . auth()->user()->avatar) }}" style="height: 25px; width: 25px; border-radius: 50%;">
                                                        </div>
                                                    @else
                                                        <i class="far fa-user-circle text-white" style="font-size: 24px;"></i>
                                                    @endif
                                                </div>
                                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="user_dropdown">
                                                    <li style="font-size: 14px;"><a class="dropdown-item" href="{{ url('account/profile') }}">Profile</a></li>
                                                    <li style="font-size: 14px;"><a class="dropdown-item" href="{{ url('account/sign/out') }}">Sign out</a></li>
                                                </ul>
                                            </div>

                                        @endif
                                            <div class="d-inline-block ms-3">
                                                <i class="fas fa-shopping-cart" id="cart_icon" style="font-size: 22px; color: #ffffff; cursor: pointer;"></i>
                                                <span class="badge bg-danger" style="margin-left: -8px; padding: .25em .5em;" id="cart_counter">{{ $cartCounter > 0 ? $cartCounter : '' }}</span>
                                            </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>





            </div>
        </div>
    </div>


    @yield('content')



    <div class="container-fluid" style="background-color: #f8f8f8;">
        <div class="row py-5">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mx-auto">

                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                        <div>
                            <a href="{{ url('/') }}"><img src="{{ asset('storage/img/application/logo_with_slogan.png') }}" height="50"></a>
                        </div>
                        <div class="mt-5">
                            <span class="me-3 small text-muted">Follow us on</span>
                            <a href="https://www.facebook.com" class="me-3"><i class="fab fa-facebook-f" style="color: #3b5998; font-size: 20px;"></i></a>
                            <a href="https://www.twitter.com" class="me-3"><i class="fab fa-twitter" style="color: #00acee; font-size: 20px;"></i></a>
                            <a href="https://www.instagram.com" class="me-3"><i class="fab fa-instagram" style="color: #3f729b; font-size: 20px;"></i></a>
                            <a href="https://www.linkedin.com"><i class="fab fa-linkedin-in" style="font-size: 20px; color: #0e76a8;"></i></a>
                        </div>



                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                        <div class="row">

                            <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                                <div class="fw-bold text-dark">Customer Service</div>
                                <ul class="list-unstyled">
                                    <li><a href="#" class="text-decoration-none small footer_link_text_color">Help Center</a></li>
                                    <li><a href="#" class="text-decoration-none small footer_link_text_color">Contact Us</a></li>
                                    <li><a href="#" class="text-decoration-none small footer_link_text_color">Report Abuse</a></li>
                                    <li><a href="#" class="text-decoration-none small footer_link_text_color">Submit a Dispute</a></li>
                                    <li><a href="#" class="text-decoration-none small footer_link_text_color">Policies & Rules</a></li>
                                    <li><a href="#" class="text-decoration-none small footer_link_text_color">Get Paid for Feedback</a></li>
                                </ul>
                            </div>

                            <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                                <div class="fw-bold text-dark">Buy on GoodGross</div>
                                <ul class="list-unstyled">
                                    <li><a href="#" class="text-decoration-none small footer_link_text_color">All Categories</a></li>
                                    <li><a href="#" class="text-decoration-none small footer_link_text_color">Wholesale Product</a></li>
                                    <li><a href="#" class="text-decoration-none small footer_link_text_color">Retail Product</a></li>
                                    <li><a href="#" class="text-decoration-none small footer_link_text_color">Request for Quotation</a></li>
                                    <li><a href="#" class="text-decoration-none small footer_link_text_color">Ready to Ship</a></li>
                                </ul>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                                <div class="fw-bold text-dark">Sell on GoodGross</div>
                                <ul class="list-unstyled">
                                    <li><a href="#" class="text-decoration-none small footer_link_text_color">Supplier Membership</a></li>
                                    <li><a href="#" class="text-decoration-none small footer_link_text_color">Manufacturer Association</a></li>
                                    <li><a href="#" class="text-decoration-none small footer_link_text_color">Learning Center</a></li>
                                    <li><a href="#" class="text-decoration-none small footer_link_text_color">Partner Program</a></li>
                                    <li><a href="#" class="text-decoration-none small footer_link_text_color">Policies & Rules</a></li>
                                    <li><a href="#" class="text-decoration-none small footer_link_text_color">Reward for Seller</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>





                <div class="row mt-5">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mx-auto" style="border: 1px solid #f3f3f3;"></div>
                </div>

                <div class="row mt-5">
                    <div class="col text-center">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="#" class="text-decoration-none">
                                    <i class="far fa-circle text-secondary"></i>
                                    <span class="footer_link_text_color small">Product Listing Policy</span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-decoration-none">
                                    <i class="far fa-circle text-secondary"></i>
                                    <span class="footer_link_text_color small">Intellectual Property Protection</span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-decoration-none">
                                    <i class="far fa-circle text-secondary"></i>
                                    <span class="footer_link_text_color small">Privacy Policy</span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#" class="text-decoration-none">
                                    <i class="far fa-circle text-secondary"></i>
                                    <span class="footer_link_text_color small">Terms of Use</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>


                <div class="row mt-3">
                    <div class="col text-center small">
                        <span class="small text-muted">&copy; 2016-{{ date('Y') }} GoodGross</span>
                    </div>
                </div>



            </div>
        </div>
    </div>

    <style type="text/css">
        #ajax_loading{
            position: fixed;
            top: 0;
            z-index: 100;
            width: 100%;
            height:100%;
            display: none;
            background: rgba(0,0,0,0.6);
        }
        .ajax_loading_spinner {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .loading_spinner {
            width: 40px;
            height: 40px;
            border: 4px #ddd solid;
            border-top: 4px #2e93e6 solid;
            border-radius: 50%;
            animation: sp-anime 0.8s infinite linear;
        }
        @keyframes sp-anime {
            100% {
                transform: rotate(360deg);
            }
        }
    </style>

    <div id="ajax_loading">
        <div class="ajax_loading_spinner">
            <span class="loading_spinner"></span>
        </div>
    </div>




    <script type="text/javascript">

        $(document).ajaxStart(function() {
            $("#ajax_loading").fadeIn(0);
        });

        $(document).ajaxStop(function () {
            $("#ajax_loading").fadeOut(300);
        });



    </script>








</body>
</html>
