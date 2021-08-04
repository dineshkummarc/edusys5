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
	$id=$_POST["id"];
	$academic_year=$_POST["academic_year"];
	$user_access=$_POST["user_access"];	

	$options = ['cost' => 12];
	$secure = password_hash($password, PASSWORD_DEFAULT, $options);	
	
	$sql="update ad_members set username='".$user_name."',log_pas='".$secure."',user_access='".$user_access."',academic_year='".$academic_year."' where  id='".$id."'";	
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