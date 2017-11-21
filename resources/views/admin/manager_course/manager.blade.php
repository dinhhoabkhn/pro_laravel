@extends('welcome')
@section('header')
<div class="container" style="margin-top: 50px;">
    <div class="row">
        <a href="{{route('manager_course.create')}}" class="btn btn-primary btn-lg active btn-add">New course</a>
    </div>
    <table class="table-bordered table">
        <tr>
            <th style="width: 18%">Course code </th>
            <th style="width: 14%">Class</th>
            <th style="width: 15%">Semester</th>
            <th style="width: 18%">Time start</th>
            <th style="width: 14%">Time finish</th>
        </tr>
        @foreach($course as $cou)
        <tr>
            <td>{{$cou->course_code}} </td>
            <td>{{$cou->class}} </td>
            <td>{{$cou->semester}} </td>
            <td>{{$cou->timeStart}} </td>
            <td>{{$cou->timeFinish}} </td>
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