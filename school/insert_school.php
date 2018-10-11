<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
$mark_uname=$_SESSION['lkg_uname'];
$date = date_default_timezone_set('Asia/Kolkata');
$today = date("Y/m/d");

require("connection.php");
if(isset($_POST["add_school"]))
{
	$sch_name=$_POST["sch_name"];
	$sch_dise1=$_POST["sch_dise1"];
	$sch_dise2=$_POST["sch_dise2"];
	$sch_dise3=$_POST["sch_dise3"];
	$sch_dise4=$_POST["sch_dise4"];

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
	$sch_dise=$_POST["sch_dise"];
	
	
	$sql="insert into school_det (sch_name,sch_dise1,sch_dise2,sch_dise3,sch_dise4,location,city,district,state,pin,phone,mob,email,web,sender_id,academic_year) values('$sch_name','$sch_dise1','$sch_dise2','$sch_dise3','$sch_dise4','$location','$city','$district','$state','$pin','$phone','$mob','$email','$web','$sender_id','$cur_academic_year')";
	var_dump($sql);
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