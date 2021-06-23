<?php

namespace App\Http\Controllers\ControlPanel\Operation;

use App\Http\Controllers\Controller;
use App\Http\Requests\ControlPanel\Operation\AccountTransactionRequest;
use App\Models\Account;
use App\Models\Account\PaymentMethod;

use App\Models\Menu;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index($id)
    {
        $firstLevelMenus = Menu::where('root_id', 0)->where('status', 'Active')->get();
        $operationLists = explode(',', Menu::where('id', $id)->first()->operation_list);
        $finalOperationLists = [];
        foreach ($operationLists as $operationList) {
            $temp = explode(':', $operationList);
            $finalOperationLists[$temp[0]] = $temp[1];
        }
        $activeMenuValue = $finalOperationLists['activeMenuValue'];
        $activeSubMenuValue = $finalOperationLists['activeSubMenuValue'];
        $title = $activeSubMenuValue;
        $activeMenuId = $finalOperationLists['activeMenuId'];
        $activeSubMenuId = $finalOperationLists['activeSubMenuId'];
        $recordPerPage = $finalOperationLists['recordPerPage'];
        return view('ControlPanel.Operation.customer', compact(
            'title',
            'activeMenuId',
            'activeSubMenuId',
            'activeMenuValue',
            'activeSubMenuValue',
            'firstLevelMenus',
            'recordPerPage'
        ));
    }

    public function getRecords($searchString, $recordPerPage)
    {
        $response = Customer::
            where(function ($query) use ($searchString) {
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
            ->with('customerAccount')
            ->paginate($recordPerPage);
        return response()->json($response);
    }

    public function applyBulkOperation(Request $request)
    {
        $request->validate([
            'ids' => 'required|string'
        ]);
        $ids = explode(',', $request->get('ids'));
        foreach ($ids as $id) {
            Customer::where('id', $id)->update(['status' => $request->get('status')]);
        }
        return response()->json('Applying Bulk Operation Done Successfully');
    }

    public function delete(Request $request)
    {
        Customer::where('id', $request->get('id'))->delete();
        PaymentMethod::where('customer_id', $request->get('id'))->delete();
        return response()->json('Customer Deleted Successfully');
    }

    public function changeStatus(Request $request)
    {
        Customer::where('id', $request->get('id'))->update(['status' => $request->get('status')]);
        return response()->json('Status Changed Successfully');
    }

    public function getAccountTransactions(Request $request)
    {
        return response()->json(CustomerAccountTransaction::where('customer_account_id', $request->get('customer_account_id'))->get());
    }

    public function getAccountTransaction(Request $request)
    {
        return response()->json(CustomerAccountTransaction::where('id', $request->get('id'))->first());
    }

    public function saveAccountTransaction(AccountTransactionRequest $request)
    {
        $customerAccountTransaction = $request->get('customer_account_transaction_id') === null ? new CustomerAccountTransaction() : CustomerAccountTransaction::find($request->get('customer_account_transaction_id'));
        $customerAccountTransaction->customer_account_id = $request->get('customer_account_id');
        $customerAccountTransaction->number = strtoupper(uniqid());
        $customerAccountTransaction->debit = $request->get('transaction_type') === 'debit' ? $request->get('transaction_amount') : 0;
        $customerAccountTransaction->credit = $request->get('transaction_type') === 'credit' ? $request->get('transaction_amount') : 0;
        $customerAccountTransaction->particulars = $request->get('transaction_particulars') === null ? '---' : $request->get('transaction_particulars');
        $customerAccountTransaction->particulars = $request->get('transaction_particulars') === null ? '---' : $request->get('transaction_particulars');
        $customerAccountTransaction->status = $request->get('transaction_status');
        $customerAccountTransaction->narrative = $request->get('transaction_narrative') === null ? '---' : $request->get('transaction_narrative');
        $request->get('customer_account_transaction_id') === null ? $customerAccountTransaction->created_by = session('session_id') : $customerAccountTransaction->updated_by = session('session_id');
        $customerAccountTransaction->save();

    }

    public function getAccessCode(Request $request)
    {
        return response()->json(Customer::where('id', $request->get('id'))->first());
    }

    public function saveAccessCode(Request $request)
    {
        $request->validate([
            'access_code' => 'required|max:255',
            'id' => 'required|numeric'
        ]);
        Customer::where('id', $request->get('id'))->update(['access_code' => $request->get('access_code')]);
        return response()->json('Access Code Saved Successfully');
    }
}
