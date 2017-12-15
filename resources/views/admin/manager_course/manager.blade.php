@extends('welcome')
@section('header')
<div class="container" style="margin-top: 50px;">
    <div class="row">
        <a href="{{route('manager_course.create')}}" class="btn btn-primary btn-lg active btn-add">New course</a>
    </div>
    <div class="row">
        <form action="" method="get">
            
            
            <div class="form-group">
                <div class="col-md-3 col-md-offset-4">
                <input type="text" name="course_code" class="form-control" placeholder="type Course code">
            </div>
                <input type="submit" name="" value="Search" class="btn btn-primary">
            </div>
            
        </form>
    </div>
    <table class="table-bordered table">
        <tr>
            <th style="width: 18%">Course code </th>
            <th style="width: 14%">Subject Name </th>
            <th style="width: 14%">Class</th>
            <th style="width: 15%">Semester</th>
            <th style="width: 18%">Teacher</th>
            <th style="width: 14%">Time</th>
        </tr>
        @foreach($courses as $cou)
        <tr>
            <td>{{$cou->course_code}} </td>
            <td> {{$cou->subject['name']}}</td>
            <td>{{$cou->class}} </td>
            <td>{{$cou->semester}} </td>
            <td>{{$cou->teacher['name']}}</td>
            <td>{{$cou->time_start}}->{{$cou->time_finish}} </td>
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
    {{$courses->links()}}
</div>

@endsection