<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessAccount extends Model
{
    use HasFactory;

    protected $table = 'business_accounts';
    protected $guarded = [];

    public function account() {
        return $this->belongsTo(Account::class);
    }
}
