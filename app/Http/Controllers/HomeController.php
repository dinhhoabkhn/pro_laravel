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
        $students = $course->students;
    	return view('system.list_student_course',['students'=>$students,'course'=>$course]);

    }
    public function pointStudent(Request $request,$courseId){
    	$course = Course::findOrFail($courseId);
    	$point = $request->point;
    	// dd($point);
    	foreach ( $point as $student => $point) {
    		$course->students()->updateExistingPivot($student,['point'=>$point]);
    	}
    	
    	return back();
    }
}
