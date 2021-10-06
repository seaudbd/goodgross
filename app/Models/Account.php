<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $guarded = [];
    protected $table = 'accounts';


    public function personalAccount() {
        return $this->hasOne(PersonalAccount::class);
    }

    public function businessAccount() {
        return $this->hasOne(BusinessAccount::class);
    }



    public function connectedAccounts()
    {
        return $this->hasMany(ConnectedAccount::class);
    }


    public function user() {
        return $this->belongsTo(User::class);
    }

    public function accountShippings() {
        return $this->hasMany(AccountShipping::class);
    }

}
