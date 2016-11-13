@extends('layouts.master')
@section('content')
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<h1>Sign Up</h1>
		@if(count($errors) > 0)
			@foreach($errors->all() as $error)
				<p class="alert alert-danger" >  {{$error}} </p>
			@endforeach
		@endif
		<form action="{{route('user.signup')}}" method="post">
			<div class="form-group">
				<label for="email">Email</label>
				<input class="form-control" id="email" name="email" type="email">
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input class="form-control" id="password" type="password" name="password" >
			</div>
			<input type="submit" value="submit" class="btn btn-primary">
			 
			{{ csrf_field() }}
		</form>
	</div>
</div>
@endsection