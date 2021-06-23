<?php

namespace App\Http\Controllers\ControlPanel\Configuration;

use App\Http\Controllers\Controller;
use App\Http\Requests\ControlPanel\Configuration\PropertyRequest;
use App\Models\ControlPanel\Configuration\Category;
use App\Models\ControlPanel\Configuration\CategoryType;
use App\Models\ControlPanel\Configuration\Property;

use App\Models\ControlPanel\Configuration\Section;
use App\Models\Menu;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PropertyController extends Controller
{
    public function index()
    {
        $title = 'Property | GoodGross';
        $activeMenu = 'Property';
        $recordPerPage = 10;
        $categoryTypes = CategoryType::where('status', 'Active')->get();
        return view('ControlPanel.Configuration.property', compact(
            'title',
            'activeMenu',
            'recordPerPage',
            'categoryTypes'
        ));
    }


    public function getRecords($categoryTypeId, $searchString, $recordPerPage)
    {
        $response = Property::
            where(function ($query) use ($categoryTypeId, $searchString) {
                if ($searchString !== 'null') {
                    $query->where('property', 'like', '%' . $searchString . '%');
                    $query->orWhere('status', 'like', '%' . $searchString . '%');
                    $query->orWhere('narrative', 'like', '%' . $searchString . '%');
                }
                if ($categoryTypeId !== 'null') {
                    $sectionIds = Section::where('category_type_id', $categoryTypeId)->get(['id']);
                    $query->whereIn('section_id', $sectionIds);
                }
            })
            ->with('section.categoryType')
            ->paginate($recordPerPage);
        return response()->json($response);
    }

    public function getRecord(Request $request)
    {
        $response = Property::where('id', $request->id)->with('section.categoryType')->first();
        return response()->json($response);
    }

    public function saveRecord(PropertyRequest $request)
    {
        //return $request;
        $data = $request->get('id') === null ? new Property() : Property::find($request->get('id'));
        $data->property = $request->get('property');
        $data->section_id = $request->get('section_id');
        $data->type = $request->get('type');
        if ($request->get('type') !== 'Input' && $request->get('type') !== 'User Defined Input' && $request->get('type') !== 'Textarea' && $request->get('type') !== 'Image') {
            if ($request->get('type') === 'Input Group') {
                $inputGroups = [];
                foreach ($request->group_names as $key => $value) {
                    if ($request->group_types[$key] === 'Select') {
                        $inputGroupOptions = [];
                        foreach ($request->get('input_group_' . $key . '_options') as $groupOptionKey => $groupOptionValue) {
                            array_push($inputGroupOptions, $groupOptionValue);
                        }
                        $keyValuePair = [
                            $value . ':' . $request->group_types[$key] => $inputGroupOptions
                        ];
                        array_push($inputGroups, $keyValuePair);
                    } else {
                        array_push($inputGroups, $value . ':' . $request->group_types[$key]);
                    }
                }
                $data->options = json_encode($inputGroups);
            } else {
                $options = [];
                foreach ($request->get('options') as $key => $option) {
                    array_push($options, $option);
                }
                $data->options = json_encode($options);
            }

        }

        $data->is_required = $request->get('is_required');
        $data->is_for_search_engine = $request->get('is_for_search_engine');
        $data->is_for_product_listing = $request->get('is_for_product_listing');
        $data->is_for_filter = $request->get('is_for_filter');
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
            Property::where('id', $id)->update(['status' => $request->get('status')]);
        }
        return response()->json('Applying Bulk Operation Done Successfully');
    }

    public function deleteRecord(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric'
        ]);
        $property = Property::where('id', $request->get('id'))->with('section')->first();
        $categories = Category::where('category_type_id', $property->section->category_type_id)->where('property_ids', '!=', '---')->with('products')->get(['id', 'property_ids']);
        foreach ($categories as $category) {
            $propertyIds = explode(',', $category->property_ids);
            $key = array_search($request->get('id'), $propertyIds);
            if ($key !== false) {
                unset($propertyIds[$key]);
                Category::where('id', $category->id)->update(['property_ids' => implode(',', $propertyIds)]);
            }
            foreach ($category->products as $product) {
                $productPropertiesArray  = json_decode($product->properties, true);
                unset($productPropertiesArray[$request->get('id')]);
                Product::where('id', $product->id)->update(['properties' => json_encode($productPropertiesArray)]);
            }
        }
        Property::where('id', $request->get('id'))->delete();
        return response()->json('Property Deleted Successfully');
    }

    public function getRecordsFromSectionByCategoryTypeId(Request $request)
    {
        return response()->json(Section::where('category_type_id', $request->get('category_type_id'))->where('status', 'Active')->get());
    }
}
