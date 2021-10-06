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
        $title = 'Cart';
        $activeNav = 'Cart';
        $cartItems =  Session::get('cart_items');
        return view('Frontend.cart', compact('title', 'activeNav', 'cartItems'));
    }

    public function getItems()
    {
        return response()->json(['success' => true, 'message' => 'Cart Items Fetched Successfully', 'payload' => Session::get('cart_items')]);
    }

//    public function addProduct(Request $request)
//    {
//        $product = Product::where('id', $request->product_id)->with('productProperties', 'account')->first();
//        $product['quantity'] = $request->quantity;
//        $pushableItem = true;
//        if (Session::get('cart_items')) {
//            foreach (Session::get('cart_items') as $item){
//                if ($item->id == $product->id){
//                    $pushableItem = false;
//                    break;
//                }
//            }
//        }
//        if ($pushableItem){
//            Session::push('cart_items', $product);
//        }
//
//        view()->share('cartCounter', count(Session::get('cart_items')));
//        return response()->json(['message' => 'Cart Updated Successfully', 'data' => count(Session::get('cart_items'))]);
//    }

    public function deleteItem(Request $request)
    {
        $cartItems = Session::get('cart_items');

        foreach ($cartItems as $key => $cartItem){
            if ($cartItem->id == $request->item_id){
                unset($cartItems[$key]);
                break;
            }
        }

        Session::put('cart_items', $cartItems);

        view()->share('cartCounter', count(Session::get('cart_items')));

        return response()->json(['success' => true, 'message' => 'Cart Item Deleted Successfully', 'payload' => count(Session::get('cart_items'))]);
    }


    public function updateItemQuantity(Request $request)
    {
        $cartItems = Session::get('cart_items');

        foreach ($cartItems as $key => $cartItem){
            if ($cartItem->id == $request->item_id){
                $cartItem->quantity = $request->quantity;
                break;
            }
        }

        Session::put('cart_items', $cartItems);

        return response()->json(['success' => true, 'message' => 'Item Quantity Updated Successfully', 'payload' => null]);
    }

    public function copyItemToCheckout()
    {
        $cartItems = Session::get('cart_items');
        Session::forget('checkout_items');
        Session::put('checkout_items', $cartItems);
        return response()->json(['success' => true, 'message' => 'Copying Product to Checkout Successful', 'payload' => null]);
    }





}
