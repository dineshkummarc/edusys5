<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
//error_reporting("0");
date_default_timezone_set("Asia/Kolkata");
$today_date=date("Y-m-d");



$first_name=$_POST["first_name"];
$admission_no=$_POST["admission_no"];
$id=$_POST["id"];
$collect_date=$_POST["collect_date"];
$status=$_POST["status"];

$sql_insert="insert into certificate_status (first_name,roll_no,certi_id,status_send_date,status,academic_year) values('$first_name','$admission_no','$id','$today_date','sent','$cur_academic_year')";
$conn->query($sql_insert);



$sql="select distinct parent_contact from students where academic_year='".$cur_academic_year."' and first_name='".$first_name."' and  admission_no='".$admission_no."'";	
$result=mysqli_query($conn,$sql);
//var_dump($sql);
/////////////////////////////////START SCHOOL DETAILS ////////////////////////////////////////
	
	$sql_sch = "SELECT * FROM school_det ORDER BY ID DESC LIMIT 1";
	$result_sch=mysqli_query($conn,$sql_sch);
	if($row_sch=mysqli_fetch_array($result_sch,MYSQLI_ASSOC))
	{
		$sch_name=$row_sch["sch_name"];
		$approved_senderid=$row_sch["sender_id"];
		$phone=$row_sch["phone"];
		
		
	}
	///////////////////////////////// END SCHOOL DETAILS ///////////////////////////////////////////
	if($status=="approved"){
	$message_detail="Collect your requested certificate on ".$collect_date.", call for more info ".$phone;	
		}else if($status=="rejected"){
	$message_detail="Certificate request is rejected, contact office on ".$phone;	
		}


foreach($result as $value)
  {
	$mob_number=$value["parent_contact"];
	

$username ="ma.musthafa6@gmail.com";
$password ="ajmal524";
$message="Dear parents, ".$message_detail."-".$sch_name;
echo strlen($message);

$enc_msg= rawurlencode($message); // Encoded message

$fullapiurl="http://smsc.biz/httpapi/send?username=$username&password=$password&sender_id=$approved_senderid&route=T&phonenumber=$mob_number&message=$enc_msg";
$ch = curl_init($fullapiurl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch); 
curl_close($ch);

echo "<p>SMS Request Sent - Message id - $result </p>";

}
header("Location:req_certificates.php?success=.'success'");

}
?>