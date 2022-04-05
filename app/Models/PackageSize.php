<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageSize extends Model
{
    use HasFactory;

    public function general_charge() {
        return $this->hasMany('App\Models\DeliveryCharges', 'package', 'id');
    }

    public function charges() {
        return $this->hasMany('App\Models\DeliveryChargesList', 'package', 'id');
    }

    public function products() {
        return $this->hasMany('App\Models\Product', 'package_id', 'id');
    }

    public function variations() {
        return $this->hasMany('App\Models\Variation', 'package_id', 'id');
    }
}
