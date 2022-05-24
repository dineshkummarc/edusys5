<?php
session_start();
if(isset($_SESSION['class_uname'])&&isset($_SESSION['class_pass'])&&isset($_SESSION['class'])&&isset($_SESSION['academic_year']))

{
ob_start();
require("connection.php");
//error_reporting("0");
date_default_timezone_set("Asia/Kolkata");
$today_date=date("Y-m-d");
$present_class=$_SESSION['class'];
$academic_year=$_SESSION['academic_year'];

$sql="select first_name,parent_contact,present_class,attendance,att_date from attendance where present_class='".$present_class."' and academic_year='".$academic_year."' and att_date='".$today_date."'";

$result=mysqli_query($conn,$sql);

foreach($result as $value)
  { 
  	
	$f1=$value["first_name"];
	$f2=$value["att_date"];
	$f3=$value["attendance"];
	$f4="8277021524";

	//API Details
$username ="ma.musthafa6@gmail.com";
$password ="ajmal524";

// Sender ID
//Add a comment to this line
$approved_senderid="SCHOOL";

if($f3=="Present"){
	$message="SCHOOL, Dear Parents, ".$f1." has reached school. Dated ".$f2;
}
else if($f3=="Absent")
{
	$message="Dear Parents, ".$f1." is absent from school today (".$f2."). If you are unaware of this, please contact the office on ".$f4;
}

$mob_number=$value["parent_contact"];
	if($mob_number!="null"){
/*
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
 */
 }

  }
   header("Location:index.php?success=.'success'");
  }

