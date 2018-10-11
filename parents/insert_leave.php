<?php

session_start();

if(isset($_SESSION['parents_uname'])&&!empty($_SESSION['parents_pass'])&&!empty($_SESSION['academic_year'])&&!empty($_SESSION['parents_class']))
{
require("connection.php");
$date = date_default_timezone_set('Asia/Kolkata');
$today = date('Y-m-d');
if(isset($_POST["leave"]))
{
	
	
	
	$reason=$_POST["reason"];
	$from_date=$_POST["from_date"];
	$to_date=$_POST["to_date"];
	$details=$_POST["details"];
	$first_name=$_SESSION["parents_uname"];
	$admission_no=$_SESSION["parents_pass"];
	$present_class=$_SESSION["parents_class"];
	$cur_academic_year=$_SESSION["academic_year"];
	
	
	
	
	
	
	$sql="insert into leave_appli (first_name,admission_no,reason,from_date,to_date,details,applied_date,class,academic_year) values('$first_name','$admission_no','$reason','$from_date','$to_date','$details','$today','$present_class','$cur_academic_year')";
	
	
	if ($conn->query($sql) === TRUE) 
	{
		echo "success";
	header("Location:leave_sms.php?first_name=".$first_name."&admission_no=".$admission_no."&present_class=".$present_class);
	//header("Location:index.php?success=.'success'");


	} 
	else 
	{
				
	header("Location:index.php?failed=.'failed'");	
		
	}


}

	}else{
		header("Location:login.php");
	}
	
?>