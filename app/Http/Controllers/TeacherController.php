<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginUserRequest;
use Illuminate\Support\Facades\Auth;
use App\Model\Teacher;
use App\Model\Course;
use Illuminate\Support\Facades\Hash;
use App\Model\Subject;

class TeacherController extends Controller
{
    public function getLoginTeacher()
    {
        return view('auth.login_teacher');
    }

    public function postLoginTeacher(LoginUserRequest $request)
    {
        $email = $request->email;
        $password = $request->password;
        if (Auth::guard('teacher')->attempt(['email' => $email, 'password' => $password, 'active' => 1])) {
            return redirect('teacher');
        } else {
            return redirect('teacher/login')->withErrors(['error_login'=>Lang::get('messages.errors_login')]);
        }
    }

    public function logoutTeacher()
    {
        Auth::guard('teacher')->logout();
        return redirect()->route('teacher.get_login');
    }

    public function showCourse()
    {
        $teacher = Auth::guard('teacher')->user();
        $courses = Course::where('teacher_id', $teacher->id)->where('semester', '20172')->with('subject')->paginate(5);
        return view('system.teacher.home', ['courses' => $courses]);
    }

    public function deleteRegisterCourse($id)
    {
        $teacher = Auth::guard('teacher')->user();
        $course = Course::findOrFail($id);
        if($course->teacher_id == $teacher->id) {
            $course->teacher_id = Null;
            $course->save();
            return back();
        }
        else{
            return back()->withErrors(['errors'=>'messages.delete-course-security']);
        }
    }

    public function listCourse()
    {
        $teacher = Auth::guard('teacher')->user();
        $courses = Course::doesntHave('teacher')->where('semester', '20172')->with('subject')->get();
        return view('system.teacher.list_course', ['courses' => $courses]);
    }

    public function registerCourse(Request $request, $id)
    {
        $teacher = Auth::guard('teacher')->user();
        $course = Course::findOrFail($id);
        $course->teacher_id = $teacher->id;
        $course->save();
        return redirect()->route('teacher');
    }

    public function verifyTeacher($token)
    {
        $teacher = Teacher::where('email_token', $token)->first();
        $teacher->active = 1;
        $teacher->email_token = null;
        $teacher->save();
        return redirect()->route('teacher.get_login');
    }

    public function listStudentCourse($id)
    {
        $teacher = Auth::guard('teacher')->user();
        $course = Course::findOrFail($id);
        $students = $course->students;
        return view('system.list_student_course', ['students' => $students, 'course' => $course, 'teacher' => $teacher]);

    }

    public function pointStudent(Request $request, $courseId)
    {
        $teacher = Auth::guard('teacher')->user();
        $course = Course::findOrFail($courseId);
        if ($request->has('point')) {
            $point = $request->point;
            foreach ($point as $student => $point) {
                if($point == null){
                    continue;
                }
                else {
                    $course->students()->updateExistingPivot($student, ['point' => $point]);
                }
            }
            return back();
        }
    }

    public function teacherInformation()
    {
        $teacher = Auth::guard('teacher')->user();
        return view('system.teacher.information',['teacher'=>$teacher]);
    }

    public function getResetPassword()
    {
        $teacher = Auth::guard('teacher')->user();
        return view('system.teacher.reset_password', ['teacher' => $teacher]);
    }

    public function postResetPassword(Request $request)
    {
        $teacher = Auth::guard('teacher')->user();
        $password = $teacher->password;
        $old_password = $request->oldpassword;
        $new_password = $request->newpassword;
        $retype_new_assword = $request->renewpassword;
        if (Hash::check($old_password, $password) == false) {
            return back()->withErrors(['error' => Lang::get('messages.error-type-password')]);
        } elseif ($new_password != $retype_new_assword) {
            return back()->withErrors(['error' => Lang::get('messages.error-password-not-same')]);
        } else {
            $teacher->password = bcrypt($new_password);
            $teacher->save();
            return redirect()->route('teacher.information')->with('success',Lang::get('messages.reset-password'));
        }
    }
}

