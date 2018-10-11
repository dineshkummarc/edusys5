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
	
	$amount=test_input($_POST["amount"]);
	$source=test_input($_POST["source"]);
	$rec_date=test_input($_POST["rec_date"]);
	$rec_no=test_input($_POST["rec_no"]);
	$added_by=test_input($_POST["added_by"]);
	
	
	
	$sql="insert into income (amount,source,rec_date,rec_no,added_by,last_updated,academic_year) values('$amount','$source','$rec_date','$rec_no','$added_by','$last_updated','$cur_academic_year')";
	
	
	
	if ($conn->query($sql) === TRUE) 
	{
		echo "success";
	
	header("Location:accounts_overview.php?success_income=.'success_income'");
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