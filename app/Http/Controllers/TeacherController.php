<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Teacher;
use App\Course;
use App\Subject;

class TeacherController extends Controller
{
	public function __construct()
	{
		$this->middleware('check_teacher')->except(['getLoginTeacher','postLoginTeacher']);
	}
	public function getLoginTeacher(){
		return view('auth.loginteacher');
	}
	public function postLoginTeacher(Request $request){
		$email =$request->email;
		$password = $request->password;
		if (Auth::guard('teacher')->attempt(['email'=>$email,'password'=>$password])) {
			return redirect('teacher');
		}
		else{
			return redirect('teacher/login');
		}
	}
	public function logout_teacher(){
		Auth::guard('teacher')->logout();
		return redirect('teacher/login');
	}
	public function showCourse(){
		$teacher = Auth::guard('teacher')->user();
		$courses = Course::where('teacher_id',$teacher->id)->where('semester','20172')->get();
		return view('system.teacher.home',['courses',$courses]);
	}
	public function listCourse(){
		$teacher = Auth::guard('teacher')->user();
		$courses = Course::where('semester','20172')->where('teacher_id','<>',$teacher->id)->get();
		dd($courses);

		return view('system.teacher.listcourse',['courses',$courses]);
	}
}
