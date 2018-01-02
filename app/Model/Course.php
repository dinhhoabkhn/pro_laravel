<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [''];
    public $timestamps = false;

    public function students()
    {
        return $this->belongsToMany(Student::class)->withPivot('point')->withTimestamps();
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
    public static function searchCourse($search){
        $courses = self::whereHas('subject', function ($query) use ($search) {
            $query->where('subjects.name', 'like', '%' . $search . '%');
        })->orWhere('course_code', 'like', '%' . $search . '%');
        return $courses;
    }
}
