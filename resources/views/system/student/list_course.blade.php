@extends('layouts.layout_student')
@include('include.avatar')
@section('student')
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <h3>List the Courses in this semester:</h3>
        </div>
        <div class="row">
            <form action="" method="get">
                <div class="form-group">
                    <div class="col-md-3 col-md-offset-4">
                        <input type="text" class="form-control" name="search_course">
                    </div>
                    <input type="submit" class="btn btn-primary btn-sm">
                </div>
            </form>
        </div>
        @if($errors->any())
            <div class="alert alert-danger">
                {{$errors->first()}}
            </div>
        @endif
        <table class="table-bordered table">
            <tr>
                <th >Course Code</th>
                <th >Subject Name</th>
                <th >Class</th>
                <th >Time</th>
                <th > Weekday</th>
                <th >Action</th>
            </tr>
            @foreach($courses as $cou)
                <tr>
                    <td>{{$cou->course_code}} </td>

                    <td> {{$cou->subject['name']}}</td>

                    <td>{{$cou->class}} </td>
                    <td>{{$cou->time_start}}->{{$cou->time_finish}} </td>
                    <td>{{$cou->weekday}}</td>
                    <td>
                        <form action="{{route('student.register',$cou->id)}}" method="post">
                            {{ csrf_field() }}
                            <button type="submit" title="Register" class="btn btn-primary btn-sm">Register</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection