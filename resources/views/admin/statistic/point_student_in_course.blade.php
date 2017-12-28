@extends('welcome')
@section('header')


    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <h2>List the Student in this Course:</h2>
        </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="button" class="btn btn-info btn-lg" id="print" style="margin-bottom: 20px;height: 7%;"><span
                    class="glyphicon glyphicon-print" aria-hidden="true"> In</span></button>
        <div id="table-manager-student">
            <table class="table-bordered table">
                <tr>
                    <th style="width: 5%">STT</th>
                    <th style="width: 14%">Name</th>
                    <th style="width: 14%">Student_code</th>
                    <th style="width: 14%">Class</th>
                    <th style="width: 15%"> Birthday</th>
                    <th style="width: 10%">Point</th>
                </tr>
                @php
                    $count = 1;
                @endphp
                @foreach($students as $stu)
                    <tr>
                        <td>{{$count++}}</td>
                        <td>{{$stu->name}}</td>
                        <td>{{$stu->student_code}} </td>
                        <td>{{$stu->class}} </td>
                        <td>{{$stu->birthday}}</td>
                        <td>{{$stu->pivot->point}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection