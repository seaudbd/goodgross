<?php

namespace App\Models;

use App\Models\ControlPanel\Configuration\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];
    protected $table = 'products';

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function productProperties()
    {
        return $this->hasMany(ProductProperty::class);
    }
}
