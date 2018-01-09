<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects';
    protected $fillable = ['name','academy'];
    public  $timestamps = false;
    public function courses(){
    	return $this->hasMany(Course::class);
    }
}
