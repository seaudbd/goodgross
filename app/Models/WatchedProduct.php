<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WatchedProduct extends Model
{
    use HasFactory;

    protected $table = 'watched_products';
    protected $guarded = [];
}
