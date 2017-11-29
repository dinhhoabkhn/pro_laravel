<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Student;
use App\Course;
use App\Teacher;
use App\Subject;
class StudentController extends Controller
{
	public function getLoginStudent(){
		return view('auth.loginstudent');s
	}
	public function postLoginStudent(Request $request){
		$email = $request->email;
		$password = $request->password;
		if(Auth::guard('student')->attempt(['email'=>$email, 'password'=>$password])){
			return view('student.home');
		}
		else{
			return back();
		}
	}
    public function listMyCourse(){
    	$student = Auth::guard('student')->user();
    	$course = Student::findOrFail($student->id)->courses();
    }
}
