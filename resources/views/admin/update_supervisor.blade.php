<!DOCTYPE html>
<html lang="en" dir="ltr">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
  <head>
    <meta charset="utf-8">
    <title>Admin Panel</title>
  </head>
  <link rel="stylesheet" href="/css/app.css">
  <body>
@include('admin.adminbar', ['user' => $user])
    <div class="login-container">
    	<form method="Post" action="/admin/{{ $user }}/remove_supervisor" class="form-login">
        {{ csrf_field() }}
        @if(Session::has('msg'))
        <div class="alert alert-danger">
        <strong>{{Session::get('msg')}}</strong>
        </div>
        @endif
        <label for="login-input-user" class="login__label">
          Thana Name
        </label>
        <select name="thana_id" >
          @foreach($thana as $t)
            <option value="{{ $t->id }}">{{ $t->name }}</option>
          @endforeach
        </select>
        <label for="login-input-user" class="login__label">
          Thana Name
        </label>
        <select name="police_id" >
          @foreach($police as $t)
            <option value="{{ $t->id }}">{{ $t->name }}</option>
          @endforeach
        </select>
    		<button class="login__submit" >Submit</button>
    	</form>
    </div>
  </body>
</html>
