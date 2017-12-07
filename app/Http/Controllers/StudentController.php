<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginUser;
use Illuminate\Support\Facades\Auth;
use App\Student;
use App\Course;
use App\Teacher;
use App\Subject;

class StudentController extends Controller
{
	public function getLoginStudent(){
		return view('auth.loginstudent');
	}
	public function postLoginStudent(LoginUser $request){
		$email = $request->email;
		$password = $request->passwosrd;
		if(Auth::guard('student')->where('active',1)->attempt(['email'=>$email, 'password'=>$password])){
			return redirect('student');

		}
		else{
			return back();
		}
	}
	public function logoutStudent(){
		Auth::guard('student')->logout();
		return redirect('student/login');
	}
    public function listMyCourse(){
    	$student = Auth::guard('student')->user();
    	$courses = Course::whereHas('students',function($query) use ($student){
    		$query->where('students.id',$student->id);
    	})->with('subject')->get();
    	return view('system.student.home',['courses'=>$courses]);
    }
    public function deleteCourse($id){
    	$student = Auth::guard('student')->user();
        $student->courses()->detach($id);
        return back();
    }
    public function listCourse(){
    	$student = Auth::guard('student')->user();
    	$courses = Course::whereDoesntHave('students',function($query) use ($student){
    		$query->where('students.id',$student->id);
    	})->with('subject')->get();
    	return view('system.student.listcourse',['courses'=>$courses]);
    }
    public function registerCourseStudent($id){
    	$student = Auth::guard('student')->user();
    	$student ->courses() ->attach($id);
        return redirect('student');
    }
    public function verify($token){

        $student= Student::where('email_token',$token)->firstOrFail();
        $student ->active = 1;
        $student->email_token = null;
        $student->save();
        return redirect('student/login');
    }
}
