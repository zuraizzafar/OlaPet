<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'notification',
        'user_id',
        'target',
        'status',
        'target_user',
    ];

    public function user() {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function targeted() {
        return $this->hasOne('App\Models\User', 'id', 'target_user');
    }
}
