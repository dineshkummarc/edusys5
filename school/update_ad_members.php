<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

require("connection.php");
if(isset($_POST["admin"]))
{
	
	
	$user_name=$_POST["user_name"];
	$password=$_POST["password"];
	$user_access=$_POST["user_access"];
	$email=$_POST["email"];
	$id=$_POST["id"];
	
	$sql="update ad_members set username='".$user_name."',log_pas='".$password."',user_access='".$user_access."',email='".$email."' where  id='".$id."'";
	
	
	
	if ($conn->query($sql) === TRUE) 
	{
		echo "success";
	
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