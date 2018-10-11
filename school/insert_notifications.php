<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

require("connection.php");
if(isset($_POST["notifications"]))
{
	
	
	$class=$_POST["class"];
	$notifi_title=$_POST["notifi_title"];
	$notifi_desc=$_POST["notifi_desc"];
	$notifi_date=$_POST["notifi_date"];
	
	$sql="insert into notifications (class,notifi_title,notifi_desc,notifi_date,academic_year) values('$class','$notifi_title','$notifi_desc','$notifi_date','$cur_academic_year')";
	
	
	if ($conn->query($sql) === TRUE) 
	{
	//header("Location:send_notifications.php?class=".$class."&notifi_title=".$notifi_title."&notifi_date=".$notifi_date);
	header("Location:send_notifications.php?success=.'success'");


	} 
	else 
	{
				
	header("Location:send_notifications.php?failed=.'failed'");	
		
	}
    }

	}else{
		header("Location:login.php");
	}
	
?>