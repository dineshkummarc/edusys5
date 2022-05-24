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


$first_name=$_GET['first_name'];
$roll_no=$_GET['roll_no'];
$att_date=$_GET['att_date'];
$attendance=$_GET['attendance'];

$sql="select first_name,roll_no,att_date,parent_contact from attendance where first_name='".$first_name."' and roll_no='".$roll_no."' and academic_year='".$cur_academic_year."'";

$result=mysqli_query($conn,$sql);
var_dump($sql);

/////////////////////////////////START SCHOOL DETAILS ////////////////////////////////////////
	
	$sql_sch = "SELECT * FROM school_det where academic_year='".$cur_academic_year."'  ORDER BY ID DESC LIMIT 1";
	$result_sch=mysqli_query($conn,$sql_sch);
	if($row_sch=mysqli_fetch_array($result_sch,MYSQLI_ASSOC))
	{
		$sch_name=$row_sch["sch_name"];
		$location=$row_sch["location"];
		$f4=$row_sch["mob"];
		$approved_senderid=$row_sch["sender_id"];
		
		$sch_detail=$row_sch['sch_name']." ".$row_sch['location'];
	}
	///////////////////////////////// END SCHOOL DETAILS ///////////////////////////////////////////

if($value=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{ 
  	
	$f1=$value["first_name"];
	$f2=$value["att_date"];
	$f3=$value["attendance"];
	//$f4="8277021524";

	//API Details
$username ="ma.musthafa6@gmail.com";
$password ="ajmal524";

	if($attendance=="Present")
	{
		$message_detail=$first_name." has reached the Class Room now ";
	$message="Dear parents, ".$message_detail."-".$sch_name;	
	}
	else if($attendance=="Absent")
	{
	$message="Dear Parents, ".$f1." is absent from school today (".$f2."). If you are unaware of this, please contact the office on ".$f4;	
	}



	


$mob_number=$value["parent_contact"];
if($mob_number!="null"){

$enc_msg= rawurlencode($message); // Encoded message

$fullapiurl="http://smsc.biz/httpapi/send?username=$username&password=$password&sender_id=$approved_senderid&route=T&phonenumber=$mob_number&message=$enc_msg";

$ch = curl_init($fullapiurl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch); 
//echo $result ; // For Report or Code Check
curl_close($ch);

echo "<p>SMS Request Sent - Message id </p>";

 }

  }
  
   header("Location:attendance.php?success=.'success'");
}

