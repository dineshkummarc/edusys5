<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
//error_reporting("0");
$today_date=date("Y-m-d");
$meeting_class=$_POST["filt_class"];


if(($_POST["section"])!="")
{
$section=$_POST["section"];		
}
else
{
$section="";
}


$message_detail=$_POST["message_detail"];


$sql="select distinct parent_contact,present_class,section from students where academic_year='".$cur_academic_year."' and present_class='".$meeting_class."' and  section='".$section."'";	
$result=mysqli_query($conn,$sql);
var_dump($sql);
/////////////////////////////////START SCHOOL DETAILS ////////////////////////////////////////
	
	$sql_sch = "SELECT * FROM school_det ORDER BY ID DESC LIMIT 1";
	$result_sch=mysqli_query($conn,$sql_sch);
	if($row_sch=mysqli_fetch_array($result_sch,MYSQLI_ASSOC))
	{
		$sch_name=$row_sch["sch_name"];
		
		$approved_senderid=$row_sch["sender_id"];
		
		$sch_detail=$row_sch['sch_name']." ".$row_sch['location'];
	}
	///////////////////////////////// END SCHOOL DETAILS ///////////////////////////////////////////


	 
	 $mob_number=$value["parent_contact"];
	 $message="Dear parents, ".$message_detail."-".$sch_name;
	require("sms_gateway.php");
	}
	
header("Location:send_noti.php?success=.'success'");
}

?>