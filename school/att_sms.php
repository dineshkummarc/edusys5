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
$present_class=$_GET['present_class'];
$academic_year=$_GET['academic_year'];

$sql="select first_name,parent_contact,present_class,attendance,att_date from attendance where present_class='".$present_class."' and att_date='".$today_date."' and academic_year='".$cur_academic_year."' and attendance='Absent'";

$result=mysqli_query($conn,$sql);
var_dump($sql);

/////////////////////////////////START SCHOOL DETAILS ////////////////////////////////////////
	
	$sql_sch = "SELECT * FROM school_det  ORDER BY ID DESC LIMIT 1";
	$result_sch=mysqli_query($conn,$sql_sch);
	if($row_sch=mysqli_fetch_array($result_sch,MYSQLI_ASSOC))
	{
		$sch_name=$row_sch["sch_name"];
		$location=$row_sch["location"];
		$f4=$row_sch["mob"];
		$approved_senderid=$row_sch["sender_id"];
		
		$sch_detail=$row_sch['sch_name']." ".$row_sch['location'];
	}
	///////////////////////////////// END SCHOOL DETAILS ///////////////////////////////////////////

foreach($result as $value)
  { 
  	
	$f1=$value["first_name"];
	$f2=$value["att_date"];
	$f3=$value["attendance"];
	$mob_number=$value["parent_contact"];

if($mob_number!="null"){
	
	
	 $message="Dear Parents, ".$f1." is absent from school today (".$f2."). If you are unaware of this, please contact the office on ".$f4;
	require("sms_gateway.php");
}
}
  header("Location:attendance.php?success=.'success'");
}

