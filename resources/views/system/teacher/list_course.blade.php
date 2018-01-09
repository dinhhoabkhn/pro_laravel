@extends('layouts.layout_teacher')
@section('teacher')
<div class="container" style="margin-top: 50px;">
    <div class="row">
        <h2>List the Courses in this semester:</h2>
    </div>
    <table class="table-bordered table">
        <tr>
            <th >Course Code </th>
            <th >Subject Name</th>
            <th >Class</th>
            <th >Time</th>
            <th > Weekday</th>
            <th >Register</th>
        </tr>
        @foreach($courses as $cou)
        <tr>
            <td>{{$cou->course_code}} </td>
            
            <td> {{$cou->subject['name']}}</td>

            <td>{{$cou->class}} </td>
            <td>{{$cou->time_start}}->{{$cou->time_finish}} </td>
            <td>{{$cou->weekday}}</td>
            <td>
                <form action="{{route('teacher.register_course',$cou->id)}}" method="post">
                    {{ csrf_field() }}
                    <button type="submit" title="Register" class="btn btn-primary btn-sm">Register</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection