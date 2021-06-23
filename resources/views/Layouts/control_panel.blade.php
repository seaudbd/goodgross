<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('storage/img/application/favicon.ico') }}" />
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ $title }}</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link href="https://code.jquery.com/ui/1.8.0/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/ui/1.8.0/jquery-ui.min.js"></script>


    <link rel="stylesheet" href="{{ asset('css/jquery.toast.min.css') }}">
    <script src="{{ asset('js/jquery.toast.min.js') }}"></script>


    <link href="{{ asset('sb-admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


    <link href="{{ asset('sb-admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <style type="text/css">
        ::placeholder {
            color: #a69eab !important;
            opacity: 0.5;
            font-size: small;
        }

        :-ms-input-placeholder {
            color: #a69eab !important;
            font-size: small;
        }

        ::-ms-input-placeholder {
            color: #a69eab !important;
            font-size: small;
        }

        body {
            line-height: 1;
        }
        .sidebar-heading {
            color: #002d23;
        }
        .form-control {
            font-size: small;
            color: #747272 !important;
            height: calc(1.85em + .75rem + 2px);
        }

        .primary_text_color_default  {
            color: #328C59;
        }

        .secondary_text_color_default  {
            color: #e9f5f2;
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
        }

        .secondary_btn_default {
            background-color: #e9f5f2;
            color: #ffffff;
        }

        .btn-sm {
            padding: .4rem .5rem;
        }

        .pagination_active {
            background-color: #f8f9fc;
        }
    </style>

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">


    <ul class="navbar-nav sidebar primary_background_color_default sidebar-dark accordion" id="accordionSidebar">


        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3" style="text-transform: none;">GoodGross</div>
        </a>


        <hr class="sidebar-divider my-0">


        <li class="nav-item @if($activeMenu === 'Dashboard') active @endif">
            <a class="nav-link" href="{{ url('control/panel/dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>


        <hr class="sidebar-divider">


        <div class="sidebar-heading" style="color: #714e66;">
            Operation
        </div>

        <li class="nav-item @if($activeMenu === 'Account') active @endif">
            <a class="nav-link" href="{{ url('control/panel/operation/account') }}">
                <i class="far fa-user"></i>
                <span>Account</span></a>
        </li>



        <li class="nav-item @if($activeMenu === 'Posted Retail Items' || $activeMenu === 'Posted Wholesale Items') active @endif">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#posted_items"
               aria-expanded="true" aria-controls="posted_items">
                <i class="fas fa-fw fa-table"></i>
                <span>Posted Items</span>
            </a>
            <div id="posted_items" class="collapse @if($activeMenu === 'Posted Retail Items' || $activeMenu === 'Posted Wholesale Items') show @endif" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="py-2 collapse-inner rounded">
                    <a class="collapse-item text-white @if($activeMenu === 'Posted Retail Items') active @endif" href="{{ url('control/panel/operation/posted/retail/items') }}">Retail</a>
                    <a class="collapse-item text-white @if($activeMenu === 'Posted Wholesale Items') active @endif" href="{{ url('control/panel/operation/posted/wholesale/items') }}">Wholesale</a>

                </div>
            </div>
        </li>



        <li class="nav-item @if($activeMenu === 'Order') active @endif">
            <a class="nav-link" href="{{ url('control/panel/operation/order') }}">
                <i class="fab fa-first-order"></i>
                <span>Order</span></a>
        </li>




        <hr class="sidebar-divider">


        <div class="sidebar-heading" style="color: #714e66;">
            Configuration
        </div>


        <li class="nav-item @if($activeMenu === 'Category Type') active @endif">
            <a class="nav-link" href="{{ url('control/panel/configuration/category/type') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Category Type</span></a>
        </li>

        <li class="nav-item @if($activeMenu === 'Section') active @endif">
            <a class="nav-link" href="{{ url('control/panel/configuration/section') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Section</span></a>
        </li>

        <li class="nav-item @if($activeMenu === 'Property') active @endif">
            <a class="nav-link" href="{{ url('control/panel/configuration/property') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Property</span></a>
        </li>

        <li class="nav-item @if($activeMenu === 'Category') active @endif">
            <a class="nav-link" href="{{ url('control/panel/configuration/category') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Category</span></a>
        </li>

        <hr class="sidebar-divider">


        <div class="sidebar-heading" style="color: #714e66;">
            Report
        </div>


        <li class="nav-item">
            <a class="nav-link" href="tables.html">
                <i class="fas fa-fw fa-table"></i>
                <span>Transaction</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="tables.html">
                <i class="fas fa-fw fa-table"></i>
                <span>Payment</span></a>
        </li>

        <hr class="sidebar-divider">


        <div class="sidebar-heading" style="color: #714e66;">
            Settings
        </div>


        <li class="nav-item @if($activeMenu === 'Sales Tax') active @endif">
            <a class="nav-link" href="{{ url('control/panel/settings/sales/tax') }}">
                <i class="fas fa-percent"></i>
                <span>Sales Tax</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="tables.html">
                <i class="fas fa-fw fa-table"></i>
                <span>Local</span></a>
        </li>


        <hr class="sidebar-divider">


        <div class="sidebar-heading" style="color: #714e66;">
            Miscellaneous
        </div>


        <li class="nav-item @if($activeMenu === 'Notification') active @endif">
            <a class="nav-link" href="{{ url('control/panel/miscellaneous/notification') }}">
                <i class="fas fa-bell"></i>
                <span class="notification_left_menu">Notification</span></a>
        </li>







        <hr class="sidebar-divider d-none d-md-block">


        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>

    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">


            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-3 static-top shadow">


                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>


                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>


                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="notification_link" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell" style="font-size: 1.3rem;"></i>
                            <span class="badge badge-danger badge-counter" id="notification_count"></span>

                        </a>
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="notification_link" id="notification_item">

                        </div>
                    </li>



                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->name }}</span>
                            @if (auth()->user()->avatar !== null)
                                <img class="img-profile rounded-circle" src="{{ asset('storage/' . auth()->user()->avatar) }}">
                            @else
                                <i class="fas fa-user-secret fa-2x primary_text_color_default"></i>
                            @endif
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>

                            <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Activity Log
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ url('control/panel/sign/out') }}">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Sign out
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                @yield('content')


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; GoodGross {{ date('Y') }}</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>


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
                                        <td style="font-weight: 600;">Buyer</td>
                                        <td id="notification_details_buyer_info"></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: 600;">Seller</td>
                                        <td id="notification_details_seller_info"></td>
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



