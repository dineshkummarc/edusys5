<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
if(isset($_POST["holiday"]))
{
	$ho_date=$_POST["ho_date"];
	$ho_name=$_POST["ho_name"];
	$ho_details=$_POST["ho_details"];
	
	$sql="insert into holiday (ho_date,ho_name,ho_details,academic_year) values('$ho_date','$ho_name','$ho_details','$cur_academic_year')";
	
	if ($conn->query($sql) === TRUE) 
	{
	header("Location:add_holiday.php?success=.'success'");
	} 
	else 
	{
	header("Location:add_holiday.php?failed=.'failed'");	
	}
}

	}else{
		header("Location:login.php");
	}
	
?>