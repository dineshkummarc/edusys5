<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

require("connection.php");
if(isset($_POST["admin"]))
{
	$user_name=mysqli_real_escape_string($conn,$_POST["user_name"]);
	$password=mysqli_real_escape_string($conn,$_POST["password"]);
	$user_access=mysqli_real_escape_string($conn,$_POST["user_access"]);
	$academic_year=mysqli_real_escape_string($conn,$_POST["academic_year"]);
	//$email=mysqli_real_escape_string($conn,$_POST["email"]);
	

	$options = ['cost' => 12];
	$secure = password_hash($password, PASSWORD_DEFAULT, $options);

	
	$sql="insert into ad_members (username,log_pas,user_access,academic_year) values('$user_name','$secure','$user_access','$academic_year')";
	
	if ($conn->query($sql) === TRUE) 
	{
	header("Location:admins.php?success=.'success'");
	} 
	else 
	{
				
	header("Location:admins.php?failed=.'failed'");	
		
	}
}

	}else{
		header("Location:login.php");
	}
	
?>