<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
ob_start();
require("connection.php");
//error_reporting("0");
date_default_timezone_set("Asia/Kolkata");
$today_date=date("Y-m-d");

$student_id=$_GET["student_id"];
$academic_year=$_GET["academic_year"];
$present_class=$_GET["present_class"];

$sql_sch = "SELECT * FROM school_det  ORDER BY ID DESC LIMIT 1";
$result_sch=mysqli_query($conn,$sql_sch);
if($row_sch=mysqli_fetch_array($result_sch,MYSQLI_ASSOC))
{
	$sch_name=$row_sch["sch_name"];
	$location=$row_sch["location"];
	$f4=$row_sch["mob"];
	$approved_senderid=$row_sch["sender_id"];
	$sms_school_name=$row_sch["sms_school_name"];
	$username=$row_sch['username'];
	$password=$row_sch['user_id'];
}

$sql_attendance="select student_id,attendance,att_date from attendance where present_class='".$present_class."' and att_date='".$today_date."' and academic_year='".$cur_academic_year."' and attendance='Absent'";
//var_dump($sql_attendance);
$result_attendance=mysqli_query($conn,$sql_attendance);
foreach($result_attendance as $value)
  {
		
	$student_id = $value["student_id"];	
  $f2=$value["att_date"];
	$f3=$value["attendance"];

	$sql="select * from students where id='".$student_id."'";

	$result=mysqli_query($conn,$sql);
	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
	$present_class=$row["present_class"];
	$first_name=$row["first_name"];
	$roll_no=$row["roll_no"];
	$mob_number=$row["parent_contact"];
	}

if($mob_number!="null"){
	$message = "Dear parents, ".$first_name." is absent from school today (".$f2."). ".$sms_school_name;
	

	$subject = "Absent SMS";
	$sql_insert="insert into individual_notifications (title,details,student_id,academic_year,indi_viewed) values('$subject','$message','$student_id','$cur_academic_year','False')";
  $conn->query($sql_insert);
	
	require("sms_gateway.php");
}
}
header("Location:all_attendance.php?success=success");
}

