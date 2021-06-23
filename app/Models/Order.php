<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];
    protected $table = 'orders';

    public function orderTransactions()
    {
        return $this->hasMany(OrderTransaction::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
