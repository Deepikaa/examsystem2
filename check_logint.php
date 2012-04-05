<?php
SESSION_start();
$con=mysql_connect("localhost", "root", "")or die("cannot connect");
mysql_select_db("DP",$con)or die("cannot select DB");

// username and password sent from form
$sid=$_POST['myid'];
$mypassword=$_POST['mypassword'];

$sid = stripslashes($sid);
$mypassword = stripslashes($mypassword);
$sid = mysql_real_escape_string($sid);
$mypassword = mysql_real_escape_string($mypassword);

$result=mysql_query("SELECT * FROM STUDENT_LOGIN WHERE STUDENT_ID='$sid' and STUDENT_PASSWORD='$mypassword'",$con);


//$row=mysqli_fetch_assoc($result);
$count=mysql_num_rows($result);
if($count==1)
{
	// Register $myid, $mypassword and redirect to file "login_success.php"
	
	$sql = "SELECT COUNT(*) FROM student_answer_sheet WHERE STUDENT_ID='$sid'";
	$check_id=mysql_query($sql);
	$num=@mysql_fetch_row($check_id);
	$return= $num[0];

		if($return >= "1")
		{ 
		header('location:finish.php');
		} 
		else
		{
		$_SESSION['sid']=$sid;
			while($row = mysql_fetch_array($result))
			{
			$_SESSION['STUDENT_NAME']= $row['STUDENT_NAME'];
			$_SESSION['QUESSET_NO']=$row['QUESSET_NO'];
			}

		//echo $_SESSION['sid'];
		header('location:starttest.php');
		}
}

else {
header('location:login_student2.html');
}

mysql_close($con);
?>