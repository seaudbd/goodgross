<?php

namespace App\Http\Controllers\ControlPanel\Miscellaneous;

use App\Http\Controllers\Controller;
use App\Models\UserNotification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {

        $title = 'Notification | GoodGross';
        $activeMenu = 'Notification';
        $recordPerPage = 10;
        return view('ControlPanel.Miscellaneous.notification', compact(
            'title',
            'activeMenu',
            'recordPerPage'
        ));
    }


    public function getRecords($searchString, $recordPerPage)
    {

        $response = UserNotification::
        where('user_id', session('user_id'))
        ->where(function ($query) use ($searchString) {
            if ($searchString !== 'null') {
                $query->where('title', 'like', '%' . $searchString . '%');
                $query->orWhere('type', 'like', '%' . $searchString . '%');
            }
        })->orderBy('id', 'desc')->paginate($recordPerPage);
        return response()->json($response);

    }

    public function getRecord(Request $request)
    {
        $response = UserNotification::where('id', $request->id)->with(['transaction.product.account', 'transaction.order.guest'])->first();
        if ($response->read_at === null) {
            $response->read_at = date('Y-m-d H:i:s');
            $response->save();
        }

        return response()->json($response);
    }
}
