<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $title }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('storage/img/application/favicon.ico') }}" />


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>


    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.8.0/themes/smoothness/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.8.0/jquery-ui.min.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">


    <link rel="stylesheet" href="{{ asset('css/jquery.gpopover.css') }}">
    <script src="{{ asset('js/jquery.gpopover.js') }}"></script>

    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>

    <script src="{{ asset('js/bootstrap-multiselect.js') }}" type="text/javascript"></script>
    <link href="{{ asset('css/bootstrap-multiselect.css') }}" rel="stylesheet" type="text/css">

    <script src="{{ asset('js/tinymce/tinymce.min.js') }}"></script>

    <script src="{{ asset('js/jquery.toaster.js') }}" type="text/javascript"></script>


    <style type="text/css">

        /* //////////////////General Control///////////////////// */

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







        /* //////////////////End of General Control///////////////////// */

        /* //////////////////Header Control///////////////////// */

        .gpopover {
            background-color: #0c8155;
            border:1px solid #0c8155;
            border-radius:10px;
            box-shadow:0 2px 8px rgba(0,0,0,0.1);
            display:none;
            padding:12px;
            position:absolute;
            z-index:998;
        }

        .gpopover .gpopover-arrow {
            border:8px solid transparent;
            border-bottom-color:#0c8155;
            border-top-width:0;
            height:0;
            position:absolute;
            width:0;
            z-index:999;
        }



        .account_popover_list_item {
            cursor: pointer; background-color: #0c8155; padding: 20px 15px 20px 30px; border: 0; font-weight: 600; color: #ffffff;
        }

        .account_popover_list_item:hover {
            border-left: 5px solid #ffffff;
        }


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
                padding-top: 5px;
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

        #top_right_nav a {
            color: white;
        }






        @keyframes shadow-pulse
        {
            0% {
                box-shadow: -1px -1px 10px 10px #ff4f1b;;
            }
            100% {
                box-shadow: 0 0 0 1px #1e4580;
            }
        }


        #notification_count {
            font-size: 12px;
            background: #ff0000;
            color: #fff;
            padding: 1px 5px;
            vertical-align: top;
            margin-left: -10px;
        }


        #notification_link:after {
            content: none;
        }


        /* //////////////////End of Header Control///////////////////// */


        /* //////////////////Footer Control///////////////////// */

        .customer_service_list, .about_us_list, .buy_on_goodgross_list, .sell_on_goodgross_list {
            padding: 0;
        }

        .customer_service_list > li, .about_us_list > li, .buy_on_goodgross_list > li, .sell_on_goodgross_list > li {
            list-style-type: none;
        }

        .customer_service_list > li > a, .about_us_list > li > a, .buy_on_goodgross_list > li > a, .sell_on_goodgross_list > li > a {
            font-size: small;
            color: #00a8e8;
        }
        /* //////////////////End of Footer Control///////////////////// */













        #off_canvas_menu_holder {
          height: 100%;
          width: 0;
          position: fixed;
          z-index: 1;
          top: 0;
          left: 0;
          background-color: #165839;
          overflow-x: hidden;
          transition: 0.5s;
          padding-top: 60px;
          padding-bottom: 30px;

        }


        .off_canvas_menu_close_btn {
          position: absolute;
          top: 0;
          right: 25px;
          font-size: 36px;
          margin-left: 50px;
        }

        #off_canvas_menu_bars_icon {
          transition: margin-left .5s;
          padding: 16px;
        }





        #left_menu ul li, #off_canvas_menu ul li {
            list-style-type: none;
        }
        #left_menu a, #off_canvas_menu a {
            color: black;
        }


        #off_canvas_menu .card {
            border-radius: 0;
        }

        .active_menu_bg {
            background: linear-gradient(75deg, #3d7d59, #4e1f2ea6);
        }
        .active_menu_bg a {
            color: #cc8741 !important;
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
                                <a href="{{ url('post/product') }}" class="text-decoration-none me-3" style="background: linear-gradient(90deg,#37cc2e,darkblue); background-size: 200%; padding: 10px 15px; border-radius: 7px; box-shadow: 0 0 5px -2px salmon;"><i class="far fa-star" style="color: #d2680de6;"></i> Post a Product</a>
                                <div class="dropdown d-inline-block">
                                    <a href="javascript:void(0)" class="dropdown-toggle" id="notification_link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="far fa-bell" style="font-size: 1.2rem;"></i>
                                        <span class="badge badge-warning" id="notification_count"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right p-0" style="width: 400px;" aria-labelledby="notification_link" id="notification_item">

                                    </div>
                                </div>

                                <div class="d-inline-block me-3">
                                    <div id="cart_icon" style="cursor: pointer;"><i class="fas fa-shopping-cart text-white"></i></div>
                                    <div id="cart_icon_hidden_area"></div>
                                    <div id="cart_counter_label" style="margin-top: -35px; margin-left: 20px; background-color: gainsboro; padding: 0 8px; border-radius: 5px; font-size: 12px;">{{ $cartCounter }}</div>
                                </div>
                                <a href="#" style="cursor: pointer;" id="account_popover" data-popover="account_popover_content"><i class="far fa-user-circle text-white" style="font-size: 22px;"></i></a>
                                <div id="account_popover_content" class="gpopover">
                                    <ul class="list-group" style="text-align: left;">
                                        <li class="list-group-item account_popover_list_item"><i class="far fa-user me-3"></i>Profile</li>
                                        <li class="list-group-item account_popover_list_item"><i class="fas fa-cog me-3"></i>Settings</li>
                                        <li class="list-group-item account_popover_list_item"><a href="{{ url('account/panel/sign/out') }}" class="text-decoration-none text-white"><i class="fas fa-sign-out-alt me-3"></i>Sign out</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





            </div>
        </div>
    </div>



    <div style="height: 10px;"></div>
    <div class="container-fluid">
        <div class="row mb-5">
            <div class="col-12 col-sm-12 col-md-11 col-lg-11 col-xl-10 mx-auto">

                <div class="row">
                    <div class="col-12 col-sm-12 col-md-3">

                        <div id="left_menu">
                            <div class="card">
                                <div class="card-header @if($activeNav === 'Dashboard') active_menu_bg @else bg-white @endif">
                                    <i class="fas fa-cog"></i> <a href="{{ url('account/dashboard') }}">Account Settings</a>
                                </div>
                            </div>

                            {{--@if($accountDetails->type !== 'Personal')--}}
                                {{--<div class="card">--}}
                                    {{--<div class="card-header @if($activeNav === 'My Posting Pending' || $activeNav === 'My Posting Approved' || $activeNav === 'My Posting Declined') active_menu_bg @else bg-white @endif">--}}
                                        {{--<i class="fas fa-hand-holding-usd"></i> <a class="collapsed card-link" data-toggle="collapse" href="#my_posting">My Posting</a>--}}
                                    {{--</div>--}}
                                    {{--<div id="my_posting" class="collapse @if($activeNav === 'My Posting Pending' || $activeNav === 'My Posting Approved' || $activeNav === 'My Posting Declined') show @endif" data-parent="#left_menu">--}}
                                        {{--<div class="card-body pl-3">--}}
                                            {{--<ul>--}}
                                                {{--<li><a href="{{ url('account/my/posting/pending') }}" @if($activeNav === 'My Posting Pending') style="color: #328C59;" @endif>Pending ({{ $myPostingPending }})</a></li>--}}
                                                {{--<li><a href="{{ url('account/my/posting/approved') }}" @if($activeNav === 'My Posting Approved') style="color: #328C59;" @endif>Approved ({{ $myPostingApproved }})</a></li>--}}
                                                {{--<li><a href="{{ url('account/my/posting/declined') }}" @if($activeNav === 'My Posting Declined') style="color: #328C59;" @endif>Declined ({{ $myPostingDeclined }})</a></li>--}}
                                            {{--</ul>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--@endif--}}

                            <div class="card">
                                <div class="card-header bg-white">
                                    <i class="fas fa-shopping-bag"></i> <a class="collapsed card-link" data-toggle="collapse" href="#my_buying">My Buying</a>
                                </div>
                                <div id="my_buying" class="collapse" data-parent="#left_menu">
                                    <div class="card-body">
                                        <ul>
                                            <li><a href="#">Watched</a></li>
                                            <li><a href="#">Purchase History</a></li>
                                            <li><a href="#">Archived</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            {{--@if($accountDetails->type !== 'Personal')--}}
                                {{--<div class="card">--}}
                                    {{--<div class="card-header @if($activeNav === 'My Selling Active' || $activeNav === 'My Selling Sold') active_menu_bg @else bg-white @endif">--}}
                                        {{--<i class="fas fa-hand-holding-usd"></i> <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">My Selling</a>--}}
                                    {{--</div>--}}
                                    {{--<div id="collapseThree" class="collapse" data-parent="#left_menu">--}}
                                        {{--<div class="card-body pl-3">--}}
                                            {{--<ul>--}}
                                                {{--<li><a href="{{ url('account/my/selling/active') }}" @if($activeNav === 'My Selling Active') style="color: #328C59;" @endif>Active</a></li>--}}
                                                {{--<li><a href="{{ url('account/my/selling/sold') }}" @if($activeNav === 'My Selling Sold') style="color: #328C59;" @endif>Sold</a></li>--}}
                                            {{--</ul>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                {{--<div class="card">--}}
                                    {{--<div class="card-header @if($activeNav === 'My Payment') active_menu_bg @else bg-white @endif">--}}
                                        {{--<i class="fas fa-wallet"></i> <a href="{{ url('account/my/payment') }}">My Payment</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--@endif--}}

                            <div class="card">
                                <div class="card-header @if($activeNav === 'Messages Inbox' || $activeNav === 'Messages Sent' || $activeNav === 'Messages Trash') active_menu_bg @else bg-white @endif">
                                    <i class="fas fa-envelope"></i> <a class="collapsed card-link" data-toggle="collapse" href="#collapseFour">Messages</a>
                                </div>
                                <div id="collapseFour" class="collapse" data-parent="#left_menu">
                                    <div class="card-body">
                                        <ul>
                                            <li><a href="{{ url('account/messages/inbox') }}" @if($activeNav === 'Messages Inbox') style="color: #328C59;" @endif>Inbox</a></li>
                                            <li><a href="{{ url('account/messages/sent') }}" @if($activeNav === 'Messages Sent') style="color: #328C59;" @endif>Sent</a></li>
                                            <li><a href="{{ url('account/messages/trash') }}" @if($activeNav === 'Messages Trash') style="color: #328C59;" @endif>Trash</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header @if($activeNav === 'Addresses') active_menu_color @else bg-white @endif">
                                    <i class="far fa-address-card"></i> <a href="{{ url('account/addresses') }}">Addresses</a>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header @if($activeNav === 'Feedback') active_menu_bg @else bg-white @endif">
                                    <i class="far fa-comment-alt"></i> <a href="{{ url('account/feedback') }}">Feedback</a>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header @if($activeNav === 'Notification') active_menu_bg @else bg-white @endif">
                                    <i class="fas fa-bell"></i>
                                    <a href="{{ url('account/notification') }}" class="notification_left_menu">
                                        Notification
                                    </a>
                                </div>
                            </div>
                            
                        </div>




                        

                        <div class="sr-only" id="off_canvas_menu">
                       

                            <div id="off_canvas_menu_holder">
                                <a href="javascript:void(0)" class="off_canvas_menu_close_btn" onclick="closeNav()">&times;</a>


                                <div class="card">
                                    <div class="card-header @if($activeNav === 'Dashboard') active_menu_bg @else bg-white @endif">
                                        <i class="fas fa-cog"></i> <a href="{{ url('account/dashboard') }}">Account Settings</a>
                                    </div>
                                </div>

                                {{--@if($accountDetails->type !== 'Personal')--}}
                                    {{--<div class="card">--}}
                                        {{--<div class="card-header @if($activeNav === 'My Posting Pending' || $activeNav === 'My Posting Approved' || $activeNav === 'My Posting Declined') active_menu_bg @else bg-white @endif">--}}
                                            {{--<i class="fas fa-hand-holding-usd"></i> <a class="collapsed card-link" data-toggle="collapse" href="#my_posting">My Posting</a>--}}
                                        {{--</div>--}}
                                        {{--<div id="my_posting" class="collapse @if($activeNav === 'My Posting Pending' || $activeNav === 'My Posting Approved' || $activeNav === 'My Posting Declined') show @endif" data-parent="#off_canvas_menu">--}}
                                            {{--<div class="card-body pl-3">--}}
                                                {{--<ul>--}}
                                                    {{--<li><a href="{{ url('account/my/posting/pending') }}" @if($activeNav === 'My Posting Pending') style="color: #328C59;" @endif>Pending ({{ $myPostingPending }})</a></li>--}}
                                                    {{--<li><a href="{{ url('account/my/posting/approved') }}" @if($activeNav === 'My Posting Approved') style="color: #328C59;" @endif>Approved ({{ $myPostingApproved }})</a></li>--}}
                                                    {{--<li><a href="{{ url('account/my/posting/declined') }}" @if($activeNav === 'My Posting Declined') style="color: #328C59;" @endif>Declined ({{ $myPostingDeclined }})</a></li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--@endif--}}

                                <div class="card">
                                    <div class="card-header bg-white">
                                        <i class="fas fa-shopping-bag"></i> <a class="collapsed card-link" data-toggle="collapse" href="#my_buying">My Buying</a>
                                    </div>
                                    <div id="my_buying" class="collapse" data-parent="#off_canvas_menu">
                                        <div class="card-body">
                                            <ul>
                                                <li><a href="#">Watched</a></li>
                                                <li><a href="#">Purchase History</a></li>
                                                <li><a href="#">Archived</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                {{--@if($accountDetails->type !== 'Personal')--}}
                                    {{--<div class="card">--}}
                                        {{--<div class="card-header @if($activeNav === 'My Selling Active' || $activeNav === 'My Selling Sold') active_menu_bg @else bg-white @endif">--}}
                                            {{--<i class="fas fa-hand-holding-usd"></i> <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">My Selling</a>--}}
                                        {{--</div>--}}
                                        {{--<div id="collapseThree" class="collapse @if($activeNav === 'My Selling Active' || $activeNav === 'My Selling Sold') show @endif" data-parent="#off_canvas_menu">--}}
                                            {{--<div class="card-body pl-3">--}}
                                                {{--<ul>--}}
                                                    {{--<li><a href="{{ url('account/my/selling/active') }}" @if($activeNav === 'My Selling Active') style="color: #328C59;" @endif>Active</a></li>--}}
                                                    {{--<li><a href="{{ url('account/my/selling/sold') }}" @if($activeNav === 'My Selling Sold') style="color: #328C59;" @endif>Sold</a></li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    {{--<div class="card">--}}
                                        {{--<div class="card-header @if($activeNav === 'My Payment') active_menu_bg @else bg-white @endif">--}}
                                            {{--<i class="fas fa-wallet"></i> <a href="{{ url('account/my/payment') }}">My Payment</a>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--@endif--}}

                                <div class="card">
                                    <div class="card-header @if($activeNav === 'Messages Inbox' || $activeNav === 'Messages Sent' || $activeNav === 'Messages Trash') active_menu_bg @else bg-white @endif">
                                        <i class="fas fa-envelope"></i> <a class="collapsed card-link" data-toggle="collapse" href="#collapseFour">Messages</a>
                                    </div>
                                    <div id="collapseFour" class="collapse @if($activeNav === 'Messages Inbox' || $activeNav === 'Messages Sent' || $activeNav === 'Messages Trash') show @endif" data-parent="#off_canvas_menu">
                                        <div class="card-body">
                                            <ul>
                                                <li><a href="{{ url('account/messages/inbox') }}" @if($activeNav === 'Messages Inbox') style="color: #328C59;" @endif>Inbox</a></li>
                                                <li><a href="{{ url('account/messages/sent') }}" @if($activeNav === 'Messages Sent') style="color: #328C59;" @endif>Sent</a></li>
                                                <li><a href="{{ url('account/messages/trash') }}" @if($activeNav === 'Messages Trash') style="color: #328C59;" @endif>Trash</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header @if($activeNav === 'Addresses') active_menu_color @else bg-white @endif">
                                        <i class="far fa-address-card"></i> <a href="{{ url('account/addresses') }}">Addresses</a>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header @if($activeNav === 'Feedback') active_menu_bg @else bg-white @endif">
                                        <i class="far fa-comment-alt"></i> <a href="{{ url('account/feedback') }}">Feedback</a>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header @if($activeNav === 'Notification') active_menu_bg @else bg-white @endif">
                                        <i class="fas fa-bell"></i>
                                        <a href="{{ url('account/notification') }}" class="notification_left_menu">
                                            Notification
                                        </a>
                                    </div>
                                </div>

    
                            </div>
                        
                        </div>

                        




                    </div>

                    <div class="col-12 col-sm-12 col-md-9">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>




<div class="container-fluid" style="background-color: #f8f8f8;">
    <div class="row py-5">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12 mx-auto">

            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                    <div><a href="{{ url('/') }}" class="fs-3 text-decoration-none primary_text_color_default">GoodGross</a></div>
                    <div class="text-info small mt-1"><span class="small">Get Best, Gain Most</span></div>
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



<div class="modal" tabindex="-1" id="notification_details_modal">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Notification Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body py-4 px-5">
                <div class="row">
                    <div class="col" id="notification_details_type"></div>
                    <div class="col text-right" id="notification_details_date"></div>
                </div>
                <div class="card mb-3 mt-3">
                    <div class="row no-gutters">
                        <div class="col-4">
                            <img class="card-img" id="notification_details_product_image">
                        </div>
                        <div class="col-8">
                            <div class="card-body">
                                <h6 class="card-title" id="notification_details_title"></h6>
                                <table class="table">

                                    <tbody>
                                    <tr>
                                        <td style="font-weight: 600;">Order Number</td>
                                        <td id="notification_details_order_number"></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: 600;">Transaction ID</td>
                                        <td id="notification_details_transaction_id"></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: 600;">Buyer Info</td>
                                        <td id="notification_details_buyer_info"></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: 600;">Item Title</td>
                                        <td id="notification_details_item_title"></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: 600;">Quantity</td>
                                        <td id="notification_details_item_quantity"></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: 600;">Price Per Unit</td>
                                        <td id="notification_details_item_price_per_unit"></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: 600;">Total Price</td>
                                        <td id="notification_details_item_total_price"></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: 600;">Transact Through</td>
                                        <td id="notification_details_item_transaction_through"></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: 600;">Payment Status</td>
                                        <td id="notification_details_item_payment_status"></td>
                                    </tr>

                                    <tr>
                                        <td style="font-weight: 600;">Payout Status</td>
                                        <td id="notification_details_item_payout_status"></td>
                                    </tr>

                                    <tr>
                                        <td style="font-weight: 600;">Delivery Status</td>
                                        <td id="notification_details_item_delivery_status"></td>
                                    </tr>

                                    <tr>
                                        <td style="font-weight: 600;">Transaction Status</td>
                                        <td id="notification_details_item_transaction_status"></td>
                                    </tr>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>



            </div>

        </div>
    </div>
</div>


<style type="text/css">
    .ajax_loading_modal {
        display:    none;
        position:   fixed;
        top:        0;
        left:       0;
        height:     100%;
        width:      100%;
        z-index: 9999;
        background: rgba( 255, 255, 255, .8 )
        url('{{ asset('storage/img/application/loading.gif') }}')
        50% 50%
        no-repeat;
    }
</style>

<div class="ajax_loading_modal">

</div>

<script type="text/javascript">
    $body = $("body");
    $(document).on({
        ajaxStart: function() {
            $body.addClass("loading");
            $('body.loading .ajax_loading_modal').css({
                'overflow': 'hidden',
                'display': 'block'
            });
        },
        ajaxStop: function() {
            $('body.loading .ajax_loading_modal').css({
                'overflow': 'visible',
                'display': 'none'
            });
            $body.removeClass("loading");
        }
    });
    $('#account_popover').gpopover({
        width: 200,
        viewportSideMargin: 40
    });
</script>

<script type="text/javascript">

    function openNav() {
      document.getElementById("off_canvas_menu_holder").style.width = "90%";
      document.getElementById("off_canvas_menu_bars_icon").style.marginLeft = "90%";
    }

    function closeNav() {
      document.getElementById("off_canvas_menu_holder").style.width = "0";
      document.getElementById("off_canvas_menu_bars_icon").style.marginLeft= "0";
    }


    $(document).on('click', '#top_right_nav_toggle', function () {
        if ($('#hidden_top_nav').hasClass('sr-only')) {
            $('#hidden_top_nav').removeClass('sr-only');
        } else {
            $('#hidden_top_nav').addClass('sr-only');
        }

    });

    $(document).ready(function () {
        //getAccountNotifications();
        // setInterval(function(){
        //     getAccountNotifications();
        // }, 5000);


        // let width = $(window).width();
        //
        // if (parseFloat(width) <= 500) {
        //     $('#off_canvas_menu').removeClass('sr-only');
        //     $('#off_canvas_menu_bars_icon').removeClass('sr-only');
        //     $('#left_menu').addClass('sr-only');
        // } else {
        //     $('#off_canvas_menu').addClass('sr-only');
        //     $('#off_canvas_menu_bars_icon').addClass('sr-only');
        //     $('#left_menu').removeClass('sr-only');
        // }
        //
        // $("#menu-toggle").click(function(e) {
        // console.log('toogle');
        //   e.preventDefault();
        //   $("#wrapper").toggleClass("toggled");
        // });
        //
        // $(window).resize(function () {
        //     let width = $(window).width();
        //     console.log(width);
        //     if (parseFloat(width) <= 500) {
        //         $('#off_canvas_menu').removeClass('sr-only');
        //         $('#off_canvas_menu_bars_icon').removeClass('sr-only');
        //         $('#left_menu').addClass('sr-only');
        //     } else {
        //         $('#off_canvas_menu').addClass('sr-only');
        //         $('#off_canvas_menu_bars_icon').addClass('sr-only');
        //         $('#left_menu').removeClass('sr-only');
        //     }
        // });


    });

    function getAccountNotifications() {
        $.ajax({
            method: 'get',
            url: '{{ url('get/account/notifications') }}',
            global: false,
            success: function (result) {
                console.log(result);

                $('#notification_count').text('');
                $('.notification_left_menu').empty();
                $('#notification_item').empty();
                $('#notification_item').append('<h6 class="dropdown-header secondary_background_color_default" style="border-radius: 5px;">Notifications</h6>');
                if (result.length > 0) {
                    $('#notification_count').text(result.length);
                    $('.notification_left_menu').append('Notification <span style="background-color: red; color: white; padding: 1px 7px; margin-left: 5px; border-radius: 3px; font-weight: 600;">' + result.length + '</span>');
                    $.each(result, function (key, accountNotification) {
                        $('#notification_item').append('<a class="dropdown-item notification_details" href="javascript:void(0)" data-id="' + accountNotification.id + '" style="width: 400px; white-space: normal; word-break: break-word;"><div style="color: gray; font-size: 70%;">' + accountNotification.type + ' | ' + $.datepicker.formatDate('MM dd, yy', new Date(accountNotification.created_at)) + '</div><div class="text-info" style="font-size: 80%">' + accountNotification.title + '</div></a>');
                        $('#notification_item').append('<div class="dropdown-divider m-0"></div>');
                    });
                    $('#notification_item').append('<a class="dropdown-item text-center" href="{{ url('account/notifications') }}"><div style="color: gray; font-size: 70%;">Show All Notifications</div></a>');
                } else {
                    $('.notification_left_menu').append('Notification');
                    $('#notification_item').append('<a class="dropdown-item text-info" style="font-size: 80%;" href="javascript:void(0)">No Unread Notification Found!</a>');
                }
            },
            error: function (xhr) {
                console.log(xhr);
            }
        });
    }

    $(document).on('click', '.notification_details', function () {

        let id = $(this).data('id');
        $.ajax({
            method: 'get',
            url: '{{ url('account/notifications/get/record') }}',
            data: {
                id: id
            },
            success: function (result) {
                console.log(result);

                $('#notification_details_type').empty().append('Type: <span style="font-weight: 600;">' + result.type + '</span>');
                $('#notification_details_date').empty().append('Date: <span style="font-weight: 600;">' + $.datepicker.formatDate('MM d, yy', new Date(result.created_at)) + '</span>');
                $('#notification_details_title').text(result.title);

                let propertyValues = JSON.parse(result.transaction.product.property_values);
                $('#notification_details_product_image').attr('src', '{{ asset('storage') }}/' + propertyValues.Image);

                $('#notification_details_order_number').text(result.transaction.order.number);
                $('#notification_details_transaction_id').text(result.transaction.id);
                $('#notification_details_buyer_info').text(result.transaction.order.guest.first_name + ' ' + result.transaction.order.guest.last_name);
                $('#notification_details_item_title').text(propertyValues.Title);
                $('#notification_details_item_quantity').text(result.transaction.quantity);
                $('#notification_details_item_price_per_unit').text('$' + parseFloat(result.transaction.price_per_unit).toFixed(2) + ' USD');
                $('#notification_details_item_total_price').text('$' + (parseFloat(result.transaction.price_per_unit) * parseFloat(result.transaction.quantity)).toFixed(2) + ' USD');
                $('#notification_details_item_transaction_through').text(result.transaction.order.transact_through);
                $('#notification_details_item_payment_status').text(result.transaction.payment_status);
                $('#notification_details_item_payout_status').text(result.transaction.payout_status);
                $('#notification_details_item_delivery_status').text(result.transaction.delivery_status);
                $('#notification_details_item_transaction_status').text(result.transaction.status);


                $('#notification_details_modal').modal('show');
            },
            error: function (xhr) {
                console.log(xhr);
            }
        });
        return true;
    });


</script>
</body>
</html>
