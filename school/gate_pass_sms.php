<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
//error_reporting("0");
$today_date=date("Y-m-d");
$first_name=$_GET["first_name"];
$roll_no=$_GET["roll_no"];
$gate_reason=$_GET["gate_reason"];
$gate_with=$_GET["gate_with"];
$gate_permit_go=$_GET["gate_permit_go"];
$mob_number=$_GET["parent_contact"];



/////////////////////////////////START SCHOOL DETAILS ////////////////////////////////////////
	
	$sql_sch = "SELECT * FROM school_det ORDER BY ID DESC LIMIT 1";
	$result_sch=mysqli_query($conn,$sql_sch);
	if($row_sch=mysqli_fetch_array($result_sch,MYSQLI_ASSOC))
	{
		$sch_name=$row_sch["sch_name"];
		$phone=$row_sch["phone"];
		
		$approved_senderid=$row_sch["sender_id"];
		
		$sch_detail=$row_sch['sch_name']." ".$row_sch['location'];
	}
	$message_detail="Gate pass: reason-".$gate_reason.", Permitted to go-".$gate_permit_go.", with-".$gate_with.".Call for more info ".$phone;
	///////////////////////////////// END SCHOOL DETAILS 
	

//API Details
$username ="ma.musthafa6@gmail.com";
$password ="ajmal524";
//$approved_senderid="SCHOOL";

$message="Dear parents, ".$message_detail."-".$sch_name;
//echo strlen($message);
$enc_msg= rawurlencode($message); // Encoded message

$fullapiurl="http://smsc.biz/httpapi/send?username=$username&password=$password&sender_id=$approved_senderid&route=T&phonenumber=$mob_number&message=$enc_msg";
$ch = curl_init($fullapiurl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch); 
curl_close($ch);

echo "<p>SMS Request Sent - Message id - $result </p>";

//echo "success<br>";

header("Location:gate_pass.php?success=.'success'");

}
?>