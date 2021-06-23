<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;

class CheckoutRequest extends FormRequest
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

        Session::forget(['shipping_information', 'billing_information', 'card_information', 'account_information']);
        $rules = [];

        $rules['first_name_for_shipping'] = [
            'required',
            'string',
            'max:255'
        ];
        $rules['last_name_for_shipping'] = [
            'required',
            'string',
            'max:255'
        ];
        $rules['address_line_1_for_shipping'] = [
            'required',
            'string',
            'max:1000'
        ];
        $rules['address_line_2_for_shipping'] = [
            'nullable',
            'string',
            'max:1000'
        ];
        $rules['country_for_shipping'] = [
            'required',
            'string',
            'max:255'
        ];
        $rules['city_for_shipping'] = [
            'required',
            'string',
            'max:255'
        ];
        $rules['region_for_shipping'] = [
            'required',
            'string',
            'max:255'
        ];
        $rules['postal_code_for_shipping'] = [
            'required',
            'string',
            'max:255'
        ];
        $rules['email_for_shipping'] = [
            'required',
            'string',
            'max:255'
        ];
        $rules['phone_for_shipping'] = [
            'required',
            'string',
            'max:255'
        ];


        if ($this->has('different_from_shipping_information')) {
            $rules['first_name_for_billing'] = [
                'required',
                'string',
                'max:255'
            ];
            $rules['last_name_for_billing'] = [
                'required',
                'string',
                'max:255'
            ];
            $rules['address_line_1_for_billing'] = [
                'required',
                'string',
                'max:1000'
            ];
            $rules['address_line_2_for_billing'] = [
                'nullable',
                'string',
                'max:1000'
            ];
            $rules['country_for_billing'] = [
                'required',
                'string',
                'max:255'
            ];
            $rules['city_for_billing'] = [
                'required',
                'string',
                'max:255'
            ];
            $rules['region_for_billing'] = [
                'required',
                'string',
                'max:255'
            ];
            $rules['postal_code_for_billing'] = [
                'required',
                'string',
                'max:255'
            ];
            $rules['email_for_billing'] = [
                'required',
                'string',
                'max:255'
            ];
            $rules['phone_for_billing'] = [
                'required',
                'string',
                'max:255'
            ];
        }





        $rules['payment_method'] = [
            'required',
            'string',

        ];

        if ($this->payment_method === 'Card') {
            $rules['card_number'] = [
                'required',
                'string',
                'max:20'
            ];
            $rules['card_cvc'] = [
                'required',
                'string',
                'max:4'
            ];
            $rules['expiry_month'] = [
                'required',
                'digits:2',

            ];
            $rules['expiry_year'] = [
                'required',
                'digits:4',

            ];
        }

        if ($this->has('create_an_account')) {
            $rules['first_name_for_account'] = [
                'required',
                'string',
                'max:255'
            ];
            $rules['last_name_for_account'] = [
                'required',
                'string',
                'max:255'
            ];
            $rules['email_for_account'] = [
                'required',
                'email',
                'max:255'
            ];
            $rules['password_for_account'] = [
                'required',
                'string',
                'min:6',
                'max:255'
            ];
        }

        return $rules;
    }
}
