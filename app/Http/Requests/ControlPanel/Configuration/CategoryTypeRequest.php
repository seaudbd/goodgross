<?php

namespace App\Http\Requests\ControlPanel\Configuration;

use App\Models\ControlPanel\Configuration\CategoryType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryTypeRequest extends FormRequest
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
        $rules['category_type'] = [
            'required',
            'string',
            'max:255',
            function($attribute, $value, $fail) {
                if ($this->id) {
                    if ( ! empty(CategoryType::where($attribute, $value)->where('id', '!=', $this->id)->first())) {
                        $fail('Duplicate Category Type Found!');
                    }
                } else {
                    if ( ! empty(CategoryType::where($attribute, $value)->first())) {
                        $fail('Duplicate Category Type Found!');
                    }
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
