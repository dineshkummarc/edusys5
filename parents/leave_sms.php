<?php
$first_name=$_GET["first_name"];
$admission_no=$_GET["admission_no"];
$present_class=$_GET["present_class"];
$field1="Leave Application";
$field2=$_GET["first_name"].", ".$_GET["present_class"];

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
/////////////////////////////////START SCHOOL DETAILS ////////////////////////////////////////
	
	$sql = "SELECT parent_contact FROM faculty where class_teach='".$present_class."' ORDER BY ID DESC LIMIT 1";
	$result=mysqli_query($conn,$sql);
	if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$mob_number=$row["parent_contact"];
	}
	///////////////////////////////// END SCHOOL DETAILS ///////////////////////////////////////////

foreach($result as $value)
  { 
  	
	//API Details
$username ="ma.musthafa6@gmail.com";
$password ="ajmal524";
$message="Dear staff, you have a new ".$field1." from ".$field2;
if($mob_number!="null"){

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
  
   header("Location:apply_leave.php?success=.'success'");
  

