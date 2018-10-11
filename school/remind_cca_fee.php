<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

require("connection.php");
$sql_det="select sch_name from school_det order by id desc limit 1";
$result_det=mysqli_query($conn,$sql_det);
if($row_det=mysqli_fetch_array($result_det,MYSQLI_ASSOC))
{
$school_name=$row_det["sch_name"];
$approved_senderid=$row_det["sender_id"];

}


$sql="select * from students where academic_year='".$cur_academic_year."' and tot_cca_paid < tot_cca_fee";
$result=mysqli_query($conn,$sql);
//var_dump($sql);
foreach($result as $row){
	$tot_fee=$row["tot_cca_fee"];
	$tot_paid=$row["tot_cca_paid"];
	$balance=$tot_fee-$tot_paid;
	$mob_number=$row["parent_contact"];
	
$username ="ma.musthafa6@gmail.com";
$password ="ajmal524";
//$approved_senderid="SCHOOL";

$message='Dear parent, you are requested to pay the school fee of Rs '.$balance.' as soon as possible.Ignore if already paid-'.$school_name;

$mob_number=$row["parent_contact"];
	if($mob_number!="null"){
/*
$enc_msg= rawurlencode($message); // Encoded message
$fullapiurl="http://smsc.biz/httpapi/send?username=$username&password=$password&sender_id=$approved_senderid&route=T&phonenumber=$mob_number&message=$enc_msg";
$ch = curl_init($fullapiurl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch); 
//echo $result ; // For Report or Code Check
curl_close($ch);

echo "<p>SMS Request Sent - Message id - $result </p>";
*/
echo $message."<br>";  
 }

  }
  
   header("Location:index.php?success=.'success'");
		
}
else
{
header("Location:login.php");
}
?>  