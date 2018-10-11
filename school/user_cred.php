<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
//error_reporting("0");
$today_date=date("Y-m-d");
$meeting_class=$_POST["filt_class"];
$section=$_POST["section"];
//$message_detail=$_POST["message_detail"];


$sql="select first_name,roll_no,parent_contact,present_class,section from students where academic_year='".$cur_academic_year."' and present_class='".$meeting_class."' and  section='".$section."'";	


$result=mysqli_query($conn,$sql);
var_dump($sql);
/////////////////////////////////START SCHOOL DETAILS ////////////////////////////////////////
	
	$sql_sch = "SELECT * FROM school_det ORDER BY ID DESC LIMIT 1";
	$result_sch=mysqli_query($conn,$sql_sch);
	if($row_sch=mysqli_fetch_array($result_sch,MYSQLI_ASSOC))
	{
		$sch_name=$row_sch["sch_name"];
		
		$approved_senderid=$row_sch["sender_id"];
		
		$sch_detail=$row_sch['sch_name']." ".$row_sch['location'];
	}
	///////////////////////////////// END SCHOOL DETAILS ///////////////////////////////////////////


foreach($result as $value)
  {
	  $first_name=$value["first_name"];
	  $roll_no=$value["roll_no"];
	$mob_number=$value["parent_contact"];
	$message_detail="username = ".$first_name." and password = ".$roll_no;

$username ="ma.musthafa6@gmail.com";
$password ="ajmal524";
$message="Dear parents, ".$message_detail." - ".$sch_name;
echo $message;
echo "<br>";
$enc_msg= rawurlencode($message); // Encoded message

$fullapiurl="http://smsc.biz/httpapi/send?username=$username&password=$password&sender_id=$approved_senderid&route=T&phonenumber=$mob_number&message=$enc_msg";
$ch = curl_init($fullapiurl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch); 
curl_close($ch);

//echo "<p>SMS Request Sent - Message id - $result </p>";
}
header("Location:send_noti.php?success=.'success'");
}

?>