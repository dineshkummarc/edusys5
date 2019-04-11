<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if(isset($_POST["checked"])){
	$checkbox=$_POST["checkbox"];
	$meeting_name=$_POST["meeting_name"];
	$meeting_date=$_POST["meeting_date"];
	$meeting_time=$_POST["meeting_time"];
	$meeting_type="Parents";
   
    $sql_sch = "SELECT * FROM school_det ORDER BY ID DESC LIMIT 1";
	$result_sch=mysqli_query($conn,$sql_sch);
	if($row_sch=mysqli_fetch_array($result_sch,MYSQLI_ASSOC))
	{
		$sch_name=$row_sch["sch_name"];
		$approved_senderid=$row_sch["sender_id"];
		$sch_detail=$row_sch['sch_name']." ".$row_sch['location'];
	}  
	//print_r($checkbox);
	foreach($_POST["checkbox"] as $roll_no){
	
	$sql_contact="select parent_contact,first_name,roll_no from students where academic_year='".$cur_academic_year."' and roll_no='".$roll_no."'";
	$result_contact=mysqli_query($conn,$sql_contact);
	if($row_contact=mysqli_fetch_array($result_contact,MYSQLI_ASSOC))
	{
		$mob_number=$row_contact["parent_contact"];
		$first_name=$row_contact["first_name"];
	

	$sms = urlencode(htmlspecialchars("Dear parents, ".$meeting_name."-".$sch_name));
	 require("sms_gateway.php");
	 //SMS gateway code ends here

	}
	}
}

}
header("Location:send_noti.php");
}