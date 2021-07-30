<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PlaceOrderController extends Controller
{
    public function index()
    {
        $title = 'Place Order | GoodGross';
        $sessionItems =  Session::get('session_items');
        $activeNav = 'Place Order';
        if (Session::has('account_login_status')) {
            $accountLoginStatus = true;
        } else {
            $accountLoginStatus = false;
        }
        return view('Frontend.checkout', compact('title', 'checkoutItems', 'activeNav', 'accountLoginStatus'));
    }
}
