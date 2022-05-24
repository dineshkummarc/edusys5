<?php
session_start();
if (isset($_SESSION['parents_uname']) && !empty($_SESSION['parents_pass']) && !empty($_SESSION['parents_class']) && !empty($_SESSION['student_id']) && !empty($_SESSION['academic_year'])) 
{
$student_id=$_SESSION['student_id'];
$cur_academic_year = $_SESSION['academic_year'];

require("connection.php");
$field1="Leave Application";
$first_name = $_SESSION['parents_uname'];
$present_class = $_SESSION['parents_class'];

$field2 = $first_name." , ".$present_class;
$username ="ma.musthafa6@gmail.com";
$password ="ajmal524";

/////////////////////////////////START SCHOOL DETAILS ////////////////////////////////////////
	
	$sql_sch = "SELECT * FROM school_det ORDER BY ID DESC LIMIT 1";
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

	$sql = "SELECT parent_contact FROM faculty where class_teach='".$present_class."' ORDER BY fac_id DESC LIMIT 1";
	$result=mysqli_query($conn,$sql);
	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$mob_number=$row["parent_contact"];
	}

	///////////////////////////////// END SCHOOL DETAILS ///////////////////////////////////////////

$message="Dear staff, you have a new ".$field1." from ".$field2;
if($mob_number!="null"){

$enc_msg= rawurlencode($message); // Encoded message
//Create API URL
$fullapiurl="http://smsc.biz/httpapi/send?username=$username&password=$password&sender_id=$approved_senderid&route=T&phonenumber=$mob_number&message=$enc_msg";

//Call API
$ch = curl_init($fullapiurl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch); 
curl_close($ch);
echo "<p>SMS Request Sent - Message id - $result </p>";
  
 }
header("Location:apply_leave.php?success=.'success'");
  
}
