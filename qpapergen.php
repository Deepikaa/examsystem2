<?php
$con=mysql_connect("localhost", "root", "")or die("cannot connect");
mysql_select_db("DP",$con)or die("cannot select DB");

$result=mysql_query("SELECT * FROM QUES_BANK ORDER BY RAND() LIMIT 10 ",$con);

while($row = mysql_fetch_array($result))
{
$sql="INSERT INTO QUES_PAPERS (QUESSET_NO, Q1, Q2, Q3, Q4, Q5, Q6, Q7, Q8, Q9, Q10) VALUES ('','$row[Q1]', '$row[Q2]', '$row[Q3]', '$row[Q4]', '$row[Q5]', '$row[Q6]', '$row[Q7]', '$row[Q8]', '$row[Q9]', '$row[Q10]')";

if (!mysql_query($sql,$con))
{
  die('Error: ' . mysql_error());
}
  
}

?>