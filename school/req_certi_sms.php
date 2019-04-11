<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
date_default_timezone_set("Asia/Kolkata");
$today_date=date("Y-m-d");

$first_name=$_POST["first_name"];
$admission_no=$_POST["admission_no"];
$id=$_POST["id"];
$collect_date=$_POST["collect_date"];
$status=$_POST["status"];

$sql_insert="insert into certificate_status (first_name,roll_no,certi_id,status_send_date,status,academic_year) values('$first_name','$admission_no','$id','$today_date','sent','$cur_academic_year')";
$conn->query($sql_insert);

$sql="select distinct parent_contact from students where academic_year='".$cur_academic_year."' and first_name='".$first_name."' and  admission_no='".$admission_no."'";	
$result=mysqli_query($conn,$sql);

	$sql_sch = "SELECT * FROM school_det ORDER BY ID DESC LIMIT 1";
	$result_sch=mysqli_query($conn,$sql_sch);
	if($row_sch=mysqli_fetch_array($result_sch,MYSQLI_ASSOC))
	{
		$sch_name=$row_sch["sch_name"];
		$approved_senderid=$row_sch["sender_id"];
		$phone=$row_sch["phone"];
	}
	
	if($status=="approved"){
	$message_detail="Collect your requested certificate on ".$collect_date.", call for more info ".$phone;	
		}else if($status=="rejected"){
	$message_detail="Certificate request is rejected, contact office on ".$phone;	
		}
		
	foreach($result as $value)
	{
	$mob_number=$value["parent_contact"];
	$sms = urlencode(htmlspecialchars("Dear parents, ".$message_detail."-".$sch_name));
	require("sms_gateway.php");
	}
header("Location:req_certificates.php?success=.'success'");

}
?>