<?php


namespace webvolant\abadmin\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{

    use Authenticatable, CanResetPassword;

    protected $table = 'users';

    protected $fillable = array('name', 'email', 'password', 'role');

    protected $hidden = array('password', 'remember_token');


    public static function getStrRole($role){
        return config('config.roles')[$role];
    }

    public static function getStrStatus($status){
        return config('config.status')[$status];
    }
}
