<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
</style>
</head>
<body>
<div class="bg-img">
  <div class="container">
    <div class="topnav">
      <a href="/">CRIME MANAGEMENT SYSTEM</a>
      <a href="/login/{{ $user }}">Home</a>
       <a href="/login/{{ $user }}/add_duty">Add Duty</a>
       <a href="/login/{{ $user }}/add_FIR">Add FIR</a>
       <a href="/login/{{ $user }}/FIR">FIR</a>
       <a href="/login/{{ $user }}/select_FIR">Update FIR</a>
       <a href="/login/{{ $user }}/add_accused">Add accused</a>
       <a href="/login/{{ $user }}/accused">Accused</a>
       <a href="/login/{{ $user }}/add_lawer">Add lawer</a>
       <a href="/login/{{ $user }}/add_witness">Add witness</a>
       <a href="/login/{{ $user }}/witness">Witness</a>
       <a href="/login/{{ $user }}/add_visitor">Add visitor</a>
       <a href="/login/{{ $user }}/visitors">Visitors</a>
    </div>
  </div>
</div>

</body>
