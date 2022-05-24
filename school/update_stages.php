<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
date_default_timezone_set('Asia/Kolkata');
$today=date('Y-m-d');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$id = test_input($_POST["id"]);
	$route_name = test_input($_POST["route_name"]);
	$stage_name = test_input($_POST["stage_name"]);
   
		
		$sql="update stages set route_name='".$route_name."',stage_name='".$stage_name."' where id='".$id."'";
		$conn->query($sql); 
    
header("Location:all_stages.php?success=success");
}
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?> 