<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use App\Student;

class StatisticController extends Controller
{
    public function listStudent()
    {
        $students = Student::all();
        // dd($students);
        return view('admin.statistic.list_student', ['students' => $students]);
    }

    public function listCourse()
    {
        $courses = Course::all();
        $view = view('ajax.list_course', ['courses' => $courses]);
//        var_dump($view->render());die;
//        return response()
////            ->view('ajax.list_course',['courses'=> $courses]);
//        ->json([
////            'data' => $courses,
//            'html' => $view->render(),
////            'type'  =>'course'
//        ]);
        return \GuzzleHttp\json_encode($view->render());
    }

    public function pointStudent($id)
    {
        $student = Student::findOrFail($id);
        $courses = $student->courses;
        return view('admin.statistic.point_student', ['student' => $student, 'courses' => $courses]);
    }
}
