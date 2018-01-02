<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hello</title>
    <style>
        .btn{
            background-color: blue;
            width: 100px;
            height: 50px;
            border: none;
            color: white;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            border-radius: 20px;
        }
        h3{
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>
<h3> Hello </h3>
<form action="{{route('teacher.verify',$teacher->email_token)}}" method="post">
    {{ csrf_field() }}
    <p> Authenticate </p>
    <button type="submit">Here</button>
</form>
</body>
</html>