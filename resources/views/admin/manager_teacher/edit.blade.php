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
                <label>Name</label>
                <input type="text" value="{{$teacher->name}}" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" value="{{$teacher->email}}" class="form-control" name="email">
            </div>
            <div class="form-group">
                <select name="level" class="form-control" value="{{$teacher->level}}">
                    <option>Teacher</option>
                    <option>Masters</option>
                    <option>Dr.</option>
                    <option>Professor</option>
                    <option>Associate Professor</option>
                </select>
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" value="{{$teacher->address}}" class="form-control" name="address">
            </div>
            <div class="form-group">
                <laber>Birthday</laber>
                <input type="date" value="{{$teacher->birthday}}" class="form-control" name="birthday">
            </div>
            <div class="form-group">
                <label class="control-label">Academy</label>
                <select class="form-control" name="academy">
                    <option>Công nghệ thông tin- Truyền thông</option>
                    <option>Toán tin</option>
                    <option>Điện</option>
                    <option>Điện tử viễn thông</option>
                    <option>Kinh tế</option>
                    <option>Ngoại ngữ</option>
                    <option>Hóa học</option>
                </select>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
@endsection