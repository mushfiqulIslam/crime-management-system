<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add Police</title>
  </head>
  <style>
  h2 .red-text {
    color: blue;
  }
  </style>
    <link rel="stylesheet" href="/css/app.css">
    <div class="login-container">
<h2>Police Form</h2>
<form method="Post" action="/admin/{{ $user }}/add_police" class="form-login">
  {{ csrf_field() }}
  <label for="login-input-user" class="login__label">
    Police Name
  </label>

  <input name="police_name" class="login__input" type="text" />
  <label for="login-input-password" class="login__label">
    Birth Date
  </label>
  <input type="date" name="birth_date" class="login__input"  />
  <label for="login-input-user" class="login__label">
    Deignation
  </label>

<select name="deignation" >
 <option value="Supervisor">Supervisor</option>
 <option value="Officer">Officer</option>
 <option value="Constable">Constable</option>
</select>
<label for="login-input-password" class="login__label">
  Joining Date
</label>
<input type="date" name="joining_date" class="login__input"  />
<label for="login-input-user" class="login__label">
  Thana Name
</label>
<select name="thana_id" >
  @foreach($thana as $t)
    <option value="{{ $t->id }}">{{ $t->name }}</option>
 @endforeach
</select>
  <button class="login__submit" >Submit</button>
</form>
</div>
</html>
