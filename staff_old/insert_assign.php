<?php
session_start();
if(isset($_SESSION['staff_uname'])&&!empty($_SESSION['staff_pass'])&&!empty($_SESSION['admin_id'])&&!empty($_SESSION['staff_academic_year']))
{
$cur_academic_year = $_SESSION['staff_academic_year'];
$admin_id=$_SESSION['admin_id'];
$staff_uname=$_SESSION['staff_uname'];
$staff_pass=$_SESSION['staff_pass'];

require("connection.php");
if(isset($_POST["assignment"]))
{
	
	
	$class=$_POST["class"];
	$section=$_POST["section"];
	//$assign_title=$_POST["assign_title"];
	//$assign_desc=$_POST["assign_desc"];
	$assign_title = mysqli_real_escape_string($conn, $_POST["assign_title"]);
	$assign_desc = mysqli_real_escape_string($conn, $_POST["assign_desc"]);
	
	
	$sql="insert into assign (class,section,assign_title,assign_desc,academic_year) values('$class','$section','$assign_title','$assign_desc','$cur_academic_year')";
	
	
	if ($conn->query($sql) === TRUE) 
	{
	header("Location:assignments.php?success=success");
	} 
	else 
	{
				
	header("Location:send_assign.php?failed=.'failed'");	
		
	}
    }

	}else{
		header("Location:login.php");
	}
	
?>