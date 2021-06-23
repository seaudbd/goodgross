<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\AccountNotification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $title = 'Notification | GoodGross';
        $activeNav = 'Notification';
        return view('Account.notification', compact('title', 'activeNav'));
    }

    public function getRecords()
    {
        return response()->json(AccountNotification::where('account_id', session('account_id'))->orderBy('id', 'desc')->get());
    }
    public function getRecord(Request $request)
    {
        $accountNotification = AccountNotification::where('id', $request->id)->with(['transaction.product', 'transaction.order.guest'])->first();
        if ($accountNotification->read_at === null) {
            $accountNotification->read_at = date('Y-m-d H:i:s');
            $accountNotification->save();
        }

        return response()->json($accountNotification);
    }
}
