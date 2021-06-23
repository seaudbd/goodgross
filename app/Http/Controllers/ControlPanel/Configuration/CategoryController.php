<?php

namespace App\Http\Controllers\ControlPanel\Configuration;

use App\Http\Controllers\Controller;
use App\Http\Requests\ControlPanel\Configuration\CategoryRequest;
use App\Models\ControlPanel\Configuration\Category;
use App\Models\ControlPanel\Configuration\CategoryType;
use App\Models\ControlPanel\Configuration\Property;
use App\Models\ControlPanel\Configuration\Section;
use App\Models\Menu;
use App\Models\Option;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryIds = [];


    public function index()
    {
        $title = 'Category | GoodGross';
        $activeMenu = 'Category';
        $recordPerPage = 10;
        $categoryLevel = Option::where('option', 'Category Level')->first(['value'])->value;
        $categoryTypes = CategoryType::where('status', 'Active')->get();
        return view('ControlPanel.Configuration.category', compact(
            'title',
            'activeMenu',
            'recordPerPage',
            'categoryLevel',
            'categoryTypes'
        ));
    }


    public function getRecords($categoryTypeId, $level, $searchString, $recordPerPage)
    {
        $response = Category::
            where(function ($query) use ($categoryTypeId, $level, $searchString) {
                if ($categoryTypeId !== 'null') {
                    $query->where('category_type_id', $categoryTypeId);
                }
                if ($level !== 'null') {
                    $query->where('level', $level);
                }
                if ($searchString !== 'null') {
                    $query->where('category', 'like', '%' . $searchString . '%');
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
        $category = Category::where('id', $request->id)->first();
        $response['category'] = $category;
        if ($category->root_id !== 0) {
            $response['roots'] = Category::where('category_type_id', $category->category_type_id)->where('level', ($category->level - 1))->get();
        }
        $response['sections'] = Section::where('category_type_id', $category->category_type_id)->with('properties')->get();
        return response()->json($response);
    }

    public function saveRecord(CategoryRequest $request)
    {
        $data = $request->get('id') === null ? new Category() : Category::find($request->get('id'));
        $data->category = $request->get('category');
        $data->category_type_id = $request->get('category_type_id');
        $data->level = $request->get('level');
        $data->root_id = $request->get('root_id') === null ? 0 : $request->get('root_id');
        $data->property_ids = $request->get('property_ids') === null ? '---' : $request->get('property_ids');
        $request->get('id') !== null ? $data->sequence = $request->get('sequence') : $data->sequence = Category::where('category_type_id', $request->get('category_type_id'))->where('level', $request->get('level'))->max('sequence') + 1;
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
            Category::where('id', $id)->update(['status' => $request->get('status')]);
        }
        return response()->json('Applying Bulk Operation Done Successfully');
    }

    public function deleteRecord(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric'
        ]);

        array_push($this->categoryIds, (int)$request->get('id'));
        $this->findChildCategories($request->get('id'));
        Category::whereIn('id', $this->categoryIds)->delete();
        Product::whereIn('category_id', $this->categoryIds)->delete();
        return response()->json('Category Deleted Successfully');
    }

    public function getRecordsFromSectionByCategoryTypeId(Request $request)
    {
        return response()->json(Section::where('category_type_id', $request->category_type_id)->with('properties')->get());
    }

    public function getRootRecordsByCategoryTypeIdAndLevel(Request $request)
    {
        return response()->json(Category::where('category_type_id', $request->category_type_id)->where('level', ($request->level - 1))->get());
    }



    public function findChildCategories($id)
    {
        $childCategories = Category::where('root_id', $id)->get();
        if ($childCategories->isNotEmpty()) {
            $returnValue = $this->pushCategoryIds($childCategories);
            if ($returnValue === false) {
                return $this->categoryIds;
            }
        }
    }
    public function pushCategoryIds($childCategories)
    {
        foreach ($childCategories as $childCategory) {
            array_push($this->categoryIds, $childCategory->id);
        }
        foreach ($childCategories as $childCategory) {
            $this->findChildCategories($childCategory->id);
        }
        return false;
    }

    public function updateSequence(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric',
            'sequence' => 'required|numeric'
        ]);
        Category::where('id', $request->get('id'))->update(['sequence' => $request->get('sequence')]);
        return response()->json('Sequence Updated Successfully');
    }
}
