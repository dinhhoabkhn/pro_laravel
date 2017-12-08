@extends('layouts.layout_student')
@section('student')
<div class="container" style="margin-top: 50px;">
    <div class="row">
        <h4>Đăng ký môn học mới<a href="{{route('student.listcourse')}}" class="btn btn-primary  active ">Tại đây</a></h4>
    </div>
    <table class="table-bordered table">
        <tr>
            <th style="width: 18%">Course Code </th>
            <th style="width: 14%">Subject Name</th>
            <th style="width: 15%">Teacher</th>
            <th style="width: 14%">Time</th>
            <th style="width: 15%"> Weekday</th>
            <th></th>
        </tr>
        @foreach($courses as $cou)
        <tr>
            <td><a href="{{url('liststudent',$cou->id)}}">{{$cou->course_code}} </a></td>
            
            <td> {{$cou->subject['name']}}</td>

            <td>{{$cou->class}} </td>
            <td>{{$cou->timestart}}->{{$cou->timefinish}} </td>
            <td>{{$cou->weekdays}}</td>
            <td>
                <form action="{{route('student.delete',$cou->id)}}" method="post">
                    {{ csrf_field() }}
                    <button type="submit" title="DELETE" ><span class="glyphicon glyphicon-remove"></span></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection