<?php

namespace App\Http\Controllers\ControlPanel\Operation;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Config;
use \Stripe\StripeClient;

class OrderController extends Controller
{
    public function index()
    {

        $title = 'Order | GoodGross';
        $activeMenu = 'Order';
        $recordPerPage = 10;
        $user = User::where('id', Session::get('user_id'))->first();
        return view('ControlPanel.Operation.order', compact(
            'title',
            'activeMenu',
            'user',
            'recordPerPage'
        ));
    }


    public function getRecords($searchString, $recordPerPage)
    {
        $response = Order::
            where(function ($query) use ($searchString) {
                if ($searchString !== 'null') {
                    $query->where('number', 'like', '%' . $searchString . '%');
                    $query->orWhere('status', 'like', '%' . $searchString . '%');
                    $query->orWhere('narrative', 'like', '%' . $searchString . '%');
                }
            })
            ->with(['transactions.product.account', 'guest'])
            ->paginate($recordPerPage);
        return response()->json($response);
    }

    public function getOrderDetailsRecords(Request $request)
    {
        $response = Order::where('id', $request->id)->with(['transactions.product.account', 'guest'])->first();
        return response()->json($response);

    }

    public function payoutToSeller(Request $request)
    {
        $transaction = Transaction::where('id', $request->id)->with('product.account.connectedAccounts')->first();
        $stripeConnectedAccountId = '';
        foreach ($transaction->product->account->connectedAccounts as $connectedAccount) {
            if ($connectedAccount->connected_account_origin === 'Stripe') {
                $stripeConnectedAccountId = $connectedAccount->connected_account_id;
                break;
            }
        }
        $stripe = new StripeClient(
            Config::get('stripe')['secret']
        );
        $response = $stripe->transfers->create([
            'amount' => $transaction->quantity * $transaction->price_per_unit * 100,
            'currency' => 'usd',
            'destination' => $stripeConnectedAccountId,
        ]);
        $transaction->payout_status = 'Paid';
        $transaction->transfer_object = $response;
        $transaction->save();
        return response()->json($transaction);
    }
}
