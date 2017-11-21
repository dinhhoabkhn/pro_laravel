@extends('welcome')
@section('header')
<div class="container">
    <form action="{{route('manager_course.store')}}" method="post" role="form">
        {{ csrf_field() }}
        <div class="form-group">
            <laber>Course code</laber>
            <input type="number" placeholder="Course code" class="form-control" name="course_code">
        </div>
        <div class="form-group">
            <laber>Class</laber>
            <input type="text" placeholder="Class" class="form-control" name="class">
        </div>
        <div class="form-group">
            <laber>Semester</laber>
            <input type="number" placeholder="Semester" class="form-control" name="semester">
        </div>
        <div class="form-group">
            <laber>Time start</laber>
            <input type="time" placeholder="Time start" class="form-control" name="timestart">
        </div>
        <div class="form-group">
            <laber>Time finish</laber>
            <input type="time" placeholder="Time finish" class="form-control" name="timefinish">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>
@endsection