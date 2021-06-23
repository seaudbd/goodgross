<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;

use App\Models\Account\PaymentMethod;
use App\Models\UserNotification;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        $activeMenu = 'Dashboard';
        return view('ControlPanel.dashboard', compact('title', 'activeMenu'));
    }

    public function getAdminNotifications()
    {
        return response()->json(UserNotification::where('user_id', session('user_id'))->where('read_at', null)->orderBy('id', 'desc')->get());
    }

    public function logout()
    {
        session()->flush();
        return redirect('control/panel/sign/in');
    }

    public function changePassword(Request $request)
    {

        $request->validate([
            'current_password' => [
                'required',
                function($attribute, $value, $fail) {
                    if (empty(User::where('id', session('session_id'))->where('password', sha1($value))->first())) {
                        $fail('Invalid Current Password Found!');
                    }
                }
            ],
            'password' => [
                'required',
                'min:8',
                'max:20',
                'confirmed'
            ]
        ]);

        User::where('id', session('session_id'))->update(['password' => sha1($request->get('password'))]);
        return response()->json('Password Changed Successfully');

    }


}
