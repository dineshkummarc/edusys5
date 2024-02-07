<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
$updated_by = $_SESSION['lkg_uname'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$id = test_input($_POST["id"]);
  $student_id = test_input($_POST["student_id"]);
	$van_fee = test_input($_POST["van_fee"]);

	$rec_date = test_input($_POST["rec_date"]);
	
	$rec_no = test_input($_POST["rec_no"]);
	$route_name = test_input($_POST["route_name"]);
	$stage_name = test_input($_POST["stage_name"]);

  
    if($van_fee!=""){
    $sql = "update student_van_fee set tot_paid='".$van_fee."',rec_date='".$rec_date."',rec_no='".$rec_no."',route_name='".$route_name."',stage_name='".$stage_name."' where id='".$id."'";
    $conn->query($sql);
    //var_dump($sql);
}
  
	header("Location:description.php?id=".$student_id);  
}
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}