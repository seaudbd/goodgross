<?php

namespace App\Http\Controllers\ControlPanel\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\ControlPanel\Settings\SalesTaxRequest;
use App\Imports\SalesTaxImport;
use App\Models\ControlPanel\Settings\SalesTax;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SalesTaxController extends Controller
{
    public function index()
    {

        $title = 'Sales Tax | GoodGross';
        $activeMenu = 'Sales Tax';
        $recordPerPage = 10;
        return view('ControlPanel.Settings.sales_tax', compact(
            'title',
            'activeMenu',
            'recordPerPage'
        ));
    }

    public function getRecords($searchString, $recordPerPage)
    {
        $response = SalesTax::
        where(function ($query) use ($searchString) {
            if ($searchString !== 'null') {
                $query->where('category_type', 'like', '%' . $searchString . '%');
                $query->orWhere('status', 'like', '%' . $searchString . '%');
                $query->orWhere('narrative', 'like', '%' . $searchString . '%');
            }
        })
            ->paginate($recordPerPage);
        return response()->json($response);
    }


    public function getRecord(Request $request)
    {
        $response = SalesTax::where('id', $request->id)->first();
        return response()->json($response);
    }

    public function saveRecord(SalesTaxRequest $request)
    {
        $data = $request->get('id') === null ? new SalesTax() : SalesTax::find($request->get('id'));
        $data->state = $request->get('state');
        $data->zip_code = $request->get('zip_code');
        $data->region_name = $request->get('region_name');
        $data->state_rate = $request->get('state_rate');
        $data->estimated_combined_rate = $request->get('estimated_combined_rate');
        $data->estimated_country_rate = $request->get('estimated_country_rate');
        $data->estimated_city_rate = $request->get('estimated_city_rate');
        $data->estimated_special_rate = $request->get('estimated_special_rate');
        $data->risk_level = $request->get('risk_level');
        $data->status = $request->get('status');
        $data->narrative = $request->get('narrative') === null ? '---' : $request->get('narrative');
        $request->get('id') === null ? $data->created_by = session('id') : $data->updated_by = session('id');
        $data->save();
        return response()->json($data);
    }

    public function executeBulkAddOrUpdate(Request $request)
    {
        $request->validate([
            'sales_tax_files' => 'required|array',
            'sales_tax_files.*' => 'file|mimeTypes:text/plain'
        ]);
        $uploadedFiles = $request->file('sales_tax_files');

        foreach ($uploadedFiles as $key => $uploadedFile) {
            Excel::import(new SalesTaxImport, $uploadedFile);

        }

        return response()->json(['success' => true, 'message' => 'Files Uploaded Successfully']);

    }

    public function applyBulkOperation(Request $request)
    {
        $request->validate([
            'ids' => 'required|string'
        ]);
        $ids = explode(',', $request->get('ids'));
        foreach ($ids as $id) {
            SalesTax::where('id', $id)->update(['status' => $request->get('status')]);
        }
        return response()->json('Applying Bulk Operation Done Successfully');
    }
}
