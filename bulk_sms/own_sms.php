<?php
///////////////////////////////////////////// Holiday SMS ////////////////////////////////////////////////
if(isset($_POST["own_sms"]))
{
	require("connection.php");
	$meeting_type = test_input($_POST["meeting_type"]);
	$class = test_input($_POST["meeting_class"]);
	$section = test_input($_POST["section"]);
	$unicode_chars = test_input($_POST["desc_sms"]);
	
	

	if($class=="all"){
	$sql_holiday="select parent_contact from students";	
	
	}else if($class!="all"){
	$sql_holiday="select parent_contact from students where present_class='".$class."' and section='".$section."'";

	}
	
	$result_holiday=mysqli_query($conn,$sql_holiday);
	foreach($result_holiday as $value_holi)
  {
	$mob_number=$value_holi["parent_contact"];

$UTF16BE_chars = convertCharsn(html_entity_decode($unicode_chars, ENT_QUOTES | 'ENT_HTML401', 'UTF-8'));

//API Details
$username ="ma.musthafa6@gmail.com";
$password ="ajmal524";
$approved_senderid="PROMOTIONAL";

//Approved Template
$message = $UTF16BE_chars;
$enc_msg= rawurlencode($message); // Encoded message

//Create API URL
$fullapiurl="http://smsc.biz/httpapi/send?username=$username&password=$password&sender_id=$approved_senderid&route=P&phonenumber=$mob_number&message=$enc_msg&type=2";
//Call API
$ch = curl_init($fullapiurl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch); 
//echo $result ; // For Report or Code Check
curl_close($ch);
echo "<p>SMS Request Sent - Message id - $result </p>";
//header("Location:send_noti.php?success=.'success'");
}
}
	

	
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