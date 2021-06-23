<?php

namespace App\Http\Requests\Account;

use App\Models\Account\PaymentMethod;
use Illuminate\Foundation\Http\FormRequest;

class PaymentMethodRequest extends FormRequest
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
        $rules['payment_method_id'] = [
            'numeric',
            'required'
        ];
        if ($this->has('payment_method_id') && $this->payment_method_id !== null) {
            $authorizationKeys = explode(',', PaymentMethod::where('id', $this->payment_method_id)->first(['authorization_keys'])->authorization_keys);
            foreach ($authorizationKeys as $authorizationKey) {
                $rules[$authorizationKey] = [
                    'required'
                ];
            }
        }

        return $rules;
    }
}
