@extends('layouts.layout_student')
@section('student')
<div class="container" style="margin-top: 50px;">
    <div class="row">
        <h2>List the Courses in this semester:</h2>
    </div>
    <table class="table-bordered table">
        <tr>
            <th style="width: 18%">Course Code </th>
            <th style="width: 14%">Subject Name</th>
            <th style="width: 14%">Class</th>
            <th style="width: 14%">Time</th>
            <th style="width: 15%"> Weekday</th>
            <th style="width: 10%"></th>
        </tr>
        @foreach($courses as $cou)
        <tr>
            <td>{{$cou->course_code}} </td>
            
            <td> {{$cou->subject['name']}}</td>

            <td>{{$cou->class}} </td>
            <td>{{$cou->time_start}}->{{$cou->time_finish}} </td>
            <td>{{$cou->weekday}}</td>
            <td>
                <form action="{{route('student.register',$cou->id)}}" method="post">
                    {{ csrf_field() }}
                    <button type="submit" title="Register" >Register</span></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection