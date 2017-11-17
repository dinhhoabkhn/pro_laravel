@extends('welcome')
@section('header')
<div class="container" style="margin-top: 100px;">
    <!-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">New Student</button>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Header</h4>
                </div>
                <div class="modal-body">
                    <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> -->
    <a href="{{route('manager_student.create')}}" class="btn btn-primary btn-lg active" role="button">New Student</a>
    <table class="table-bordered">
        <tr>
            <th> Name </th>
            <th>MSSV</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Birthday</th>
            <th>class</th>
        </tr>
        @foreach($student as $stu)
        <tr>
            <td>{{$stu->name}} </td>
            <td>{{$stu->mssv}} </td>
            <td>{{$stu->email}} </td>
            <td>{{$stu->phone}} </td>
            <td>{{$stu->brithday}} </td>
            <td>{{$stu->class}} </td>
            <td> <a class="glyphicon glyphicon-edit" href="{{route('manager_student.edit',$stu->id)}}"></a></td>
            <td>
            <form action="{{route('manager_student.destroy',$stu->id)}}" method="post">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
            <button type="submit"><span class="glyphicon glyphicon-remove"></span></button>
            </form>
        </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection