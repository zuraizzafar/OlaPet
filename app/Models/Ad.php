<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'user_id',
        'short_d',
        'long_d',
        'image',
        'status',
        'cat_id',
    ];
    
    public function user() {
        return $this->hasOne('App\Models\User', 'id', 'user_id')->with('primary_address');
    }

    public function category() {
        return $this->hasOne('App\Models\Category', 'id', 'cat_id');
    }

    public function sold() {
        return $this->hasOne('App\Models\User', 'id', 'sold_to');
    }

    public function banner() {
        return $this->hasOne('App\Models\Media', 'id', 'image');
    }

    public function images() {
        return $this->hasMany('App\Models\Media', 'parent', 'id');
    }

    public function chats() {
        return $this->hasMany('App\Models\Chat', 'ad_id', 'id');
    }
}
