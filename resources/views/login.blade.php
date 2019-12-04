<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <meta charset="utf-8">
    <title></title>
  </head>
  <link rel="stylesheet" href="/css/app.css">
  <body>
    @include('topbar')
    <div class="login-container">
    	<form method="Post" action="/login" class="form-login">
        {{ csrf_field() }}
    		<ul class="login-nav">
    			<li class="login-nav__item active">
    				<a href="{{ url('login') }}">Sign In</a>
    			</li>
    		</ul>
        @if(Session::has('msg'))
        <div class="alert alert-danger">
        <strong>{{Session::get('msg')}}</strong>
        </div>
        @endif
    		<label for="login-input-user" class="login__label">
    			Email
    		</label>
    		<input name="email" class="login__input" type="text" />
    		<label for="login-input-password" class="login__label">
    			Password
    		</label>
    		<input name="password" class="login__input" type="password" />
    		<label for="login-sign-up" class="login__label--checkbox">
    		<button class="login__submit">Sign in</button>
    	</form>
    </div>
  </body>
</html>
