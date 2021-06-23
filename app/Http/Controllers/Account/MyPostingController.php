<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class MyPostingController extends Controller
{
    public function index($section)
    {
        $title = 'My Posting - ' . ucfirst($section) . ' | GoodGross';
        $activeNav = 'My Posting ' . ucfirst($section);
        $products = Product::where('account_id', session('account_id'))->where('status', ucfirst($section))->get();
        return view('Account.my_posting', compact('title', 'activeNav', 'products', 'section'));
    }
}
