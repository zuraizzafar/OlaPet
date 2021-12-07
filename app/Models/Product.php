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
}
