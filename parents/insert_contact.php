<?php
session_start();
if(isset($_SESSION['parents_uname'])&&!empty($_SESSION['parents_pass'])&&!empty($_SESSION['academic_year'])&&!empty($_SESSION['parents_class']))

{
$cur_academic_year=$_SESSION['academic_year'];
require("connection.php");
$date = date_default_timezone_set('Asia/Kolkata');
$today = date('Y-m-d');

if(isset($_POST["contact"]))
{
	
	
	$subject=$_POST["subject"];
	$message=$_POST["message"];
	$first_name=$_SESSION["parents_uname"];
	$admission_no=$_SESSION["parents_pass"];
	$class=$_SESSION["parents_class"];
	
	
	
	
	
	
	$sql="insert into contact_school (first_name,admission_no,subject,message,sent_date,academic_year) values('$first_name','$admission_no','$subject','$message','$today','$cur_academic_year')";

	
	if ($conn->query($sql) === TRUE) 
	{
		echo "success";
	
	header("Location:index.php?success=.'success'");


	} 
	else 
	{
	var_dump($sql);			
	//header("Location:index.php?failed=.'failed'");	
		
	}


}

	}else{
		header("Location:login.php");
	}
	
?>