<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [''];
    public $timestamps = false;
    public function students()
    {

    	return $this->belongsToMany(Student::class);
    }
    public function subject(){
    	return $this->belongsTo(Subject::class);
    }
    public function teacher(){
    	return $this->belongsTo(Teacher::class);
    }
}
