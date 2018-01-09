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
            <div class="note-create"><i>Note: The field that has (*) is imperative</i></div>
            <div class="row form-group">
                <div class="col-md-2"><label>Name (*)</label></div>
                <div class="col-md-7"><input type="text" placeholder="Ho ten" class="form-control" name="name"
                                             value="{{ old('name') }}">
                </div>
                <div class="col-md-3">
                    <span class="example">(Ex:Nguyễn Văn A)</span>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label>Student code (*)</label>
                </div>
                <div class="col-md-7">
                    <input type="number" placeholder="MSSV" class="form-control" name="student_code"
                           value="{{old('student_code')}}">
                </div>
                <div class="col-md-3 ">
                    <span class="example">(Ex:20xxxxxx)</span>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label>Email (*)</label>
                </div>
                <div class="col-md-7">

                    <input type="email" placeholder="email" class="form-control" name="email" value="{{old('email')}}">
                </div>
                <div class="col-md-3 ">
                    <span class="example">(Ex:dinhhoa@gmail.com)</span>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label>Phone</label>
                </div>
                <div class="col-md-7">

                    <input type="text" placeholder="Phone" class="form-control" name="phone" value="{{old('phone')}}">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label>Birthday (*)</label>
                </div>
                <div class="col-md-7">
                    <input type="date" placeholder="birthday" class="form-control" name="birthday">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label>Class (*)</label>
                </div>
                <div class="col-md-7">
                    <input type="text" placeholder="class" class="form-control" name="class" value="{{old('class')}}">
                </div>
                <div class="col-md-3 ">
                    <span class="example">(Ex:CNTT-TT 2.03)</span>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label>Address (*)</label>
                </div>
                <div class="col-md-7">

                    <input type="text" placeholder="Address" class="form-control" name="address"></div>
                <div class="col-md-3 ">
                    <span class="example">(Ex:Thanh Hóa)</span>
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