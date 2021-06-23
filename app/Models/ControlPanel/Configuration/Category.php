<?php

namespace App\Models\ControlPanel\Configuration;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];
    protected $table = 'categories';

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function categoryType()
    {
        return $this->belongsTo(CategoryType::class);
    }
}
