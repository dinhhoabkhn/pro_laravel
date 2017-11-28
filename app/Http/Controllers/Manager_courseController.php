<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Course;
use App\Subject;

class Manager_courseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::with(['teacher','subject'])->get();
        return view('admin.manager_course.manager',['courses' =>$courses]);
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subject = Subject::all();

        return view('admin.manager_course.add',['subjects'=>$subject]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course = new Course();
        $course->course_code = $request->course_code; 
        $course->class = $request->class;
        $course->subject_id = $request->subject_id;
        $course->semester = $request->semester;
        $course->timeStart = $request->timestart;
        $course->timeFinish = $request->timefinish;
        $course->weekdays = $request->weekday;
        $course->save();
        return redirect('manager_course');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::findOrfail($id);
        $subjects = Subject::all();
        return view('admin.manager_course.edit',['course'=> $course,'subjects'=>$subjects]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $course = Course::findOrfail($id);
        $course->course_code = $request->course_code; 
        $course->class = $request->class;
        $course->subject_id = $request->subject_id;
        $course->semester = $request->semester;
        $course->timeStart = $request->timestart;
        $course->timeFinish = $request->timefinish;
        $course->weekdays = $request->weekday;
        $course->save();
        return redirect('manager_course');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::destroy($id);
        return back();
    }
}
