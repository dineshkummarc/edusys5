<?php

session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{

require("connection.php");
if(isset($_POST["remarks"]))
{
	
	$first_name=$_POST["first_name"];
	$roll_no=$_POST["roll_no"];
	$remarks_title=$_POST["remark_title"];
	$remarks_desc=$_POST["remark_desc"];
	$remarks_date=$_POST["remark_date"];
	$present_class=$_POST["present_class"];
	$section=$_POST["section"];
	
	$sql="insert into remarks (first_name,roll_no,present_class,section,remarks_title,remarks_desc,remarks_date) values('$first_name','$roll_no','$present_class','$section','$remarks_title','$remarks_desc','$remarks_date')";
	
	
	if ($conn->query($sql) === TRUE) 
	{
		
	
	header("Location:add_remarks.php?success=.'success'");


	} 
	else 
	{
	var_dump($sql);			
	//header("Location:add_remarks.php?failed=.'failed'");	
		
	}
    }

	}else{
		header("Location:login.php");
	}
	
?>