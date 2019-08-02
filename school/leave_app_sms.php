<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
date_default_timezone_set("Asia/Kolkata");
$today_date=date("Y-m-d");

$action=$_GET["status"];
$first_name=$_GET["first_name"];
$admission_no=$_GET["admission_no"];
$rej_reason=$_GET["rej_reason"];
$from_date=$_GET["from_date"];
$to_date=$_GET["to_date"];

$sql_leave="insert into leave_reply (first_name,roll_no,action,details,from_date,to_date,academic_year) values('$first_name','$admission_no','$action','$rej_reason','$from_date','$to_date','$cur_academic_year')";
$conn->query($sql_leave);

$sql="select distinct parent_contact,admission_no,section from students where academic_year='".$cur_academic_year."' and first_name='".$first_name."' and  admission_no='".$admission_no."'";	
$result=mysqli_query($conn,$sql);

	$sql_sch = "SELECT * FROM school_det ORDER BY ID DESC LIMIT 1";
	$result_sch=mysqli_query($conn,$sql_sch);
	if($row_sch=mysqli_fetch_array($result_sch,MYSQLI_ASSOC))
	{
		$sch_name=$row_sch["sch_name"];
		$approved_senderid=$row_sch["sender_id"];
		$phone=$row_sch["phone"];
	}
	
	$message_detail="Your leave application is ".$action.", call for more info ".$phone  ;
	echo $message_detail;
	
	foreach($result as $value)
	{
	$mob_number=$value["parent_contact"];
	$message = "Dear parents, ".$message_detail."-".$sch_name;
	require("sms_gateway.php");
	}
header("Location:send_leave.php?success=success");

}
?>