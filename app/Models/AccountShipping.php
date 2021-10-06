<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountShipping extends Model
{
    use HasFactory;

    protected $table = 'account_shippings';
    protected $guarded = [];
}
