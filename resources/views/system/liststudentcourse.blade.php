@extends('layouts.layout')
@section('teacher')
<div class="container" style="margin-top: 50px;">
    <div class="row">
        <h2>List the Courses in this semester:</h2>
    </div>
    <table class="table-bordered table">
        <tr>
            <th style="width: 5%">STT </th>
            <th style="width: 14%">Name</th>
            <th style="width: 14%">Student_code</th>
            <th style="width: 14%">Class</th>
            <th style="width: 15%"> Birthday</th>
            <th style="width: 10%">Point</th>
        </tr>
        @foreach($students as $stu)
        <tr>
            <td></td>
            
            <td> {{$stu->name}}</td>

            <td>{{$stu->student_code}} </td>
            <td>{{$stu->class}} </td>
            <td>{{$stu->birthday}}</td>
            <td>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection