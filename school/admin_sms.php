<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
$message_detail=$_POST["message_detail"];

$sql="select distinct parent_contact from administration";	
$result=mysqli_query($conn,$sql);

	$sql_sch = "SELECT * FROM school_det ORDER BY ID DESC LIMIT 1";
	$result_sch=mysqli_query($conn,$sql_sch);
	if($row_sch=mysqli_fetch_array($result_sch,MYSQLI_ASSOC))
	{
		$sch_name=$row_sch["sch_name"];
		$approved_senderid=$row_sch["sender_id"];
	}
foreach($result as $value)
	{
	$mob_number=$value["parent_contact"];
	$message = "Dear member, ".$message_detail."-".$sch_name;
	require("sms_gateway.php");
	}
header("Location:send_noti.php?success=.'success'");
}

?>