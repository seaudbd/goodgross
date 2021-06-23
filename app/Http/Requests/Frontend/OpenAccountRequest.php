<?php

namespace App\Http\Requests;

use App\Models\Account;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OpenAccountRequest extends FormRequest
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
        $rules['account_type'] = [
            'required',
            Rule::in(['Personal', 'Investment'])
        ];
        $rules['account_name'] = [
            'required',
            'max:255'
        ];
        $rules['email'] = [
            'required',
            'max:255',
            function($attribute, $value, $fail) {
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $fail('Invalid Email Format Found!');
                }
                if ( ! empty(CustomerAccount::where('email', $value)->first())) {
                    $fail('The Email Address has Already been Taken!');
                }
            }
        ];
        $rules['contact_number'] = [
            'required',
            'max:255',
        ];
        $rules['current_address'] = [
            'required',
            'max:1000'
        ];
        $rules['state_id'] = [
            'required',
            'max:255'
        ];
        $rules['passport_or_birth_certificate'] = [
            'required',
            'mimes:jpg,jpeg,png,bmp,tiff',
            'max:1024',
        ];
        $rules['lease_or_utility_bill'] = [
            'required',
            'mimes:jpg,jpeg,png,bmp,tiff',
            'max:1024',
        ];
        return $rules;
    }
}
