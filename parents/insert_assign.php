<?php

session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{

require("connection.php");
if(isset($_POST["assignment"]))
{
	
	
	$class=$_POST["class"];
	$assign_title=$_POST["assign_title"];
	$assign_desc=$_POST["assign_desc"];
	$assign_date=$_POST["assign_date"];
	
	$sql="insert into assign (class,assign_title,assign_desc,assign_date) values('$class','$assign_title','$assign_desc','$assign_date')";
	
	
	if ($conn->query($sql) === TRUE) 
	{
	header("Location:sms_assign.php?class=".$class."&assign_title=".$assign_title."&assign_date=".$assign_date);


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