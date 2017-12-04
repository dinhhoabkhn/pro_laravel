<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Course;
use App\Student;

class HomeController extends Controller
{
    public function listStudentCourse($id){
    	$course = Course::findOrFail($id);
    	$students = Student::whereHas('courses',function($query) use ($course){
    		$query->where('courses.id',$course->id);
    	})->get();
    	// dd($students);
    	return view('system.liststudentcourse',['students'=>$students]);
    }
    public function pointStudent(Request $request){
    	// $course = Course::findOrFail($studentId);
    	dd($request->all());
    	$course ->students()->updateExistingPivot('point',10);
    	dd('5');
    }
}
