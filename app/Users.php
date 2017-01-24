<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Cartalyst\Sentinel\Users\EloquentUser;

//class Users extends Model
class Users extends EloquentUser
{
    protected $table = 'users';
    protected $fillable = [
        'email',
        'password',
        'name',
        'username',
        'nrp',
        'phone',
        'permissions',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    public static function byEmail($email)
    {
        return static::whereEmail($email)->first();
    }
}
