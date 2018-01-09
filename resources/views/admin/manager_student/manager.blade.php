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
                </div>
            </form>
        </div>
        <div id="table-manager-student">
            <table class="table-bordered table" >
                <tr>
                    <th >Name</th>
                    <th >Student Code</th>
                    <th >Email</th>
                    <th >Phone</th>
                    <th >Birthday</th>
                    <th >Class</th>
                    <th colspan="2">Action</th>
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
        </div>
        {{--</form>--}}
        {{ $students->links() }}
    </div>

@endsection