<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PlaceOrderController extends Controller
{
    public function index()
    {
        $title = 'Place Order';
        $wholesaleItem =  Session::get('wholesale_item');
        $activeNav = 'Place Order';
        if (auth()->check()) {
            $accountLoginStatus = true;
        } else {
            $accountLoginStatus = false;
        }
        //dd($wholesaleItem);
//        dd($wholesaleItem->productProperties->where('property.property', 'Images')->first()->value);
        return view('Frontend.place_order', compact('title', 'wholesaleItem', 'activeNav', 'accountLoginStatus'));
    }
}
