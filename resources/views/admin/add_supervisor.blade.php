<!DOCTYPE html>
<html lang="en" dir="ltr">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
  <head>
    <meta charset="utf-8">
    <title>Admin Panel</title>
  </head>
  <link rel="stylesheet" href="/css/app.css">
  <body>

    <div class="login-container">
    	<form method="Post" action="/admin/{{ $user }}/add_supervisor" class="form-login">
        {{ csrf_field() }}
    		<label for="login-input-user" class="login__label">
    			Police Name
    		</label>

    		<input name="police_name" class="login__input" type="text" />
        <label for="login-input-user" class="login__label">
          Thana Name
        </label>
        <select name="thana_id" >
          @foreach($thana as $t)
            <option value="{{ $t->id }}">{{ $t->name }}</option>
         @endforeach
        </select>
        <label for="login-input-user" class="login__label">
    			Email
    		</label>

    		<input name="email" class="login__input" type="text" />
    		<label for="login-input-password" class="login__label">
    			Password
    		</label>
    		<input name="password" class="login__input" type="password" />
    		<button class="login__submit" >Submit</button>
    	</form>
    </div>
  </body>
</html>
