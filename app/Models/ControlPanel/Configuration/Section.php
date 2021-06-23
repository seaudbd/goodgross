<?php

namespace App\Models\ControlPanel\Configuration;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $guarded = [];
    protected $table = 'sections';

    public function categoryType()
    {
        return $this->belongsTo(CategoryType::class);
    }

    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
