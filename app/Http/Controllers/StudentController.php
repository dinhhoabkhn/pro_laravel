<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginUserRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Mail\ForgotPasswordStudent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\SplFileInfo;
use App\Http\Requests\ImageRequest;
use App\Student;
use App\Course;
use App\Teacher;
use App\Subject;

class StudentController extends Controller
{
    public function getLoginStudent()
    {
        return view('auth.login_student');
    }

    public function postLoginStudent(LoginUserRequest $request)
    {
        $email = $request->email;
        $password = $request->password;
        if (Auth::guard('student')->attempt(['email' => $email, 'password' => $password, 'active' => 1])) {
            return redirect()->route('student');
        } else {
            return back();
        }
    }

    public function getForgotPasswordStudent()
    {
        return view('system.student.forgot_password');
    }

    public function postForgotPasswordStudent(Request $request)
    {
        $email = $request->email;
        if (!empty(Student::where('email', $email)->first())) {
            $student = Student::where('email', $email)->first();
            $student->email_token = str_random(15);
            $student->save();
            $send_email = new ForgotPasswordStudent($student);
            Mail::to($student)->send($send_email);
            return redirect()->route('student.get_login');
        } else {
            return back();
        }
    }

    public function check($token)
    {
        $student = Student::where('email_token', $token)->first();
        return view('system.student.new_password', ['student' => $student]);
    }

    public function changePassword(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        if ($request->password == $request->repassword) {
            $student->password = bcrypt($request->password);
            $student->save();
            return redirect()->route('student.get_login');
        } else {
            return back();
        }
    }

    public function logoutStudent()
    {
        Auth::guard('student')->logout();
        return redirect()->route('student.get_login');
    }

    public function listMyCourse()
    {
        $student = Auth::guard('student')->user();
        $courses = Course::whereHas('students', function ($query) use ($student) {
            $query->where('students.id', $student->id);
        })->with('subject')->get();
        return view('system.student.home', ['courses' => $courses]);
    }

    public function deleteCourse($id)
    {
        $student = Auth::guard('student')->user();
        $student->courses()->detach($id);
        return back();
    }

    public function listCourse()
    {
        $student = Auth::guard('student')->user();
        $courses = Course::whereDoesntHave('students', function ($query) use ($student) {
            $query->where('students.id', $student->id);
        })->with('subject')->get();
        return view('system.student.list_course', ['courses' => $courses]);
    }

    public function registerCourseStudent($id)
    {
        $student = Auth::guard('student')->user();
        $student->courses()->attach($id);
        return redirect()->route('student');
    }

    public function studentInformation(Request $request)
    {
        $student = Auth::guard('student')->user();
        return view('system.student.information', ['student' => $student]);
    }

    public function changeAvatar(ImageRequest $request)
    {
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $student = Auth::guard('student')->user();
            $avatar_change = 'avatar' . $student->id . '.' . $avatar->getClientOriginalExtension();
            $path = 'images';
            $avatar_move = $avatar->move($path, $avatar_change);
            $student->avatar = $avatar_move;
            $student->save();
            return view('system.student.information', ['student' => $student]);
        } else {
            return back();
        }
    }

    public function getResetPassword()
    {
        $student = Auth::guard('student')->user();
        return view('system.student.reset_password', ['student' => $student]);
    }

    public function postResetPassword(Request $request)
    {
        $student = Auth::guard('student')->user();
        $password = $student->password;
        $old_password = $request->oldpassword;
        $new_password = $request->newpassword;
        $retype_new_assword = $request->renewpassword;
        if (Hash::check($old_password, $password) == false) {
            return back()->withErrors(['error' => 'the password you type not true']);
        } elseif ($new_password != $retype_new_assword) {
            return back()->withErrors(['error' => '2 password not same']);
        } else {
            $student->password = bcrypt($new_password);
            $student->save();
            return redirect()->route('student.information')->with('success', 'you reseted password success');
        }
    }

    public function verify($token)
    {

        $student = Student::where('email_token', $token)->firstOrFail();
        $student->active = 1;
        $student->email_token = null;
        $student->save();
        return redirect()->route('student.get_login');
    }
}
