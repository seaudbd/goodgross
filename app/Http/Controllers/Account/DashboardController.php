<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\AccountNotification;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard | GoodGross';
        $activeNav = 'Dashboard';
        return view('Account.dashboard', compact('title', 'activeNav'));

    }

    public function getAccountNotifications()
    {
        return response()->json(AccountNotification::where('account_id', session('account_id'))->where('read_at', null)->orderBy('id', 'desc')->get());
    }

    public function changeFromPersonalToBusinessAccount(Request $request)
    {
        $request->validate([
            'account_type' => 'required|string',
            'business_name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'max:255',
                function($attribute, $value, $fail) {
                    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        $fail('Invalid Email Format Found!');
                    }
                    if ( ! empty(Account::where('login_id', $value)->where('id', '!=', session('account_id'))->first()) || ! empty(Account::where('email', $value)->where('id', '!=', session('account_id'))->first())) {
                        $fail('The Email Address has Already been Taken!');
                    }

                }
            ],
            'contact_number' => 'required|numeric'
        ]);
        Account::where('id', session('account_id'))->update(['type' => $request->get('account_type'), 'business_name' => $request->get('business_name'), 'email' => $request->get('email'), 'contact_number' => $request->get('contact_number')]);
        return response()->json('Account Type Updated Successfully');
    }
    public function changeFromRetailToWholesaleAccount(Request $request)
    {
        $request->validate([
            'business_name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'max:255',
                function($attribute, $value, $fail) {
                    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        $fail('Invalid Email Format Found!');
                    }
                    if ( ! empty(Account::where('login_id', $value)->where('id', '!=', session('account_id'))->first()) || ! empty(Account::where('email', $value)->where('id', '!=', session('account_id'))->first())) {
                        $fail('The Email Address has Already been Taken!');
                    }

                }
            ],
            'contact_number' => 'required|numeric'
        ]);
        Account::where('id', session('account_id'))->update(['type' => 'Wholesale', 'business_name' => $request->get('business_name'), 'email' => $request->get('email'), 'contact_number' => $request->get('contact_number')]);
        return response()->json('Account Type Updated Successfully');
    }

    public function logout()
    {
        session()->flush();
        return redirect('login');
    }
}
