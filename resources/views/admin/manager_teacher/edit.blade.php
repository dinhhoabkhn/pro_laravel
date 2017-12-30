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
            <div class="note-create"><i>Note: The field that has (*) is imperative</i></div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label>Name</label>
                </div>
                <div class="col-md-8">
                    <input type="text" value="{{$teacher->name}}" class="form-control" name="name">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label>Email</label>
                </div>
                <div class="col-md-8">
                    <input type="email" value="{{$teacher->email}}" class="form-control" name="email">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label>Level(*)</label>
                </div>
                <div class="col-md-8">
                    <select name="level" class="form-control" value="{{$teacher->level}}">
                        <option>Teacher</option>
                        <option>Masters</option>
                        <option>Dr.</option>
                        <option>Professor</option>
                        <option>Associate Professor</option>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label>Address</label>
                </div>
                <div class="col-md-8">
                    <input type="text" value="{{$teacher->address}}" class="form-control" name="address">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label>Birthday (*)</label>
                </div>
                <div class="col-md-8">
                    <input type="date" value="{{$teacher->birthday}}" class="form-control"
                           name="birthday">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label class="control-label">Academy (*)</label>
                </div>
                <div class="col-md-8">
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
            </div>
                <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection