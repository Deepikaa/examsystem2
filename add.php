<?php
$q= $_POST['qtn'];
$a= $_POST['c_ans'];
$ch1= $_POST['c1'];
$ch2= $_POST['c2'];
$ch3= $_POST['c3'];
$ch4= $_POST['c4'];

//echo $q;
//echo $a;
//echo $ch1;
//echo $ch2;
//echo $ch3;
//echo $ch4;
//echo 'Question Inserted';
$con=mysql_connect("localhost", "root", "")or die("cannot connect");
mysql_select_db("DP",$con)or die("cannot select DB");

$sql="INSERT INTO QUES_BANK (ques_id,ques,ans,ques_choice1,ques_choice2,ques_choice3,ques_choice4)  VALUES('','$q','$a','$ch1','$ch2','$ch3','$ch4')";

	if (!mysql_query($sql,$con))
	{
	die('Error: ' . mysql_error());
	}
?>
<html>
<body bgcolor="white">
<table cellspacing="0" cellpadding="0" align="center">
<tr colspan="5"></td>
</br></br></br>
</td></tr>
<tr>
	<td rowspan="8" bgcolor="black"> &nbsp &nbsp &nbsp </td>
	<td colspan="3" bgcolor="black"><br/></td>
	<td rowspan="8" bgcolor="black"> &nbsp &nbsp &nbsp  </td></tr>
<tr>
	<td rowspan="6" bgcolor="maroon"> &nbsp &nbsp &nbsp </td> <td bgcolor="maroon"><br/></td> <td rowspan="6" bgcolor="maroon"> &nbsp &nbsp &nbsp </td></tr>
<tr>
	<td><br/><br/><br/><br/></td></tr>
<tr>
	<td align="center"><h1 align="center">  &nbsp &nbsp &nbsp Question added!  &nbsp &nbsp &nbsp </h1></td></tr>
<tr>
	<td><br/><br/></td></tr>
<tr>
	<td align="center"><?php echo $q;echo "<br/><br/>";?>
	<b>Correct answer: &nbsp &nbsp <?php
echo $a; echo "<br/><br/>";?></b> Choice 1: &nbsp &nbsp<?php
echo $ch1;echo "<br/>";?> Choice 2: &nbsp &nbsp<?php
echo $ch2;echo "<br/>";?> Choice 3: &nbsp &nbsp<?php
echo $ch3;echo "<br/>";?> Choice 4: &nbsp &nbsp<?php
echo $ch4;echo "<br/>";?> 
<br/><br/>
</td></tr>
<tr>
	<td bgcolor="maroon"><br/></td></tr>
<tr>
	<td colspan="3" bgcolor="black"><br/></td></tr>
</table>
</body>
</html>