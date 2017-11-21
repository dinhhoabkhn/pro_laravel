<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class Manager_courseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course = Course::all();
        return view('admin.manager_course.manager',['course' =>$course]);
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manager_course.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course = new Course;
        $course->course_code = $request->course_code;
        $course->class = $request->class;
        $course->semester = $request->semester;
        $course->timeStart = $request->timestart;
        $course->timeFinish = $request->timefinish;
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
        return view('admin.manager_course.edit',['course'=> $course = Course::findOrfail($id)]);
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
        $course->semester = $request->semester;
        $course->timeStart = $request->timestart;
        $course->timeFinish = $request->timefinish;
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
