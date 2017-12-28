@extends('layouts.layout_student')
@include('include.avatar')
@section('student')
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{session()->get('success')}}
        </div>
    @endif
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <h4 style="color: #1f648b">Hello {{$student->name}}</h4>
            <h4>Register new Course <a href="{{route('student.list_course')}}" class="btn btn-primary  active "> Here
                </a></h4>
        </div>
        <table class="table table-bordered">
            <tr>
                <th style="width: 15%">Course Code</th>
                <th style="width: 14%">Subject Name</th>
                <th style="width: 15%">Class</th>
                <th style="width: 14%">Time</th>
                <th style="width: 15%">Weekday</th>
                <th width="4%">Action</th>
            </tr>
            @foreach($courses as $cou)
                <tr>
                    <td>{{$cou->course_code}}</td>
                    <td>@php echo ($cou->subject) ? ($cou->subject->name) : "No Data" @endphp</td>
                    <td>{{$cou->class}} </td>
                    <td>{{$cou->time_start}}->{{$cou->time_finish}} </td>
                    <td>{{$cou->weekday}}</td>
                    <td>
                        <form action="{{route('student.delete',$cou->id)}}" method="post">
                            {{ csrf_field() }}
                            <button type="submit" title="DELETE" class="delete"><span
                                        class="glyphicon glyphicon-remove"></span></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {{$courses->links()}}
    </div>

@endsection