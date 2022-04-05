<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    use HasFactory;

    public function orders() {
        return $this->hasMany('App\Models\OrderProduct', 'variation_id', 'id')->with('order');
    }

    public function product() {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }

    public function package() {
        return $this->hasOne('App\Models\PackageSize', 'id', 'package_id');
    }
}
