@extends('welcome')
@section('header')

    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <h2>List the Course of {{$student->name}}</h2>
        </div>
        <table class="table-bordered table">
            <tr>
                <th class="stt">STT</th>
                <th >Course Code</th>
                <th >Subject</th>
                <th >Point</th>
            </tr>
            @php
                $count = 1;
            @endphp
            @foreach($courses as $course)
                <tr>
                    <td>{{$count++}}</td>
                    <td>{{$course->course_code}}</td>
                    <td>{{$course->subject['name']}} </td>
                    <td>{{$course->pivot->point}} </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection