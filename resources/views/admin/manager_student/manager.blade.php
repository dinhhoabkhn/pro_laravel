@extends('welcome')
@section('header')
<div class="container" style="margin-top: 50px;">
    <div class="row">
        <a href="{{route('manager_student.create')}}" class="btn btn-primary active btn-add">New Student</a>
    </div>
    <div class="row">
        <form action="" method="get">
            @if(session()->has('success'))
                <div class="alert alert-success">
                {{session()->get('success')}}
            </div>
            @endif
            <div class="form-group">
                <div class="col-md-3 col-md-offset-4">
                <input type="text" name="value_search" class="form-control" placeholder="type your code or name">
            </div>
                <input type="submit" name="" value="Search" class="btn btn-small btn-primary">
            </div>
            
        </form>
    </div>
    <table class="table-bordered table">
        <tr>
            <th style="width: 18%">Name </th>
            <th style="width: 14%">MSSV</th>
            <th style="width: 18%">Email</th>
            <th style="width: 14%">Phone</th>
            <th style="width: 14%">Birthday</th>
            <th style="width: 15%">Class</th>
        </tr>
        @foreach($students as $stu)
        <tr>
            <td>{{$stu->name}} </td>
            <td>{{$stu->student_code}} </td>
            <td>{{$stu->email}} </td>
            <td>{{$stu->phone}} </td>
            <td>{{$stu->birthday}} </td>
            <td>{{$stu->class}} </td>
            <td> <a class="glyphicon glyphicon-edit" title="edit" href="{{route('manager_student.edit',$stu->id)}}"></a></td>
            <td>
                <form action="{{route('manager_student.destroy',$stu->id)}}" method="post">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" title="DELETE" ><span class="glyphicon glyphicon-remove"></span></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {{ $students->links() }}
</div>

@endsection