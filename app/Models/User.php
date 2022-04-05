<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function ads()
    {
        return $this->hasMany('App\Models\Ad','user_id','id');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product','user_id','id');
    }

    public function chat_messages() {
        return $this->hasMany('App\Models\ChatMessage', 'user_id', 'id');
    }

    public function chats() {
        return $this->hasMany('App\Models\ChatUser', 'user_id', 'id')->with('chat');
    }

    public function faqs() {
        return $this->hasMany('App\Models\FAQ', 'user_id', 'id');
    }

    public function notifications() {
        return $this->hasMany('App\Models\Notification', 'user_id', 'id');
    }

    public function my_notifications() {
        return $this->hasMany('App\Models\Notification', 'target_user', 'id');
    }

    public function orders() {
        return $this->hasMany('App\Models\Order', 'user_id', 'id');
    }

    public function ratings() {
        return $this->hasMany('App\Models\Rating', 'user_id', 'id');
    }

    public function store() {
        return $this->hasOne('App\Models\Store', 'user_id', 'id');
    }

    public function transactions() {
        return $this->hasOne('App\Models\Transaction', 'user_id', 'id');
    }

    public function profile_image() {
        return $this->hasOne('App\Models\Media', 'id', 'image');
    }

    public function addresses() {
        return $this->hasMany('App\Models\UserAddress', 'user_id', 'id');
    }

    public function wallet() {
        return $this->hasOne('App\Models\Wallet', 'user_id', 'id');
    }
}
