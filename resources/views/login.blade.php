@extends('master')
@section('content')
<h1 class="text-center my-4">Login page</h1>
<div class="container">
	<div class="row justify-content-center my-4">
		<div class="col-6">
			<form style="margin-top: 50px" action="/login" method="post">
				@csrf
			  <div class="form-group">
			    <label for="exampleInputEmail1">Email address</label>
			    <input type="email" name="email" class="form-control rounded-pill" id="exampleInputEmail1" aria-describedby="emailHelp">
			    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" name="password" class="form-control rounded-pill" id="exampleInputPassword1">
			  </div>
			  <button type="submit" class="btn btn-primary">Login</button>
			</form>
		</div>
	</div>
</div>
@endsection