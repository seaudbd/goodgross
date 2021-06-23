<?php

namespace App\Http\Controllers\ControlPanel\Configuration;

use App\Http\Controllers\Controller;
use App\Http\Requests\ControlPanel\Configuration\CategoryTypeRequest;
use App\Models\ControlPanel\Configuration\CategoryType;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryTypeController extends Controller
{
    public function index()
    {

        $title = 'Category Type | GoodGross';
        $activeMenu = 'Category Type';
        $recordPerPage = 10;
        return view('ControlPanel.Configuration.category_type', compact(
            'title',
            'activeMenu',
            'recordPerPage'
        ));
    }


    public function getRecords($searchString, $recordPerPage)
    {
        $response = CategoryType::
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
        $response = CategoryType::where('id', $request->id)->first();
        return response()->json($response);
    }

    public function saveRecord(CategoryTypeRequest $request)
    {
        $data = $request->get('id') === null ? new CategoryType() : CategoryType::find($request->get('id'));
        $data->category_type = $request->get('category_type');
        $data->status = $request->get('status');
        $data->narrative = $request->get('narrative') === null ? '---' : $request->get('narrative');
        $request->get('id') === null ? $data->created_by = session('id') : $data->updated_by = session('id');
        $data->save();
        return response()->json($data);
    }

    public function applyBulkOperation(Request $request)
    {
        $request->validate([
            'ids' => 'required|string'
        ]);
        $ids = explode(',', $request->get('ids'));
        foreach ($ids as $id) {
            CategoryType::where('id', $id)->update(['status' => $request->get('status')]);
        }
        return response()->json('Applying Bulk Operation Done Successfully');
    }

    public function deleteRecord(Request $request)
    {

    }
}
