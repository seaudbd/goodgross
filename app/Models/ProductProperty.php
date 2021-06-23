<?php

namespace App\Models;


use App\Models\ControlPanel\Configuration\Property;
use Illuminate\Database\Eloquent\Model;

class ProductProperty extends Model
{
    protected $guarded = [];
    protected $table = 'product_properties';

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function property() {
        return $this->belongsTo(Property::class);
    }

}
