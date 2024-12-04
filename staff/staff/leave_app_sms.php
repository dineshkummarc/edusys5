<?php
session_start();
if(isset($_SESSION['staff_uname'])&&!empty($_SESSION['staff_pass'])&&!empty($_SESSION['admin_id'])&&!empty($_SESSION['staff_academic_year']))
{
$cur_academic_year = $_SESSION['staff_academic_year'];
$admin_id=$_SESSION['admin_id'];
$staff_uname=$_SESSION['staff_uname'];
$staff_pass=$_SESSION['staff_pass'];

require("connection.php");
date_default_timezone_set("Asia/Kolkata");
$today_date=date("Y-m-d");

$action=$_GET["status"];
$rej_reason=$_GET["rej_reason"];

$read_status='viewed';
$id=$_GET["id"];
$student_id=$_GET["student_id"];



$sql_status = "UPDATE leave_appli SET status='".$read_status."', leave_status='".$action."' where id='".$id."'";
$conn->query($sql_status);

$sql="select distinct parent_contact from students where academic_year='".$cur_academic_year."' and student_id='".$student_id."'";	
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
header("Location:leave_applications.php?success=success");

}
?>