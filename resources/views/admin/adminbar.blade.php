<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

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
</style>
</head>
<body>
<div class="bg-img">
  <div class="container">
    <div class="topnav">
      <a href="/">CRIME MANAGEMENT SYSTEM</a>
      <a href="/admin/{{ $user }}">Home</a>
       <a href="/admin/{{ $user }}/add_police">Add police</a>
       <a href="/admin/{{ $user }}/add_thana">Add thana</a>
       <a href="/admin/{{ $user }}/add_supervisor">Add supervisor</a>
       <a href="/admin/{{ $user }}/remove_supervisor">Remove supervisor</a>
    </div>
  </div>
</div>

</body>
