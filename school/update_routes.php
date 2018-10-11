<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
date_default_timezone_set('Asia/Kolkata');
$today=date('Y-m-d');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$route_name = test_input($_POST["route_name"]);
    $route_contact = test_input($_POST["route_contact"]);
    $route_det = test_input($_POST["route_det"]);
    $id = test_input($_POST["id"]);
	
		
	
		$sql="update routes set route_name='".$route_name."',route_contact='".$route_contact."',add_date='".$today."',route_det='".$route_det."' where  id='".$id."'";
		$conn->query($sql); 
    
header("Location:all_routes.php?success=success");
}
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?> 