<script src="{{ asset('sb-admin/js/sb-admin-2.min.js') }}"></script>


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



<script type="text/javascript">
    $(document).ready(function () {
        // getAdminNotifications();
        // setInterval(function(){
        //     getAdminNotifications();
        // }, 5000);
    });

    function getAdminNotifications() {
        $.ajax({
            method: 'get',
            url: '{{ url('get/admin/notifications') }}',
            global: false,
            success: function (result) {
                //console.log(result);

                $('#notification_count').text('');
                $('.notification_left_menu').empty();
                $('#notification_item').empty();
                $('#notification_item').append('<h6 class="dropdown-header">Notifications</h6>');

                if (result.length > 0) {
                    $('#notification_count').text(result.length);
                    $('.notification_left_menu').append('Notification <span style="background-color: red; color: white; padding: 1px 7px; margin-left: 5px; border-radius: 3px; font-weight: 600;">' + result.length + '</span>');
                    $.each(result, function (key, adminNotification) {
                        $('#notification_item').append('<a class="dropdown-item d-flex align-items-center notification_details" href="javascript:void(0)" data-id="' + adminNotification.id + '"><div><div class="small text-gray-500">' + adminNotification.type + ' | ' + $.datepicker.formatDate('MM dd, yy', new Date(adminNotification.created_at)) + '</div><span class="small text-justify">' + adminNotification.title + '</span></div></a>');
                    });
                    $('#notification_item').append('<a class="dropdown-item text-center small text-gray-500" href="{{ url('control/panel/miscellaneous/notification') }}">Show All Notifications</a>');
                } else {
                    $('.notification_left_menu').append('Notification');
                    $('#notification_item').append('<a class="dropdown-item d-flex align-items-center" style="font-size: 80%;" href="javascript:void(0)">No Unread Notification Found!</a>');
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
            url: '{{ url('control/panel/miscellaneous/notification/get/record') }}',
            data: {
                id: id
            },
            success: function (result) {
                //console.log(result);

                $('#notification_details_type').empty().append('Type: <span style="font-weight: 600;">' + result.type + '</span>');
                $('#notification_details_date').empty().append('Date: <span style="font-weight: 600;">' + $.datepicker.formatDate('MM d, yy', new Date(result.created_at)) + '</span>');
                $('#notification_details_title').text(result.title);

                let propertyValues = JSON.parse(result.transaction.product.property_values);
                $('#notification_details_product_image').attr('src', '{{ asset('storage') }}/' + propertyValues.Image);

                $('#notification_details_order_number').text(result.transaction.order.number);
                $('#notification_details_transaction_id').text(result.transaction.id);
                $('#notification_details_buyer_info').text(result.transaction.order.guest.first_name + ' ' + result.transaction.order.guest.last_name);
                $('#notification_details_seller_info').text(result.transaction.product.account.number + '-' + result.transaction.product.account.business_name);
                $('#notification_details_item_title').text(propertyValues.Title);
                $('#notification_details_item_quantity').text(result.transaction.quantity);
                $('#notification_details_item_price_per_unit').text('US $' + parseFloat(result.transaction.price_per_unit).toFixed(2));
                $('#notification_details_item_total_price').text('US $' + (parseFloat(result.transaction.price_per_unit) * parseFloat(result.transaction.quantity)).toFixed(2));
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
