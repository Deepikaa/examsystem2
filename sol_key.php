<?php
session_start();
//required:  method to display the no of correct ans, wrong answers.. and a button linking to show correct answers of what the student got
$con=mysql_connect("localhost", "root", "")or die("cannot connect");
mysql_select_db("DP",$con)or die("cannot select DB");
$result=mysql_query("SELECT * FROM STUDENT_ANSWER_SHEET WHERE STUDENT_ID='$_SESSION[sid]' ",$con);

while($row = mysql_fetch_array($result))
{
	$check=mysql_query("SELECT * FROM STUDENT_RESULT WHERE STUDENT_ID='$_SESSION[sid]'",$con);
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
		echo $row['S_ANS1'];
	//echo 'Id :' . $row['STUDENT_ID'];echo "<br/>";
		




/*unset($_SESSION['username']);
echo 'Done!';
//header('Location: login.php');
*/
?>
<html>
<head>
<title>Answers</title>
</head>
<body bgcolor="white">
<table align="center" cellspacing="0" cellpadding="0">
<tr>
		<td style="padding-top:38px">
			<img src="logbitso.jpg" align="center"/>
		</td>
		<td>
			<img src="bitslogo.jpg" align="center" />
		</td>
	<tr>
		<td colspan="2"></br><br/>
		</td>
	</tr>
	<tr>
		<td align="center" colspan="2"><h1>Solution Key</h1></br></td>
	</tr>
		<td colspan="2"></br><br/>
		</td>
	</tr>
	<tr>
		<td colspan="2">
		<?php
		echo ''.ucfirst($_SESSION['STUDENT_NAME']);echo", your solution set:";echo "<br/>";
		echo 'Question Set attempted: ' . $_SESSION['QUESSET_NO'];echo "<br/>";
		?>
		</tr>
	<tr>
		<td colspan="2"></br><br/>
		</td>
	</tr>
	<tr>
		<td colspan="2">
		<table align="center" cellspacing="0" cellpadding="0" width="80%">
		
<?php 
$con=mysql_connect("localhost", "root", "")or die("cannot connect");
mysql_select_db("DP",$con)or die("cannot select DB");

$qset=$_SESSION['QUESSET_NO'];

$qset = stripslashes($qset);
$qset= mysql_real_escape_string($qset);

$result3=mysql_query("SELECT * FROM QUES_PAPERS WHERE QUESSET_NO='$qset'",$con);

while($row2 = mysql_fetch_array($result3))
{
?> <tr><td width="60%"> <?php
	$q1=$row2['Q1'];
	$result4=mysql_query("SELECT * FROM QUES_BANK WHERE QUES_ID='$q1'",$con);
	while($row1 = mysql_fetch_array($result4))
	{ 
	echo ('1. ');
	echo $row1['QUES'];echo "<br/>";
    echo ('Correct choice:');echo $anskey[1];echo"<br/>";
    echo ('Your answer:');	echo $row['S_ANS1'];;echo"<br/>";
    if($anskey[1]==$row['S_ANS1'])
    {?>
    <img src = "correct.jpg"><br/>
    <?php
    }
    else
    { ?>
    <img src="wrong.jpg"><br/>
    <?php
    }
   echo"<br/>";echo"<br/>";
   }

$q2=$row2['Q2'];
	$result4=mysql_query("SELECT * FROM QUES_BANK WHERE QUES_ID='$q2'",$con);
	while($row1 = mysql_fetch_array($result4))
	{ $j=2;
	echo ('2. ');
	echo $row1['QUES'];echo "<br/>";
   echo ('Correct choice:');echo $anskey[2];echo"<br/>";
   echo ('Your answer:');echo $row['S_ANS'.$j];echo"<br/>";
   if($anskey[2]==$row['S_ANS'.$j])
   {?>
   <img src = "correct.jpg"><br/>
   <?php
   }
   else
   { ?>
   <img src="wrong.jpg"><br/>
   <?php
   }
   echo"<br/>";echo"<br/>";
   }
   
   $q3=$row2['Q3'];
	$result4=mysql_query("SELECT * FROM QUES_BANK WHERE QUES_ID='$q3'",$con);
	while($row1 = mysql_fetch_array($result4))
	{ $j=3;
	echo ('3. ');
	echo $row1['QUES'];echo "<br/>";
   echo ('Correct choice:');echo $anskey[3];echo"<br/>";
   echo ('Your answer:');echo $row['S_ANS'.$j];echo"<br/>";
   if($anskey[3]==$row['S_ANS'.$j])
   {?>
   <img src = "correct.jpg"><br/>
   <?php
   }
   else
   { ?>
   <img src="wrong.jpg"><br/>
   <?php
   }
   echo"<br/>";echo"<br/>";
   }
   
   $q4=$row2['Q4'];
	$result4=mysql_query("SELECT * FROM QUES_BANK WHERE QUES_ID='$q4'",$con);
	while($row1 = mysql_fetch_array($result4))
	{ $j=4;
	echo ('4. ');
	echo $row1['QUES'];echo "<br/>";
   echo ('Correct choice:');echo $anskey[4];echo"<br/>";
   echo ('Your answer:');echo $row['S_ANS'.$j];echo"<br/>";
   if($anskey[4]==$row['S_ANS'.$j])
   {?>
   <img src = "correct.jpg"><br/>
   <?php
   }
   else
   { ?>
   <img src="wrong.jpg"><br/>
   <?php
   }
   echo"<br/>";echo"<br/>";
   }
   
   $q5=$row2['Q5'];
	$result4=mysql_query("SELECT * FROM QUES_BANK WHERE QUES_ID='$q5'",$con);
	while($row1 = mysql_fetch_array($result4))
	{ $j=5;
	echo ('5. ');
	echo $row1['QUES'];echo "<br/>";
   echo ('Correct choice:');echo $anskey[5];echo"<br/>";
   echo ('Your answer:');echo $row['S_ANS'.$j];echo"<br/>";
   if($anskey[5]==$row['S_ANS'.$j])
   {?>
   <img src = "correct.jpg"><br/>
   <?php
   }
   else
   { ?>
   <img src="wrong.jpg"><br/>
   <?php
   }
   echo"<br/>";echo"<br/>";
   }
   ?>
   </td>
   <td width="40%">
   <?php
   
   $q6=$row2['Q6'];
	$result4=mysql_query("SELECT * FROM QUES_BANK WHERE QUES_ID='$q6'",$con);
	while($row1 = mysql_fetch_array($result4))
	{ $j=6;
	echo ('6. ');
	echo $row1['QUES'];echo "<br/>";
   echo ('Correct choice:');echo $anskey[6];echo"<br/>";
   echo ('Your answer:');echo $row['S_ANS'.$j];echo"<br/>";
   if($anskey[6]==$row['S_ANS'.$j])
   {?>
   <img src = "correct.jpg"><br/>
   <?php
   }
   else
   { ?>
   <img src="wrong.jpg"><br/>
   <?php
   }
   echo"<br/>";echo"<br/>";
   }

   
   $q7=$row2['Q7'];
	$result4=mysql_query("SELECT * FROM QUES_BANK WHERE QUES_ID='$q7'",$con);
	while($row1 = mysql_fetch_array($result4))
	{ $j=7;
	echo ('7. ');
	echo $row1['QUES'];echo "<br/>";
   echo ('Correct choice:');echo $anskey[7];echo"<br/>";
   echo ('Your answer:');echo $row['S_ANS'.$j];echo"<br/>";
   if($anskey[7]==$row['S_ANS'.$j])
   {?>
   <img src = "correct.jpg"><br/>
   <?php
   }
   else
   { ?>
   <img src="wrong.jpg"><br/>
   <?php
   }
   echo"<br/>";echo"<br/>";
   }
   
   $q8=$row2['Q8'];
	$result4=mysql_query("SELECT * FROM QUES_BANK WHERE QUES_ID='$q8'",$con);
	while($row1 = mysql_fetch_array($result4))
	{ $j=8;
	echo ('8. ');
	echo $row1['QUES'];echo "<br/>";
   echo ('Correct choice:');echo $anskey[8];echo"<br/>";
   echo ('Your answer:');echo $row['S_ANS'.$j];echo"<br/>";
   if($anskey[8]==$row['S_ANS'.$j])
   {?>
   <img src = "correct.jpg"><br/>
   <?php
   }
   else
   { ?>
   <img src="wrong.jpg"><br/>
   <?php
   }
   echo"<br/>";echo"<br/>";
   }
   
    $q9=$row2['Q9'];
	$result4=mysql_query("SELECT * FROM QUES_BANK WHERE QUES_ID='$q9'",$con);
	while($row1 = mysql_fetch_array($result4))
	{ $j=9;
	echo ('9. ');
	echo $row1['QUES'];echo "<br/>";
   echo ('Correct choice:');echo $anskey[9];echo"<br/>";
   echo ('Your answer:');echo $row['S_ANS'.$j];echo"<br/>";
   if($anskey[9]==$row['S_ANS'.$j])
   {?>
   <img src = "correct.jpg"><br/>
   <?php
   }
   else
   { ?>
   <img src="wrong.jpg"><br/>
   <?php
   }
   echo"<br/>";echo"<br/>";
   }
   
    $q10=$row2['Q10'];
	$result4=mysql_query("SELECT * FROM QUES_BANK WHERE QUES_ID='$q10'",$con);
	while($row1 = mysql_fetch_array($result4))
	{ $j=10;
	echo ('10. ');
	echo $row1['QUES'];echo "<br/>";
   echo ('Correct choice:');echo $anskey[10];echo"<br/>";
   echo ('Your answer:');echo $row['S_ANS'.$j];echo"<br/>";
   if($anskey[10]==$row['S_ANS'.$j])
   {?>
   <img src = "correct.jpg"><br/>
   <?php
   }
   else
   { ?>
   <img src="wrong.jpg"><br/>
   <?php
   }
   echo"<br/>";echo"<br/>";
   }
   
   
	?>
	</td></tr>
	<?php
	
	}
}
?> 
</table>

		</td>
	</tr>
<tr>
<td colspan="2"><br/><br/><br/></td>
</tr>
<tr><td colspan="2" align="center">
<form action="result.php">
<input type="submit" name="submit" value="Go to Results page">
</form></td></tr> 
</table>
</body>
</html>
