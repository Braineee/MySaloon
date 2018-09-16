<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password',
        'phone',
        'sex',
        'role_id',
        'picture'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    // declaring ORM relationships
    public function role(){
        return $this->hasOne('App\Role');
    }

    public function billing(){
        return $this->hasMany('App\Billing');
    }

    public function booking(){
        return $this->hasMany('App\Booking');
    }

}
