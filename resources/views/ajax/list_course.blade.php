<table class="table-bordered table" id="list-student">
    <tr>
        <th style="width: 5%">STT </th>
        <th style="width: 20%">Course Code</th>
        <th style="width: 20%">Subject</th>
        <th style="width: 20%">Class</th>
    </tr>
    @php
        $count = 1;
    @endphp
    @foreach($courses as $course)
        <tr>
            <td> {{$count++}}</td>
            <td><a href="{{ route('statistic_point_course',$course->id) }}">{{$course->course_code}}</a></td>
            <td>{{$course->subject->name}} </td>
            <td>{{$course->class}} </td>
        </tr>
@endforeach
</table>