<?php

namespace App\Http\Requests\ControlPanel\Configuration;

use App\Models\ControlPanel\Configuration\Category;
use App\Models\Option;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
        $rules['id'] = [
            'nullable',
            'numeric'
        ];
        $rules['category'] = [
            'required',
            'string',
            'max:255',
            function ($attribute, $value, $fail) {
                if ($this->id) {
                    if ( ! empty(Category::where('category', $value)->where('category_type_id', $this->category_type_id)->where('level', $this->level)->where('id', '!=', $this->id)->first())) {
                        $fail('The Category has already been Taken!');
                    }
                } else {
                    if ( ! empty(Category::where('category', $value)->where('category_type_id', $this->category_type_id)->where('level', $this->level)->first())) {
                        $fail('The Category has already been Taken!');
                    }
                }
            }
        ];
        $rules['category_type_id'] = [
            'required',
            'numeric'
        ];
        $categoryLevel = Option::where('option', 'Category Level')->first()->value;
        $categoryLevels = [];
        for($i=1; $i<=$categoryLevel; $i++) {
            array_push($categoryLevels, $i);
        }
        $rules['level'] = [
            'required',
            Rule::in($categoryLevels)
        ];
        if ($this->level > 1) {
            $rules['root_id'] = [
                'required',
                'numeric'
            ];
        } else {
            $rules['root_id'] = [
                'nullable'
            ];
        }

        $rules['property_ids'] = [
            'nullable',
            'string',
            'max:255'
        ];
        $rules['sequence'] = [
            function($attribute, $value, $fail) {
                if ($this->id && $value === null) {
                    $fail('Sequence is Required!');
                }
            }
        ];
        $rules['status'] = [
            'required',
            Rule::in(['Active', 'Inactive'])
        ];
        $rules['narrative'] = [
            'nullable',
            'string',
            'max:255'
        ];
        return $rules;
    }
}
