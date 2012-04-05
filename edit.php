<?php
//this file needs to allow user to edit the question whose user id he queried.
$qid= $_POST['qtnid'];

$con=mysql_connect("localhost", "root", "")or die("cannot connect");
mysql_select_db("DP",$con)or die("cannot select DB");
$result=mysql_query("SELECT * FROM QUES_BANK WHERE QUES_ID='$qid'",$con);
?>
<html>
<head></head>
</html>
<body bgcolor="white">
<?php
while($row = mysql_fetch_array($result))
{
?>

			<table align="center" cellspacing="0" cellpadding="0">
				</tr>
					<td colspan="5"><br/><br/><br/><br/><br/></td>
				</tr>
				<tr>
					<td rowspan="10" bgcolor="black"> &nbsp &nbsp &nbsp </td>
					<td colspan="3" bgcolor="black"><br/></td>
					<td rowspan="10" bgcolor="black"> &nbsp &nbsp &nbsp  </td></tr>
				<tr>
					<td rowspan="8" bgcolor="darkblue"> &nbsp &nbsp &nbsp </td>
					<td bgcolor="darkblue"><br/></td>
					<td rowspan="8" bgcolor="darkblue"> &nbsp &nbsp &nbsp </td></tr> 
			
			<tr>
				<td><br/><br/><br/><br/></td>
			</tr>
			<tr>
				<td align="center"><h1 align="center">  &nbsp &nbsp &nbsp Edit Question  &nbsp &nbsp &nbsp </h1></td></tr>
			<tr>
				<td><br/><br/></td></tr>
			<tr>
				<td align="center" bgcolor="black" style="color:white"><h1> <?php echo $row['QUES_ID']; ?></h1></td>
			</tr>
			<tr>
				<td><br/></td>
			</tr>
			
			<tr>
				<td align="center"> <form action="edit2.php" method='post' onsubmit="return isValid();">
				<input type="text" name="qid" value="<?php echo $row['QUES_ID']; ?>" style="display:none;" />
				Question: &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp <input type="text" value="<?php echo $row['QUES']; ?>" name="qtn" id="qtn"><br/>					<br/>
				Correct answer: &nbsp <input type="text" value="<?php echo $row['ANS']; ?>" name="c_ans" id="c_ans"><br/><br/>
				Choice1: &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp <input type="text" value="<?php echo $row['QUES_CHOICE1']; ?>" name="c1" id="c1"					><br/><br/>
				Choice2: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <input type="text" value="<?php echo $row['QUES_CHOICE2']; ?>" name="c2" id="c2"						><br/><br/>
				Choice3: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <input type="text" value="<?php echo $row['QUES_CHOICE3']; ?>" name="c3" id="c3"								><br/><br/>
				Choice3: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <input type="text" value="<?php echo $row['QUES_CHOICE4']; ?>" name="c4" id="c4"								><br/><br/>
				<input type="submit" value="Update"><br/><br/></form></td>
			</tr>
			<tr>
				<td bgcolor="darkblue"><br/></td></tr>
			<tr>
				<td colspan="3" bgcolor="black"><br/></td>
			</tr>
			</table>


<?php
}


?>
</body>
</html>