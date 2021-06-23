<?php

namespace App\Http\Controllers\ControlPanel\Configuration;

use App\Http\Controllers\Controller;
use App\Http\Requests\ControlPanel\Configuration\SectionRequest;
use App\Models\ControlPanel\Configuration\CategoryType;
use App\Models\ControlPanel\Configuration\Section;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SectionController extends Controller
{
    public function index()
    {
        $title = 'Section | GoodGross';
        $activeMenu = 'Section';
        $recordPerPage = 10;
        $categoryTypes = CategoryType::where('status', 'Active')->get();
        return view('ControlPanel.Configuration.section', compact(
            'title',
            'activeMenu',
            'categoryTypes',
            'recordPerPage'
        ));
    }


    public function getRecords($searchString, $recordPerPage)
    {
        $response = Section::
        where(function ($query) use ($searchString) {
            if ($searchString !== 'null') {
                $query->where('section', 'like', '%' . $searchString . '%');
                $query->orWhere('status', 'like', '%' . $searchString . '%');
                $query->orWhere('narrative', 'like', '%' . $searchString . '%');
            }
        })
            ->with('categoryType')
            ->paginate($recordPerPage);
        return response()->json($response);
    }

    public function getRecord(Request $request)
    {
        $response = Section::where('id', $request->id)->first();
        return response()->json($response);
    }

    public function saveRecord(SectionRequest $request)
    {
        $data = $request->get('id') === null ? new Section() : Section::find($request->get('id'));
        $data->section = $request->get('section');
        $data->category_type_id = $request->get('category_type_id');
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
            Section::where('id', $id)->update(['status' => $request->get('status')]);
        }
        return response()->json('Applying Bulk Operation Done Successfully');
    }

    public function deleteRecord(Request $request)
    {

    }
}
