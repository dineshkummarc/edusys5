<?php
require("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if(isset($_POST["checked"])){
	$checkbox=$_POST["checkbox"];
	$meeting_name=$_POST["meeting_name"];
	$meeting_date=$_POST["meeting_date"];
	$meeting_time=$_POST["meeting_time"];
	$meeting_type="Parents";

	//print_r($checkbox);
	foreach($_POST["checkbox"] as $roll_no){
	
	$sql_contact="select parent_contact,first_name,roll_no from students where roll_no='".$roll_no."'";
	$result_contact=mysqli_query($conn,$sql_contact);
	if($row_contact=mysqli_fetch_array($result_contact,MYSQLI_ASSOC))
	{
		$mob_number=$row_contact["parent_contact"];
		$first_name=$row_contact["first_name"];
		echo $first_name." ".$mob_number;
		echo "<br>";
		
		
		$username ="ma.musthafa6@gmail.com";
        $password ="ajmal524";
        $approved_senderid="SCHOOL";

	     $message="Dear ".$meeting_type.", kindly attend the ".$meeting_name." meeting scheduled on ".$meeting_date." at ".$meeting_time;


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
	}
}

}
header("Location:send_noti.php");