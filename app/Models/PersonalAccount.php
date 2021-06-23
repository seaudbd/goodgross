<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalAccount extends Model
{
    use HasFactory;

    protected $table = 'personal_accounts';
    protected $guarded = [];

    public function account() {
        return $this->belongsTo(Account::class);
    }
}
