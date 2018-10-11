<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$count = $_POST["count"];
	//echo $count;
	$i="";
    for($i=0;$i<=$count;$i++){
	$route_name = test_input($_POST["route_name"][$i]);
	$stage_name = test_input($_POST["stage_name"][$i]);
	$first_name = test_input($_POST["first_name"][$i]);
	$roll_no = test_input($_POST["roll_no"][$i]);
	$present_class = test_input($_POST["present_class"][$i]);
	$section = test_input($_POST["section"][$i]);
	
	
	$date=date("Y");
	$year=intval($date);
	$next_year=$year+1;

  
   if(($_POST['route_name'][$i])!=""){
			$sql="insert into route_students (first_name,roll_no,route_name,present_class,section,stage_name,academic_year) values('$first_name','$roll_no','$route_name','$present_class','$section','$stage_name','$cur_academic_year')";
  var_dump($sql);
	 if ($conn->query($sql) === TRUE) {
		echo "success";
		
	}	
  }
  }
  
	
	
  
}
}
header("Location:add_transport_student.php?success=success");

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}