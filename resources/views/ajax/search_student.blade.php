<table class="table-bordered table">
    <tr>
        <th style="width: 20%">Name </th>
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
            <td> <a class="glyphicon glyphicon-edit" title="edit" href="{{route('manager_student.edit',$stu->id)}}"></a></td>
            <td>
                <form action="{{route('manager_student.destroy',$stu->id)}}" method="post">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" title="DELETE" class="delete"><span class="glyphicon glyphicon-remove"></span></button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
{{--{{ $students->links() }}--}}