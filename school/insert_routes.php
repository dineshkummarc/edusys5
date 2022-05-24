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
	
		
		$sql="insert into routes (route_name,route_contact,add_date,route_det,academic_year) values('$route_name','$route_contact','$today','$route_det','$cur_academic_year')";
		$conn->query($sql); 
    
header("Location:add_routes.php?success=success");
}
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?> 