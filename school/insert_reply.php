<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
$date = date_default_timezone_set('Asia/Kolkata');
$today = date('Y-m-d');

if(isset($_POST["contact"]))
{
	
	$subject = mysqli_real_escape_string($conn, $_POST["subject"]);
	$message = mysqli_real_escape_string($conn, $_POST["message"]);
	$message_id=$_POST["id"];
	$first_name=$_POST["first_name"];
	$admission_no=$_POST["admission_no"];
	
	
	$sql="insert into reply_messages (first_name,admission_no,subject,message,message_id,academic_year) values('$first_name','$admission_no','$subject','$message','$message_id','$cur_academic_year')";

	
	if ($conn->query($sql) === TRUE) 
	{
	
	header("Location:contact_school.php?success=.'success'");


	} 
	else 
	{		
	header("Location:contact_school.php?failed=.'failed'");	
		
	}


}

	}else{
		header("Location:login.php");
	}


	
?>