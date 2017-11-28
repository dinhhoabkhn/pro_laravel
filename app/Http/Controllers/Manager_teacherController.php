<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
class Manager_teacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher = Teacher::all();
        return view('admin.manager_teacher.manager',['teacher'=>$teacher]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manager_teacher.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $teacher = new Teacher;
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->password = bcrypt('123456');
        $teacher->level = $request->level;
        $teacher->address = $request->address;
        $teacher->birthday = $request->birthday;
        $teacher->academy = $request->academy;
        $teacher->save();
        return redirect('manager_teacher');
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
        $teacher = Teacher::findOrfail($id);
        return view('admin.manager_teacher.edit',['teacher'=>$teacher]);
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
        /**
         * undocumented constant
         **/
        $teacher = Teacher::find($id);
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->level = $request->level;
        $teacher->address = $request->address;
        $teacher->birthday = $request->birthday;
        $teacher->academy = $request->academy;
        $teacher->save();
        return redirect('manager_teacher');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Teacher::destroy($id);
        return back();
    }
}
