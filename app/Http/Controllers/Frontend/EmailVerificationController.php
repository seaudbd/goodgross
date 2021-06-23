<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\EmailVerificationRequest;
use App\Models\Account;
use App\Models\ConnectedAccount;
use App\Models\Product;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use \Stripe\StripeClient;


class EmailVerificationController extends Controller
{
    public function loadEmailVerification($userId) {
        $title = 'Email Verification';
        $activeNav = 'Email Verification';
        $user = User::where('id', $userId)->with(['account'])->first();
        return view('Frontend.email_verification', compact('title', 'user', 'activeNav'));
    }

    public function verifyEmail(EmailVerificationRequest $request) {

//        $gRecaptchaResponse = Helper::verifyGoogleRecaptchaToken($request->get('g_recaptcha_token'));
//        if ($gRecaptchaResponse->success === false || $gRecaptchaResponse->score < 0.5 || $gRecaptchaResponse->action !== 'email_verification_form_submit') {
//            return response()->json(['success' => false, 'message' => 'BOT Detected!']);
//        }


        $account = Account::where('user_id', $request->user_id)->where('verification_code', $request->verification_code)->first();

        if ( ! empty($account)) {
            $user = User::where('id', $request->user_id)->first();
            $user->status = 'Active';
            $user->save();
            $account->verification_code = null;
            $account->status = 'Verified';
            $account->save();
            if ( ! empty(Product::where('account_id', $account->id)->first())) {
                Product::where('account_id', $account->id)->update(['status' => 'Pending']);
            }
            $stripe = new StripeClient(
                Config::get('stripe')['secret']
            );
            $stripeConnectedAccount = $stripe->accounts->create([
                'type' => 'express',
                'country' => 'US',
                'email' => $user->email,
                'capabilities' => [
                    'card_payments' => ['requested' => true],
                    'transfers' => ['requested' => true],
                ],
            ]);
            $connectedAccount = new ConnectedAccount();
            $connectedAccount->account_id = $account->id;
            $connectedAccount->connected_account_id = $stripeConnectedAccount->id;
            $connectedAccount->connected_account_object = $stripeConnectedAccount;
            $connectedAccount->connected_account_origin = 'Stripe';
            $connectedAccount->status = 'Pending';
            $connectedAccount->save();
            Auth::login($user);

            return response()->json(['success' => true, 'message' => 'Email Verification Successful']);
        } else {
            return response()->json(['success' => false, 'message' => 'Invalid Verification Code Entered!']);
        }

    }
}
