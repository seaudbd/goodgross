<?php

namespace App\Models\Account;

use Illuminate\Database\Eloquent\Model;

class AccountPaymentMethod extends Model
{
    protected $guarded = [];
    protected $table = 'account_payment_methods';

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }
}
