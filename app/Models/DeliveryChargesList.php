<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryChargesList extends Model
{
    use HasFactory;

    protected $fillable = [
        'service',
        'package',
        'state_id',
        'price',
        'status',
    ];

    public function service() {
        return $this->hasOne('App\Models\DeliveryService', 'id', 'service');
    }

    public function package() {
        return $this->hasOne('App\Models\PackageSize', 'id', 'package');
    }

    public function state() {
        return $this->hasOne('App\Models\State', 'id', 'state_id');
    }
}
