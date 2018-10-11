<?php

session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{

$date = date_default_timezone_set('Asia/Kolkata');
$today = date('Y-m-d');

require("connection.php");
if(isset($_POST["letterhead"]))
{
	$lh_title=$_POST["lh_title"];
	$lh_desc=$_POST["lh_desc"];
	
	$sql="insert into letterhead (lh_title,lh_desc,printed_date) values('$lh_title','$lh_desc','$today')";
	if ($conn->query($sql) === TRUE) 
	{
	
	header("Location:print_letterhead.php?success=.'success'");


	} 
	else 
	{
			
	header("Location:print_letterhead.php?failed=.'failed'");	
		
	}

}

}else{
		header("Location:login.php");
	}
	
?>