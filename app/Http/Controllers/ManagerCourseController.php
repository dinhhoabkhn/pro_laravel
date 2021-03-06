<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\CreateCourseRequest;
use App\Model\Course;
use App\Model\Subject;
use Config;

class ManagerCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search_course;
        $searchArr = ['search_course' => $search];
        if ($search) {
            $courses = Course::searchCourse($search)->paginate(Config::get('constants.paginate_number'));
            return view('admin.manager_course.manager', ['courses' => $courses,'search' => $searchArr]);

        } else {
            $courses = Course::with(['teacher', 'subject'])->paginate(Config::get('constants.paginate_number'));
            return view('admin.manager_course.manager', ['courses' => $courses,'search' => $searchArr]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subject = Subject::all();
        return view('admin.manager_course.add', ['subjects' => $subject]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCourseRequest $request)
    {
        $course = new Course();
        $course->course_code = $request->course_code;
        $course->class = $request->class;
        $course->subject_id = $request->subject_id;
        $course->semester = $request->semester;
        $course->time_start = $request->timestart;
        $course->time_finish = $request->timefinish;
        $course->weekday = $request->weekday;
        $course->save();
        return redirect()->route('manager_course.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::findOrfail($id);
        $subjects = Subject::all();
        return view('admin.manager_course.edit', ['course' => $course, 'subjects' => $subjects]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateCourseRequest $request, $id)
    {
        $course = Course::findOrfail($id);
        $course->course_code = $request->course_code;
        $course->class = $request->class;
        $course->subject_id = $request->subject_id;
        $course->semester = $request->semester;
        $course->time_start = $request->timestart;
        $course->time_finish = $request->timefinish;
        $course->weekday = $request->weekday;
        $course->save();
        return redirect()->route('manager_course.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::destroy($id);
        return redirect()->route('manager_course.index');
    }
}
