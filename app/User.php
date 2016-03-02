<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract
{

    use Authenticatable, CanResetPassword;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users'; // put your table name here

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'name',
    	'username',
    	'email',
    	'password'
    ];

    /**
     * [isAdmin description]
     * @return boolean [description]
     */
    public function isAdmin()
    {
        // $this->access;
        if(\Auth::user()->access == '0')
        {
            return true;
        }
        else
        {
            return false;    
        }
    }
}
