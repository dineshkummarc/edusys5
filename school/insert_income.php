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
	$mobile=test_input($_POST["mobile"]);
	$added_by=$_SESSION['lkg_uname'];
	
	
	
	$sql="insert into income (amount,source,rec_date,rec_no,added_by,academic_year) values('$amount','$source','$rec_date','$rec_no','$added_by','$cur_academic_year')";
	
	
	
	if ($conn->query($sql) === TRUE) 
	{
	echo "success";
	header("Location:income_sms.php?amount=".$amount."&source=".$source."&rec_no=".$rec_no."&rec_date=".$rec_date."&mobile=".$mobile);
	
	
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