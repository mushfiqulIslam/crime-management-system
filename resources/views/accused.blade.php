<!DOCTYPE html>
<html>
<head>
  <title>Accused Information</title>
<style>
table, th, td{
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 20px;
  text-align: center;
}




  body {
  text-align: center;
  font-family: monaco, monospace;
  background:#A4B0BD;
  background-size: cover;
}
h1, h2 {
  display: inline-block;
  background: ;
}
h1 {
  font-size:60px;
  font-family: "Times New Roman", Times, serif;

  background:;
}
h2 {
  font-size:
}
span {
  background: #fd0;
}

</style>
@include('userbar', ['user' => $user])
<h1>Accused Information</h1>
<div align="center">

<table style="width:90%">
  <tr>
    <th>Name</th>
    <th>Address</th>
    <th>FIR</th>
    <th>Lawer Name</th>
  </tr>
  @foreach($result as $d)
  <tr>
    <td>{{ $d->name }}</td>
    <td>{{ $d->address }}</td>
    <td>{{ $d->fir_id }}</td>
    <td>{{ $d->lawer_name }}</td>
  </tr>
  @endforeach
</table>
</div>
</body>
</html>
