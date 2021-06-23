<?php

namespace App\Http\Requests\ControlPanel\Operation;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AccountTransactionRequest extends FormRequest
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
            'customer_account_id' => [
                'required',
                'numeric'
            ],
            'customer_account_transaction_id' => [
                'nullable',
                'numeric'
            ],
            'transaction_amount' => [
                'required',
                'numeric',
                'gt:0'
            ],
            'transaction_type' => [
                'required',
                Rule::in(['debit', 'credit'])
            ],
            'transaction_particulars' => [
                'nullable',
                'max:1000'
            ],
            'transaction_status' => [
                'required',
                Rule::in(['Active', 'Inactive'])
            ],
            'transaction_narrative' => [
                'nullable',
                'max:1000'
            ],

        ];
    }
}
