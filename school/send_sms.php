<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
//$dest_mobileno=$_GET['mob'];

$f1=$_GET['first_name'];
$f2=$_GET['class_join'];
$f3=$_GET['join_date'];
$f4="8277021524";
$roll_no=$_GET['roll_no'];
$mob_number=$_GET['parent_contact'];

//require("sms.php");
/*///////////////////////////////////////// sms start/////////////////////////////////////////////////*/
			
//API Details
$username ="ma.musthafa6@gmail.com";
$password ="ajmal524";
$approved_senderid="SCHOOL";


$message="Dear Parents , Your son/daughter ".$f1." has been successfully admitted to the class ".$f2." on date ".$f3.". If you have any query please call ".$f4.".";
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
header("Location:all_students.php?success=.'success'");
}



?>





