<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
ob_start();
require("connection.php");
date_default_timezone_set("Asia/Kolkata");
$today_date=date("Y-m-d");
$academic_year=$_GET['academic_year'];

$sql="select first_fname,attendance,att_date from fac_attendance where academic_year='".$cur_academic_year."' and att_date='".$today_date."' and attendance='Absent'";
$result=mysqli_query($conn,$sql);

	$sql_sch = "SELECT * FROM school_det ORDER BY ID DESC LIMIT 1";
	$result_sch=mysqli_query($conn,$sql_sch);
	if($row_sch=mysqli_fetch_array($result_sch,MYSQLI_ASSOC))
	{
		$sch_name=$row_sch["sch_name"];
		$location=$row_sch["location"];
		$mob_number=$row_sch["mob"];
		$approved_senderid=$row_sch["sender_id"];
		$sch_detail=$row_sch['sch_name']." ".$row_sch['location'];
	}

	foreach($result as $value)
		{ 
		$message_detail=$value["first_fname"]." is absent from school today ".$value["att_date"];
		$f1=$value["first_fname"];
		$f2=$value["att_date"];
		$f3=$value["attendance"];
		
		if($mob_number!="null"){
		$message = "Dear member, ".$message_detail."-".$sch_name;
		require("sms_gateway.php");
		}

		}
  
   header("Location:index.php?success=.'success'");
  }
