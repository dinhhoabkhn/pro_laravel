<table class="table-bordered table" id="table-list-student">
    <tr>
        <th style="width: 5%">STT</th>
        <th style="width: 20%">Name</th>
        <th style="width: 20%">Student_code</th>
        <th style="width: 20%">Class</th>
    </tr>
    @php
        $count = 1;
    @endphp
    @foreach($students as $stu)
        <tr>
            <td> {{$count++}}</td>

            <td><a href="{{route('statistic_point',$stu->id)}}">{{$stu->name}}</a></td>

            <td>{{$stu->student_code}} </td>
            <td>{{$stu->class}} </td>
        </tr>
    @endforeach
</table>