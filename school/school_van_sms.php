<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
//error_reporting("0");
$today_date=date("Y-m-d");
$route_name=$_GET["route_name"];
//$stage_name=$_GET["stage_name"];
//and  b.stage_name='".$stage_name."'
$message_detail=$_GET["message_detail"];



$sql="select a.parent_contact,a.first_name,a.roll_no,b.first_name,b.roll_no,b.route_name,b.stage_name from students a,route_students b where b.route_name='".$route_name."'  and  a.first_name=b.first_name and  a.roll_no=b.roll_no and a.academic_year='".$cur_academic_year."'";	


$result=mysqli_query($conn,$sql);
var_dump($sql);
/////////////////////////////////START SCHOOL DETAILS ////////////////////////////////////////
	
	$sql_sch = "SELECT * FROM school_det ORDER BY ID DESC LIMIT 1";
	$result_sch=mysqli_query($conn,$sql_sch);
	if($row_sch=mysqli_fetch_array($result_sch,MYSQLI_ASSOC))
	{
		$sch_name=$row_sch["sch_name"];
		
		//$approved_senderid=$row_sch["sender_id"];
		
		$sch_detail=$row_sch['sch_name']." ".$row_sch['location'];
	}
	///////////////////////////////// END SCHOOL DETAILS ///////////////////////////////////////////


foreach($result as $value)
  {
	$mob_number=$value["parent_contact"];
	$first_name=$value["first_name"];
	
//API Details
$username ="ma.musthafa6@gmail.com";
$password ="ajmal524";
$approved_senderid="SCHOOL";

$message="Dear parents, ".$message_detail."-".$sch_name;

$enc_msg= rawurlencode($message); // Encoded message

$fullapiurl="http://smsc.biz/httpapi/send?username=$username&password=$password&sender_id=$approved_senderid&route=T&phonenumber=$mob_number&message=$enc_msg";
$ch = curl_init($fullapiurl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch); 
curl_close($ch);

echo "<p>SMS Request Sent - Message id - $result </p>";

	

}
header("Location:send_noti.php?success=.'success'");
}

?>