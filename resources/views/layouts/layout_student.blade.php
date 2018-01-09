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
    <link rel="stylesheet" type="text/css" href="{{url('/css/main.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Styles -->
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{route('student')}}">Manager School</a>
        </div>
        <ul class="nav navbar-nav navbar-left">
            <li><a href="{{route('student')}}">My course</a></li>
            <li><a href="{{route('student.list_course')}}">Register Course</a></li>
            <li><a href="{{route('student.my_point')}}">My Point</a></li>
            <li><a href="{{route('student.information')}}">My Information</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li>
                @yield('avatar')
            </li>
            <li>
                <a href="{{route('student.logout')}}">Log out</a>
            </li>
        </ul>
    </div>
</nav>
@yield('student')
<script type="text/javascript" src="{{url('/js/bootstrap.min.js')}}"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="{{asset('js/main.js')}}"></script>
@yield('script')
</body>
</html>
