<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body bgcolor="white">
       
        
        
        
    
    <?php
                    		
					$con=mysql_connect("localhost", "root", "")or die("cannot connect");
					mysql_select_db("DP",$con)or die("cannot select DB");
					
                    $result=mysql_query("SELECT * FROM ques_bank order by rand() limit 10",$con);
                    while($row= mysql_fetch_array($result))
					{
                    $ques_det1[]=$row;
                    }
                    $a1 = $ques_det1[0][0];
                    $a2 = $ques_det1[1][0];
                    $a3 = $ques_det1[2][0];
                    $a4 = $ques_det1[3][0];
                    $a5 = $ques_det1[4][0];
                    $a6 = $ques_det1[5][0];
                    $a7 = $ques_det1[6][0];
                    $a8 = $ques_det1[7][0];
                    $a9 = $ques_det1[8][0];
                    $a10 = $ques_det1[9][0];

                    $query1=mysql_query("INSERT INTO ques_papers(Q1,Q2,Q3,Q4,Q5,Q6,Q7,Q8,Q9,Q10) VALUES('$a1','$a2','$a3','$a4','$a5','$a6','$a7','$a8','$a9','$a10')",$con);
                    $query=mysql_query("SELECT QUESSET_NO FROM ques_bank",$con);
                    $b = $query ;
                  //echo 'Question set added' ;

 
// $num tells the no of rows in the ques_paper.. find that.
                ?>
                
        <table border="0" style="border-collapse:collapse" align="center" cellspacing="0" cellpadding="0">
		
		<tr><td colspan="2" ><br/></td></tr>
		<tr><td colspan="2"align="center"><h1> You have successfully added a new question paper to the database!</h1></td></tr>
		<tr><td  colspan="2"><br/><br/><br/></td></tr>
          <tr><td colspan="2">
		   <table border="2" style="border-collapse:collapse" align="center" cellspacing="0" cellpadding="0" width="100%">
		 </tr><tr><td bgcolor="#000038" colspan="7"><br/></td></tr>  
<tr>
            <th align="center">&nbsp &nbsp QUESTION NO &nbsp &nbsp </th>
            <th align="center">&nbsp &nbsp QUESTION &nbsp &nbsp </th>
            <th align="center">&nbsp &nbsp  CORRECT ANSWER &nbsp &nbsp </th>
            <th align="center" width="100px">&nbsp &nbsp CHOICE 1 &nbsp &nbsp </th>
            <th align="center" width="100px"> &nbsp &nbsp CHOICE 2 &nbsp &nbsp </th>
            <th align="center" width="100px"> &nbsp &nbsp CHOICE 3 &nbsp &nbsp </th>
            <th align="center" width="100px"> &nbsp &nbsp CHOICE 4 &nbsp &nbsp </th>
          </tr><tr><td bgcolor="#000038" colspan="7"><br/></td></tr><tr><td colspan="7"><br/></td></tr>
           <?php  for($i=0;$i<count($ques_det1);$i++){
         ?>
          <tr>
              <td align="center"> &nbsp &nbsp <?php echo$i+1; ?> &nbsp &nbsp </td>
              <td align="center">&nbsp &nbsp  <?php echo $ques_det1[$i][1]; ?> &nbsp &nbsp </td>
              <td align="center"> &nbsp &nbsp <?php echo $ques_det1[$i][2]; ?> &nbsp &nbsp </td>
              <td align="center"> &nbsp &nbsp <?php echo $ques_det1[$i][3]; ?> &nbsp &nbsp </td>
              <td align="center">&nbsp &nbsp  <?php echo $ques_det1[$i][4]; ?> &nbsp &nbsp </td>
              <td align="center">&nbsp &nbsp  <?php echo $ques_det1[$i][5]; ?> &nbsp &nbsp </td>
              <td align="center">&nbsp &nbsp  <?php echo $ques_det1[$i][6]; ?> &nbsp &nbsp </td>
</tr>
<tr><td colspan="7"><br/></td></tr>
        <?php } ?>
          	 </tr><tr><td bgcolor="#000038" colspan="7"><br/></td></tr> 
		  </table>
		  </td>
		  </tr>
		  <tr><td colspan="2"><br/><br/><br/></td></tr>
		  <tr><td align="center"><h3>Generate more?</br></h3></td>
		  <td align="center"><h3>No, thanks.</br></h3></td></tr>
		  <tr><td align="center"><form action="a_home.html"><input type="submit" value="Generate!"><br/></td>
		  <td align="center"><form action="a_home.html"><input type="submit" value="Go home!"><br/></td></tr>

		  <tr><td><br/><br/><br/></td></tr>
		  
		  
		  
         </table>
		 </body></html>