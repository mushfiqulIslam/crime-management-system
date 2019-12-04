<!DOCTYPE html>
<html lang="en" dir="ltr">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
  <head>
    <meta charset="utf-8">
    <title>Crime Management System</title>
  </head>
  <link rel="stylesheet" href="/css/app.css">
  @include('topbar')
  <body>

    <div class="login-container">
    	<form method="Post" action="/admin" class="form-login">
        {{ csrf_field() }}
    		<ul class="login-nav">
    			<li class="login-nav__item active">
    				<a href="{{ url('admin') }}">Admin Sign In</a>
    			</li>
    		</ul>
        @if(Session::has('msg'))
        <div class="alert alert-danger">
        <strong>{{Session::get('msg')}}</strong>
        </div>
        @endif
    		<label for="login-input-user" class="login__label">
    			Username
    		</label>

    		<input name="username" class="login__input" type="text" />
    		<label for="login-input-password" class="login__label">
    			Password
    		</label>
    		<input name="password" class="login__input" type="password" />
    		<button class="login__submit" >Sign in</button>
    	</form>
    </div>
  </body>
</html>
