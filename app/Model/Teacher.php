<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Teacher extends Authenticatable
{
    protected $fillable= ['name','brithday','address','email','address','password'];
    public $timestamps = false;
    public function courses(){
    	return $this->hasMany(Course::class);
    }
}
