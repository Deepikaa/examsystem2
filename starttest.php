<?php
SESSION_start(); 

if (!isset($_SESSION['sid'])) {
header('Location: login2.html');
}
$con=mysql_connect("localhost", "root", "")or die("cannot connect");
mysql_select_db("DP",$con)or die("cannot select DB");
//required: admin needs to pass the values of time and negatime marking.. from some place on his webpage. if not possible remove code pertaining to neg & mrk 
?>


<html>
<head>
<title> Login Successful </title>
<script type="text/javascript">
function neg_marking()
{
if (neg)
{
var mrk;
document.write("The paper carries negative marking. So please attempt your questions wisely.\n");
document.write("Each wrong answer will be awarded a penalty of "+ neg +" marks.\n")
document.write("There will be no penalty for unattempted questions.\n")
}
else
document.write("\nThere will be no negative marking.\n")
}
</script>
</head>

<body bgcolor="white">
<table align="center">
<tr>
<td align="center" colspan="2">
<h1> Login Successful</h1>
</td>
</tr>
<tr>
<td align="center" colspan="2">
<?php
echo ucfirst($_SESSION['STUDENT_NAME']);echo ",</br>";
echo 'Your question set is ' . $_SESSION['QUESSET_NO'];echo "<br/>";
?>
</td>
</tr>
<tr>
<td align="center" colspan="2"><br/><br/><br/>
You can now start answering your paper.<br/>
<script type="text/javascript">
var mins;
var neg;

document.write("You have "+ mins +" mins to finish your paper.\n\n");
neg_marking();
</script>
</td>
</tr>
<tr>
<td colspan="2"> <br/><br/></td>
</tr>
<tr>
<td>
<img src="thumsup.jpg" align="center"/>
</td>
<td>
<img src="goodluck.jpg" align="center"/>
</td>
</tr>
<tr>
<td colspan="2" align="center"><br/>
	<form action="login_success.php">
	<input type="submit" name="submit" value="Start Test"><br/><br/>
	</form>
</td>
</tr>
</table>
</body>
</html>



