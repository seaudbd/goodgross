<?php

namespace App\Http\Requests\Frontend;

use App\Models\Account;
use App\Models\CustomerAccount;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegistrationRequest extends FormRequest
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
        return [
            'account_type' => [
                'required',
                Rule::in(['Personal', 'Investment'])
            ],
            'account_number' => [
                'required',
                'digits:16',
                function($attribute, $value, $fail) {
                    if (empty(CustomerAccount::where('account_number', $value)->where('account_type', $this->account_type)->where('email', $this->login_id)->first())) {
                        $fail('Invalid Account Association Found!');
                    }
                }
            ],
            'login_id' => [
                'required',
                'max:255',
                function($attribute, $value, $fail) {
                    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        $fail('Invalid Email Format Found!');
                    }
                    if ( ! empty(Customer::where('login_id', $value)->first())) {
                        $fail('The Email Address has Already been Taken!');
                    }
                }
            ],
            'password' => [
                'required',
                'min:8',
                'max:32',
                'confirmed'
            ]
        ];
    }
}
