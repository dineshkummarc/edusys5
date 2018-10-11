<?php

session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{

require("connection.php");
if(isset($_POST["holiday"]))
{
	
	
	$ho_date=$_POST["ho_date"];
	$ho_name=$_POST["ho_name"];
	$ho_details=$_POST["ho_details"];
	
	
	
	
	
	$sql="insert into holiday (ho_date,ho_name,ho_details) values('$ho_date','$ho_name','$ho_details')";
	
	
	if ($conn->query($sql) === TRUE) 
	{
		echo "success";
	
	header("Location:add_holiday.php?success=.'success'");


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