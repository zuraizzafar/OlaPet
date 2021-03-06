<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'parent_id',
        'status',
        'icon',
    ];

    public function products() {
        return $this->hasMany('App\Models\Product', 'id', 'cat_id');
    }

    public function parent() {
        return $this->hasOne('App\Models\Categories', 'id', 'parent_id');
    }

    public function icon() {
        return $this->hasOne('App\Models\Media', 'id', 'icon');
    }

    public function childs() {
        return $this->hasMany('App\Models\Categories', 'parent_id', 'id');
    }
}
