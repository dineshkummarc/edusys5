<?php
require("connection.php");
//error_reporting("0");
date_default_timezone_set("Asia/Kolkata");
$today_date=date("Y-m-d");


$action=$_GET["status"];
$first_name=$_GET["first_name"];
$admission_no=$_GET["admission_no"];
$rej_reason=$_GET["rej_reason"];
$sql_leave="insert into leave_reply (first_name,roll_no,action,details,rep_date) values('$first_name','$admission_no','$action','$rej_reason','$today_date')";
$conn->query($sql_leave);

$sql="select distinct parent_contact,admission_no,section from students where first_name='".$first_name."' and  admission_no='".$admission_no."'";	


$result=mysqli_query($conn,$sql);
var_dump($sql);
/////////////////////////////////START SCHOOL DETAILS ////////////////////////////////////////
	
	$sql_sch = "SELECT * FROM school_det ORDER BY ID DESC LIMIT 1";
	$result_sch=mysqli_query($conn,$sql_sch);
	if($row_sch=mysqli_fetch_array($result_sch,MYSQLI_ASSOC))
	{
		$sch_name=$row_sch["sch_name"];
		$approved_senderid=$row_sch["sender_id"];
		$phone=$row_sch["phone"];
		
		
	}
	///////////////////////////////// END SCHOOL DETAILS ///////////////////////////////////////////
$message_detail="Your leave application is ".$action.", call for more info ".$phone  ;

foreach($result as $value)
  {
	$mob_number=$value["parent_contact"];
	
//API Details
$username ="ma.musthafa6@gmail.com";
$password ="ajmal524";
//$approved_senderid="SCHOOL";

$message="Dear parents, ".$message_detail."-".$sch_name;
$enc_msg= rawurlencode($message); // Encoded message

$fullapiurl="http://smsc.biz/httpapi/send?username=$username&password=$password&sender_id=$approved_senderid&route=T&phonenumber=$mob_number&message=$enc_msg";
$ch = curl_init($fullapiurl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch); 
curl_close($ch);

echo "<p>SMS Request Sent - Message id - $result </p>";

//echo "success<br>";
	

}
header("Location:send_leave.php?success=.'success'");


?>