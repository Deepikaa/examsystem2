<?php
session_start();
//required:  method to display the no of correct ans, wrong answers.. and a button linking to show correct answers of what the student got
$con=mysql_connect("localhost", "root", "")or die("cannot connect");
mysql_select_db("DP",$con)or die("cannot select DB");
$result=mysql_query("SELECT * FROM STUDENT_ANSWER_SHEET WHERE STUDENT_ID='$_SESSION[sid]' ",$con);

while($row = mysql_fetch_array($result))
{
	$check=mysql_query("SELECT * FROM STUDENT_RESULT WHERE STUDENT_ID='$_SESSION[sid]'",$con);
	$count=mysql_num_rows($check);
	if($count>0)
	{
	//echo 'hi';
	goto end;
	}
	$score=0;
	$qset=$row['QUESSET_NO'];
	$result1=mysql_query("SELECT * FROM QUES_PAPERS WHERE QUESSET_NO='$qset'",$con);
	
	$i=1;
		while($row1 = mysql_fetch_array($result1))
		{
			for($i=1;$i<=10;$i++)
			{
				$q=$row1['Q'.$i];
				$result2=mysql_query("SELECT * FROM QUES_BANK WHERE QUES_ID='$q'",$con);
				while($row2 = mysql_fetch_array($result2))
				{
					$anskey[$i]=$row2['ANS'];
				}
			}
		
		}
	
	for($j=1;$j<=10;$j++)
	{
		if($anskey[$j]==$row['S_ANS'.$j])
		{
			$score++;
		}
	}
	//echo 'Id :' . $row['STUDENT_ID'];echo "<br/>";
	
	//echo 'Score : ' . $score;echo "<br/>";
	
	$sql="INSERT INTO STUDENT_RESULT (STUDENT_ID, STUDENT_MARKS) VALUES ('$row[STUDENT_ID]','$score')";

	if (!mysql_query($sql,$con))
	{
	die('Error: ' . mysql_error());
	}

	end:
}



/*unset($_SESSION['username']);
echo 'Done!';
//header('Location: login.php');
*/
?>

<html>
<head>
<title>Test Complete</title>
</head>
<body bgcolor="white">
<br/><br/><br/>
<table align="center" cellspacing="0" cellpadding="0">
<tr>
<td align="center">
<h1>You have completed your test!</h1>
</td>
</tr>
<tr><td>
<br/><br/><br/>
<td></tr>
<tr><td align="center">
<h3>To check your results</h3>
</td>
<tr>
<tr>
<td align="center">
<form action="result.php">
<input type="submit" value="Click here" name="submit"><br/>
</form>
</td>
</tr>
<tr>
<td>
<br/><br/><br/>
</td>
</tr>
<tr>
<td align="center">
<h3>To check the Solution key</h3>
</td>
</tr>
<tr>
<td align="center">
<form action="sol_key.php"><input type="submit" value="Check correct answers" name="submit"><br/></form>
</td>
</tr>
</table>
</body>
</html>
