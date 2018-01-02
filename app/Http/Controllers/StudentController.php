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
            $send_email = new ForgotPasswordStudent($student);
            Mail::to($student)->send($send_email);
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
        $courses = $student->courses()->paginate(5);
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

    public function addPivotTable($student, $id)
    {
        $student->courses()->attach($id);
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
        } elseif (count($courseSelect) > 1) {
            foreach ($courseSelect as $key => $cou) {
                if ($courseSelect[0]->time_start > $course->time_finish) {
                    $canRegiter = true;
                    break;
                } elseif ((($courseSelect[$key]->time_finish < $course->time_start) && ($courseSelect[$key + 1]->time_start > $course->time_finish))) {
                    $canRegiter = true;
                    break;

                } elseif ($courseSelect[count($courseSelect) - 1]->time_finish < $course->time_start) {
                    $canRegiter = true;
                    break;

                } else {
                    return back()->withErrors(['coincided-course' => Lang::get('messages.coincided-course')]);
                }
            }
        } elseif (count($courseSelect) == 1) {
            foreach ($courseSelect as $cou) {
                if ($cou->time_finish < $course->time_start || $cou->time_start > $course->time_finish) {
                    $this->addPivotTable($student, $id);;
                    return redirect()->route('student')->with(['success' => Lang::get('success-register')]);
                } else {
                    $canRegiter = false;
                    break;
                }
            }

        }
        if ($canRegiter) {
            $this->addPivotTable($student, $id);
            return redirect()->route('student')->with(['success' => Lang::get('success-register')]);
        } else {
            return back()->withErrors(['coincided-course' => Lang::get('messages.coincided-course')]);
        }
    }

    public function studentInformation(Request $request)
    {
        $student = Auth::guard('student')->user();
        return view('system.student.information', ['student' => $student]);
    }

    public function changeAvatar(ImageRequest $request)
    {
        $avatar = $request->file('avatar');
        $student = Auth::guard('student')->user();
        $avatar_change = 'avatar' . $student->id . '.' . $avatar->getClientOriginalExtension();
        $path = 'images';
        $avatar_move = $avatar->move($path, $avatar_change);
        $student->avatar = $avatar_move;
        $student->save();
        return back()->with('success', Lang::get('messages.update-avatar'));
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
            return back()->withErrors(['error' => Lang::get('messages.error-type-password')]);
        } elseif ($new_password != $retype_new_assword) {
            return back()->withErrors(['error' => Lang::get('messages.error-password-not-same')]);
        } else {
            $student->password = bcrypt($new_password);
            $student->save();
            return redirect()->route('student.information')->with('success', Lang::get('messages.reset-password'));
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

    public function myPoint()
    {
        $student = Auth::guard('student')->user();
        $courses = $student->courses;
        return view('system.student.my_point', ['student' => $student, 'courses' => $courses]);

    }
}
