<?php
SESSION_start(); 

if (!isset($_SESSION['sid'])) {
header('Location: login.php');
//echo 'humbug';
$con=mysql_connect("localhost", "root", "")or die("cannot connect");
mysql_select_db("DP",$con)or die("cannot select DB");
//required: a countdown timer. can the page expire automatically after a set amount of time?
}
?>

<html>
<head>
<meta http-equiv="pragma" content="no-cache"/>
<meta http-equiv="expires" content="0"/>
<title> Test</title>
</head>
<body bgcolor="white">
<table cellspacing="0" cellpadding="0" align="center">
	<tr>
		<td style="padding-top:38px" >
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
		<td colspan="2">
		<?php
		echo 'Name: '.ucfirst($_SESSION['STUDENT_NAME']);echo "<br/>";
		echo 'Id No.: ' . $_SESSION['sid'];echo "<br/>";
		echo 'Question Set: ' . $_SESSION['QUESSET_NO'];echo "<br/>";
		?>
		</tr>
	<tr>
		<td colspan="2"></br><br/>
		</td>
	</tr>
	<tr>
		<td colspan="2">
		<?php 
		$con=mysql_connect("localhost", "root", "")or die("cannot connect");
mysql_select_db("DP",$con)or die("cannot select DB");

$qset=$_SESSION['QUESSET_NO'];

$qset = stripslashes($qset);
$qset= mysql_real_escape_string($qset);

$result=mysql_query("SELECT * FROM QUES_PAPERS WHERE QUESSET_NO='$qset'",$con);

