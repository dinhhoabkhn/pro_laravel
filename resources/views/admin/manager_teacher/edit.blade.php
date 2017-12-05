@extends('welcome')
@section('header')
<div class="container">
    <form action="{{route('manager_teacher.update',$teacher->id)}}" method="post">
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
        <laber>Name</laber>
        <input type="text" value="{{$teacher->name}}" class="form-control" name="name">
    </div>
    <div class="form-group">
        <laber>Email</laber>
        <input type="email" value="{{$teacher->email}}" class="form-control" name="email">
    </div>
    <div class="form-group">
        <select name="level" class="form-control" value="{{$teacher->level}}" >
            <option>Teacher</option>
            <option>Masters</option>
            <option>Dr.</option>
            <option>Professor</option>
            <option>Associate Professor</option>
        </select>
    </div>
    <div class="form-group">
        <laber>Address</laber>
        <input type="text" value="{{$teacher->address}}" class="form-control" name="address">
    </div>
    <div class="form-group">
        <laber>Birthday</laber>
        <input type="date" value="{{$teacher->birthday}}" class="form-control" name="birthday">
    </div>
    <div class="form-group">
        <laber>Academy</laber>
        <input type="text" value="{{$teacher->academy}}" class="form-control" name="academy">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>
@endsection