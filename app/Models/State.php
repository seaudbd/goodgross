<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $guarded = [];
    protected $table = 'states';

    public function country() {
        return $this->belongsTo(Country::class);
    }
}
