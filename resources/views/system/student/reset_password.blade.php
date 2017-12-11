@extends('layouts.layout_student')
@section('student')
<div class="container_fluid col-md-4 col-md-offset-4">
	<form action="{{route('student.postrspassword')}}" method="post">
		{{ csrf_field() }}
		@if($errors->any())
		<div class="alert alert-danger">
                {{$errors->first()}}
            </div>
        @endif
		<div class="form-group">
			<div class="row">
				<label for="">Old Password</label>
				<input type="password" class="form-control" name="oldpassword">
			</div>
		</div>
		<div class="form-group">
			<div class="row">
				<label for="">Type new Password</label>
				<input type="password" class="form-control" name="newpassword">
			</div>
		</div>
		<div class="form-group">
			<div class="row">
				<label for="">Retype new Password</label>
				<input type="password" class="form-control" name="renewpassword">
			</div>
		</div>
		<input type="submit" class="btn-primary">
	</form>
</div>
@endsection