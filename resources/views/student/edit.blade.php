@extends('welcome')
@section('header')
<div class="container">
    <form action="{{ route('manager_student.update',$student->id)}}" method="post">
    	{{ method_field('PUT') }}
    	{{ csrf_field() }}
        <div class="form-group">
            <laber>Name</laber>
            <input type="text" value="{{$student->name}}" class="form-control" name="name">
        </div>
        <div class="form-group">
            <laber>MSSV</laber>
            <input type="number" value="{{$student->student_code}}" class="form-control" name="student_code">
        </div>
        <div class="form-group">
            <laber>Email</laber>
            <input type="email" value="{{$student->email}}" class="form-control" name="email">
        </div>
        <div class="form-group">
            <laber>Phone</laber>
            <input type="text" value="{{$student->phone}}" class="form-control" name="phone">
        </div>
        <div class="form-group">
            <laber>Birthday</laber>
            <input type="date" value="{{$student->phone}}" class="form-control" name="brithday">
        </div>
        <div class="form-group">
            <laber>Class</laber>
            <input type="text" value="{{$student->class}}" class="form-control" name="class">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>
@endsection