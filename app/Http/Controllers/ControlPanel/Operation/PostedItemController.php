<?php

namespace App\Http\Controllers\ControlPanel\Operation;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostedItemController extends Controller
{


    //////////////////////////////////////////////////Retail//////////////////////////////////////////////////////////////
    public function loadRetailItems()
    {
        $title = 'Posted Retail Items | GoodGross';
        $activeMenu = 'Posted Retail Items';
        $recordPerPage = 10;

        return view('ControlPanel.Operation.posted_retail_items', compact(
            'title',
            'activeMenu',
            'recordPerPage'
        ));
    }

    public function getRetailRecords($searchString, $recordPerPage)
    {
        $response = Product::
            whereHas('category', function ($query) {
                $query->where('category_type_id', 1);
            })
            ->where(function ($query) use ($searchString) {
                if ($searchString !== 'null') {
                    $query->where('number', 'like', '%' . $searchString . '%');
                    $query->orWhere('login_id', 'like', '%' . $searchString . '%');
                    $query->orWhere('name', 'like', '%' . $searchString . '%');
                    $query->orWhere('email', 'like', '%' . $searchString . '%');
                    $query->orWhere('contact_number', 'like', '%' . $searchString . '%');
                    $query->orWhere('status', 'like', '%' . $searchString . '%');
                    $query->orWhere('narrative', 'like', '%' . $searchString . '%');
                }
            })
            ->with(['account.personalAccount', 'account.businessAccount', 'productProperties.property'])
            ->paginate($recordPerPage);
        return response()->json($response);
    }

    public function applyBulkOperationOnRetailItems(Request $request)
    {
        $request->validate([
            'ids' => 'required|string'
        ]);
        $ids = explode(',', $request->get('ids'));
        foreach ($ids as $id) {
            Product::where('id', $id)->update(['status' => $request->get('status')]);
        }
        return response()->json('Applying Bulk Operation Done Successfully');
    }

    public function changeStatusOfRetailItem(Request $request)
    {
        Product::where('id', $request->get('id'))->update(['status' => $request->get('status')]);
        return response()->json(['success' => true, 'message' => 'Status Updated Successfully']);
    }


    //////////////////////////////////////////////////Wholesale//////////////////////////////////////////////////////////////



    public function loadWholesaleItems()
    {
        $title = 'Posted Wholesale Items | GoodGross';
        $activeMenu = 'Posted Wholesale Items';
        $recordPerPage = 10;

        return view('ControlPanel.Operation.posted_wholesale_items', compact(
            'title',
            'activeMenu',
            'recordPerPage'
        ));
    }

    public function getWholesaleRecords($searchString, $recordPerPage)
    {
        $response = Product::
        whereHas('category', function ($query) {
            $query->where('category_type_id', 2);
        })
            ->where(function ($query) use ($searchString) {
                if ($searchString !== 'null') {
                    $query->where('number', 'like', '%' . $searchString . '%');
                    $query->orWhere('login_id', 'like', '%' . $searchString . '%');
                    $query->orWhere('name', 'like', '%' . $searchString . '%');
                    $query->orWhere('email', 'like', '%' . $searchString . '%');
                    $query->orWhere('contact_number', 'like', '%' . $searchString . '%');
                    $query->orWhere('status', 'like', '%' . $searchString . '%');
                    $query->orWhere('narrative', 'like', '%' . $searchString . '%');
                }
            })
            ->with(['account.personalAccount', 'account.businessAccount', 'productProperties.property'])
            ->paginate($recordPerPage);
        return response()->json($response);
    }

    public function applyBulkOperationOnWholesaleItems(Request $request)
    {
        $request->validate([
            'ids' => 'required|string'
        ]);
        $ids = explode(',', $request->get('ids'));
        foreach ($ids as $id) {
            Product::where('id', $id)->update(['status' => $request->get('status')]);
        }
        return response()->json('Applying Bulk Operation Done Successfully');
    }

    public function changeStatusOfWholesaleItem(Request $request)
    {
        Product::where('id', $request->get('id'))->update(['status' => $request->get('status')]);
        return response()->json(['success' => true, 'message' => 'Status Updated Successfully']);
    }










}
