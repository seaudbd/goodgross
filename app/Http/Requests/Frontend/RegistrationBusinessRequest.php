<?php

namespace App\Http\Requests\Frontend;

use App\Models\Account;
use App\Models\BusinessAccount;
use App\Models\PersonalAccount;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegistrationBusinessRequest extends FormRequest
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

        if ($this->user === 'null') {
            $rules['name'] = [
                'required',
                'string',
                'max:255',
            ];

            $rules['type'] = [
                'required',
                'string',
                Rule::in(['Retail', 'Wholesale']),
            ];

            $rules['email'] = [
                'required',
                'max:255',
                function($attribute, $value, $fail) {
                    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        $fail('The ' . $attribute . ' format is not valid.');
                    }
                    if ( ! empty(User::where('email', $value)->first())) {
                        $fail('The ' . $attribute . ' has already been taken.');
                    }
                    if ( ! empty(PersonalAccount::where('email', $value)->first())) {
                        $fail('The ' . $attribute . ' has already been taken.');
                    }
                    if ( ! empty(BusinessAccount::where('email', $value)->first())) {
                        $fail('The ' . $attribute . ' has already been taken.');
                    }
                }
            ];

            $rules['phone'] = [
                'required',
                'max:255',
                function($attribute, $value, $fail) {
                    if ( ! empty(PersonalAccount::where('phone', $value)->first())) {
                        $fail('The ' . $attribute . ' has already been taken.');
                    }
                    if ( ! empty(BusinessAccount::where('phone', $value)->first())) {
                        $fail('The ' . $attribute . ' has already been taken.');
                    }
                }
            ];
        }

        $rules['country_id'] = [
            'required',
            'numeric',

        ];

        $rules['state'] = [
            'required',
            'string',
            'max:255'
        ];

        $rules['password'] = [
            'required',
            'string',
            'min:6',
            'max:20',
            'confirmed'
        ];

        $rules['password_confirmation'] = [
            'required',
            'string',
            'min:6',
            'max:20',
        ];

        $rules['terms_of_service'] = [
            'accepted',
        ];

        $rules['privacy_policy'] = [
            'accepted',
        ];

        return $rules;
    }


}
