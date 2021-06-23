<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Guest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $title = 'Cart | GoodGross';
        $activeNav = 'Cart';
        $cartItems =  Session::get('cart_items');
        return view('Frontend.cart', compact('title', 'activeNav', 'cartItems'));
    }

    public function addProduct(Request $request)
    {
        $product = Product::where('id', $request->product_id)->with('productProperties', 'account')->first();
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
        return response()->json(['message' => 'Cart Updated Successfully', 'data' => count(Session::get('cart_items'))]);
    }

    public function deleteProduct($productId)
    {
        $cartItems = Session::get('cart_items');

        foreach ($cartItems as $key => $cartItem){
            if ($cartItem->id == $productId){
                unset($cartItems[$key]);
                break;
            }
        }

        Session::put('cart_items', $cartItems);

        return Redirect::to('cart');
    }

    public function copyProductToCheckout()
    {
        $cartItems = Session::get('cart_items');
        Session::forget('checkout_items');
        Session::put('checkout_items', $cartItems);
        return response()->json('Copying Product to Checkout Successful');
    }





}
