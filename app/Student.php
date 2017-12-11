<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;


class Student extends Model
{
	protected $guard = "student";
	protected $table ='students';
    protected $fillable =['name','class','phone','email','student_code','birthday'];
    protected $hidden = [
        'password', 'remember_token',
    ];
    public $timestamps = false;
    public function courses(){
    	return $this->belongsToMany('App\Course')->withPivot('point')->withTimestamps();
    }
}
