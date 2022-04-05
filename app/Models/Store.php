<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    public function user() {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function products() {
        return $this->hasMany('App\Models\Product', 'store_id', 'id');
    }

    public function coupons() {
        return $this->hasMany('App\Models\Coupon', 'store_id', 'id');
    }

    public function logo_image() {
        return $this->hasOne('App\Models\Media', 'id', 'logo');
    }

    public function banner_image() {
        return $this->hasOne('App\Models\Media', 'id', 'logo');
    }

    public function tags() {
        return $this->hasMany('App\Models\Tag', 'store_id', 'id');
    }
}
