<?php

namespace App\Http\Requests\Account;

use App\Models\ControlPanel\Configuration\Category;
use App\Models\ControlPanel\Configuration\Property;
use App\Models\ControlPanel\Configuration\Section;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];
        $rules['category_type_id'] = [
            'required',
            'numeric'
        ];
        $rules['category_id.*'] = [
            'required',
            'numeric'
        ];




        $category = Category::where('id', $this->category_id[count($this->category_id )- 1])->first();
        $propertyIds = explode(',', $category->property_ids);
        $properties = Property::whereIn('id', $propertyIds)->get();

        foreach ($properties as $property) {
            $formattedPropertyName = strtolower(implode('_', explode(' ', $property->property)));
            if ($property->type === 'Image') {
                if ($property->is_required === 1) {
                    $rules[$formattedPropertyName] = [
                        'required',
                        'image',
                        'max:5000',
                        'dimensions:min_width=300,min_height=300,max_width=3000,max_height=3000'
                    ];
                } else {
                    $rules[$formattedPropertyName] = [
                        'nullable',
                        'image',
                        'max:5000',
                        'dimensions:min_width=300,min_height=300,max_width=3000,max_height=3000'
                    ];
                }

            } else {

                if ($property->is_required === 1) {
                    $rules[$formattedPropertyName] = [
                        'required',
                        'max:255',
                        'string'
                    ];
                } else {
                    $rules[$formattedPropertyName] = [
                        'nullable',
                        'max:255',
                        'string'
                    ];
                }
            }

        }





        return $rules;
    }
}
