<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<title>Admin Panel</title>
<style>
.bg-img {
  min-height: 75px;
 background-position: top;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}


.container {
  position: absolute;
  top: 0px;
  margin: 0px;
  width: 100%;
}


.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}
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
  background:#a0d8d9;
  background-size: cover;
}
h1, h2 {
  display: inline-block;
}
h1 {
  font-size:60px;
  font-family: "Times New Roman", Times, serif;

}
span {
  background: #fd0;
}

</style>
@include('admin.adminbar', ['user' => $user->id])
<div align="center">
<h1>Thana Information</h1><br>
<table style="width:90%">
  <tr>
    <th>Thana Name</th>
    <th>Address</th>
    <th>Supervisor Name</th>
    <th>Police Number</th>
  </tr>
  <tr>
    @foreach($data1 as $d)
       <td>{{ $d->thana_name }}</td>
       <td>{{ $d->address }}</td>
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
