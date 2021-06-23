<?php

namespace App\Models\ControlPanel\Configuration;


use App\Models\ProductProperty;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $guarded = [];
    protected $table = 'properties';

    public function categoryType() {
        return $this->belongsTo(CategoryType::class);
    }

    public function section() {
        return $this->belongsTo(Section::class);
    }

    public function productProperties() {
        return $this->hasMany(ProductProperty::class);
    }

    public function distinctProductProperties()
    {
        return $this->hasMany(ProductProperty::class)
            ->select(['property_id','value'])
            ->distinct();
    }

}
