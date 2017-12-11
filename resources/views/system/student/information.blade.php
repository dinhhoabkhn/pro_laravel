@extends('layouts.layout_student')
@section('student')
<div class="container_fluid">
	<div class="row">
		<div class="col-md-2 col-md-offset-1 field_information">
			<h4><strong> Name: </strong></h4>
		</div>
		<div class="col-md-9 value_information">
			<h4> {{$student ->name}}</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2 col-md-offset-1 field_information">
			<h4><strong> Email: </strong></h4>
		</div>
		<div class="col-md-9 value_information">
			<h4> {{$student ->email}}</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2 col-md-offset-1 field_information">
			<h4><strong> Student Code: </strong></h4>
		</div>
		<div class="col-md-9 value_information">
			<h4> {{$student ->student_code}}</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2 col-md-offset-1 field_information">
			<h4><strong> Class: </strong></h4>
		</div>
		<div class="col-md-9 value_information">
			<h4> {{$student ->class}}</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2 col-md-offset-1 field_information">
			<h4><strong> Address: </strong></h4>
		</div>
		<div class="col-md-9 value_information">
			<h4> {{$student ->address}}</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2 col-md-offset-1 field_information">
			<h4><strong> Birthday: </strong></h4>
		</div>
		<div class="col-md-9 value_information">
			<h4> {{$student ->birthday}}</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2 col-md-offset-1 field_information">
			<h4><strong> Academy: </strong></h4>
		</div>
		<div class="col-md-9 value_information">
			<h4> {{$student ->academy}}</h4>
		</div>
	</div>
	<div class="row">
		<a href="{{route('student.getrspassword')}}" class="resetpassword">Reset Pasword</button></a> 
	</div>
</div>
@endsection