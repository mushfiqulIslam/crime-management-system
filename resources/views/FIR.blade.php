<!DOCTYPE html>
<html>
<head>
  <title>First information report</title>
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
<div align="center">
<h1>First information report</h1>
<table style="width:90%">
  <tr>
    <th>Id</th>
    <th>Status</th>
    <th>Type</th>
    <th>Created At</th>
    <th>Postmortem</th>
  </tr>
  @foreach($fir as $d)
  <tr>
    <td>{{ $d->id }}</td>
    <td>{{ $d->status}}</td>
    <td>{{ $d->type }}</td>
    <td>{{ $d->created_at }}</td>
    <td>{{ $d->postmortem_report }}</td>
  </tr>
  @endforeach
</table>
</div>
</body>
</html>
