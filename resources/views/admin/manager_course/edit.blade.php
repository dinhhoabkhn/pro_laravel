@extends('welcome')
@section('header')
<div class="container">
    <form action="{{route('manager_course.update',$course->id)}}" method="post" role="form">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        @if($errors->any())
       <ul>
       @foreach ($errors->all() as $error)
       <li>{{ $error }}</li>
       @endforeach
   </ul>
       @endif
        <div class="form-group">
            <laber>Course code</laber>
            <input type="number" placeholder="{{$course->course_code}}" class="form-control" name="course_code">
        </div>
        <div class="form-group">
            <label>Subject</label>
            <select class="form-control" name="subject_id" >
                @foreach($subjects as $sub)
                @if($course->subject_id == $sub->id)
                <option value="{{ $sub->id }}" selected="selected">{{$sub->name}}</option>
                @else
                <option value="{{ $sub->id }}">{{$sub->name}}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <laber>Class</laber>
            <select class="form-control" name="class" >
                <option>101</option>
                <option>102</option>
                <option>103</option>
                <option>104</option>
                <option>105</option>
                <option>106</option>
                <option>107</option>
                <option>108</option>
                <option>201</option>
                <option>202</option>
                <option>203</option>
                <option>204</option>
                <option>205</option>
                <option>206</option>
                <option>207</option>
                <option>208</option>
            </select>
        </div>
        <div class="form-group">
            <laber>Semester</laber>
            <input type="number" class="form-control" name="semester" value="{{$course->semester}}">
        </div>
        <div class="form-group">
            <laber>Time start</laber>
            <input type="time" class="form-control" name="timestart" value="{{$course->time_start}}">
        </div>
        <div class="form-group">
            <laber>Time finish</laber>
            <input type="time" class="form-control" name="timefinish" value="{{$course->time_finish}}">
        </div>
        <div class="form-group">
            <laber>Day of Week</laber>
            <select class="form-control" name="weekday">
                <option>Monday</option>
                <option>Tuesday</option>
                <option>Wednesday</option>
                <option>Thursday</option>
                <option>Friday</option>
                <option>Saturday</option>
                <option>Sunday</option>
            </select>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>
@endsection