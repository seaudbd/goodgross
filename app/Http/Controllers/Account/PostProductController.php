<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\PostProductRequest;
use App\Mail\AccountPostProductEmail;
use App\Models\Account;
use App\Models\ControlPanel\Configuration\Category;
use App\Models\ControlPanel\Configuration\CategoryType;
use App\Models\ControlPanel\Configuration\Property;
use App\Models\ControlPanel\Configuration\Section;
use App\Models\Product;
use App\Models\ProductProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostProductController extends Controller
{
    public function index()
    {
        $title = 'Post Product | GoodGross';
        $activeNav = 'Post Product';
        $categoryTypes = CategoryType::where('status', 'Active')->get();
        return view('Account.post_product', compact('title', 'categoryTypes', 'activeNav'));
    }

    public function getCategories($categoryTypeId)
    {
        return response()->json(Category::where('category_type_id', $categoryTypeId)->where('root_id', 0)->where('status', 'Active')->get());
    }

    public function getChildCategories($categoryId)
    {
        $categories = Category::where('root_id', $categoryId)->where('status', 'Active')->get();
        if ($categories->isNotEmpty()) {
            $response['categories'] = $categories;
            $response['message'] = 'Categories Found';
        } else {
            $category = Category::where('id', $categoryId)->first();
            if ($category->property_ids !== '---') {
                $propertyIds = explode(',', $category->property_ids);
                $response['sections'] = Section::where('category_type_id', $category->category_type_id)->with(['properties' => function($query) use ($propertyIds) {
                    $query->whereIn('id', $propertyIds);
                }])->get();
                $response['message'] = 'Properties Found';
            } else {
                $response['message'] = 'Nothing Found!';
            }
        }
        return response()->json($response);
    }

    public function postProduct(PostProductRequest $request)
    {
        $account = Account::where('id', session('account_id'))->first();
        $product = new Product();
        $product->category_id = $request->get('category_id')[count($request->get('category_id')) - 1];
        $product->account_id = $account->id;
        $product->status = 'Pending';
        $product->narrative = '---';
        $product->created_by = $account->id;
        $product->save();


        $category = Category::where('id', $request->category_id[count($request->category_id )- 1])->first();
        $propertyIds = explode(',', $category->property_ids);
        $properties = Property::whereIn('id', $propertyIds)->get();

        foreach ($properties as $property) {
            $formattedPropertyName = strtolower(implode('_', explode(' ', $property->property)));
            $productProperty = new ProductProperty();
            $productProperty->product_id = $product->id;
            $productProperty->property = $property->property;
            $productProperty->value = $property->type === 'Image' ? $request->file('image')->storeAs('img/product', time() . '.' . $request->file('image')->getClientOriginalExtension(), 'public') : $request->get($formattedPropertyName);
            $productProperty->is_for_product_listing = $property->is_for_product_listing;
            $productProperty->is_for_search_engine = $property->is_for_search_engine;
            $productProperty->save();
        }
        Mail::to($account->email)->send(new AccountPostProductEmail($account));

        return response()->json($account);

    }
}
