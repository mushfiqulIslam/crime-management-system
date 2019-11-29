<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title>Admin Panel</title>
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
  padding-top: 80px;
  text-align: center;
  font-family: monaco, monospace;
  background:#a0d8d9;
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
<h1>Thana Information</h1><br>
<table style="width:90%">
  <tr>
    <th>Thana Name</th>
    <th>Supervisor Name</th>
    <th>Police Number</th>
  </tr>
  <tr>
    @foreach($data1 as $d)
       <td>{{ $d->thana_name }}</td>
       <td>{{ $d->supervisor_name }}</td>
       <td>{{ $d->police_number }}</td>
       </tr>
    @endforeach
</table>
<h1>Police Information</h1><br>
<table style="width:100%">
  <tr>
    <th>Name</th>
    <th>Age</th>
    <th>Designation</th>
    <th>Joining Date</th>
    <th>Thana</th>
  </tr>
  <tr>
  @foreach($police as $p)
   <td>{{ $p->name }}</td>
   <td>{{ $p->age }}</td>
   <td>{{ $p->designation }}</td>
   <td>{{ $p->joining_date }}</td>
   <td>{{ $p->thana }}</td>
   </tr>
   @endforeach
</table>
</div>
</body>
</html>
