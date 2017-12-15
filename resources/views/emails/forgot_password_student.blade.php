<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hello</title>
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
</head>

<body>
	<h3> Hello </h3>
	<form action="{{route('student.new_password',$student->email_token)}}" method="post">
		{{ csrf_field() }}
	<p> Change the your pasword  </p>
	<!-- <input type="password" value="sadad" name=""> -->
	<button type="submit">Here</button>
</form>
</body>
</html>