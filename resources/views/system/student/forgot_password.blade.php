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
            <a class="navbar-brand" href="student">Manager School</a>
        </div>
    </div>
</nav>
<div class="row">
    <div class="col-md-4 col-md-offset-4" style="border: solid 1px black">
        <form action="{{route('student.send_forgot_password_student')}}" method="post">
            {{ csrf_field() }}
            <h5>please type your email</h5>
            <input type="email" name="email" class="form-control">
            <input type="submit" name="" class="btn btn-primary">
        </form>
    </div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{url('/js/bootstrap.min.js')}}"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
