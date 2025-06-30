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
    
    protected $casts = [
        'role_expired_at' => 'datetime',
    ];

    public function news()
    {
        return $this->hasMany(News::class, 'user_id');
    }

    public function checkAndUpdateExpiredRole()
    {
        if ($this->role === 'penyelenggara' && 
            $this->role_expired_at && 
            $this->role_expired_at < now()) {
            
            $this->role = 'user';
            $this->role_expired_at = null;
            $this->save();
            
            return true; 
        }
        
        return false;
    }

    public static function updateAllExpiredRoles()
    {
        $expiredUsers = self::where('role', 'penyelenggara')
                        ->where('role_expired_at', '<', now())
                        ->whereNotNull('role_expired_at')
                        ->get();

        foreach ($expiredUsers as $user) {
            $user->role = 'user';
            $user->role_expired_at = null;
            $user->save();
        }

        return $expiredUsers->count();
    }
}
