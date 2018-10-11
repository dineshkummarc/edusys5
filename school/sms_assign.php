<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
error_reporting("0");

$present_class=$_GET["class"];
$sql="select first_name,parent_contact,present_class from students where academic_year='".$cur_academic_year."' and present_class='".$present_class."'";
$result=mysqli_query($conn,$sql);

///------------------------------------START SCHOOL DETAILS ----------------------------------------------------//
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
///---------------------------------- END SCHOOL DETAILS -------------------------------------------------------//


foreach($result as $value)
  {
	$mob_number=$value["parent_contact"];
	$f1=$value["first_name"];
	$f2=$_GET["assign_title"];
    $f3=$_GET["assign_date"];
	
/*///////////////////////////////////////// sms start/////////////////////////////////////////////////*/

$username ="ma.musthafa6@gmail.com";
$password ="ajmal524";

//$approved_senderid="SCHOOL";

$message="SCHOOL, Dear ".$f1.", todays assignment is ".$f2.". Submit on ".$f3;

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
header("Location:index.php?success=success");
}
?>