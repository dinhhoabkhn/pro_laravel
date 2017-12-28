@extends('welcome')
@section('header')

    <div class="container" style="margin-top: 50px;">
        <div class="row">
            {{--<form>--}}
            <div class="col-md-4">
                <a id="list-student" class="btn btn-group-sm" href="{{route('list_student')}}">List Student</a>
                <a id="list-course" class="btn btn-group-sm" href="{{route('list_course')}}">List Course</a>
            </div>
            <form action="" method="get">
                <div class="col-md-4">
                    <input type="text" class="form-control" name="search_student" id="search_student_statistic">
                </div>
                <div class="col-md-1">
                        <input type="submit" class="btn btn-primary">
                </div>
            </form>
            {{--</form>--}}
        </div>
        <div id="content_ajax">
            <table class="table-bordered table" id="table-list-student">
                <tr>
                    <th style="width: 5%">STT</th>
                    <th style="width: 20%">Name</th>
                    <th style="width: 20%">Student_code</th>
                    <th style="width: 20%">Class</th>
                </tr>
                @php
                    $count = 1;
                @endphp
                @foreach($students as $stu)
                    <tr>
                        <td> {{$count++}}</td>
                        <td><a href="{{route('statistic_point',$stu->id)}}">{{$stu->name}}</a></td>
                        <td>{{$stu->student_code}} </td>
                        <td>{{$stu->class}} </td>
                    </tr>
                @endforeach
            </table>
        </div>
        </table>
        @php
        echo $students->appends($search_student)->links();
        @endphp
    </div>
@endsection