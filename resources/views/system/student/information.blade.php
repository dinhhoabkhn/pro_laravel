@extends('layouts.layout_student')
@section('student')
<div class="container_fluid">
	@if(session()->has('success'))
	<div class="alert alert-success">
		{{session()->get('success')}}
	</div>
	@endif
	<div class="row">
		<div class="col-md-2 col-md-offset-1 field-information">
			<h4><strong> Name: </strong></h4>
		</div>
		<div class="col-md-9 value_information">
			<h4> {{$student ->name}}</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2 col-md-offset-1 field-information">
			<h4><strong> Email: </strong></h4>
		</div>
		<div class="col-md-9 value_information">
			<h4> {{$student ->email}}</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2 col-md-offset-1 field-information">
			<h4><strong> Student Code: </strong></h4>
		</div>
		<div class="col-md-9 value_information">
			<h4> {{$student ->student_code}}</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2 col-md-offset-1 field-information">
			<h4><strong> Class: </strong></h4>
		</div>
		<div class="col-md-9 value_information">
			<h4> {{$student ->class}}</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2 col-md-offset-1 field-information">
			<h4><strong> Address: </strong></h4>
		</div>
		<div class="col-md-9 value_information">
			<h4> {{$student ->address}}</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2 col-md-offset-1 field-information">
			<h4><strong> Birthday: </strong></h4>
		</div>
		<div class="col-md-9 value_information">
			<h4> {{$student ->birthday}}</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2 col-md-offset-1 field-information">
			<h4><strong> Academy: </strong></h4>
		</div>
		<div class="col-md-9 value_information">
			<h4> {{$student ->academy}}</h4>
		</div>
		
	</div>
	<div class="row">
		<div class="col-md-2 col-md-offset-1 field-information">
			<h4><strong> Avatar: </strong></h4>
		</div>
		<img src="{{ asset($student->avatar)}}" alt="AVATAR" style="width: 100px">
	</div>

	<div class="row" >
		<div class="col-md-2 col-md-offset-1">
			<div class="row">
				<form action="{{route('student.change-avatar')}}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					<input type="file" name="avatar" class="form-control" placeholder="upload a picture for your avatar">
					<input type="submit" name="" class="btn btn-primary">
				</form>
			</div>
		</div>
	</div>
	<div class="row" style="margin-top: 30px">
		<a href="{{route('student.get_rs_password')}}" class="reset-password">Reset Pasword</button></a> 
	</div>
</div>
@endsection