<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users_login';

    protected $fillable = [
        'name', 'email', 'password', 'role', 'role_expired_at'
    ];

    protected $hidden = [
        'password',
    ];

    public function news()
    {
        return $this->hasMany(News::class, 'user_id');
    }
}
