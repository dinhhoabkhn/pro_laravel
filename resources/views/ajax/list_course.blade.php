<table class="table-bordered table" id="list-student">
    <tr>
        <th class="stt">STT </th>
        <th >Course Code</th>
        <th >Subject</th>
        <th >Class</th>
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