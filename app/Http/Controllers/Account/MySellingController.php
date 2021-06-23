<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MySellingController extends Controller
{
    public function active()
    {
        $title = 'My Selling - Active | GoodGross';
        $activeNav = 'My Selling Active';
        return view('Account.my_selling_active', compact('title', 'activeNav'));
    }
}
