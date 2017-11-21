@extends('welcome')
@section('header')
<div class="container">
    <form action="{{ route('manager_course.update',$course->id)}}" method="post">
    	{{ method_field('PUT') }}
    	{{ csrf_field() }}
        <div class="form-group">
            <laber>Course code</laber>
            <input type="number" value="{{$course->course_code}}" class="form-control" name="course_code">
        </div>
        <div class="form-group">
            <laber>Class</laber>
            <input type="text" value="{{$course->class}}" class="form-control" name="class">
        </div>
        <div class="form-group">
            <laber>Semester</laber>
            <input type="number" value="{{$course->semester}}" class="form-control" name="semester">
        </div>
        <div class="form-group">
            <laber>Time start</laber>
            <input type="time" value="{{$course->timeStart}}" class="form-control" name="timestart">
        </div>
        <div class="form-group">
            <laber>Time finish</laber>
            <input type="time" value="{{$course->timeFinish}}" class="form-control" name="timefinish">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>
@endsection