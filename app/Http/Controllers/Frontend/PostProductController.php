<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\PostProductRequest;
use App\Mail\PostProductEmail;
use App\Models\Account;
use App\Models\ControlPanel\Configuration\Category;
use App\Models\ControlPanel\Configuration\CategoryType;
use App\Models\ControlPanel\Configuration\Property;
use App\Models\ControlPanel\Configuration\Section;
use App\Models\BusinessAccount;
use App\Models\PersonalAccount;
use App\Models\Product;
use App\Models\ProductProperty;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Image;



class PostProductController extends Controller
{
    public function loadPostingProduct()
    {
        $title = 'Post Product';
        $activeNav = 'Post Product';
        $categoryTypes = CategoryType::where('status', 'Active')->get();
        Session::forget('uploaded_files');
        return view('Frontend.post_product', compact('title', 'categoryTypes', 'activeNav'));
    }

    public function getCategoriesByCategoryTypeId(Request $request)
    {
        return response()->json(Category::where('category_type_id', $request->category_type_id)->where('root_id', 0)->where('status', 'Active')->get());
    }

    public function getChildCategoriesByCategoryId(Request $request)
    {
        $categories = Category::where('root_id', $request->category_id)->where('status', 'Active')->get();
        if ($categories->isNotEmpty()) {
            $response['categories'] = $categories;
            $response['message'] = 'Categories Found';
        } else {
            $category = Category::where('id', $request->category_id)->first();
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

    public function removeUploadedFile(Request $request)
    {
        $uploadedFiles = Session::get('uploaded_files');
        if ($uploadedFiles) {
            foreach ($uploadedFiles as $key => $uploadedFile) {
                if ($request->get('name') === $uploadedFile['client_original_name']) {
                    Storage::disk('public')->delete($uploadedFile['path']);
                    unset($uploadedFiles[$key]);
                    break;
                }
            }
            Session::put('uploaded_files', $uploadedFiles);
        }
        return response()->json(['success' => true]);
    }

    public function uploadFile(Request $request)
    {


        if ($request->file('file')->getSize() > 2048000) {
            return response()->json(['success' => false, 'reason' => 'Size']);
        }
        if ($request->file('file')->getClientMimeType() !== 'image/jpeg' && $request->file('file')->getClientMimeType() !== 'image/png') {
            return response()->json(['success' => false, 'reason' => 'Type']);
        }

        if (Image::make($request->file('file'))->width() > 1600 || Image::make($request->file('file'))->width() < 800) {
            return response()->json(['success' => false, 'reason' => 'Width']);
        }
        if (Image::make($request->file('file'))->height() > 1200 || Image::make($request->file('file'))->height() < 600) {
            return response()->json(['success' => false, 'reason' => 'Height']);
        }

        if ((Image::make($request->file('file'))->width() / 4) !== (Image::make($request->file('file'))->height() / 3)) {
            return response()->json(['success' => false, 'reason' => 'Aspect Ratio']);
        }

        $fileName = sha1(md5(rand(100000, 999999))) . '.' . $request->file('file')->getClientOriginalExtension();
        $path = $request->file('file')->storeAs('img/product/session', $fileName, 'public');

        Session::push('uploaded_files', ['client_original_name' => $request->file('file')->getClientOriginalName(), 'path' => $path, 'system_originated_name' => $fileName]);
        return response()->json(['success' => true, 'data' => Session::get('uploaded_files')]);
    }

    public function postProduct(PostProductRequest $request)
    {
        if ( ! auth()->check()) {

            $user = new User();
            $user->role_id = 0;
            $user->name = $request->account_type === 'Personal' ? ($request->first_name . ' ' . $request->last_name) : $request->name;
            $user->email = $request->email;
            $user->type = 'Account';
            $user->status = 'Inactive';
            $user->save();

            $account = new Account();
            $account->user_id = $user->id;
            $account->type = $request->account_type;
            $account->status = 'Posted';
            $account->save();

            if ($request->account_type === 'Personal') {
                $personalAccount = new PersonalAccount();
                $personalAccount->account_id = $account->id;
                $personalAccount->first_name = $request->first_name;
                $personalAccount->last_name = $request->last_name;
                $personalAccount->email = $request->email;
                $personalAccount->phone = $request->phone;
                $personalAccount->save();
            } else {
                $businessAccount = new BusinessAccount();
                $businessAccount->account_id = $account->id;
                $businessAccount->name = $request->name;
                $businessAccount->type = $request->type;
                $businessAccount->email = $request->email;
                $businessAccount->phone = $request->phone;
                $businessAccount->save();
            }
        }

        $product = new Product();
        $product->category_id = $request->get('category_id')[count($request->get('category_id')) - 1];
        $product->account_id = auth()->check() ? auth()->user()->account->id : $account->id;
        $product->status = auth()->check() ? 'Pending' : 'Posted';
        $product->save();

        $category = Category::where('id', $request->category_id[count($request->category_id )- 1])->first();
        $propertyIds = explode(',', $category->property_ids);
        $properties = Property::whereIn('id', $propertyIds)->get();

        foreach ($properties as $property) {
            $formattedPropertyName = strtolower(implode('_', explode(' ', $property->property)));
            $productProperty = new ProductProperty();
            $productProperty->product_id = $product->id;
            $productProperty->property_id = $property->id;
            if ($property->type !== 'User Defined Input') {
                if ($property->type === 'Input Group') {
                    $inputGroups = [];
                    foreach ($request->get($formattedPropertyName) as $inputGroupKey => $inputGroupValue) {
                        $inputGroups[ucwords(implode(' ', explode('_', $inputGroupKey)))] = $inputGroupValue;
                    }
                    $productProperty->value = json_encode($inputGroups);

                } else {
                    if ($property->type === 'Image' && $property->is_required === 1) {
                        $uploadedFiles = Session::get('uploaded_files');
                        $originalPaths = [];
                        foreach ($uploadedFiles as $key => $uploadedFile) {
                            if ( ! Storage::disk('public')->exists('img/product/original/' . date('Y'))) {
                                Storage::disk('public')->makeDirectory('img/product/original/' . date('Y'));
                            }
                            if ( ! Storage::disk('public')->exists('img/product/original/' . date('Y') . '/' . date('F'))) {
                                Storage::disk('public')->makeDirectory('img/product/original/' . date('Y') . '/' . date('F'));
                            }
                            $fileName = $product->account_id . '-' . $uploadedFile['system_originated_name'];
                            $filePath = 'img/product/original/' . date('Y') . '/' . date('F') . '/' . $fileName;
                            array_push($originalPaths, $filePath);
                            Storage::disk('public')->copy($uploadedFile['path'], $filePath);


                            /////////////////////////////////////////////////////4:3//////////////////////////////////////////////
                            $img200x150 = Image::make(storage_path('app/public/' . $uploadedFile['path']))->resize(200, 150);
                            $img480x360 = Image::make(storage_path('app/public/' . $uploadedFile['path']))->resize(480, 360);
                            $img640x480 = Image::make(storage_path('app/public/' . $uploadedFile['path']))->resize(640, 480);
                            $img800x600 = Image::make(storage_path('app/public/' . $uploadedFile['path']))->resize(800, 600);

                            if ( ! Storage::disk('public')->exists('img/product/200x150/' . date('Y'))) {
                                Storage::disk('public')->makeDirectory('img/product/200x150/' . date('Y'));
                            }
                            if ( ! Storage::disk('public')->exists('img/product/200x150/' . date('Y') . '/' . date('F'))) {
                                Storage::disk('public')->makeDirectory('img/product/200x150/' . date('Y') . '/' . date('F'));
                            }
                            $img200x150->save(storage_path('app/public/img/product/200x150/' . date('Y') . '/' . date('F') . '/' . $fileName));

                            if ( ! Storage::disk('public')->exists('img/product/480x360/' . date('Y'))) {
                                Storage::disk('public')->makeDirectory('img/product/480x360/' . date('Y'));
                            }
                            if ( ! Storage::disk('public')->exists('img/product/480x360/' . date('Y') . '/' . date('F'))) {
                                Storage::disk('public')->makeDirectory('img/product/480x360/' . date('Y') . '/' . date('F'));
                            }
                            $img480x360->save(storage_path('app/public/img/product/480x360/' . date('Y') . '/' . date('F') . '/' . $fileName));

                            if ( ! Storage::disk('public')->exists('img/product/640x480/' . date('Y'))) {
                                Storage::disk('public')->makeDirectory('img/product/640x480/' . date('Y'));
                            }
                            if ( ! Storage::disk('public')->exists('img/product/640x480/' . date('Y') . '/' . date('F'))) {
                                Storage::disk('public')->makeDirectory('img/product/640x480/' . date('Y') . '/' . date('F'));
                            }
                            $img640x480->save(storage_path('app/public/img/product/640x480/' . date('Y') . '/' . date('F') . '/' . $fileName));

                            if ( ! Storage::disk('public')->exists('img/product/800x600/' . date('Y'))) {
                                Storage::disk('public')->makeDirectory('img/product/800x600/' . date('Y'));
                            }
                            if ( ! Storage::disk('public')->exists('img/product/800x600/' . date('Y') . '/' . date('F'))) {
                                Storage::disk('public')->makeDirectory('img/product/800x600/' . date('Y') . '/' . date('F'));
                            }
                            $img800x600->save(storage_path('app/public/img/product/800x600/' . date('Y') . '/' . date('F') . '/' . $fileName));


                            /////////////////////////////////////////////////////16:9//////////////////////////////////////////////
                            $img256x144 = Image::make(storage_path('app/public/' . $uploadedFile['path']))->resize(256, 144);
                            $img320x180 = Image::make(storage_path('app/public/' . $uploadedFile['path']))->resize(320, 180);
                            $img480x270 = Image::make(storage_path('app/public/' . $uploadedFile['path']))->resize(480, 270);
                            $img640x360 = Image::make(storage_path('app/public/' . $uploadedFile['path']))->resize(640, 360);
                            $img800x450 = Image::make(storage_path('app/public/' . $uploadedFile['path']))->resize(800, 450);


                            if ( ! Storage::disk('public')->exists('img/product/256x144/' . date('Y'))) {
                                Storage::disk('public')->makeDirectory('img/product/256x144/' . date('Y'));
                            }
                            if ( ! Storage::disk('public')->exists('img/product/256x144/' . date('Y') . '/' . date('F'))) {
                                Storage::disk('public')->makeDirectory('img/product/256x144/' . date('Y') . '/' . date('F'));
                            }
                            $img256x144->save(storage_path('app/public/img/product/256x144/' . date('Y') . '/' . date('F') . '/' . $fileName));


                            if ( ! Storage::disk('public')->exists('img/product/320x180/' . date('Y'))) {
                                Storage::disk('public')->makeDirectory('img/product/320x180/' . date('Y'));
                            }
                            if ( ! Storage::disk('public')->exists('img/product/320x180/' . date('Y') . '/' . date('F'))) {
                                Storage::disk('public')->makeDirectory('img/product/320x180/' . date('Y') . '/' . date('F'));
                            }
                            $img320x180->save(storage_path('app/public/img/product/320x180/' . date('Y') . '/' . date('F') . '/' . $fileName));

                            if ( ! Storage::disk('public')->exists('img/product/480x270/' . date('Y'))) {
                                Storage::disk('public')->makeDirectory('img/product/480x270/' . date('Y'));
                            }
                            if ( ! Storage::disk('public')->exists('img/product/480x270/' . date('Y') . '/' . date('F'))) {
                                Storage::disk('public')->makeDirectory('img/product/480x270/' . date('Y') . '/' . date('F'));
                            }
                            $img480x270->save(storage_path('app/public/img/product/480x270/' . date('Y') . '/' . date('F') . '/' . $fileName));

                            if ( ! Storage::disk('public')->exists('img/product/640x360/' . date('Y'))) {
                                Storage::disk('public')->makeDirectory('img/product/640x360/' . date('Y'));
                            }
                            if ( ! Storage::disk('public')->exists('img/product/640x360/' . date('Y') . '/' . date('F'))) {
                                Storage::disk('public')->makeDirectory('img/product/640x360/' . date('Y') . '/' . date('F'));
                            }
                            $img640x360->save(storage_path('app/public/img/product/640x360/' . date('Y') . '/' . date('F') . '/' . $fileName));

                            if ( ! Storage::disk('public')->exists('img/product/800x450/' . date('Y'))) {
                                Storage::disk('public')->makeDirectory('img/product/800x450/' . date('Y'));
                            }
                            if ( ! Storage::disk('public')->exists('img/product/800x450/' . date('Y') . '/' . date('F'))) {
                                Storage::disk('public')->makeDirectory('img/product/800x450/' . date('Y') . '/' . date('F'));
                            }
                            $img800x450->save(storage_path('app/public/img/product/800x450/' . date('Y') . '/' . date('F') . '/' . $fileName));

                            Storage::disk('public')->delete($uploadedFile['path']);

                        }
                        Session::forget('uploaded_files');
                        $productProperty->value = implode(',', $originalPaths);
                    } else {
                        $productProperty->value = $request->get($formattedPropertyName);
                    }
                }
            } else {
                if ($property->property === 'Size') {
                    $sizeValues = [];
                    foreach ($request->get('size') as $sizeKey => $sizeValue) {
                        $sizeValues[$sizeValue] = $request->get('size_quantity')[$sizeKey];
                    }
                    $productProperty->value = json_encode($sizeValues);
                }
                if ($property->property === 'Color') {
                    $colorValues = [];
                    foreach ($request->get('color') as $colorKey => $colorValue) {
                        $colorValues[$colorValue] = $request->get('color_quantity')[$colorKey];
                    }
                    $productProperty->value = json_encode($colorValues);
                }
            }

            $productProperty->is_for_product_listing = $property->is_for_product_listing;
            $productProperty->is_for_search_engine = $property->is_for_search_engine;
            $productProperty->save();
        }

        $response = auth()->check() ? User::where('id', auth()->user()->id)->with(['account'])->first() : User::where('id', $user->id)->with(['account'])->first();

        Mail::to($response->email)->send(new PostProductEmail($response));

        return response()->json($response);

    }
}
