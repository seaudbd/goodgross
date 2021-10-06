<?php

namespace App\Http\Controllers\Frontend;


use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\SignInRequest;


use App\Mail\VerificationCodeEmail;
use App\Models\Account;

use App\Models\Country;
use App\Models\PersonalAccount;
use App\Models\State;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;


class SignInController extends Controller
{
    public function loadAccountSignIn()
    {
        $title = 'Account Sign in';
        $activeNav = 'Account Sign in';
        return view('Frontend.account_sign_in', compact('title', 'activeNav'));
    }

    public function authenticateAccountSignIn(SignInRequest $request)
    {
//        $gRecaptchaResponse = Helper::verifyGoogleRecaptchaToken($request->get('g_recaptcha_token'));
//        if ($gRecaptchaResponse->success === false || $gRecaptchaResponse->score < 0.5 || $gRecaptchaResponse->action !== 'account_sign_in_form_submit') {
//            return response()->json(['success' => false, 'message' => 'BOT Detected!']);
//        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 'Active'], (int)$request->remember_me)) {
            $request->session()->regenerate();
            return response()->json(['success' => true, 'message' => 'Authorized Account Access']);
        }

        $user = User::where('email', $request->email)->where('password', $request->password)->first();

        if ($user) {
            $account = Account::where('user_id', $user->id)->first();
            if ($account) {
                if ($account->status === 'Pending') {
                    $account->verification_code = mt_rand(100000, 999999);
                    $account->save();
                    Mail::to($account->email)->send(new VerificationCodeEmail($account));
                    return response()->json(['success' => false, 'message' => 'Pending Account', 'data' => $account]);
                }
            }
        }

        return response()->json(['success' => false, 'message' => 'Unauthorized Access!']);

    }


    public function loadControlPanelSignIn()
    {
        $title = 'Control Panel Sign in';
        $activeNav = 'Control Panel Sign in';
        return view('Frontend.control_panel_sign_in', compact('title', 'activeNav'));
    }

    public function authenticateControlPanelSignIn(SignInRequest $request)
    {

//        $gRecaptchaResponse = Helper::verifyGoogleRecaptchaToken($request->get('g_recaptcha_token'));
//        if ($gRecaptchaResponse->success === false || $gRecaptchaResponse->score < 0.5 || $gRecaptchaResponse->action !== 'control_panel_sign_in_form_submit') {
//            return response()->json(['success' => false, 'message' => 'BOT Detected!']);
//        }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 'Active'], (int)$request->remember_me)) {
            $request->session()->regenerate();
            return response()->json(['success' => true, 'message' => 'Authorized Control Panel Access']);
        }

        return response()->json(['success' => false, 'message' => 'Unauthorized Access!']);
    }

    public function redirectToProvider($provider, $whereTo) {


        Session::forget('provider_error');
        if ($whereTo === 'dashboard') {

            $redirectUri = 'account/dashboard';

        } else {
            $redirectUri = url()->previous();

        }
        Session::put('redirect_uri', $redirectUri);
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider) {

        try {
            $redirectUri = Session::get('redirect_uri');
            Session::forget('redirect_uri');
            $providerUser = Socialite::driver($provider)->user();

            if ($user = User::where('provider_id', $providerUser->getId())->first()) {
                Auth::login($user);
                return redirect($redirectUri);
            } else {
                $user = new User();
                $user->role_id = 0;
                $user->name = $providerUser->getName();
                $user->email = $providerUser->getEmail();
                $user->provider_id = $providerUser->getId();
                $user->avatar = $providerUser->getAvatar();
                $user->type = 'Account';
                $user->status = 'Active';
                $user->save();

                $account = new Account();
                $account->user_id = $user->id;
                $account->number = empty(Account::where('type', 'Personal')->max('number')) ? 100000 : Account::where('type', 'Personal')->max('number') + 1;
                $account->type = 'Personal';
                $account->status = 'Verified';
                $account->save();




                $personalAccount = new PersonalAccount();
                $personalAccount->account_id = $account->id;

                $personalAccount->email = $providerUser->getEmail();
                $personalAccount->save();
                Auth::login($user);
                return redirect($redirectUri);

            }
        } catch (\Exception $exception) {
            Session::put('provider_error', $exception->getMessage());
            return redirect('account/sign/in');
        }

    }


    public function checkAccountLoginStatus()
    {

        if (auth()->check()) {
            return response()->json(['account_login_status' => true]);
        } else {
            return response()->json(['account_login_status' => false]);
        }
    }

    public function accountSignOut()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect('account/sign/in');

    }

    public function controlPanelSignOut()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect('control/panel/sign/in');

    }

}
