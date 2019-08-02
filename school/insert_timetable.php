<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

require("connection.php");

$class=$_POST["class"];
$day=$_POST["day"];
$section=$_POST["section"];
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

	
	
$sql="insert into timetable (class,day,section,stream_combi,subject1,subject2,subject3,subject4,subject5,subject6,subject7,subject8,semester,academic_year) values('$class','$day','$section','$stream_combi','$subject1','$subject2','$subject3','$subject4','$subject5','$subject6','$subject7','$subject8','$semester','$cur_academic_year')";
       
	if ($conn->query($sql) === TRUE) 
	{
	header("Location:timetable.php?success_tt=.'success_tt'");
	} else{
	header("Location:timetable.php?failed_tt=.'failed_tt'");
	} 
}
else
{
header("Location:login.php");
}
	


?>