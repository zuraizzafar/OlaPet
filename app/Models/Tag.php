<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function store() {
        return $this->hasOne('App\Models\Store', 'id', 'store_id');
    }

    public function products() {
        return $this->hasMany('App\Models\TagProduct', 'tag_id', 'id')->with('product');
    }
}
