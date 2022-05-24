<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
//error_reporting("0");
$id=$_GET["id"];
$sql="select * from gate_pass where id ='".$id."'";
//var_dump($sql);
$result=mysqli_query($conn,$sql);
if($value=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
	$student_id = $value["student_id"];
	$gate_reason = $value["gate_reason"];
	$gate_permit_go = $value["gate_permit_go"];
	$gate_with = $value["gate_with"];
	$gate_reason = $value["gate_reason"];
}

	$sql_sch = "SELECT * FROM school_det ORDER BY ID DESC LIMIT 1";
	$result_sch=mysqli_query($conn,$sql_sch);
	if($row_sch=mysqli_fetch_array($result_sch,MYSQLI_ASSOC))
	{
		$sch_name=$row_sch["sch_name"];
		$phone=$row_sch["phone"];
		$approved_senderid=$row_sch["sender_id"];
		$sch_detail=$row_sch['sch_name']." ".$row_sch['location'];
	}
	//echo $student_id;

	$message_detail="Gate pass: reason-".$gate_reason.", Permitted to go-".$gate_permit_go.", with-".$gate_with.".Call for more info ".$phone;
	echo $message_detail;
	////////// END SCHOOL DETAILS 
	$sms = urlencode(htmlspecialchars("Dear parents, ".$message_detail."-".$sch_name));
	require("sms_gateway.php");
	header("Location:description.php?id=".$student_id);

}
?>