<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DeliveryAddressRequest extends FormRequest
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
        $rules['first_name'] = [
            'required',
            'string',
            'max:255'
        ];
        $rules['last_name'] = [
            'required',
            'string',
            'max:255'
        ];
        $rules['country_id'] = [
            'required',
            'numeric',

        ];

        $rules['state'] = [
            'required',
            'string',
            'max:255'
        ];
        $rules['city'] = [
            'required',
            'string',
            'max:255'
        ];
        $rules['postal_code'] = [
            'required',
            'string',
            'max:255'
        ];
        $rules['address_line_1'] = [
            'required',
            'string',
            'max:255'
        ];
        $rules['address_line_2'] = [
            'nullable',
            'string',
            'max:255'
        ];
        $rules['phone'] = [
            'required',
            'string',
            'max:255'
        ];
        $rules['email'] = [
            'required',
            'max:255',
            function($attribute, $value, $fail) {
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $fail('Invalid Email Format Found!');
                }
            }
        ];

        return $rules;
    }
}
