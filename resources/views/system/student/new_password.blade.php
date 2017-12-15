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
            <a class="navbar-brand" href="{{route('student')}}">Manager School</a>
        </div>
    </div>
</nav>
<div class="row">
    <div class="col-md-4 col-md-offset-4" style="border: solid 1px blue">
        <form action="{{route('student.change_password',$student->id)}}" method="post">
            {{ csrf_field() }}
            <h4> Hello {{$student->name}}</h4>
            <p>Now, type your new Password</p>
            <div class="form-group">
                <label>Type new password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label>Retype password</label>
                <input type="password" name="repassword" class="form-control">
            </div>
            <input type="submit" name="" class="btn btn-primary" value="Submit">
        </form>
    </div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{url('/js/bootstrap.min.js')}}"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
