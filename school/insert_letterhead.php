<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

$date = date_default_timezone_set('Asia/Kolkata');
$today = date('Y-m-d');

require("connection.php");
if(isset($_POST["letterhead"]))
{
	
	$lh_title=$_POST["lh_title"];
	$lh_desc=$_POST["lh_desc"];
	
	$sql="insert into letterhead (lh_title,lh_desc,printed_date,academic_year) values('$lh_title','$lh_desc','$today','$cur_academic_year')";
	if ($conn->query($sql) === TRUE) 
	{
	
	header("Location:print_letterhead.php?success=.'success'");


	} 
	else 
	{
	//var_dump($sql);		
	header("Location:print_letterhead.php?failed=.'failed'");	
		
	}

}

}else{
		header("Location:login.php");
	}
	
?>