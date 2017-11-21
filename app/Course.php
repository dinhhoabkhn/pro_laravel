<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    protected $fillable = [''];
    public $timestamps = false;
    public function student(){

    	return $this->belongsToMany('App\Student');
    }
    public function subject(){
    	return $this->belongsTo('App\Subject','course_student','student_id','course_id');
    }
}
