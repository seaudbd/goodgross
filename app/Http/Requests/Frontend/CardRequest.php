<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CardRequest extends FormRequest
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

        $rules['card_number'] = [
            'required',
            'digits_between:14,16',
        ];

        $rules['security_code'] = [
            'required',
            'digits_between:3,4',
        ];
        $rules['expiry_month'] = [
            'required',
            'string',
            Rule::in(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']),
        ];

        $rules['expiry_year'] = [
            'required',
            'date_format:Y',
        ];


        return $rules;
    }
}
