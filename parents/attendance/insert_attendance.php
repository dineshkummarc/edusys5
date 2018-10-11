<?php
require("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$count = test_input($_GET["count"]);
	
    //for($i=1;$i<$count+1;$i++){
    for($i=0;$i<$count;$i++){
	
	$attendance = test_input($_POST["attendance"][$i]);
	$first_name = test_input($_POST["first_name"][$i]);
	$roll_no = test_input($_POST["roll_no"][$i]);
	$present_class = test_input($_POST["present_class"][$i]);
	$academic_year = test_input($_POST["academic_year"][$i]);
	$taken_by = test_input($_POST["taken_by"][$i]);
	$tot_class=1;
	if($attendance=="Present"){
		$att_count=1;
	}else{
		$att_count=0;
	}
	
	


	
	$sql_contact="select parent_contact,first_name,roll_no,academic_year from students where first_name='".$first_name."' and roll_no='".$roll_no."' and academic_year='".$academic_year."'";
	$result_contact=mysqli_query($conn,$sql_contact);
	if($row_contact=mysqli_fetch_array($result_contact,MYSQLI_ASSOC))
	{
		
		$parent_contact=$row_contact["parent_contact"];
		if($parent_contact==""){
		$parent_contact="null";
	    }else{
		$parent_contact=$row_contact["parent_contact"];
	    }
	
	}
	

	$sql="insert into attendance (first_name,roll_no,present_class,academic_year,taken_by,attendance,parent_contact,att_date,att_count,tot_class) values('$first_name','$roll_no','$present_class','$academic_year','$taken_by','$attendance','$parent_contact',now(),'$att_count','$tot_class')";
   
	 if ($conn->query($sql) === TRUE) {
		
		
		
        } 
		
    //header("Location:att_sms.php?academic_year=".$academic_year."&present_class=".$present_class);
}
header("Location:att_sms.php");
}



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}