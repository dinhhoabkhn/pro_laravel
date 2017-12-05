<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginUser;
use Illuminate\Support\Facades\Auth;
use App\Teacher;
use App\Course;
use App\Subject;

class TeacherController extends Controller
{
	public function getLoginTeacher(){
		return view('auth.loginteacher');
	}
	public function postLoginTeacher(LoginUser $request){
		$email =$request->email;
		$password = $request->password;
		if (Auth::guard('teacher')->attempt(['email'=>$email,'password'=>$password])) {
			return redirect('teacher');
		}
		else{
			return redirect('teacher/login');
		}
	}
	public function logoutTeacher(){
		Auth::guard('teacher')->logout();
		return redirect('teacher/login');
	}
	public function showCourse(){
		$teacher = Auth::guard('teacher')->user();
		$courses = Course::where('teacher_id',$teacher->id)->where('semester','20172')->with('subject')->get();
		return view('system.teacher.home',['courses'=>$courses]);
	}
	
	public function deleteRegisterCourse($id){
		$course = Course::findOrFail($id);
		$course->teacher_id = Null;
		$course->save();
		return back();
	}
	public function listCourse(){
		$teacher = Auth::guard('teacher')->user();
		$courses = Course::doesntHave('teacher')->where('semester','20172')->with('subject')->get();
		return view('system.teacher.listcourse',['courses'=>$courses]);
	}
	public function registerCourse(Request $request,$id){
		$teacher = Auth::guard('teacher')->user();
		$course = Course::findOrFail($id);
		$course->teacher_id = $teacher->id;
		$course->save();
		return redirect('/teacher');
	}
}
