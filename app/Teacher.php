<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';
    protected $fillable= ['name','brithday','address','fields'];
    public $timestamps = false;
}