while($row = mysql_fetch_array($result))
{
?>
<form method="post" action="evaluation.php">
<?php
    
	$q1=$row['Q1'];
	$result1=mysql_query("SELECT * FROM QUES_BANK WHERE QUES_ID='$q1'",$con);
	while($row1 = mysql_fetch_array($result1))
	{
?>

<ul style="list-style-type:none">
<?php
	echo '1. ';
	echo $row1['QUES'];echo "<br/>";
?>
<li> <input type="radio" name="ques1" value="a" /><?php	echo $row1['QUES_CHOICE1'];?></li>
<li><input type="radio" name="ques1" value="b" /><?php  echo $row1['QUES_CHOICE2'];?></li>
<li><input type="radio" name="ques1" value="c" /><?php	echo $row1['QUES_CHOICE3'];?></li>
<li><input type="radio" name="ques1" value="d" /><?php	echo $row1['QUES_CHOICE4'];?></li>
<li><input type="radio" name="ques1" value="e" checked="checked" style="display:none;" /></li>
</ul>

<?php
}	
	$q2=$row['Q2'];
	$result1=mysql_query("SELECT * FROM QUES_BANK WHERE QUES_ID='$q2'",$con);
	while($row1 = mysql_fetch_array($result1))
	{
	?>

<ul style="list-style-type:none">
<?php
	echo '2. ';
	echo $row1['QUES'];echo "<br/>";
?>
<li><input type="radio" name="ques2" value="a" /><?php	echo $row1['QUES_CHOICE1'];?></li>
<li><input type="radio" name="ques2" value="b" /><?php  echo $row1['QUES_CHOICE2'];?></li>
<li><input type="radio" name="ques2" value="c" /><?php	echo $row1['QUES_CHOICE3'];?></li>
<li><input type="radio" name="ques2" value="d" /><?php	echo $row1['QUES_CHOICE4'];?></li>
<li><input type="radio" name="ques2" value="e" checked="checked" style="display:none;" /></li>
</ul>

<?php
	}
	echo "<br/>";
	
	$q3=$row['Q3'];echo "<br/>";
	$result1=mysql_query("SELECT * FROM QUES_BANK WHERE QUES_ID='$q3'",$con);
	while($row1 = mysql_fetch_array($result1))
	{?>

<ul style="list-style-type:none">
<?php
	echo '3. ';
	echo $row1['QUES'];echo "<br/>";
?>
<li><input type="radio" name="ques3" value="a" /><?php	echo $row1['QUES_CHOICE1'];?></li>
<li><input type="radio" name="ques3" value="b" /><?php  echo $row1['QUES_CHOICE2'];?></li>
<li><input type="radio" name="ques3" value="c" /><?php	echo $row1['QUES_CHOICE3'];?></li>
<li><input type="radio" name="ques3" value="d" /><?php	echo $row1['QUES_CHOICE4'];?></li>
<li><input type="radio" name="ques3" value="e" checked="checked" style="display:none;"/></li>
</ul>

<?php
	}
	echo "<br/>";
	
	$q4=$row['Q4'];
	$result1=mysql_query("SELECT * FROM QUES_BANK WHERE QUES_ID='$q4'",$con);
	while($row1 = mysql_fetch_array($result1))
	{
	?>

<ul style="list-style-type:none">
<?php
	echo '4. ';
	echo $row1['QUES'];echo "<br/>";
?>
<li><input type="radio" name="ques4" value="a" /><?php	echo $row1['QUES_CHOICE1'];?></li>
<li><input type="radio" name="ques4" value="b" /><?php  echo $row1['QUES_CHOICE2'];?></li>
<li><input type="radio" name="ques4" value="c" /><?php	echo $row1['QUES_CHOICE3'];?></li>
<li><input type="radio" name="ques4" value="d" /><?php	echo $row1['QUES_CHOICE4'];?></li>
<li><input type="radio" name="ques4" value="e" checked="checked" style="display:none;" /></li>
</ul>

<?php
	}
	echo "<br/>";
	
	$q5=$row['Q5'];
	$result1=mysql_query("SELECT * FROM QUES_BANK WHERE QUES_ID='$q5'",$con);
	while($row1 = mysql_fetch_array($result1))
	{
	?>

<ul style="list-style-type:none">
<?php
	echo '5. ';
	echo $row1['QUES'];echo "<br/>";
?>
<li><input type="radio" name="ques5" value="a" /><?php	echo $row1['QUES_CHOICE1'];?></li>
<li><input type="radio" name="ques5" value="b" /><?php  echo $row1['QUES_CHOICE2'];?></li>
<li><input type="radio" name="ques5" value="c" /><?php	echo $row1['QUES_CHOICE3'];?></li>
<li><input type="radio" name="ques5" value="d" /><?php	echo $row1['QUES_CHOICE4'];?></li>
<li><input type="radio" name="ques5" value="e" checked="checked" style="display:none;"/></li>
</ul>

<?php
	}
	echo "<br/>";
	
	$q6=$row['Q6'];
	$result1=mysql_query("SELECT * FROM QUES_BANK WHERE QUES_ID='$q6'",$con);
	while($row1 = mysql_fetch_array($result1))
	{
	?>

<ul style="list-style-type:none">
<?php
	echo '6. ';
	echo $row1['QUES'];echo "<br/>";
?>
<li><input type="radio" name="ques6" value="a" /><?php	echo $row1['QUES_CHOICE1'];?></li>
<li><input type="radio" name="ques6" value="b" /><?php  echo $row1['QUES_CHOICE2'];?></li>
<li><input type="radio" name="ques6" value="c" /><?php	echo $row1['QUES_CHOICE3'];?></li>
<li><input type="radio" name="ques6" value="d" /><?php	echo $row1['QUES_CHOICE4'];?></li>
<li><input type="radio" name="ques6" value="e" checked="checked" style="display:none;"/></li>
</ul>

<?php
	}
	echo "<br/>";
	
	$q7=$row['Q7'];
	$result1=mysql_query("SELECT * FROM QUES_BANK WHERE QUES_ID='$q7'",$con);
	while($row1 = mysql_fetch_array($result1))
	{
	?>

<ul style="list-style-type:none">
<?php
	echo '7. ';
	echo $row1['QUES'];echo "<br/>";
?>
<li><input type="radio" name="ques7" value="a" /><?php	echo $row1['QUES_CHOICE1'];?></li>
<li><input type="radio" name="ques7" value="b" /><?php  echo $row1['QUES_CHOICE2'];?></li>
<li><input type="radio" name="ques7" value="c" /><?php	echo $row1['QUES_CHOICE3'];?></li>
<li><input type="radio" name="ques7" value="d" /><?php	echo $row1['QUES_CHOICE4'];?></li>
<li><input type="radio" name="ques7" value="e" checked="checked" style="display:none;" /></li>
</ul>

<?php
	}
	echo "<br/>";
	
	$q8=$row['Q8'];
	$result1=mysql_query("SELECT * FROM QUES_BANK WHERE QUES_ID='$q8'",$con);
	while($row1 = mysql_fetch_array($result1))
	{
	?>

<ul style="list-style-type:none">
<?php
	echo '8. ';
	echo $row1['QUES'];echo "<br/>";
?>
<li><input type="radio" name="ques8" value="a" /><?php	echo $row1['QUES_CHOICE1'];?></li>
<li><input type="radio" name="ques8" value="b" /><?php  echo $row1['QUES_CHOICE2'];?></li>
<li><input type="radio" name="ques8" value="c" /><?php	echo $row1['QUES_CHOICE3'];?></li>
<li><input type="radio" name="ques8" value="d" /><?php	echo $row1['QUES_CHOICE4'];?></li>
<li><input type="radio" name="ques8" value="e" checked="checked" style="display:none;"/></li>
</ul>

<?php
	}
	echo "<br/>";
	
	$q9=$row['Q9'];
	$result1=mysql_query("SELECT * FROM QUES_BANK WHERE QUES_ID='$q9'",$con);
	while($row1 = mysql_fetch_array($result1))
	{
	?>

<ul style="list-style-type:none">
<?php
	echo '9. ';
	echo $row1['QUES'];echo "<br/>";
?>
<li><input type="radio" name="ques9" value="a" /><?php	echo $row1['QUES_CHOICE1'];?></li>
<li><input type="radio" name="ques9" value="b" /><?php  echo $row1['QUES_CHOICE2'];?></li>
<li><input type="radio" name="ques9" value="c" /><?php	echo $row1['QUES_CHOICE3'];?></li>
<li><input type="radio" name="ques9" value="d" /><?php	echo $row1['QUES_CHOICE4'];?></li>
<li><input type="radio" name="ques9" value="e" checked="checked" style="display:none;"/></li>
</ul>

<?php
	}
	echo "<br/>";
	
	$q10=$row['Q10'];
	$result1=mysql_query("SELECT * FROM QUES_BANK WHERE QUES_ID='$q10'",$con);
	while($row1 = mysql_fetch_array($result1))
	{
	?>

<ul style="list-style-type:none">
<?php
	echo '10. ';
	echo $row1['QUES'];echo "<br/>";
?>
<li><input type="radio" name="ques10" value="a" /><?php	echo $row1['QUES_CHOICE1'];?></li>
<li><input type="radio" name="ques10" value="b" /><?php  echo $row1['QUES_CHOICE2'];?></li>
<li><input type="radio" name="ques10" value="c" /><?php	echo $row1['QUES_CHOICE3'];?></li>
<li><input type="radio" name="ques10" value="d" /><?php	echo $row1['QUES_CHOICE4'];?></li>
<li><input type="radio" name="ques10" value="e" checked="checked" style="display:none;"/></li>
</ul>

<?php
	}
	echo "<br/>";
}
?> 
<div align="center">
<input type="submit" name="Submit" value="Done">
</div>
</form>

		</td>
	</tr>
</table>
</body>
</html>