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
    	<form method="Post" action="/login/{{ $user }}/add_accused" class="form-login">
        {{ csrf_field() }}

    		<label for="login-input-user" class="login__label">
    			Name
    		</label>
    		<input name="name" class="login__input" type="text" />
        <label for="login-input-user" class="login__label">
    			FIR
    		</label>
        <select name="fir_id" >
          @foreach($result as $f)
            <option value="{{ $f->id }}">{{ $f->id }}</option>
         @endforeach
        </select>
        <label for="login-input-user" class="login__label">
    			Address
    		</label>
    		<input name="address" class="login__input" type="text" />
        <label for="login-input-user" class="login__label">
    			status
    		</label>
        <select name="status" >
        <option value="Free">Free</option>
        <option value="Arrested">Arrested</option>
        </select>
        <label for="login-input-user" class="login__label">
    			Lawer
    		</label>
        <select name="lawer_id" >
          @foreach($lawer as $f)
            <option value="{{ $f->id }}">{{ $f->name }}</option>
         @endforeach
        </select>
    		<button class="login__submit">Submit</button>
    	</form>
    </div>
  </body>
</html>
