<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hello</title>
    <link rel="stylesheet" href="{{url('/css/bootstrap.min.css')}}">
</head>

<body>
	<h3> Hello </h3>
	<form action="{{route('teacher.verify',$teacher->email_token)}}" method="PUT">
		{{ method_field('PUT') }}
		{{ csrf_field() }}
	<p> Xac nhan tai khoan </p>
	<!-- <input type="password" value="sadad" name=""> -->
	<button type="submit">Tai day</button>
</form>
</body>
</html>