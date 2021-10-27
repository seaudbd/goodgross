<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\DeliveryAddressRequest;
use App\Models\AccountBilling;
use App\Models\AccountShipping;
use App\Models\Country;
use App\Models\State;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stevebauman\Location\Facades\Location;

class DeliveryAddressController extends Controller
{
    public function loadDeliveryAddress()
    {
        $title = 'Delivery Address';

        $activeNav = 'Delivery Address';
        if ($position = Location::get(request()->getClientIp())) {
            $userCountry = $position->countryName;
            $userState = $position->regionName;
        } else {
            $userCountry = null;
            $userState = null;
        }
        $countries = Country::where('status', 'Active')->get();
        $states = State::where('status', 'Active')->get();

        $isGuest = false;
        if (auth()->check()) {
            $userAccount = auth()->user()->account;
            $userAccountDetails = auth()->user()->account->type === 'Personal' ? auth()->user()->account->personalAccount : auth()->user()->account->businessAccount;
            return view('Frontend.delivery_address', compact('title', 'activeNav', 'userCountry', 'userState', 'countries', 'states', 'userAccount', 'userAccountDetails', 'isGuest'));
        } else {
            $isGuest = true;
            return view('Frontend.delivery_address', compact('title', 'activeNav', 'userCountry', 'userState', 'countries', 'states', 'isGuest'));
        }
    }

    public function storeInDatabase(DeliveryAddressRequest $request)
    {

        $country = Country::where('id', $request->country_id)->first()->country;
        $accountShipping = new AccountShipping();
        $accountShipping->account_id = auth()->user()->account->id;
        $accountShipping->first_name = $request->first_name;
        $accountShipping->last_name = $request->last_name;
        $accountShipping->country = $country;
        $accountShipping->state = $request->state;
        $accountShipping->city = $request->city;
        $accountShipping->postal_code = $request->postal_code;
        $accountShipping->address_line_1 = $request->address_line_1;
        $accountShipping->address_line_2 = $request->address_line_2;
        $accountShipping->phone = $request->phone;
        $accountShipping->email = $request->email;
//        $accountShipping->is_primary = $request->is_primary;
        $accountShipping->is_selected = $request->is_selected;
        $accountShipping->save();

        $accountBilling = new AccountBilling();
        $accountBilling->account_id = auth()->user()->account->id;
        $accountBilling->first_name = $request->first_name;
        $accountBilling->last_name = $request->last_name;
        $accountBilling->country = $country;
        $accountBilling->state = $request->state;
        $accountBilling->city = $request->city;
        $accountBilling->postal_code = $request->postal_code;
        $accountBilling->address_line_1 = $request->address_line_1;
        $accountBilling->address_line_2 = $request->address_line_2;
        $accountBilling->phone = $request->phone;
        $accountBilling->email = $request->email;
//        $accountBilling->is_primary = $request->is_primary;
//        $accountBilling->is_selected = $request->is_selected;
        $accountBilling->save();


        return response()->json(['success' => true, 'message' => 'Delivery Address Saved Successfully', 'payload' => null]);
    }

    public function storeInSession(DeliveryAddressRequest $request)
    {
        $country = Country::where('id', $request->country_id)->first()->country;
        $deliveryAddress = $request->except(['_token', 'country_id']);
        $deliveryAddress['country'] = $country;
        Session::put('delivery_address_for_guest', $deliveryAddress);
        Session::put('billing_address_for_guest', $deliveryAddress);
        return response()->json(['success' => true, 'message' => 'Delivery Address Saved Successfully', 'payload' => null]);
    }
}
