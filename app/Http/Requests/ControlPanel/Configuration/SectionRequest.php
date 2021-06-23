<?php

namespace App\Http\Requests\ControlPanel\Configuration;

use App\Models\ControlPanel\Configuration\Section;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SectionRequest extends FormRequest
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
        $rules['section'] = [
            'required',
            'string',
            'max:255',
            function($attribute, $value, $fail) {
                if ($this->id) {
                    if ( ! empty(Section::where('category_type_id', $this->category_type_id)->where($attribute, $value)->where('id', '!=', $this->id)->first())) {
                        $fail('Duplicate Section Found!');
                    }
                } else {
                    if ( ! empty(Section::where('category_type_id', $this->category_type_id)->where($attribute, $value)->first())) {
                        $fail('Duplicate Section Found!');
                    }
                }
            }
        ];
        $rules['category_type_id'] = [
            'required',
            'numeric'
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
