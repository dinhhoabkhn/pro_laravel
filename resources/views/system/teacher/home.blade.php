@extends('layouts.layout_teacher')
@section('teacher')
<div class="container" style="margin-top: 50px;">
    <div class="row">
        <p>Đăng ký môn học mới</p>
        <a href="{{route('teacher.course')}}" class="btn btn-primary btn-lg active btn-add"><h3>Tại đây</h3></a>
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
            <td>{{$cou->course_code}} </td>
            
            <td> {{$cou->subject['name']}}</td>

            <td>{{$cou->class}} </td>
            <td>{{$cou->timestart}}->{{$cou->timefinish}} </td>
            <td>{{$cou->weekdays}}</td>
            <td>
                <form action="{{route('teacher.deleteregister',$cou->id)}}" method="post">
                    {{ csrf_field() }}
                    <button type="submit" title="DELETE" ><span class="glyphicon glyphicon-remove"></span></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection