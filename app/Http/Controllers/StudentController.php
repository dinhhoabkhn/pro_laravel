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
use App\Model\Student;
use App\Model\Course;
use App\Model\Teacher;
use App\Model\Subject;
use Illuminate\Support\Facades\Lang;
use Config;
use App\Http\Requests\ResetPasswordRequest;

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
            return redirect()->route('student')->with('success', 'Login successed');
        } else {
            return back()->withErrors(['error_login' => Lang::get('messages.errors_login')]);
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
            $sendEmail = new ForgotPasswordStudent($student);
            Mail::to($student)->send($sendEmail);
            return redirect()->route('student.get_login');
        } else {
            return back()->withErrors(['error_forgot_password' => Lang::get('messages.error_forgot_password')]);
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
        $courses = $student->courses()->paginate(Config::get('constants.paginate_number'));
        return view('system.student.home', ['courses' => $courses, 'student' => $student]);
    }

    public function deleteCourse($id)
    {
        $student = Auth::guard('student')->user();
        $student->courses()->detach($id);
        return back();
    }

    public function listCourse(Request $request)
    {
        if ($request->has('search_course')) {
            $student = Auth::guard('student')->user();
            $search = $request->search_course;
            $courses = Course::whereDoesntHave('students', function ($query) use ($student) {
                $query->where('students.id', $student->id);
            })->where('course_code', 'like', '%' . $search . '%')->orWhereHas('subject', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })->get();
            return view('system.student.list_course', ['courses' => $courses, 'student' => $student]);
        } else {
            $student = Auth::guard('student')->user();
            $courses = Course::whereDoesntHave('students', function ($query) use ($student) {
                $query->where('students.id', $student->id);
            })->with('subject')->get();
            return view('system.student.list_course', ['courses' => $courses, 'student' => $student]);
        }
    }

    public function registerCourseStudent($id)
    {
        $student = Auth::guard('student')->user();
        $course = Course::findOrFail($id);
        $courseOfStudent = $student->courses();
        $courseSelect = $courseOfStudent->where('weekday', $course->weekday)->orderBy('time_start', 'asc')->get();
        $canRegiter = true;
        if ($courseOfStudent->where('course_id', $id)->exists()) {
            return back()->withErrors(['error-register-course' => Lang::get('messages.error-register-course')]);
        } else {
            foreach ($courseSelect as $key => $cou) {
                if (!($course->time_finish < $cou->time_start || $course->time_start > $cou->time_finish)) {
                    $canRegiter = false;
                    break;
                }
            }
        }
        if ($canRegiter) {
            $student->courses()->attach($id);
            return redirect()->route('student')->with(['success' => Lang::get('success-register')]);
        } else {
            return back()->withErrors(['coincided-course' => Lang::get('messages.coincided-course')]);
        }
    }

    public
    function studentInformation(Request $request)
    {
        $student = Auth::guard('student')->user();
        return view('system.student.information', ['student' => $student]);
    }

    public
    function changeAvatar(ImageRequest $request)
    {
        $avatar = $request->file('avatar');
        $student = Auth::guard('student')->user();
        $avatarChange = 'avatar' . $student->id . '.' . $avatar->getClientOriginalExtension();
        $path = 'images';
        $avatarMove = $avatar->move($path, $avatarChange);
        $student->avatar = $avatarMove;
        $student->save();
        return back()->with('success', Lang::get('messages.update-avatar'));
    }

    public
    function getResetPassword()
    {
        $student = Auth::guard('student')->user();
        return view('system.student.reset_password', ['student' => $student]);
    }

    public
    function postResetPassword(ResetPasswordRequest $request)
    {
        $student = Auth::guard('student')->user();
        $password = $student->password;
        $oldPassword = $request->oldpassword;
        $newPassword = $request->newpassword;
        $retypeNewPassword = $request->renewpassword;
        if (Hash::check($oldPassword, $password) == false) {
            return back()->withErrors(['error' => Lang::get('messages.error-type-password')]);
        } elseif ($newPassword == $oldPassword) {
            return back()->withErrors(['error' => Lang::get('messages.error-same-oldpassword')]);
        } else {
            $student->password = bcrypt($newPassword);
            $student->save();
            return redirect()->route('student.information')->with('success', Lang::get('messages.reset-password'));
        }
    }

    public
    function verify($token)
    {

        $student = Student::where('email_token', $token)->firstOrFail();
        $student->active = 1;
        $student->email_token = null;
        $student->save();
        return redirect()->route('student.get_login');
    }

    public
    function myPoint()
    {
        $student = Auth::guard('student')->user();
        $courses = $student->courses;
        return view('system.student.my_point', ['student' => $student, 'courses' => $courses]);

    }
}
