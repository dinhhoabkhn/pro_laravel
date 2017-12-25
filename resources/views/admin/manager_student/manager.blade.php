@extends('welcome')
@section('header')
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <a href="{{route('manager_student.create')}}" class="btn btn-primary active btn-add">New Student</a>
        </div>
        <div class="row">
            <form>
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{session()->get('success')}}
                    </div>
                @endif
                <div class="form-group">
                    <div class="col-md-3 col-md-offset-4">
                        <input type="text" name="search" class="form-control" id="search-student"
                               placeholder="Type your code or name">
                    </div>
                    {{--<input type="submit" name="" value="Search" id="search-student" class="btn btn-small btn-primary" onclick="searchStudent(this)">--}}
                </div>
            </form>
        </div>
        <table class="table-bordered table" id="table-manager-student">
            <tr>
                <th style="width: 20%">Name</th>
                <th style="width: 14%">MSSV</th>
                <th style="width: 18%">Email</th>
                <th style="width: 14%">Phone</th>
                <th style="width: 14%">Birthday</th>
                <th style="width: 15%">Class</th>
                <th colspan="2" width="15%">Action</th>
            </tr>
            @foreach($students as $stu)
                <tr>
                    <td><a href="{{route('statistic_point',$stu->id)}}">{{$stu->name}}</a></td>
                    <td>{{$stu->student_code}} </td>
                    <td>{{$stu->email}} </td>
                    <td>{{$stu->phone}} </td>
                    <td>{{$stu->birthday}} </td>
                    <td>{{$stu->class}} </td>
                    <td><a class="glyphicon glyphicon-edit" title="edit"
                           href="{{route('manager_student.edit',$stu->id)}}"></a></td>
                    <td>
                        <form action="{{route('manager_student.destroy',$stu->id)}}" method="post">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" title="DELETE" class="delete"><span
                                        class="glyphicon glyphicon-remove"></span></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $students->links() }}
    </div>

@endsection