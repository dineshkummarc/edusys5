<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
///////////////////////////////////////////// Holiday SMS ////////////////////////////////////////////////
	if(isset($_POST["own_sms"]))
	{
	require("connection.php");
	
	
	$message_details = test_input($_POST["desc_sms"]);
	$filt_class = test_input($_POST["filt_class"]);
	$section = test_input($_POST["section"]);
	
	$sql_sch = "SELECT * FROM school_det ORDER BY ID DESC LIMIT 1";
	$result_sch=mysqli_query($conn,$sql_sch);
	if($row_sch=mysqli_fetch_array($result_sch,MYSQLI_ASSOC))
	{
	$sch_name=$row_sch["sch_name"];
	//$approved_senderid=$row_sch["sender_id"];
	$approved_senderid="JNODYA";
	
	$sql="select distinct parent_contact from students where academic_year='".$cur_academic_year."' and present_class='".$filt_class."' and  section='".$section."'";	
	$result=mysqli_query($conn,$sql);
	
	foreach($result as $value)
	{
	$mob_number = $value["parent_contact"];
	//$mob_number = "8277021524";
	$message_temp="Dear parents, ".$message_details."-".$sch_name;

	//YOUR_MESSAGE_CONTENT_IN_REGIONAL_LANGUAGE_HERE
	$UTF16BE_chars = convertCharsn(html_entity_decode($message_temp, ENT_QUOTES | 'ENT_HTML401', 'UTF-8'));
	//echo $UTF16BE_chars;
	 
	//API Details
	$username ="ma.musthafa6@gmail.com";
	
	//$password = "B826377gs256h62@02_15";
	

	$message = $UTF16BE_chars;
	$enc_msg= rawurlencode($message); // Encoded message
	$fullapiurl="http://smsc.biz/httpapi/send?api_key=2aad82f308626195f7a355215f123073&to=$mob_number&sender=".$approved_senderid."&route=T&type=2&message=$enc_msg";

	//Call API
	$ch = curl_init($fullapiurl);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch);
	//echo $result ; // For Report or Code Check
	curl_close($ch);
	//echo "<p>SMS Request Sent - Message id - $result </p>"; 
}
}
}
	header("Location:send_noti.php?success=.'success'");
}

////////////////////////////  Functions /////////////////////////////////////////////
	function convertCharsn($string) {
		$in = '';
		$out = iconv('UTF-8', 'UTF-16BE', $string);
		for($i=0; $i<strlen($out); $i++) {
		$in .= sprintf("%02X", ord($out[$i]));
		}
		return $in;
	}
		
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}