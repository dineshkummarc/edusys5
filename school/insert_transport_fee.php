<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$count = $_GET["count"];
	
    for($i=0;$i<$count;$i++){
	$first_name = test_input($_POST["first_name"][$i]);
	$roll_no = test_input($_POST["roll_no"][$i]);
	
	$academic_year = test_input($_POST["academic_year"]);
	$class = test_input($_POST["present_class"][$i]);
	$section = test_input($_POST["section"][$i]);
	$van_fee = test_input($_POST["van_fee"][$i]);
	
	$rec_date = test_input($_POST["rec_date"][$i]);
	$rec_no = test_input($_POST["rec_no"][$i]);
	$route_name = test_input($_POST["route_name"][$i]);
	$stage_name = test_input($_POST["stage_name"][$i]);
	
	
	

  
  $sql_fee="Select van_fee from set_van_fee where academic_year='".$cur_academic_year."' and route_name='".$route_name."' and stage_name='".$stage_name."'";
  $result_fee=mysqli_query($conn,$sql_fee);
  if($row_fee=mysqli_fetch_array($result_fee,MYSQLI_ASSOC))
	{
		$tot_fee=$row_fee["van_fee"];
	}
  
    if($van_fee!=""){
		$sql="insert into student_van_fee (first_name,roll_no,academic_year,present_class,section,van_fee,rec_date,rec_no,route_name,stage_name) values('$first_name','$roll_no','$cur_academic_year','$class','$section','$van_fee','$rec_date','$rec_no','$route_name','$stage_name')";
  
	 if ($conn->query($sql) === TRUE) {
		echo "success";	
		
	}

var_dump($sql);
  }
  
	
	
header("Location:transport_fee_sms.php?name=".$first_name."&tot_paid=".$van_fee."&rec_no=".$rec_no."&rec_date=".$rec_date."&roll_no=".$roll_no."&note=".$note);  
}
//header("Location:transport_fee_sms.php?name=".$first_name."&tot_paid=".$van_fee."&rec_no=".$rec_no."&rec_date=".$rec_date."&roll_no=".$roll_no."&note=".$note);

//header("Location:transport_fee_update.php?success=success");
}
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}