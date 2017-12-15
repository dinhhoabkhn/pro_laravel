@extends('layouts.layout_teacher')
@section('teacher')
<div class="container" style="margin-top: 50px;">
    <div class="row">
        <h4>Đăng ký môn học mới
        <a href="{{route('teacher.course')}}" class="btn btn-primary"><h5>Tại đây</h5></a></h4>
    </div>
    <table class="table-bordered table">
        <tr>
            <th style="width: 18%">Course Code </th>
            <th style="width: 14%">Subject Name</th>
            <th style="width: 14%">Class</th>
            <th style="width: 14%">Time</th>
            <th style="width: 15%"> Weekday</th>
        </tr>
        @foreach($courses as $cou)
        <tr>
            <td><a href="{{route('teacher.list_student_course',$cou->id)}}">{{$cou->course_code}} </a></td>
            
            <td> {{$cou->subject['name']}}</td>

            <td>{{$cou->class}} </td>
            <td>{{$cou->time_start}}->{{$cou->time_finish}} </td>
            <td>{{$cou->weekday}}</td>
            <td>
                <form action="{{route('teacher.delete_register',$cou->id)}}" method="post">
                    {{ csrf_field() }}
                    <button type="submit" title="DELETE" ><span class="glyphicon glyphicon-remove"></span></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection