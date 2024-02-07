<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");

	
	$route_name=$_POST["route_name"];
	$stage_name=$_POST["stage_name"];
	$present_class=$_POST["present_class"];
	$section=$_POST["section"];
	$id=$_POST["id"];

	
	$sql="update route_students set route_name='".$route_name."',stage_name='".$stage_name."' where  id='".$id."'";
	
	
	if ($conn->query($sql) === TRUE) 
	{
		echo "success";
	
	header("Location:route_students.php?success=.'success'");


	} 
	else 
	{
				
	header("Location:route_students.php?failed=.'failed'");	
		
	}




}else{
		header("Location:login.php");
	}
	

?>