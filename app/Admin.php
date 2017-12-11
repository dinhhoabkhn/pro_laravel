<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Auththenticatable;

class Admin extends Auththenticatable
{
    protected $table = 'admins';
    protected $fillable = ['email','password'];
    protected $hidden = [
        'password', 'remember_token',
    ];
    public $timestamps = false;
}
