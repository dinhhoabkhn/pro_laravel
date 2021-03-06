@extends('welcome')
@section('header')
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <a href="{{route('manager_course.create')}}" class="btn btn-primary active btn-add">New course</a>
        </div>
        <div class="row">
            <form action="" method="get">
                <div class="form-group">
                    <div class="col-md-3 col-md-offset-4">
                        <input type="text" name="search_course" class="form-control" placeholder="type Course code">
                    </div>
                    <input type="submit" name="" value="Search" class="btn btn-primary">
                </div>

            </form>
        </div>
        <table class="table-bordered table">
            <tr>
                <th >Course code</th>
                <th >Subject Name</th>
                <th >Class</th>
                <th >Semester</th>
                <th >Teacher</th>
                <th >Time</th>
                <th colspan="2">Action</th>
            </tr>
            @foreach($courses as $cou)
                <tr>
                    <td>{{$cou->course_code}} </td>
                    <td> {{$cou->subject['name']}}</td>
                    <td>{{$cou->class}} </td>
                    <td>{{$cou->semester}} </td>
                    <td>{{$cou->teacher['name']}}</td>
                    <td>{{$cou->time_start}}->{{$cou->time_finish}} </td>
                    <td width="10%"><a class="glyphicon glyphicon-edit" title="EDIT"
                                       href="{{route('manager_course.edit',$cou->id)}}"></a></td>
                    <td width="5%">
                        <form action="{{route('manager_course.destroy',$cou->id)}}" method="post">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" title="DELETE" class="delete"><span
                                        class="glyphicon glyphicon-remove"></span></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        @php
            echo $courses->appends($search)->links();
        @endphp
    </div>

@endsection