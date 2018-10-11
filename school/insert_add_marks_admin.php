<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

require("connection.php");
if(isset($_POST["marks_admin"]))
{
	$username=$_POST["username"];
	$log_pas=$_POST["log_pas"];
	$class=$_POST["class"];
	$section=$_POST["section"];
	$academic_year=$_POST["academic_year"];
	$email=$_POST["email"];
	
	
	$sql="insert into class_ad_members (username,log_pas,class_teach,section,academic_year,email) values('$username','$log_pas','$class','$section','$cur_academic_year','$email')";
	var_dump($sql);
	
	if ($conn->query($sql) === TRUE) 
	{
		echo "success";
	
	header("Location:add_marks_admin.php?success=.'success'");


	} 
	else 
	{
				
	header("Location:add_marks_admin.php?failed=.'failed'");	
		
	}


}

	}else{
		header("Location:login.php");
	}
	
?>