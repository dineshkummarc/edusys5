<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
//error_reporting("0");
$today_date=date("Y-m-d");

$meeting_type=$_GET["meeting_type"];
$meeting_class=$_GET["meeting_class"];
$section=$_GET["section"];
$meeting_name=$_GET["meeting_name"];
$meeting_date=$_GET["meeting_date"];
$meeting_time=$_GET["meeting_time"];


if($meeting_type=="Parents")
{
	if($meeting_class=="all")
	{
		$sql="select parent_contact,present_class from students where academic_year='".$cur_academic_year."'";	
	}
	else
	{
		$sql="select parent_contact,present_class,section from students where academic_year='".$cur_academic_year."' and present_class='".$meeting_class."' and  section='".$section."'";	
    }
	}
	

else if($meeting_type=="Administrative members")
{
$sql="select parent_contact from administration where academic_year='".$cur_academic_year."'";		
}
else if($meeting_type=="Teachers")
{
	$sql="select parent_contact from faculty where academic_year='".$cur_academic_year."'";
}


$result=mysqli_query($conn,$sql);
var_dump($sql);
/////////////////////////////////START SCHOOL DETAILS ////////////////////////////////////////
	
	$sql_sch = "SELECT * FROM school_det ORDER BY ID DESC LIMIT 1";
	$result_sch=mysqli_query($conn,$sql_sch);
	if($row_sch=mysqli_fetch_array($result_sch,MYSQLI_ASSOC))
	{
		$sch_name=$row_sch["sch_name"];
		$location=$row_sch["location"];
		$city=$row_sch["city"];
		$approved_senderid=$row_sch["sender_id"];
		
		$sch_detail=$row_sch['sch_name']." ".$row_sch['location'];
	}
	///////////////////////////////// END SCHOOL DETAILS ///////////////////////////////////////////


foreach($result as $value)
  {
	$mob_number=$value["parent_contact"];
	
	
	

	
//API Details
$username ="ma.musthafa6@gmail.com";
$password ="ajmal524";
//$approved_senderid="SCHOOL";

	$message="Dear ".$meeting_type.", kindly attend the ".$meeting_name." meeting scheduled on ".$meeting_date." at ".$meeting_time;


$enc_msg= rawurlencode($message); // Encoded message

$fullapiurl="http://smsc.biz/httpapi/send?username=$username&password=$password&sender_id=$approved_senderid&route=T&phonenumber=$mob_number&message=$enc_msg";
$ch = curl_init($fullapiurl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch); 
curl_close($ch);

echo "<p>SMS Request Sent - Message id - $result </p>";

//echo "success<br>";
	

}
header("Location:send_noti.php?success=.'success'");
}
?>