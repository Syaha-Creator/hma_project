<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class User extends Model implements AuthenticatableContract
{
    use Authenticatable;

    protected $table = 'users';

    protected $fillable = ['user_email', 'user_fullname', 'password', 'status', 'last_login_at'];

    protected $hidden = ['password'];

    protected $casts = [
        'last_login_at' => 'datetime',
    ];

    public function isOnline()
    {
        return $this->last_login_at && $this->last_login_at->gt(now()->subMinutes(10));
    }
}
