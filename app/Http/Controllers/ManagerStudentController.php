<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Model\Student;
use Illuminate\Support\Facades\Mail;
use App\Mail\AuthenticateLogin;

class ManagerStudentController extends Controller
{

    public function index()
    {
//        if ($request->has('value_search')) {
//            $search = $request->value_search;
//            $students = Student::where('student_code', 'like', '%' . $search . '%')
//                ->orWhere('name', 'like', '%' . $search . '%')->paginate(5);
//            return view('admin.manager_student.manager', ['students' => $students])->with('success', 'the student that you search');
//        } else {
            $students = Student::paginate(5);
            return view('admin.manager_student.manager', ['students' => $students]);
//        }
    }
    public function searchStudent(Request $request)
    {
        $search = $request->search;
        $students = Student::where('student_code', 'like', '%'. $search .'%')
            ->orWhere('name', 'like', '%' . $search . '%')->paginate(5);
        return view('ajax.search_student', ['students' => $students]);

    }

    public function create()
    {
        return view('admin.manager_student.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateStudentRequest $request)
    {
        $student = new Student();
        $student->name = $request->name;
        $student->student_code = $request->student_code;
        $student->phone = $request->phone;
        $student->birthday = $request->birthday;
        $student->class = $request->class;
        $student->address = $request->address;
        $student->email = $request->email;
        $student->academy = $request->academy;
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return view('admin.manager_student.edit', ['student' => $student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, $id)
    {
        $student = Student::find($id);
        $student->name = $request->name;
        $student->student_code = $request->student_code;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->birthday = $request->birthday;
        $student->class = $request->class;
        $student->address = $request->address;
        $student->academy = $request->academy;
        $student->update();
        return redirect()->route('manager_student.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::destroy($id);
        return redirect()->route('manager_student.index');

    }
}
