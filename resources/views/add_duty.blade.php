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
    	<form method="Post" action="/login/{{ $user }}/add_duty" class="form-login">
        {{ csrf_field() }}

    		<label for="login-input-user" class="login__label">
    			Police Name
    		</label>
        <select name="police_id" >
          @foreach($police as $p)
            <option value="{{ $p->id }}">{{ $p->name }}</option>
         @endforeach
        </select>
        <label for="login-input-user" class="login__label">
    			Start
    		</label>

        <input type="datetime" name="start" value="2019-11-29 14:45:00" class="login__input"  />

        <label for="login-input-user" class="login__label">
    			Finish
    		</label>
    		<input name="finish" value="2019-11-29 14:45:00" class="login__input" type="text" />
    		<button class="login__submit">Submit</button>
    	</form>
    </div>
  </body>
</html>
