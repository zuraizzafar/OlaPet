<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'order_id',
        'product_id',
        'rating',
        'review',
        'status',
    ];

    public function user() {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function order() {
        return $this->hasOne('App\Models\Order', 'id', 'order_id');
    }

    public function product() {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }
}
