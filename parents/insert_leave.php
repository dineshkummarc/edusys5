<?php
session_start();
if (isset($_SESSION['parents_uname']) && !empty($_SESSION['parents_pass']) && !empty($_SESSION['parents_class']) && !empty($_SESSION['student_id']) && !empty($_SESSION['academic_year'])) 
{
$student_id=$_SESSION['student_id'];
$cur_academic_year = $_SESSION['academic_year'];
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
	
	
	$sql="insert into leave_appli (student_id,reason,from_date,to_date,details,academic_year,status) values('$student_id','$reason','$from_date','$to_date','$details','$cur_academic_year','Pending')";
	//var_dump($sql);
	
	if ($conn->query($sql) === TRUE) 
	{
	header("Location:leave_sms.php?student_id=".$student_id);
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