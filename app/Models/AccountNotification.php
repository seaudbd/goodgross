<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountNotification extends Model
{
    protected $guarded = [];
    protected $table = 'account_notifications';

    public function transaction()
    {
        return $this->belongsTo(OrderTransaction::class);
    }
}
