@extends('layouts.layout_teacher')
@section('teacher')
	<div class="container_fluid">
		@if(session()->has('success'))
			<div class="alert alert-success">
				{{session()->get('success')}}
			</div>
		@endif
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<table class="table table-bordered">
					<tr>
						<th>Name</th>
						<td>{{$teacher->name}}</td>
					</tr>
					<tr>
						<th>Email</th>
						<td>{{$teacher->email}}</td>
					</tr>
					<tr>
						<th>Address</th>
						<td>{{$teacher->address}}</td>
					</tr>
					<tr>
						<th>Level</th>
						<td>{{$teacher->level}}</td>
					</tr>
					<tr>
						<th>Birthday</th>
						<td>{{$teacher->birthday}}</td>
					</tr>
					<tr>
						<th>Academy</th>
						<td>{{$teacher->academy}}</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	<div class="row" style="margin-top: 30px">
		<a href="{{route('teacher.get_rs_password')}}" class="reset-password">Reset Pasword</button></a>
	</div>
	</div>
@endsection