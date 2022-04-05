<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    public function orders() {
        return $this->hasMany('App\Models\Order', 'address_id', 'id');
    }

    public function city_data() {
        return $this->hasOne('App\Models\City', 'id', 'city');
    }

    public function state_data() {
        return $this->hasOne('App\Models\State', 'id', 'state');
    }

    public function country_data() {
        return $this->hasOne('App\Models\Country', 'id', 'country');
    }

    public function user() {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
