<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
$updated_by = $_SESSION['lkg_uname'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$count = $_GET["count"];
	
  for($i=0;$i<$count;$i++){
		echo "inside";
	$student_id = test_input($_POST["student_id"][$i]);
	$van_fee = test_input($_POST["van_fee"][$i]);
	
	$rec_date = test_input($_POST["rec_date"][$i]);
	
	$rec_no = test_input($_POST["rec_no"][$i]);
	$route_name = test_input($_POST["route_name"][$i]);
	$stage_name = test_input($_POST["stage_name"][$i]);

  
    if($van_fee!=""){
		$sql="insert into student_van_fee (student_id,academic_year,tot_paid,rec_date,rec_no,route_name,stage_name,updated_by) values('$student_id','$cur_academic_year','$van_fee','$rec_date','$rec_no','$route_name','$stage_name','$updated_by')";
		var_dump($sql);
  
	 if ($conn->query($sql) === TRUE) {
		echo "success";	
		
	}


  }
  
	header("Location:transport_fee_sms.php?student_id=".$student_id."&tot_paid=".$van_fee."&rec_no=".$rec_no."&rec_date=".$rec_date."&roll_no=".$roll_no."&note=".$note);  
}
}
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}