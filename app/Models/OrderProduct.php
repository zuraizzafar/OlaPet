<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    public function order() {
        return $this->hasOne('App\Models\Order', 'id', 'order_id');
    }

    public function product() {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }

    public function variation() {
        return $this->hasOne('App\Models\Variation', 'id', 'variation');
    }
}
