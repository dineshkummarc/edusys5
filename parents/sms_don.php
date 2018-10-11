<?php
require("connection.php");
error_reporting("0");

$tempid=54441;
$f1=$_GET["name"];
$f2=$_GET["amount"];
$f3=$_GET["rec_no"];
$f4=$_GET["rec_date"];
$mob_number=$_GET["mob"];

/*///////////////////////////////////////// sms start/////////////////////////////////////////////////*/
$username ="ma.musthafa6@gmail.com";
$password ="ajmal524";
$approved_senderid="SCHOOL";

$message="SCHOOL, Thank you ".$f1.". Your donation amount Rs.".$f2." has been received.Receipt no is ".$f3." and receipt date is ".$f4.".";


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
header("Location:all_donation.php?success=.'success'");

?>