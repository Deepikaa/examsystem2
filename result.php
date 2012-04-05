<?php
session_start();
//required:  method to display the no of correct ans, wrong answers.. and a button linking to show correct answers of what the student got.. why isnt the score showing up for a person who hasnt freshly taken the test??
$con=mysql_connect("localhost", "root", "")or die("cannot connect");
mysql_select_db("DP",$con)or die("cannot select DB");
//echo $_SESSION['sid'];
$result=mysql_query("SELECT * FROM STUDENT_RESULT WHERE STUDENT_ID='$_SESSION[sid]'",$con);
//$score=$result['STUDENT_MARKS'];

while($row = mysql_fetch_array($result))
  {
  $score= $row['STUDENT_MARKS'];
  echo "<br />";
  }

?>
<html>
<head>
<title>Result</title>
</head>
<body bgcolor="white">
<table align="center" cellspacing="0" cellpadding="0" border="0px">
<tr><td colspan="2"><br/><br/><br/></td></tr>
<tr><td align="center"><img src="report.jpg" align="center" height="100px" width="150px">&nbsp &nbsp &nbsp </td>
<td align="center"><h1> Results</h1></td></tr>
<tr><td colspan="2"><br/></td></tr>
<tr><td align="center"><?php echo 'Name: ' ?></td><td align="center"><?php echo'' .$_SESSION['STUDENT_NAME'];?></td></tr>
<tr><td colspan="2"><br/></td></tr>
<tr><td align="center"><?php echo 'Id No.: ' ?> </td><td align="center"><?php echo '' .$_SESSION['sid'];?></td></tr>
<tr><td colspan="2"><br/></td></tr>
<tr><td align="center"><?php echo 'Question Set: ' ?> &nbsp &nbsp </td><td align="center"><?php echo '' .$_SESSION['QUESSET_NO'];?></td></tr>
<tr><td colspan="2"><br/></td></tr>
<tr><td align="center"><?php echo 'Score : ' ?> &nbsp &nbsp </td><td align="center"><?php echo('');echo($score);echo "<br/>";?></td></tr>
<tr><td colspan="2"><br/></td></tr>
<tr><td colspan="2" align="center">
<form>
<input type="button" name="done" value="close" onclick="window.close();">
</td>
</tr>
</table>
</body>
</html>
