@extends('welcome')
@section('header')
<div class="container" style="margin-top: 50px;">
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
    <div class="row">
        <a href="{{route('manager_student.create')}}" class="btn btn-primary btn-lg active btn-add">New Student</a>
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
        @foreach($student as $stu)
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
</div>
@endsection