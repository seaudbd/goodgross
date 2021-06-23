<?php

namespace App\Http\Requests\ControlPanel\Configuration;

use App\Models\ControlPanel\Configuration\Property;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PropertyRequest extends FormRequest
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
        $rules['property'] = [
            'required',
            'string',
            'max:255',
            function($attribute, $value, $fail) {
                if ($this->id) {
                    if ( ! empty(Property::where('section_id', $this->section_id)->where($attribute, $value)->where('id', '!=', $this->id)->first())) {
                        $fail('Duplicate Property Found!');
                    }
                } else {
                    if ( ! empty(Property::where('section_id', $this->section_id)->where($attribute, $value)->first())) {
                        $fail('Duplicate Property Found!');
                    }
                }
            }
        ];
        $rules['category_type_id'] = [
            'required',
            'numeric'
        ];
        $rules['section_id'] = [
            'required',
            'numeric'
        ];
        $rules['type'] = [
            'required',
            Rule::in(['Input', 'Input Group', 'User Defined Input', 'Textarea', 'Image', 'Select Single', 'Select Multiple', 'Radio', 'Checkbox'])
        ];
        if ($this->type !== 'Input' && $this->type !== 'User Defined Input' && $this->type !== 'Textarea' && $this->type !== 'Image') {

            if ($this->type === 'Input Group') {
                $rules['group_names.*'] = [
                    'required',
                    'string',
                    'max:255'
                ];
                $rules['group_types.*'] = [
                    'required',
                    Rule::in(['Input', 'Select'])
                ];
            } else {
                $rules['options.*'] = [
                    'required',
                    'string',
                    'max:255'
                ];
            }


        }

        $rules['is_required'] = [
            'required',
            Rule::in(['1', '0'])
        ];
        $rules['is_for_search_engine'] = [
            'required',
            Rule::in(['1', '0'])
        ];
        $rules['is_for_product_listing'] = [
            'required',
            Rule::in(['1', '0'])
        ];
        $rules['is_for_filter'] = [
            'required',
            Rule::in(['1', '0'])
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
