<?php
//$dest_mobileno=$_GET['mob'];
require("connection.php");
$f1=$_GET['name'];
$f2=$_GET['tot_paid'];
$f3=$_GET['rec_no'];
$f4=$_GET['rec_date'];
$roll_no=$_GET['roll_no'];

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

$sql="select parent_contact from students where first_name='".$f1."' and roll_no='".$roll_no."'";
$result=mysqli_query($conn,$sql);
if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$mob_number=$row["parent_contact"];
	}

//require("sms.php");
/*///////////////////////////////////////// sms start/////////////////////////////////////////////////*/
			
//API Details
$username ="ma.musthafa6@gmail.com";
$password ="ajmal524";
//$approved_senderid="SCHOOL";

$message="SCHOOL, Thank you ".$f1.". Your fee amount Rs.".$f2." has been received.Receipt no is ".$f3." and receipt date is ".$f4.".";
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
			
/*///////////////////////////////////////////////// sms end/////////////////////////////////////////////////////////////*/
header("Location:paid_fee_details.php?success=.'success'");




?>