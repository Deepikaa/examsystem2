<?php

session_start(); // start session cookies
require("Login.class.php"); // pull in file
$login = new Login; // create object login

$login->authorize(); // make user login

?>


<html>
<head>
<title>Logged In</title>

</head>
<body bgcolor="white">
<table align="center" cellspacing="0" cellpadding="0">
<tr><td> <br/><br/></td></tr>
<tr><td align="center"> <img src="success.jpg"></td></tr>
<tr><td> <br/><br/></td></tr>
<tr><td align="center"><h1>Login Successful!</h1></td></tr>
<tr><td> <br/><br/></td></tr>
<tr><td align="center"><h3> You may proceed</h3></td></tr>
<tr><td> <br/><br/></td></tr>
<tr><td align="center"><form action="a_frame.html"><input type="submit" value="Go Home"></td></tr>
<tr><td> <br/><br/></td></tr>
</body>
</html>
