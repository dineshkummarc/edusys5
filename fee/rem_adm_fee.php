<?php
//$dest_mobileno=$_GET['mob'];
$f1=$_GET['name'];
$f2=$_GET['balance'];
$f3="03-03-2017";

//require("sms.php");
/*///////////////////////////////////////// sms start/////////////////////////////////////////////////*/
			
//API Details
$username ="ma.musthafa6@gmail.com";
$password ="ajmal524";
$mob_number="8277021524";
// Sender ID
//Add a comment to this line
$approved_senderid="SMSIND";
$message="SCHOOL, Dear ".$f1.", Your fee balance is Rs ".$f2.". Please pay as soon as possible.";

//Thanks #field1#, payment Rs #field2# has been recieved. Reciept no is #field3#, dated on #field4#- Mounathul Islam
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
header("Location:paid_adm_fee_details.php?success=.'success'");




?>