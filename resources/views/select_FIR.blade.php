<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <meta charset="utf-8">
    <title>FIR select</title>
  </head>
  @include('userbar', ['user' => $user])
  <link rel="stylesheet" href="/css/app.css">
  <body>
    <div class="login-container">
    	<form method="Post" action="/login/{{ $user }}/select_FIR" class="form-login">
        {{ csrf_field() }}
        <label for="login-input-user" class="login__label">
    			FIR
    		</label>
        <select name="id" >
          @foreach($fir as $f)
            <option value="{{ $f->id }}">{{ $f->id }}</option>
          @endforeach
        </select>

    		<button class="login__submit">Submit</button>
    	</form>
    </div>
  </body>
</html>
