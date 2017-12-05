@extends('welcome')
@section('header')

<div class="container" style="margin-top: 50px;">
    <div class="row">
        <h2>List the Student</h2>
    </div>
    <table class="table-bordered table">
        <tr>
            <th style="width: 5%">STT </th>
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
            
            <td><a href="{{route('statisticpoint',$stu->id)}}">{{$stu->name}}</a></td>

            <td>{{$stu->student_code}} </td>
            <td>{{$stu->class}} </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection