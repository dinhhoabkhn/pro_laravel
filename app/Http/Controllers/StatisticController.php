<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StatisticController extends Controller
{
    public function listStudent(){
    	$students = Student::all();
    	// dd($students);
    	return view('admin.statistic.list_student',['students'=>$students]);
    }
    public function pointStudent($id){
    	$student = Student::findOrFail($id);
    	$courses = $student->courses;
    	return view('admin.statistic.point_student',['student'=>$student, 'courses'=>$courses]);
    }
}
