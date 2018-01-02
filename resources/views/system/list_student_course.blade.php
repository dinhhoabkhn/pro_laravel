@extends('layouts.layout_teacher')
@section('teacher')
<div class="container" style="margin-top: 50px;">
    <div class="row">
        <h2>List the Student in Course:</h2>
    </div>
    <form action="{{route('teacher.point_student',$course->id)}}" method="post">
        {{ csrf_field() }}
    <table class="table-bordered table">
        <tr>
            <th class="stt">STT </th>
            <th >Name</th>
            <th >Student_code</th>
            <th >Class</th>
            <th >Birthday</th>
            <th >Point</th>
            <th ></th>
        </tr>
        @php
        $count = 1;
        @endphp
        @foreach($students as $stu)
        <tr>
            <td>{{$count++}}</td>
            <td>{{$stu->name}}</td>
            <td>{{$stu->student_code}} </td>
            <td>{{$stu->class}} </td>
            <td>{{$stu->birthday}}</td>
            <td>{{$stu->pivot->point}}</td>
            <td>
                <input type="number" max="10" min="0" name="point[{{$stu->id}}]">
            </td>
        </tr>
        @endforeach
    </table>
    <input type="submit" class="btn btn-primary">
</form>
</div>
@endsection