<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Model\Teacher;
use App\Model\Student;
use App\Mail\AuthenticateLoginTeacher;
use Illuminate\Support\Facades\Mail;

class ManagerTeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('name')) {
            $search = $request->name;
            $teacher = Teacher::where('name', 'like', '%' . $search . '%')->paginate(10);
            return view('admin.manager_teacher.manager', ['teacher' => $teacher]);
        } else {
            $teacher = Teacher::paginate(10);
            return view('admin.manager_teacher.manager', ['teacher' => $teacher]);
        }
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTeacherRequest $request)
    {
        $teacher = new Teacher;
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->email_token = str_random('10');
        $teacher->password = bcrypt('1');
        $teacher->level = $request->level;
        $teacher->address = $request->address;
        $teacher->birthday = $request->birthday;
        $teacher->academy = $request->academy;
        $teacher->save();
        $email = new AuthenticateLoginTeacher($teacher);
        Mail::to($teacher)->send($email);
        return redirect()->route('manager_teacher.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::findOrfail($id);
        return view('admin.manager_teacher.edit', ['teacher' => $teacher]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeacherRequest $request, $id)
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
        return redirect()->route('manager_teacher.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Teacher::destroy($id);
        return redirect()->route('manager_teacher.index');
    }
}
