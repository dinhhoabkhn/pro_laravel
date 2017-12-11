@extends('welcome')
@section('header')
<div class="container">
    <form action="{{route('manager_teacher.store')}}" method="post" role="form">
     {{ csrf_field() }}
     <div class="form-group">
        <laber>Name</laber>
        <input type="text" placeholder="Ho ten" class="form-control" name="name">
    </div>
    <div class="form-group">
        <laber>Email</laber>
        <input type="email" placeholder="email" class="form-control" name="email">
    </div>
    <div class="form-group">
        <select name="level" class="form-control">
            <option>Teacher</option>
            <option>Masters</option>
            <option>Dr.</option>
            <option>Professor</option>
            <option>Associate Professor</option>
        </select>
    </div>
    <div class="form-group">
        <laber>Address</laber>
        <input type="text" placeholder="address" class="form-control" name="address">
    </div>
    <div class="form-group">
        <laber>Birthday</laber>
        <input type="date" placeholder="birthday" class="form-control" name="birthday">
    </div>
    <div class="form-group">
        <laber>Academy</laber>
        <input type="text" placeholder="academy" class="form-control" name="academy">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>
@endsection