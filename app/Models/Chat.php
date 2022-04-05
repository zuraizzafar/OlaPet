<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    public function ads() {
        return $this->hasOne('App\Models\Ad', 'id', 'ad_id');
    }

    public function messages() {
        return $this->hasMany('App\Models\ChatMessage', 'chat_id', 'id');
    }
}
