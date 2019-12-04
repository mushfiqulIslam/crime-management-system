
<!DOCTYPE html>
<html>
<head>
  <title>Witness</title>
  @include('userbar', ['user' => $user])
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

<div align="center">
<h1>Witness</h1>
<table style="width:90%">
  <tr>
    <th>Name</th>
    <th>Statement</th>
    <th>FIR</th>
  </tr>
  @foreach($result as $d)
  <tr>
    <td>{{ $d->name }}</td>
    <td>{{ $d->statement }}</td>
    <td>{{ $d->fir_id }}</td>
  </tr>
  @endforeach
</table>
</div>
</body>
</html>
