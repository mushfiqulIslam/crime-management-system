<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <meta charset="utf-8">
    <title>Visitor Form</title>
  </head>
  @include('userbar', ['user' => $user])
  <link rel="stylesheet" href="/css/app.css">
  <body>
    <div class="login-container">
    	<form method="Post" action="/login/{{ $user }}/add_visitor" class="form-login">
        {{ csrf_field() }}

    		<label for="login-input-user" class="login__label">
    			Name
    		</label>
    		<input name="name" class="login__input" type="text" required/>
        <label for="login-input-user" class="login__label">
    			Address
    		</label>
    		<input name="address" class="login__input" type="text" required/>
        <label for="login-input-user" class="login__label">
    			Phone
    		</label>
    		<input name="phone_no" class="login__input" type="text" required/>
        <label for="login-input-user" class="login__label">
    			Accused
    		</label>
        <select name="a_id" >
          @foreach($result as $f)
            <option value="{{ $f->id }}">{{ $f->name }}</option>
          @endforeach
        </select>
        <label for="login-input-user" class="login__label">
    			Relation
    		</label>
    		<input name="relation" class="login__input" type="text" required/>
    		<button class="login__submit">Submit</button>
    	</form>
    </div>
  </body>
</html>
