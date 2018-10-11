<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
ob_start();
require("connection.php");
//error_reporting("0");
date_default_timezone_set("Asia/Kolkata");
$today_date=date("Y-m-d");

$academic_year=$_GET['academic_year'];

$sql="select first_fname,attendance,att_date from fac_attendance where academic_year='".$cur_academic_year."' and att_date='".$today_date."' and attendance='Absent'";

$result=mysqli_query($conn,$sql);
var_dump($sql);

/////////////////////////////////START SCHOOL DETAILS ////////////////////////////////////////
	
	$sql_sch = "SELECT * FROM school_det ORDER BY ID DESC LIMIT 1";
	$result_sch=mysqli_query($conn,$sql_sch);
	if($row_sch=mysqli_fetch_array($result_sch,MYSQLI_ASSOC))
	{
		$sch_name=$row_sch["sch_name"];
		$location=$row_sch["location"];
		$mob_number=$row_sch["mob"];
		$approved_senderid=$row_sch["sender_id"];
		//$approved_senderid="SCHOOL";
		
		$sch_detail=$row_sch['sch_name']." ".$row_sch['location'];
	}
	///////////////////////////////// END SCHOOL DETAILS ///////////////////////////////////////////

foreach($result as $value)
  { 
  	$message_detail=$value["first_fname"]." is absent from school today ".$value["att_date"];
	$f1=$value["first_fname"];
	$f2=$value["att_date"];
	$f3=$value["attendance"];
	//$f4="8277021524";

	//API Details
$username ="ma.musthafa6@gmail.com";
$password ="ajmal524";

	$message="Dear member, ".$message_detail."-".$sch_name;
	


//$mob_number="8289887668";sea phone no
//$mob_number="8277021524";
	if($mob_number!="null"){
		echo $message."<br>";

$enc_msg= rawurlencode($message); // Encoded message
//Create API URL
$fullapiurl="http://smsc.biz/httpapi/send?username=$username&password=$password&sender_id=$approved_senderid&route=T&phonenumber=$mob_number&message=$enc_msg";

//Call API
$ch = curl_init($fullapiurl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch); 
//echo $result ; // For Report or Code Check
curl_close($ch);
echo "<p>SMS Request Sent - Message id - $result </p>";

 }

  }
  
   header("Location:index.php?success=.'success'");
  
}
