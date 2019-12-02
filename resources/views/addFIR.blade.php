<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <meta charset="utf-8">
    <title></title>
  </head>
  <link rel="stylesheet" href="/css/app.css">
  <body>
    <div class="login-container">
      {{ $user }}
    	<form method="Post" action="/login/{{ $user }}/add_FIR" class="form-login">
        {{ csrf_field() }}

    		<label for="login-input-user" class="login__label">
    			Decription
    		</label>
    		<input name="status" class="login__input" type="text" />
        <label for="login-input-user" class="login__label">
    			Type
    		</label>
        <select name="type" >
         <option value="General">General</option>
         <option value="Special">Special</option>

        </select>
        <label for="login-input-user" class="login__label">
    			Postmortem Report
    		</label>
    		<input name="postmortem_report" value="Not Applicable" class="login__input" type="text" />
    		<button class="login__submit">Submit</button>
    	</form>
    </div>
  </body>
</html>
