@extends('layouts')
@section('layout')
<div class="container" style="margin-top: 50px;">
    <div class="row">
        <a href="{{route('manager_course.create')}}" class="btn btn-primary btn-lg active btn-add">New course</a>
    </div>
    <table class="table-bordered table">
        <tr>
            <th style="width: 18%">Course Code </th>
            <th style="width: 14%">Subject Name</th>
            <th style="width: 14%">Class</th>
            <th style="width: 14%">Time</th>
            <th style="width: 15%"> Weekday</th>
        </tr>
        @foreach($courses as $cou)
        <tr>
            <td>{{$cou->course_code}} </td>
            
            <td> {{$cou->subject['name']}}</td>
            <td>{{$cou->class}} </td>
            <td>{{$cou->timestart}}->{{$cou->timefinish}} </td>
            <td> <a class="glyphicon glyphicon-edit" title="edit" href="{{route('manager_course.edit',$cou->id)}}"></a></td>
            <td>
                <form action="{{route('manager_course.destroy',$cou->id)}}" method="post">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" title="DELETE" ><span class="glyphicon glyphicon-remove"></span></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection