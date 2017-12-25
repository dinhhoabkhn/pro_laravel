<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">


    <!-- Styles -->
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">ADMIN</a>
        </div>
        <ul class="nav navbar-nav navbar-left">
            <li><a href="{{route('manager_student.index')}}">Student</a></li>
            <li><a href="{{route('manager_teacher.index')}}">Teacher</a></li>
            <li><a href="{{route('manager_course.index')}}">Course</a></li>
            <li><a href="{{route('manager_subject.index')}}">Subject</a></li>
            <li><a href="{{route('liststudent')}}">Statistic Point</a></li>
        </ul>
        <ul class="nav navbar-right">
            <li>
                <a href="{{route('admin.logout')}}">Log out</a>
            </li>
        </ul>
    </div>
</nav>
@yield('header')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="{{url('/js/bootstrap.min.js')}}"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="{{asset('js/main.js')}}"></script>
</body>
</html>
