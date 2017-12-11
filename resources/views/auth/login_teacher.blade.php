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

<body>
    <div class="container">
        <div class="login col-md-4 col-md-offset-4">
            <form action="" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    @if($errors->has('email'))
                        <div class="alert alert-danger">
                            <strong> {{ $errors->first('email') }}</strong>
                        </div>
                    @endif
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control" placeholder="email">
                </div>
                <div class="form-group">
                    @if($errors->has('password'))
                        <div class="alert alert-danger">
                            <strong> {{ $errors->first('password') }}</strong>
                        </div>
                    @endif
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="password">
                </div>
                <a href="{{route('student.forgotpasswordstudent')}}">Forgot password ?</a><br>
                <input type="submit" value="Login" class="btn btn-primary">
            </form>
        </div>
    </div>
</body>

</html>