<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$count = test_input($_GET["count"]);
	
    //for($i=1;$i<$count+1;$i++){
    for($i=0;$i<$count;$i++){
	
	$attendance = test_input($_POST["attendance"][$i]);
	$first_fname = test_input($_POST["first_name"][$i]);
	$academic_year = test_input($_POST["academic_year"][$i]);
	$roll_no = test_input($_POST["roll_no"][$i]);

	
	$taken_by = test_input($_POST["taken_by"][$i]);
	$tot_class=1;
	if($attendance=="Present"){
		$att_count=1;
	}else{
		$att_count=0;
	}
	
	

	$sql="insert into fac_attendance (first_fname,roll_no,taken_by,attendance,att_date,att_count,tot_class,academic_year) values('$first_fname','$roll_no','$taken_by','$attendance',now(),'$att_count','$tot_class','$cur_academic_year')";
   
	 if ($conn->query($sql) === TRUE) {
	
		
        } 
		
 
}

  
}
header("Location:fac_att_sms.php?academic_year=".$cur_academic_year); 

}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}