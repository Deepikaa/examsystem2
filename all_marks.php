<?php
/*this file should list out all the students mks..
give methods to calculate avg highest lowest*/

$con=mysql_connect("localhost", "root", "")or die("cannot connect");
mysql_select_db("DP",$con)or die("cannot select DB");
$result=mysql_query("SELECT * FROM STUDENT_RESULT",$con);
//echo mysql_num_rows($result);echo "<br/>";
?>
<html>
<body bgcolor="white">
<br/><br/><br/>
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
