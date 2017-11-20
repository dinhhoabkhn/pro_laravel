<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Teacher extends Model
{
    protected $table = 'teachers';
    protected $fillable= ['name','brithday','address','email','address'];
    public $timestamps = false;
    public function course(){
    	return $this->hasMany('App\Course');
    }
}
