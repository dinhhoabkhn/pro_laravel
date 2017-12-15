@extends('welcome')
@section('header')
<div class="container">
    <form action="{{route('manager_student.store')}}" method="post" role="form">
       {{ csrf_field() }}
       @if($errors->any())
       <ul>
       @foreach ($errors->all() as $error)
       <li>{{ $error }}</li>
       @endforeach
   </ul>
       @endif
       <div class="form-group">
        <label>Name</label>
        <input type="text" placeholder="Ho ten" class="form-control" name="name" value="{{ old('name') }}">
    </div>
    <div class="form-group">
        <label>MSSV</label>
        <input type="number" placeholder="MSSV" class="form-control" name="student_code" value="{{old('student_code')}}">
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" placeholder="email" class="form-control" name="email" value="{{old('email')}}">
    </div>
    <div class="form-group">
        <label>Phone</label>
        <input type="text" placeholder="Phone" class="form-control" name="phone" value="{{old('phone')}}">
    </div>
    <div class="form-group">
        <label>Birthday</label>
        <input type="date" placeholder="birthday" class="form-control" name="birthday">
    </div>
    <div class="form-group">
        <label>Class</label>
        <input type="text" placeholder="class" class="form-control" name="class" value="{{old('class')}}">
    </div>
    <div class="form-group">
        <label>Address</label>
        <input type="text" placeholder="Address" class="form-control" name="address">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>
@endsection