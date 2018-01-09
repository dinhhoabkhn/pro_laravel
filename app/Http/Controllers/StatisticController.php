<?php

namespace App\Http\Controllers;

use App\Model\Course;
use Illuminate\Http\Request;
use App\Model\Student;
use Config;

class StatisticController extends Controller
{
    public function listStudent(Request $request)
    {
        $searchStudent = $request->search_student;
        $stuArray = [
            'searchStudent' => $searchStudent
        ];
        if ($searchStudent) {
            $students = Student::searchStudent($searchStudent)->paginate(Config::get('constants.paginate_number'));
            return view('admin.statistic.list_student', ['students' => $students, 'searchStudent'=>$stuArray]);
        } else {
            $students = Student::paginate(Config::get('constants.paginate_number'));
            return view('admin.statistic.list_student', ['students' => $students,'searchStudent'=>$stuArray]);
        }
    }

    public function listCourse(Request $request)
    {
        $search = $request->search_course;
        $courseArr = [
            'search_course' => $search
        ];
        if ($search) {
            $search = $request->search_course;
            $courses = Course::searchCourse($search)->paginate(Config::get('constants.paginate_number'));
            return view('admin.statistic.list_course', ['courses' => $courses, 'search' => $courseArr]);
        } else {
            $courses = Course::paginate(Config::get('constants.paginate_number'));
            return view('admin.statistic.list_course', ['courses' => $courses, 'search' => $courseArr]);
        }
    }
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
