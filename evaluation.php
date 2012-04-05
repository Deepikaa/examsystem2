<?php
SESSION_start(); 
/*
echo $_POST['ques1'];
echo $_POST['ques2'];//if no option is selected. theres a problem. it has to be fixedd.
echo $_POST['ques3'];
echo $_POST['ques4'];
echo $_POST['ques5'];
echo $_POST['ques6'];
echo $_POST['ques7'];
echo $_POST['ques8'];
echo $_POST['ques9'];
echo $_POST['ques10'];*/

$con=mysql_connect("localhost", "root", "")or die("cannot connect");
mysql_select_db("DP",$con)or die("cannot select DB");

$sql="INSERT INTO STUDENT_ANSWER_SHEET (STUDENT_ID, QUESSET_NO, S_ANS1, S_ANS2, S_ANS3, S_ANS4, S_ANS5, S_ANS6, S_ANS7, S_ANS8, S_ANS9, S_ANS10) VALUES ('$_SESSION[sid]',$_SESSION[QUESSET_NO],'$_POST[ques1]','$_POST[ques2]','$_POST[ques3]','$_POST[ques4]','$_POST[ques5]','$_POST[ques6]','$_POST[ques7]','$_POST[ques8]','$_POST[ques9]','$_POST[ques10]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
//echo "1 record added";

mysql_close($con);

header('location:finish.php');


?>