@extends('master')

@section('content')

<div class="row">

	<div class="col-md-4"></div>
	<div class="col-md-4">
      <form class="form-signin" action="login" method="POST">
	  	<input type="hidden" name="_token" value="{{csrf_token()}}">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <br/>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
	</div>
	<div class="col-md-4"></div>
	
	

</div>
@endsection