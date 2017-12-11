@extends('layouts.layout_teacher')
@section('teacher')
<div class="container" style="margin-top: 50px;">
    <div class="row">
        <h2>List the Courses in this semester:</h2>
    </div>
    <form action="{{route('teacher.pointstudent',$course->id)}}" method="post">
        {{ csrf_field() }}
    <table class="table-bordered table">
        <tr>
            <th style="width: 5%">STT </th>
            <th style="width: 14%">Name</th>
            <th style="width: 14%">Student_code</th>
            <th style="width: 14%">Class</th>
            <th style="width: 15%"> Birthday</th>
            <th style="width: 10%">Point</th>
            <th></th>
        </tr>
        @php
        $count = 1;
        @endphp
        @foreach($students as $stu)
        <tr>
            <td> {{$count++}}</td>
            
            <td> {{$stu->name}}</td>

            <td>{{$stu->student_code}} </td>
            <td>{{$stu->class}} </td>
            <td>{{$stu->birthday}}</td>
            <td>{{$stu->pivot->point}}</td>
            <td>
                <input type="number" max="10" min="0" name="point[{{$stu->id}}]" >
            </td>
        </tr>
        @endforeach
    </table>
    <input type="submit">
</form>
</div>
@endsection