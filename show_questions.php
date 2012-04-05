<?php
$con=mysql_connect("localhost", "root", "")or die("cannot connect");
mysql_select_db("DP",$con)or die("cannot select DB");
$result=mysql_query("SELECT * FROM QUES_BANK",$con);
?>

<html>
<body bgcolor="white">
<table align="0" cellspacing="0" cellpadding="0" border="1">
<tr>
<th>Question ID</th>
<th> Question</th>
<th> Answer</th>
<th>Choice 1</th>
<th>Choice 2</th>
<th>Choice 3</th>
<th>Choice 4</th>
</tr>

<?php
while($row = mysql_fetch_array($result))
{?>
<tr>
<td align="center"><?php
echo $row['QUES_ID']; ?></td>
<td><?php
echo $row['QUES'];?></td>
<td><?php
echo $row['ANS'];?></td>
<td><?php
echo $row['QUES_CHOICE1'];?></td>
<td><?php
echo $row['QUES_CHOICE2'];?></td>
<td><?php
echo $row['QUES_CHOICE3'];?></td>
<td><?php
echo $row['QUES_CHOICE4'];?></td>
<td>

</tr>
<?php } ?>
<tr><td><br/></td></tr>
</table>


</body>
</html>
