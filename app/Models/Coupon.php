<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'store_id',
        'product_id',
        'start_date',
        'end_date',
        'status',
    ];

    public function store() {
        return $this->hasOne('App\Models\Store', 'id', 'store_id');
    }

    public function product() {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }

    public function orders() {
        return $this->hasMany('App\Models\Order', 'coupon_id', 'id');
    }
}
