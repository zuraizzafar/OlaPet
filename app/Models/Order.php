<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function user() {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function coupon() {
        return $this->hasOne('App\Models\Coupon', 'id', 'coupon_id');
    }

    public function address() {
        return $this->hasOne('App\Models\UserAddress', 'id', 'address_id');
    }

    public function products() {
        return $this->hasMany('App\Models\OrderProduct', 'order_id', 'id')->with('product');
    }

    public function ratings() {
        return $this->hasMany('App\Models\Rating', 'order_id', 'id');
    }
}
