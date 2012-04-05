<?php
/*this file should dig out the corresponding students report.. if ih hasnt given the test then the page should go back to student_mks2.php with the error that the student hasnt yet given the test.
it should list his total, no of incorrect ans & no of right ans.
if possible.. put in a link to the students answer sheet itself.. sol_key.php*/
$s= $_POST['sid'];
$con=mysql_connect("localhost", "root", "")or die("cannot connect");
mysql_select_db("DP",$con)or die("cannot select DB");
$result=mysql_query("SELECT * FROM STUDENT_RESULT WHERE STUDENT_ID='$s'",$con);
//echo mysql_num_rows($result);echo "<br/>";

?>

<html>
<body bgcolor="white">
<table cellspacing="0" cellpadding="0" align="center" border="1">
<tr><th align="center"> &nbsp &nbsp Student ID  &nbsp &nbsp </th><th align="center"> &nbsp &nbsp Marks &nbsp &nbsp </th>
<tr><td colspan="2"><br/></td></tr>
<?php

while($row = mysql_fetch_array($result))
{?>
<tr>
<td align="center">
<?php echo $row['STUDENT_ID']; ?> </td>
<td align="center"><?php echo $row['STUDENT_MARKS']; ?></td>
</tr>
<?php
}

?>
</table>
</body></html>