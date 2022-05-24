<?php
///////////////////////////////////////////// Holiday SMS ////////////////////////////////////////////////
if(isset($_POST["own_sms"]))
{
	require("connection.php");
	$meeting_type = test_input($_POST["meeting_type"]);
	$class = test_input($_POST["meeting_class"]);
	
	

	if($class=="all"){
	$sql_holiday="select parent_contact from students";	
	
	}else if($class!="all"){
	$sql_holiday="select parent_contact from students where present_class='".$class."'";

	}
	
	$result_holiday=mysqli_query($conn,$sql_holiday);
	foreach($result_holiday as $value_holi)
  {
	$mob_number=$value_holi["parent_contact"];
	//API Details
    $username ="ma.musthafa6@gmail.com";
     $password ="ajmal524";
     //$approved_senderid="$sender_id";
	 $approved_senderid="PROMOTIONAL";
	 //echo $approved_senderid;
	 
	 $str=$_POST["desc_sms"];
	$message = mb_convert_encoding($str, "UTF-8", "UTF-16BE");
     echo $str;

    $enc_msg= rawurlencode($message); // Encoded message

$fullapiurl="http://smsc.biz/httpapi/send?username=$username&password=$password&sender_id=$approved_senderid&route=P&phonenumber=$mob_number&message=$enc_msg&type=2";


$ch = curl_init($fullapiurl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch); 
curl_close($ch);
echo "<p>SMS Request Sent - Message id - $result </p>";
	

}
  
//header("Location:send_noti.php?success=.'success'");
}
	
///////////////////////////////////////////// Holiday SMS ////////////////////////////////////////////////	
	

	

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}