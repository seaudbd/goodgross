<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\ConnectedAccount;
use App\Models\Transaction;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use \Stripe\StripeClient;

class MyPaymentController extends Controller
{
    public function index()
    {
        $title = 'My Payment | GoodGross';
        $activeNav = 'My Payment';
        $connectedAccounts = ConnectedAccount::where('account_id', session('account_id'))->get();
        $transactions = Transaction::whereHas('product', function($query) {
            $query->where('account_id', session('account_id'));
        })->with(['product.account', 'order.guest'])->orderBy('id', 'desc')->get();


        return view('Account.my_payment', compact('title', 'activeNav', 'connectedAccounts', 'transactions'));
    }

    public function linkConnectedAccount(Request $request)
    {
        $connectedAccount = ConnectedAccount::where('id', $request->id)->first();
        if ($connectedAccount->connected_account_origin === 'Stripe') {
            $stripe = new StripeClient(
                Config::get('stripe')['secret']
            );
            $response = $stripe->accountLinks->create([
                'account' => $connectedAccount->connected_account_id,
                'refresh_url' => url('account/my/payment/connected/account/refresh/' . $connectedAccount->id),
                'return_url' => url('account/my/payment/linked/account/success/' . $connectedAccount->id),
                'type' => 'account_onboarding',
            ]);
            return response()->json($response);
        }

    }

    public function connectedAccountRefresh($connectedAccountId)
    {
        $connectedAccount = ConnectedAccount::where('id', $connectedAccountId)->first();
        if ($connectedAccount->connected_account_origin === 'Stripe') {
            $stripe = new StripeClient(
                Config::get('stripe')['secret']
            );
            $response = $stripe->accountLinks->create([
                'account' => $connectedAccount->connected_account_id,
                'refresh_url' => url('account/my/payment/connected/account/refresh/' . $connectedAccount->id),
                'return_url' => url('account/my/payment/linked/account/success/' . $connectedAccount->id),
                'type' => 'account_onboarding',
            ]);
            return Redirect::to($response->url);
        }
    }

    public function linkedAccountSuccess($connectedAccountId)
    {
        $connectedAccount = ConnectedAccount::where('id', $connectedAccountId)->first();
        $stripe = new StripeClient(
            Config::get('stripe')['secret']
        );
        $response = $stripe->accounts->retrieve(
            $connectedAccount->connected_account_id,
            []
        );

        if ($response->capabilities->card_payments === 'active' && $response->capabilities->transfers === 'active') {
            $connectedAccount->status = 'Linked';
        }
        $connectedAccount->connected_account_object = $response;
        $connectedAccount->save();
        return Redirect::to('account/my/payment');

    }
}
