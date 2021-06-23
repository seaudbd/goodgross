<?php

namespace App\Models\ControlPanel\Configuration;

use Illuminate\Database\Eloquent\Model;

class CategoryType extends Model
{
    protected $guarded = [];
    protected $table = 'category_types';

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}
