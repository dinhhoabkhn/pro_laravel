<?php

namespace App\Http\Controllers;

use App\Model\Course;
use Illuminate\Http\Request;
use App\Model\Student;

class StatisticController extends Controller
{
    public function listStudent(Request $request)
    {
        $search_student = $request->search_student;
        $stuArray = [
            'search_student' => $search_student
        ];
        if ($search_student) {
            $students = Student::where('student_code', 'like', '%' . $search_student . '%')->orWhere('name', 'like', '%' . $search_student . '%')->paginate(5);
            return view('admin.statistic.list_student', ['students' => $students, 'search_student'=>$stuArray]);
        } else {
            $students = Student::paginate(5);
            // dd($students);
            return view('admin.statistic.list_student', ['students' => $students,'search_student'=>$stuArray]);
        }
    }

    public function listCourse(Request $request)
    {
        $search = $request->search_course;
        $courseArr = [
          'search_course'=>$search
        ];
        if ($search) {
            $search = $request->search_course;
            $courses = Course::where('course_code', 'like', '%' . $search . '%')->paginate(5);
            return view('admin.statistic.list_course', ['courses' => $courses,'search'=>$courseArr]);
        } else {
            $courses = Course::paginate(5);
            return view('admin.statistic.list_course', ['courses' => $courses,'search'=>$courseArr]);
        }

//        $view = view('ajax.list_course', ['courses' => $courses]);
//        var_dump($view->render());die;
//        return response()
////            ->view('ajax.list_course',['courses'=> $courses]);
//        ->json([
////            'data' => $courses,
//            'html' => $view->render(),
////            'type'  =>'course'
//        ]);
//        return \GuzzleHttp\json_encode($view->render());
    }
//    public function listStudents()
//    {
//        $students = Student::all();
//        $view = view('ajax.list_students',['students'=>$students]);
//        return \GuzzleHttp\json_encode($view->render());
//    }

    public function pointStudent($id)
    {
        $student = Student::findOrFail($id);
        $courses = $student->courses;
        return view('admin.statistic.point_student', ['student' => $student, 'courses' => $courses]);
    }

    public function pointStudentInCourse($id)
    {
        $course = Course::findOrFail($id);
        $students = $course->students;
        return view('admin.statistic.point_student_in_course', ['course' => $course, 'students' => $students]);

    }
}
