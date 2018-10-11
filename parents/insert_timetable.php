<?php

session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{

require("connection.php");

$class=$_POST["class"];
$day=$_POST["day"];
$stream=$_POST["stream"];
$stream_combi=$_POST["stream_combi"];


$subject1=$_POST["subject1"];
$subject2=$_POST["subject2"];
$subject3=$_POST["subject3"];
$subject4=$_POST["subject4"];
$subject5=$_POST["subject5"];
$subject6=$_POST["subject6"];
$subject7=$_POST["subject7"];
$subject8=$_POST["subject8"];
$semester=$_POST["semester"];

	
	
$sql="insert into timetable (class,day,stream,stream_combi,subject1,subject2,subject3,subject4,subject5,subject6,subject7,subject8,semester) values('$class','$day','$stream','$stream_combi','$subject1','$subject2','$subject3','$subject4','$subject5','$subject6','$subject7','$subject8','$semester')";
       
	
	
	if ($conn->query($sql) === TRUE) 
	{
	
	header("Location:timetable.php?success_tt=.'success_tt'");


	} else{
	
	
	header("Location:timetable.php?failed_tt=.'failed_tt'");


	} 
	

	}else{
		header("Location:login.php");
	}
	


?>