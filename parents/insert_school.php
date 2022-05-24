<?php

session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{
$mark_uname=$_SESSION['lkg_uname'];
$date = date_default_timezone_set('Asia/Kolkata');
$today = date("Y/m/d");

require("connection.php");
if(isset($_POST["add_school"]))
{
	$sch_name=$_POST["sch_name"];
	$location=$_POST["location"];
	$city=$_POST["city"];
	$district=$_POST["district"];
	$state=$_POST["state"];
	$pin=$_POST["pin"];
	$phone=$_POST["phone"];
	$mob=$_POST["mob"];
	$email=$_POST["email"];
	$web=$_POST["web"];
	$sender_id=$_POST["sender_id"];
	
	
	$sql="insert into school_det (sch_name,location,city,district,state,pin,phone,mob,email,web,sender_id) values('$sch_name','$location','$city','$district','$state','$pin','$phone','$mob','$email','$web','$sender_id')";
	if ($conn->query($sql) === TRUE) 
	{
	
	header("Location:index.php?success=.'success'");


	} 
	else 
	{
			
	header("Location:configure_school.php?failed=.'failed'");	
		
	}

}

}else{
		header("Location:login.php");
	}
	
?>