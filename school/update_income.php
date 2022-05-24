<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
if(isset($_POST["income"]))
{
	
	date_default_timezone_set("Asia/Kolkata");
	$last_updated=date("Y-m-d");
	
	$id=test_input($_POST["id"]);
	$amount=test_input($_POST["amount"]);
	$source=test_input($_POST["source"]);
	$rec_date=test_input($_POST["rec_date"]);
	$rec_no=test_input($_POST["rec_no"]);
	$added_by=$_SESSION['lkg_uname'];
	
	$sql="update income set amount='".$amount."',source='".$source."',rec_date='".$rec_date."',rec_no='".$rec_no."',added_by='".$added_by."',academic_year='".$cur_academic_year."'  WHERE id='".$id."'";
	
	
	if ($conn->query($sql) === TRUE) 
	{
		echo "success";
	
	header("Location:all_incomes.php?success_income=.'success_income'");
    } 
	else 
	{
	var_dump($sql);			
		
	}
}
}else{
		header("Location:login.php");
	}
	
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
	
?>