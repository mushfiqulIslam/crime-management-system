<!DOCTYPE html>
<html>
<head>
  <title>User Dashboard</title>
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
<h1>Duty</h1><br>
<table style="width:90%">
  <tr>
    <th>ID</th>
    <th>Start Date time</th>
    <th>Finishing Date Time</th>
  </tr>
  @foreach($duty as $d)
  <tr>
    @foreach($police as $p)
      @if($d->police_id == $p->id)
        <td>{{ $p->name }}</td>
      @endif
    @endforeach

    <td>{{ $d->start }}</td>
    <td>{{ $d->finish }}</td>
  </tr>
  @endforeach
</table>
</div>
</body>
</html>
