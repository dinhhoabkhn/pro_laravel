<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{url('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('/css/main.css')}}">
</head>

<body style="background-color: #377b7b">
    <div class="container">
        <div class="col-md-4 col-md-offset-4" id="login">
            <div class="panel panel-default">
                <div class="panel-heading"> Login</div>
                <div class="panel panel-body">
                    <form action="" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="name/email">
                            @if($errors->has('name'))
                            <div class="alert alert-danger">
                                <strong> {{ $errors->first('name') }}</strong>
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="password">
                            @if($errors->has('password'))
                            <div class="alert alert-danger">
                                <strong> {{ $errors->first('password') }}</strong>
                            </div>
                            @endif
                        </div>
                        <input type="submit" value="Login" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>