<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagProduct extends Model
{
    use HasFactory;

    public function product() {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }

    public function tag() {
        return $this->hasOne('App\Models\Tag', 'id', 'tag_id');
    }
}
