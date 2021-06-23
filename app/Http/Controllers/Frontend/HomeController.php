<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\ControlPanel\Configuration\Category;
use App\Models\ControlPanel\Configuration\CategoryType;
use App\Models\Product;


class HomeController extends Controller
{

    public function loadHomePage() {
        $title = 'Home';
        $activeNav = 'Home';
        $dealsOfTheDay = Product::where('status', 'Approved')->with('account', 'productProperties')->get();
        return view('Frontend.home', compact('title', 'activeNav', 'dealsOfTheDay'));
    }

    public function getCategoryTypes() {
        $categoryTypes = CategoryType::where('status', 'Active')->with('categories')->get();
        return response()->json($categoryTypes);
    }







}
