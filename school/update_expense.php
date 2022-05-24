<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
if(isset($_POST["expense"]))
{
	
	date_default_timezone_set("Asia/Kolkata");
	$last_updated=date("Y-m-d");
	
	$id=test_input($_POST["id"]);
	$amount=test_input($_POST["amount"]);
	$towards=test_input($_POST["towards"]);
	$exp_date=test_input($_POST["exp_date"]);
	
	$added_by=test_input($_POST["added_by"]);
	
	$sql="update expense set amount='".$amount."',towards='".$towards."',exp_date='".$exp_date."',added_by='".$added_by."',academic_year='".$cur_academic_year."'  WHERE id='".$id."'";
	
	
	if ($conn->query($sql) === TRUE) 
	{
	
	header("Location:all_expense.php?success_income=.'success_income'");
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