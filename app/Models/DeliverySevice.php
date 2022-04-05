<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryService extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'status',
    ];

    public function general_charge() {
        return $this->hasMany('App\Models\DeliveryCharges', 'service', 'id');
    }

    public function charges() {
        return $this->hasMany('App\Models\DeliveryChargesList', 'service', 'id');
    }

    public function logo() {
        return $this->hasOne('App\Models\Media', 'id', 'image');
    }
}
