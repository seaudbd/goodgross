<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\DeliveryAddressRequest;
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
        $userAccount = auth()->user()->account;
        $userAccountDetails = auth()->user()->account->type === 'Personal' ? auth()->user()->account->personalAccount : auth()->user()->account->businessAccount;

        return view('Frontend.delivery_address', compact('title', 'activeNav', 'userCountry', 'userState', 'countries', 'states', 'userAccount', 'userAccountDetails'));
    }

    public function saveDeliveryAddress(DeliveryAddressRequest $request)
    {

        //return $request;

        $country = Country::where('id', $request->country_id)->first()->country;
        $accountShipping = $request->has('id') ? AccountShipping::find($request->id) : new AccountShipping();
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
        if ($request->has('id')) {
            if ($request->has('is_primary')) {
                if ($request->is_primary) {
                    AccountShipping::where('account_id', auth()->user()->account->id)->update(['is_primary' => 0]);
                    $accountShipping->is_primary = 1;
                }
            }
        } else {
            if ($request->is_primary === 'true' || (int)$request->is_primary === 1) {
                AccountShipping::where('account_id', auth()->user()->account->id)->update(['is_primary' => 0]);
                $accountShipping->is_primary = 1;
            } else {
                $accountShipping->is_primary = 0;
            }
            if ($request->has('is_selected')) {
                $accountShipping->is_selected = $request->is_selected;
            } else {
                $accountShipping->is_selected = 0;
            }
        }
        //return $accountShipping;




        $accountShipping->save();
//        $shippingInformation = [
//            'account_id' => auth()->user()->account->id,
//            'first_name' => $request->first_name,
//            'last_name' => $request->last_name,
//            'country' => $country,
//            'state' => $request->state,
//            'city' => $request->city,
//            'postal_code' => $request->postal_code,
//            'address_line_1' => $request->address_line_1,
//            'address_line_2' => $request->address_line_2,
//            'phone' => $request->phone,
//            'email' => $request->email,
//            'is_primary' => 1,
//            'is_selected' => 1
//        ];
//        Session::put('selected_shipping_information', $shippingInformation);
//        $shippingInformation['account_id'] = auth()->user()->account->id;
//        AccountShipping::create($shippingInformation);
        return response()->json(['success' => true, 'message' => 'Delivery Address Saved Successfully', 'payload' => null]);
    }
}
