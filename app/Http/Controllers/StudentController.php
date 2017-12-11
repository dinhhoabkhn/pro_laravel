<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\ForgotPasswordStudent;
use Illuminate\Support\Facades\Mail;
use App\Student;
use App\Course;
use App\Teacher;
use App\Subject;

class StudentController extends Controller
{
	public function getLoginStudent(){
		return view('auth.login_student');
	}
	public function postLoginStudent(LoginUser $request){
		$email = $request->email;
		$password = $request->password;
		if(Auth::guard('student')->attempt(['email'=>$email, 'password'=>$password,'active'=>1])){
			return redirect()->route('student');
		}
		else{
			return back();
		}
	}
    public function getForgotPasswordStudent(){
        return view('system.student.forgot_password');
    }
    public function postForgotPasswordStudent(Request $request){
        $email = $request->email;
        if(!empty(Student::where('email',$email)->first())){
            $student = Student::where('email',$email)->first();
            $student->email_token = str_random(15);
            $student->save();
            $sendEmail = new ForgotPasswordStudent($student);
            Mail::to($student)->send($sendEmail);
            return redirect()->route('student.getlogin');
        }
        else {
            return back();
        }
    }
    public function check($token){
        $student = Student::where('email_token',$token)->first();
        return view('system.student.new_password',['student'=>$student]);
    }
    public function changePassword(Request $request,$id){
        $student = Student::findOrFail($id);
        if($request->password == $request->repassword){
            $student->password = bcrypt($request->password);
            $student->save();
            return redirect()->route('student.getlogin');
        }
        else{
            return back();
        }
    }
	public function logoutStudent(){
		Auth::guard('student')->logout();
		return redirect()->route('student.getlogin');
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
    	return view('system.student.list_course',['courses'=>$courses]);
    }
    public function registerCourseStudent($id){
    	$student = Auth::guard('student')->user();
    	$student ->courses() ->attach($id);
        return redirect()->route('student');
    }
    public function studentInformation(){
        $student = Auth::guard('student')->user();
        return view('system.student.information',['student'=>$student]);
    }
    public function getResetPassword(){
        $student = Auth::guard('student')->user();
        return view('system.student.reset_password',['student'=>$student]);
    }
    public function postResetPassword(Request $request){
        $student = Auth::guard('student')->user();
        $password = $student->password;
        $oldPassword = $request->oldpassword;
        $newPassword = $request->newpassword;
        $retypeNewPassword = $request->renewpassword;
        if (Hash::check($oldPassword,$password)==false) {
            return back()->withErrors('');
        }
        elseif ($newPassword != $retypeNewPassword) {
            return back()->withErrors('');
        }
        else{
            $student ->password = bcrypt($newpassword);
            $student->save();
            return redirect()->route('student.information');
        }
    }
    public function verify($token){

        $student= Student::where('email_token',$token)->firstOrFail();
        $student ->active = 1;
        $student->email_token = null;
        $student->save();
        return redirect()->route('student.login');
    }
}
