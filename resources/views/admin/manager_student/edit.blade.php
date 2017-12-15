@extends('welcome')
@section('header')
<div class="container">
    <form action="{{ route('manager_student.update',$student->id)}}" method="post">
    	{{ method_field('PUT') }}
    	{{ csrf_field() }}
        @if($errors->any())
       <ul>
       @foreach ($errors->all() as $error)
       <li>{{ $error }}</li>
       @endforeach
   </ul>
       @endif
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" value="{{$student->name}}" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label>MSSV</label>
            <input type="number" value="{{$student->student_code}}" class="form-control" name="student_code">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" value="{{$student->email}}" class="form-control" name="email">
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="text" value="{{$student->phone}}" class="form-control" name="phone">
        </div>
        <div class="form-group">
            <label>Birthday</label>
            <input type="date" value="{{$student->birthday}}" class="form-control" name="birthday">
        </div>
        <div class="form-group">
            <label>Class</label>
            <input type="text" value="{{$student->class}}" class="form-control" name="class">
        </div>
        <div class="form-group">
            <label>Address</label>
            <input type="text" value="{{$student->address}}" class="form-control" name="address">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>
@endsection