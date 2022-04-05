<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'name',
        'store_id',
        'status',
        'type',
        'short_description',
        'long_description',
        'quantity',
        'variations',
        'price',
    ];

    
    public function attributes() {
        return $this->hasMany('App\Models\Attributes', 'product_id', 'id');
    }
    
    public function store() {
        return $this->hasOne('App\Models\Store', 'id', 'store_id');
    }

    public function images() {
        return $this->hasMany('App\Models\Media', 'parent', 'id');
    }

    public function banner() {
        return $this->hasOne('App\Models\Media', 'id', 'image');
    }

    public function coupon() {
        return $this->hasMany('App\Models\Coupon', 'product_id', 'id');
    }

    public function faqs() {
        return $this->hasMany('App\Models\FAQ', 'product_id', 'id');
    }

    public function orders() {
        return $this->hasMany('App\Models\OrderProduct', 'product_id', 'id')->with('order');
    }

    public function package() {
        return $this->hasOne('App\Models\PackageSize', 'id', 'package_id');
    }

    public function category() {
        return $this->hasOne('App\Models\Category', 'id', 'cat_id');
    }
    
    public function ratings() {
        return $this->hasMany('App\Models\Rating', 'product_id', 'id');
    }

    public function tags() {
        return $this->hasMany('App\Models\TagProduct', 'product_id', 'id')->with('tag');
    }

    public function variations() {
        return $this->hasMany('App\Models\Variation', 'product_id', 'id');
    }
}
