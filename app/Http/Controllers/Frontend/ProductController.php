<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ControlPanel\Configuration\Category;
use App\Models\ControlPanel\Configuration\Property;
use App\Models\Product;
use App\Models\WatchedProduct;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;


class ProductController extends Controller
{
    private $rootCategories = [];

    public function loadCategorizedProducts($categoryId) {

        $category = Category::where('id', base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($categoryId))))))->with(['categoryType'])->first();

        $this->findRootCategories($category->root_id);
        $title = $category->category;
        $activeNav = $category->category;
        $rootCategories = $this->rootCategories;
        if ($category->categoryType->category_type == 'Retail'){
            return view('Frontend.categorized_retail_products', compact('title', 'category', 'rootCategories', 'activeNav'));
        } else {
            return view('Frontend.categorized_wholesale_products', compact('title', 'category', 'rootCategories', 'activeNav'));
        }
    }

    public function getCategorizedProducts(Request $request) {


        $products = Product::where('category_id', $request->category_id)->where('status', 'Approved')
            ->whereHas('productProperties', function ($query) use ($request) {
                if (count(json_decode($request->filters)) > 0) {
                    $query->whereIn('value', json_decode($request->filters));
                }
            })
            ->whereHas('productProperties', function ($query) use ($request) {
                $query->whereBetween('value', [(int)$request->min_price, (int)$request->max_price]);
            })
            ->with([
                'productProperties' => function($query) {
                    $query->where('is_for_product_listing', 1);
                },
                'productProperties.property:id,property'
            ])->get();
        return response()->json($products);
    }

    public function getFilterItems(Request $request) {
        $filterItems = Property::where('is_for_filter', 1)
            ->whereHas('productProperties.product', function ($query) use ($request) {
                $query->where('category_id', $request->category_id);
            })
            ->whereIn('id', explode(',', Category::where('id', $request->category_id)->first(['property_ids'])->property_ids))
            ->with(['distinctProductProperties'])
            ->get();
        return response()->json($filterItems);
    }

    private function findRootCategories($categoryId) {
        $category = Category::where('id', $categoryId)->first();
        array_push($this->rootCategories, $category->category);
        if ($category->root_id > 0) {
            $this->findRootCategories($category->root_id);
        }

    }

    public function loadProduct($productId) {
        $product = Product::
            where('id', base64_decode(base64_decode(base64_decode(base64_decode(base64_decode($productId))))))
            ->with(['productProperties.property', 'category.categoryType', 'account.personalAccount', 'account.businessAccount'])
            ->first();
        $this->findRootCategories($product->category->root_id);
        $title = $product->category->category;
        $activeNav = $product->category->category;
        $rootCategories = $this->rootCategories;


        $addedInCart = false;
        if (Session::get('cart_items')) {
            foreach (Session::get('cart_items') as $cartItem) {
                if ($cartItem->id == $product->id){
                    $addedInCart = true;
                    break;
                }
            }
        }
        $addedToWatch = false;
        if (auth()->check()) {
            if (WatchedProduct::where('account_id', auth()->user()->account->id)->where('product_id', $product->id)->first()) {
                $addedToWatch = true;
            } else {
                $addedToWatch = false;
            }
        } else {
            $addedToWatch = false;
        }
        if ($product->category->categoryType->category_type == 'Retail'){
            return view('Frontend.categorized_retail_product', compact('title', 'product', 'rootCategories', 'activeNav', 'addedInCart', 'addedToWatch'));
        } else {
            return view('Frontend.categorized_wholesale_product', compact('title', 'product', 'rootCategories', 'activeNav', 'addedInCart', 'addedToWatch'));
        }
    }

    public function addToCart(Request $request) {

        $product = Product::where('id', $request->product_id)->with(['productProperties', 'account.personalAccount', 'account.businessAccount'])->first();
        $product['quantity'] = $request->quantity;
        $pushableItem = true;
        if (Session::get('cart_items')) {
            foreach (Session::get('cart_items') as $item){
                if ($item->id == $product->id){
                    $pushableItem = false;
                    break;
                }
            }
        }
        if ($pushableItem){
            Session::push('cart_items', $product);
        }

        view()->share('cartCounter', count(Session::get('cart_items')));
        return response()->json(['success' => true, 'message' => 'Product added to Cart successfully', 'data' => count(Session::get('cart_items'))]);
    }

    public function addToWatch(Request $request) {
        $watchedProduct = new WatchedProduct();
        $watchedProduct->account_id = auth()->user()->account->id;
        $watchedProduct->product_id = $request->product_id;
        $watchedProduct->save();
        return response()->json(['success' => true, 'message' => 'Product added to Watch List successfully']);
    }

    public function checkAccountLoginStatus()
    {

        if (auth()->check()) {
            return response()->json(['account_login_status' => true]);
        } else {
            return response()->json(['account_login_status' => false]);
        }
    }
}
