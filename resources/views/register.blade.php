@extends('master')
@section('content')
<h1 class="text-center my-4">Create an account</h1>
<div class="container">
	<div class="row justify-content-center my-4">
		<div class="col-6">
			<form style="margin-top: 50px" action="/register" method="post">
				@csrf
				<div class="form-group">
				  <label for="exampleInputName">Username</label>
				  <input type="text" name="username" class="form-control rounded-pill" id="exampleInputEmail1" placeholder="create a username" aria-describedby="emailHelp">
				</div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Email address</label>
			    <input type="text" name="email" class="form-control rounded-pill" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="enter your email address">
			    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" name="password" class="form-control rounded-pill" id="exampleInputPassword1" placeholder="create a password">
			  </div>
			  <button type="submit" class="btn btn-primary">Register</button>
			</form>
		</div>
	</div>
</div>
@endsection