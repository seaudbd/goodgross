<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\RegistrationBusinessRequest;
use App\Http\Requests\Frontend\RegistrationPersonalRequest;
use App\Mail\RegistrationEmail;
use App\Models\Account;
use App\Models\BusinessAccount;
use App\Models\Country;
use App\Models\PersonalAccount;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Stevebauman\Location\Facades\Location;


class RegistrationController extends Controller
{

    public function __construct()
    {
        set_time_limit(0);
    }
    public function loadRegistration($userId = '')
    {
        $title = 'Sign up';
        $activeNav = 'Sign up';
        $user = empty(Account::where('user_id', $userId)->first()) ? json_encode(User::where('id', $userId)->first()) : (Account::where('user_id', $userId)->first()->type === 'Personal' ? json_encode(User::where('id', $userId)->with('account.personalAccount')->first()) : json_encode(User::where('id', $userId)->with('account.businessAccount')->first()));
        if ($position = Location::get(request()->getClientIp())) {
            $userCountry = $position->countryName;
            $userState = $position->regionName;
        } else {
            $userCountry = null;
            $userState = null;
        }
        $countries = Country::where('status', 'Active')->get();
        $states = State::where('status', 'Active')->get();

        return view('Frontend.registration', compact('title', 'user', 'activeNav', 'userCountry', 'userState', 'countries', 'states'));
    }


    public function registerPersonalAccount(RegistrationPersonalRequest $request)
    {


//        $gRecaptchaResponse = Helper::verifyGoogleRecaptchaToken($request->get('g_recaptcha_token'));
//        if ($gRecaptchaResponse->success === false || $gRecaptchaResponse->score < 0.5 || $gRecaptchaResponse->action !== 'personal_registration_submit') {
//            return response()->json(['success' => false, 'message' => 'BOT Detected!']);
//        }
        $lastPersonalAccount = Account::where('type', 'Personal')->latest()->first();
        if ($lastPersonalAccount) {
            $number = explode('-', $lastPersonalAccount->numbebr)[2] + 1;
        } else {
            $number = 100000;
        }
        if ($request->user === 'null') {
            $user = new User();
            $user->role_id = 0;
            $user->name = $request->first_name . ' ' . $request->last_name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->type = 'Account';
            $user->status = 'Inactive';
            $user->save();
            $account = new Account();
            $account->user_id = $user->id;

            $account->number = 'P-' . date('Ymd') . '-' . $number;
            $account->type = 'Personal';
            $account->verification_code = mt_rand(100000, 999999);
            $account->status = 'Pending';
            $account->save();
            $personalAccount = new PersonalAccount();
            $personalAccount->account_id = $account->id;
            $personalAccount->first_name = $request->first_name;
            $personalAccount->last_name = $request->last_name;
            $personalAccount->email = $request->email;
            $personalAccount->phone = $request->phone;
            $personalAccount->save();
        } else {
            if (Account::where('user_id', json_decode($request->user)->id)->first()->number !== null || Account::where('user_id', json_decode($request->user)->id)->first()->type !== 'Personal') {
                return response()->json(['success' => false, 'message' => 'Invalid Operation']);
            }
            $user = User::where('id', json_decode($request->user)->id)->first();
            $user->password = Hash::make($request->password);
            $user->save();
            $account = Account::where('user_id', $user->id)->first();
            $account->number = 'P-' . date('Ymd') . '-' . $number;
            $account->verification_code = mt_rand(100000, 999999);
            $account->save();
        }

        Mail::to($user->email)->send(new RegistrationEmail(User::where('id', $user->id)->with('account.personalAccount')->first()));
        return response()->json(['success' => true, 'user' => User::where('id', $user->id)->with('account.personalAccount')->first()]);
    }


    public function getStatesByCountryId(Request $request) {
        return response()->json(State::where('country_id', $request->country_id)->get());
    }

    public function registerBusinessAccount(RegistrationBusinessRequest $request)
    {


//        $gRecaptchaResponse = Helper::verifyGoogleRecaptchaToken($request->get('g_recaptcha_token'));
//        if ($gRecaptchaResponse->success === false || $gRecaptchaResponse->score < 0.5 || $gRecaptchaResponse->action !== 'business_registration_submit') {
//            return response()->json(['success' => false, 'message' => 'BOT Detected!']);
//        }

        $lastBusinessAccount = Account::where('type', 'Business')->where('number', 'like', $request->type === 'Retail' ? 'R%' : 'W%')->latest()->first();
        if ($lastBusinessAccount) {
            $number = explode('-', $lastBusinessAccount->number)[2] + 1;
        } else {
            $number = 100000;
        }

        if ($request->user === 'null') {
            $user = new User();
            $user->role_id = 0;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->type = 'Account';
            $user->status = 'Inactive';
            $user->save();
            $account = new Account();
            $account->user_id = $user->id;
            $account->number = $request->type === 'Retail' ? 'R-' . date('Ymd') . '-' . $number : 'W-' . date('Ymd') . '-' . $number;
            $account->type = 'Business';
            $account->verification_code = mt_rand(100000, 999999);
            $account->status = 'Pending';
            $account->save();
            $businessAccount = new BusinessAccount();
            $businessAccount->account_id = $account->id;
            $businessAccount->type = $request->type;
            $businessAccount->name = $request->name;

            $businessAccount->email = $request->email;
            $businessAccount->phone = $request->phone;
            $businessAccount->country = Country::where('id', $request->country_id)->first()->country;
            $businessAccount->state = $request->state;
            $businessAccount->save();
        } else {
            if (Account::where('user_id', json_decode($request->user)->id)->first()->number !== null || Account::where('user_id', json_decode($request->user)->id)->first()->type !== 'Business') {
                return response()->json(['success' => false, 'message' => 'Invalid Operation']);
            }
            $user = User::where('id', json_decode($request->user)->id)->first();
            $user->password = Hash::make($request->password);
            $user->save();
            $account = Account::where('user_id', $user->id)->first();
            $account->number = $request->type === 'Retail' ? 'R-' . date('Ymd') . '-' . $number : 'W-' . date('Ymd') . '-' . $number;
            $account->verification_code = mt_rand(100000, 999999);
            $account->save();
            $businessAccount = BusinessAccount::where('account_id', $account->id)->first();
            $businessAccount->country = Country::where('id', $request->country_id)->first()->country;
            $businessAccount->state = $request->state;
            $businessAccount->save();
        }

        Mail::to($user->email)->send(new RegistrationEmail(User::where('id', $user->id)->with('account.businessAccount')->first()));
        return response()->json(['success' => true, 'user' => User::where('id', $user->id)->with('account.businessAccount')->first()]);
    }


}
