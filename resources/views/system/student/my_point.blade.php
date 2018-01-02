@extends('layouts.layout_student')
@include('include.avatar')
@section('student')

    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <h2>List the Course of {{$student->name}}</h2>
        </div>
        <table class="table-bordered table">
            <tr>
                <th class="stt">STT</th>
                <th >Subject</th>
                <th >Point</th>
            </tr>
            @php
                $count = 1;
            @endphp
            @foreach($courses as $course)
                @if(!empty($course->pivot->point))
                <tr>
                    <td>{{$count++}}</td>
                    <td>{{$course->subject['name']}}
                    <td>{{$course->pivot->point}} </td>
                </tr>
                @endif
            @endforeach
        </table>
    </div>
@endsection