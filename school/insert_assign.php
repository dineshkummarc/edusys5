<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

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
	//header("Location:sms_assign.php?class=".$class."&assign_title=".$assign_title."&assign_date=".$assign_date);
	header("Location:index.php?success=success");

	} 
	else 
	{
				
	header("Location:add_holiday.php?failed=.'failed'");	
		
	}
    }

	}else{
		header("Location:login.php");
	}
	
?>