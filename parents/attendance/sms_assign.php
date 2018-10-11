<?php
require("connection.php");
error_reporting("0");

$present_class=$_GET["class"];
$sql="select first_name,parent_contact,present_class from students where present_class='".$present_class."'";
$result=mysqli_query($conn,$sql);


foreach($result as $value)
  {
	$mob_number=$value["parent_contact"];
	$f1=$value["first_name"];
	$f2=$_GET["assign_title"];
    $f3=$_GET["assign_date"];
	
/*///////////////////////////////////////// sms start/////////////////////////////////////////////////*/
			
//API Details
$username ="ma.musthafa6@gmail.com";
$password ="ajmal524";
//$mob_number="8277021524";
// Sender ID
//Add a comment to this line
$approved_senderid="SMSIND";

$message="SCHOOL, Dear ".$f1.", todays assignment is ".$f2.". Submit on ".$f3;

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
}
  
  
header("Location:index.php?success=.'success'");

?>