<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateStudent;
use App\Http\Requests\UpdateStudent;
use App\Student;
use Illuminate\Support\Facades\Mail;
use App\Mail\AuthenticateLogin;

class Manager_studentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('admin.manager_student.manager',['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manager_student.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateStudent $request)
    {
        $student = new Student();
        $student->name = $request->name;
        $student->student_code = $request->student_code;
        $student->phone = $request->phone;
        $student->birthday = $request->birthday;
        $student->class = $request->class;  
        $student->address = $request->address;
        $student->email = $request->email;
        $student->email_token = str_random('15');
        $student->password = bcrypt('1');
        $student->save();
        $email = new AuthenticateLogin($student);
        Mail::to($student)->send($email);
        return redirect()->route('manager_student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return view('admin.manager_student.edit',['student'=>$student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudent $request, $id)
    {
        $student = Student::find($id);
        $student->name = $request->name;
        $student->student_code = $request->student_code;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->birthday = $request->birthday;
        $student->class = $request->class;  
        $student->address = $request->address;
        $student->update();
        return redirect()->route('manager_student.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::destroy($id);
        return redirect()->route('manager_student.index');
        
    }
    public function searchStudent(Request $request){
        $search = $request->student_code;
        $students = Student::where('student_code',$search)->get();
        return view('admin.manager_student.manager',['students'=>$students]);
    }
}
