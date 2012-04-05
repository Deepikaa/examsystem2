<?php
$name=$_POST['fname'];
$id=$_POST['idno'];

$con=mysql_connect("localhost", "root", "")or die("cannot connect");
mysql_select_db("DP",$con)or die("cannot select DB");

$sql = "SELECT COUNT(*) FROM student_login WHERE STUDENT_ID='$id'";
$check_id=mysql_query($sql);
$num=@mysql_fetch_row($check_id);
$return= $num[0];



if($return >= "1")
{ 
header('location:registration2.html');
} 
else
{
/*echo 'Name: '; echo $name;echo "<br/>";
echo 'ID No.: '; echo $id;echo "<br/><br/>";
echo 'Please note down your password ';echo "<br/>";*/
$length=6;


list($usec, $sec) = explode(' ', microtime());
   srand((float) $sec + ((float) $usec * 100000));

  
   $validchars = "0123456789abcdfghjkmnpqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
   $password  = "";
   $counter   = 0;

   while ($counter < $length) {
     $actChar = substr($validchars, rand(0, strlen($validchars)-1), 1);

     // All character must be different
     if (!strstr($password, $actChar)) {
        $password .= $actChar;
        $counter++;
     }
   }
   
//echo 'Password: '.$password;echo "<br/>";
$result=mysql_query("SELECT * FROM QUES_PAPERS",$con);
$max=mysql_num_rows($result);
$setno=rand(1,$max);
//echo'setno : '.$setno;echo "<br/>";

$sql="INSERT INTO STUDENT_LOGIN (STUDENT_ID,STUDENT_PASSWORD,STUDENT_NAME,QUESSET_NO) VALUES ('$id','$password','$name','$setno')";

if (!mysql_query($sql,$con))
{
die('Error: ' . mysql_error());

}
}

?>
<html>
<head>
<title>Registration Done</title>
</head>
<body bgcolor="white">
<table align="center">
<tr>
<td align="center">
<h1>Please note down your password</h1></br></td>
</tr>
<tr>
<td align="center">
<?php
echo 'Name: '; echo $name;echo "<br/>";
echo 'ID No.: '; echo $id;echo "<br/>";
echo 'Password: ';echo $password;echo"<br/><br/><br/>";
?>
</td>
</tr>
<tr>
<td align="center">
<form action="finishreg.html">
<input type="Submit" value="Done">
</form>
</td>
</tr>
</table>
</body>
</html>