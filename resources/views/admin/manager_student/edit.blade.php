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
            <div class="note-create"><i>Note: The field that has (*) is imperative</i></div>

            <div class="row form-group">
                <div class="col-md-2">
                    <label>Name (*)</label>
                </div>
                <div class="col-md-7">
                    <input type="text" value="{{$student->name}}" class="form-control" name="name">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label>Student code (*)</label>
                </div>
                <div class="col-md-7">
                    <input type="number" value="{{$student->student_code}}" class="form-control" name="student_code">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label>Email (*)</label>
                </div>
                <div class="col-md-7">
                    <input type="email" value="{{$student->email}}" class="form-control" name="email">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label>Phone</label>
                </div>
                <div class="col-md-7">
                    <input type="text" value="{{$student->phone}}" class="form-control" name="phone">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label>Birthday (*)</label>
                </div>
                <div class="col-md-7">
                    <input type="date" value="{{$student->birthday}}" class="form-control" name="birthday">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label>Class (*)</label>
                </div>
                <div class="col-md-7">
                    <input type="text" value="{{$student->class}}" class="form-control" name="class">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label>Address (*)</label>
                </div>
                <div class="col-md-7">
                    <input type="text" value="{{$student->address}}" class="form-control" name="address">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label class="control-label">Academy (*)</label>
                </div>
                <div class="col-md-7">
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