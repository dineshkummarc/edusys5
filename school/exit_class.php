<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$count = test_input($_GET["count"]);
	echo $count;
    for($i=0;$i<$count;$i++){
	
	
	$first_name = test_input($_POST["first_name"][$i]);
	$roll_no = test_input($_POST["roll_no"][$i]);
	$present_class = test_input($_POST["present_class"][$i]);
	$academic_year = test_input($_POST["academic_year"][$i]);
	$taken_by = test_input($_POST["taken_by"][$i]);
	
	


	
	$sql_contact="select parent_contact,first_name,roll_no from attendance where first_name='".$first_name."' and roll_no='".$roll_no."' and present_class='".$present_class."' and academic_year='".$cur_academic_year."'";
	$result_contact=mysqli_query($conn,$sql_contact);
	if($row_contact=mysqli_fetch_array($result_contact,MYSQLI_ASSOC))
	{
		$mob_number=$row_contact["parent_contact"];
		$name=$row_contact["first_name"];
	}
	

	/////////////////////////////////////////////////////////////////////////////////////////////////////////
	

$today_date=date('d-m-Y');



/*///////////////////////////////////////// sms start/////////////////////////////////////////////////*/
			
//API Details
$username ="ma.musthafa6@gmail.com";
$password ="ajmal524";
$approved_senderid="SCHOOL";


$message="Dear parents, todays class is over, ".$name." is about to exit from the classroom now. Dated ".$today_date;


if($mob_number!="null"){
/*
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
*/
}			

}
	header("Location:index.php?success=.'success'");		
	}

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?> 