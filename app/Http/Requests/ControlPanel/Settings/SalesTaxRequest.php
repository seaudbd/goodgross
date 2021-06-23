<?php

namespace App\Http\Requests\ControlPanel\Settings;

use App\Models\ControlPanel\Settings\SalesTax;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SalesTaxRequest extends FormRequest
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
        $rules['state'] = [
            'required',
            'string',
            'max:255'
        ];
        $rules['zip_code'] = [
            'required',
            'string',
            'max:255',
            function($attribute, $value, $fail) {
                if ($this->id) {
                    if ( ! empty(SalesTax::where($attribute, $value)->where('id', '!=', $this->id)->first())) {
                        $fail('Duplicate Zip Code Found!');
                    }
                } else {
                    if ( ! empty(SalesTax::where($attribute, $value)->first())) {
                        $fail('Duplicate Zip Code Found!');
                    }
                }
            }
        ];
        $rules['region_name'] = [
            'required',
            'string',
            'max:255'
        ];
        $rules['state_rate'] = [
            'required',
            'numeric'
        ];
        $rules['estimated_combined_rate'] = [
            'required',
            'numeric'
        ];
        $rules['estimated_country_rate'] = [
            'required',
            'numeric'
        ];
        $rules['estimated_city_rate'] = [
            'required',
            'numeric'
        ];
        $rules['estimated_special_rate'] = [
            'required',
            'numeric'
        ];
        $rules['risk_level'] = [
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
