<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserNotification extends Model
{
    protected $guarded = [];
    protected $table = 'user_notifications';

    public function transaction()
    {
        return $this->belongsTo(OrderTransaction::class);
    }
}
