<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Teacher</title>
    <link rel="stylesheet" href="{{url('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('/css/main.css')}}">

</head>

<body style="background-color: #377b7b">
<div class="container">
    <div class="col-md-4 col-md-offset-4" id="login">
        <div class="panel panel-default">
            <div class="panel-heading"> Login</div>
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        {{$error}}
                        <br>
                    @endforeach
                </div>
            @endif
            <div class="panel panel-body">
                <form action="" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="email">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="password">
                    </div>
                    <a href="{{route('student.forgot_password_student')}}">Forgot password ?</a><br>
                    <input type="submit" value="Login" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/main.js')}}"></script>

</body>

</html>