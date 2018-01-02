@extends('welcome')
@section('header')

    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-4">
                <a id="list-student" class="btn btn-group-sm" href="{{route('list_student')}}">List Student</a>
                <a id="list-course" class="btn btn-group-sm" href="{{route('list_course')}}">List Course</a>
            </div>
        <form action="" method="get">
            <div class="col-md-4">
                <input type="text" class="form-control" name="search_course" id="search_course_statistic">
            </div>
            <div class="col-md-1">
                <input type="submit" class="btn btn-primary">
            </div>
        </form>
        </div>
        <table class="table-bordered table" id="list-student">
            <tr>
                <th class="stt">STT</th>
                <th >Course Code</th>
                <th >Subject</th>
                <th >Class</th>
            </tr>
            @php
                $count = 1;
            @endphp
            @foreach($courses as $course)
                <tr>
                    <td> {{$count++}}</td>
                    <td><a href="{{ route('statistic_point_course',$course->id) }}">{{$course->course_code}}</a></td>
                    <td>{{$course->subject->name}} </td>
                    <td>{{$course->class}} </td>
                </tr>
            @endforeach
        </table>
        @php
            echo $courses->appends($search)->links();
        @endphp
    </div>

@endsection