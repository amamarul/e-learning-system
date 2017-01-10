<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password'
    ];

    protected $hidden = [
        'password', 'remember_token', 'type', 'payed'
    ];

    public function isAdmin()
    {
        return ($this->type == 'admin');
    }

    public function hasPaid()
    {
        return ($this->paid == 1);
    }

    public function courses()
    {
        return $this->hasMany('App\CourseUser');
    }

    public function badges()
    {
        return $this->hasMany('App\BadgeUser');
    }
}
