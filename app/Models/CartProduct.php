<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
    use HasFactory;

    public function product() {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }

    public function cart() {
        return $this->hasOne('App\Models\Cart', 'id', 'cart_id');
    }

    public function variation() {
        return $this->hasOne('App\Models\Variation', 'id', 'variation');
    }
}
