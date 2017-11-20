@extends('welcome')
@section('header')
<div class="container">
    <form action="{{route('manager_student.store')}}" method="post" role="form">
         {{ csrf_field() }}
        <div class="form-group">
            <laber>Name</laber>
            <input type="text" placeholder="Ho ten" class="form-control" name="name">
        </div>
        <div class="form-group">
            <laber>MSSV</laber>
            <input type="number" placeholder="MSSV" class="form-control" name="student_code">
        </div>
        <div class="form-group">
            <laber>Email</laber>
            <input type="email" placeholder="email" class="form-control" name="email">
        </div>
        <div class="form-group">
            <laber>Phone</laber>
            <input type="text" placeholder="Phone" class="form-control" name="phone">
        </div>
        <div class="form-group">
            <laber>Birthday</laber>
            <input type="date" placeholder="birthday" class="form-control" name="birthday">
        </div>
        <div class="form-group">
            <laber>Class</laber>
            <input type="text" placeholder="class" class="form-control" name="class">
        </div>
        <div class="form-group">
            <laber>Address</laber>
            <input type="text" placeholder="Address" class="form-control" name="address">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>
@endsection