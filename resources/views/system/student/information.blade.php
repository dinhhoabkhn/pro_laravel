@extends('layouts.layout_student')
@include('include.avatar')
@section('student')
    <div class="container_fluid">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{session()->get('success')}}
            </div>
        @endif
        <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <td>{{$student->name}}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{$student->email}}</td>
                </tr>
                <tr>
                    <th>Student Code</th>
                    <td>{{$student->student_code}}</td>
                </tr>
                <tr>
                    <th>Class</th>
                    <td>{{$student->class}}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{$student->address}}</td>
                </tr>
                <tr>
                    <th>Birthday</th>
                    <td>{{$student->birthday}}</td>
                </tr>
                <tr>
                    <th>Academy</th>
                    <td>{{$student->academy}}</td>
                </tr>
                <tr>
                    <th>Avatar</th>
                    <td><img src="{{asset($student->avatar)}}" alt="Not Avatar" width="100px"></td>
                    </tr>
                    </table>
                </div>
        </div>
            <div class="row">
                <form action="{{route('student.change-avatar')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @if($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="row">
                        <div class="col-md-2 col-md-offset-1">
                        <input type="file" name="avatar" class="form-control">
                    </div>
                    <input type="submit" name="" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
    <div class="row" style="margin-top: 30px">
        <a href="{{route('student.get_rs_password')}}" class="reset-password">Reset Password</a>
    </div>
    </div>
@endsection