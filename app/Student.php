<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Student extends Model
{
	protected $table ='students';
    protected $fillable =['name','class','phone','email','student_code','birthday'];
    protected $hidden = [
        'password', 'remember_token',
    ];
    public $timestamps = false;
    public function course(){
    	return $this->belongsToMany('App\Course')->withPivot('point')->withTimestamps();
    }
}
