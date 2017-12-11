<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{url('/css/bootstrap.min.css')}}">
</head>

<body>
    <div class="container">
        <div class="login">
            <form action="" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="name/email">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="password">
                </div>
                <input type="submit" name="">
            </form>
        </div>
    </div>
</body>

</html>