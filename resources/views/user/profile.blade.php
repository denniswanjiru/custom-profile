@extends('layouts.app')

@section('content')
	<div class="container">
		@if(Session::has('success'))	
			<div class="alert alert-success">			
				<strong>Success: </strong>{{ session('success') }}
			</div>
		@endif
		
		<div class="row">
			<div class="col-md-2" style="border-right: solid; border-right-color: #3097d1;">
				<img src="{{ asset('images/avatars/'.Auth::user()->avatar) }}" class="img-responsive img-circle ">
				<legend>{{ Auth::user()->name }}</legend>
			</div>

			<div class="col-md-5">
				<form action="{{ route('user.profile') }}" method="POST" role="form" enctype="multipart/form-data">
					{{ csrf_field() }}
					<legend>Update Avatar</legend>
				
					<div class="form-group">
						<input type="file" name="avatar">
					</div>			
				
					<button type="submit" class="btn btn-primary">Upload</button>
				</form>
			</div>
		</div>
		
	</div>
@stop