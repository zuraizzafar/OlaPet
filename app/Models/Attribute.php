<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'value',
        'product_id',
        'status',
    ];

    public function product() {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }
}
