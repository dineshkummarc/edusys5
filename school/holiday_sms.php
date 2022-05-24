<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
///////////////////////////////////////////// Holiday SMS ////////////////////////////////////////////////
if(isset($_POST["holiday_sms"]))
{
	require("connection.php");
	$meeting_type = test_input($_POST["meeting_type"]);
	$meeting_class = test_input($_POST["meeting_class"]);
	$section = test_input($_POST["section"]);
	$holiday_name = test_input($_POST["holiday_name"]);
	$holiday_date = test_input($_POST["holiday_date"]);
	
	/////////////////////////////////START SCHOOL DETAILS ////////////////////////////////////////
	
	$sql_sch = "SELECT * FROM school_det where academic_year='".$cur_academic_year."' ORDER BY ID DESC LIMIT 1";
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
	if($_POST["meeting_class"]=="all"){
	$sql_holiday="select first_name,parent_contact from students where academic_year='".$cur_academic_year."'";	
	echo "all parents";
	}else{
	$sql_holiday="select first_name,parent_contact from students where academic_year='".$cur_academic_year."' and present_class='".$meeting_class."' and section='".$section."'";	
	echo "particular parents";
	}
	
	
	$result_holiday=mysqli_query($conn,$sql_holiday);

	foreach($result_holiday as $value_holi)
  {
	$mob_number=$value_holi["parent_contact"];
	//API Details
    $username ="ma.musthafa6@gmail.com";
     $password ="ajmal524";
     //$approved_senderid="$sender_id";
	 //echo $approved_senderid;
	 
	

$message="Dear Parent, ".$holiday_date." will be holiday on occasion of ".$holiday_name." -".$sch_detail;
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

  
//header("Location:send_noti.php?success=.'success'");
}
	
///////////////////////////////////////////// Holiday SMS ////////////////////////////////////////////////	
	
}
	

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}