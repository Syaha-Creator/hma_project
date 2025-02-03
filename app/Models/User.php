<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Notifications\Notifiable;

class User extends Model implements AuthenticatableContract
{
    use Authenticatable, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $fillable = ['user_email', 'user_fullname', 'password', 'status'];

    protected $hidden = ['password'];
}
