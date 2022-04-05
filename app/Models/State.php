<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    public function cities() {
        return $this->hasMany('App\Models\Cities', 'state_id', 'id');
    }

    public function country() {
        return $this->hasOne('App\Models\Country', 'id', 'country_id');
    }

    public function charges() {
        return $this->hasMany('App\Models\DeliveryChargesList', 'state_id', 'id');
    }
}
