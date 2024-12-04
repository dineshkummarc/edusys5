<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
//require("header.php");
require("connection.php");

if($_SERVER['REQUEST_METHOD']=="POST")
{
	$subject = mysqli_real_escape_string($conn, $_POST["subject"]);
	$details = mysqli_real_escape_string($conn, $_POST["message"]);
  $student_id = $_POST["student_id"];	
	
	$sql="insert into individual_notifications (title,details,student_id,academic_year,indi_viewed) values('$subject','$details','$student_id','$cur_academic_year','False')";
  //$conn->query($sql);
  //var_dump($sql);
	   
	if ($conn->query($sql) === TRUE) 
	{
    header("Location:description.php?id=".$student_id);
	} 
	else 
	{			
	header("Location:send_individual_noti.php?failed=.'failed'");		
	}
}


}else{
	header("Location:login.php");
}
	
?>