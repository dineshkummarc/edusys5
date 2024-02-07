<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
ob_start();
require("connection.php");
date_default_timezone_set("Asia/Kolkata");
$today_date=date("Y-m-d");

$sql_sch = "SELECT * FROM school_det ORDER BY ID DESC LIMIT 1";
$result_sch=mysqli_query($conn,$sql_sch);
if($row_sch=mysqli_fetch_array($result_sch,MYSQLI_ASSOC))
{
  $approved_senderid=$row_sch["sender_id"];
  $username=$row_sch["username"];
  $password=$row_sch["user_id"];
  $sms_school_name=$row_sch["sms_school_name"];
	$mob_number=$row_sch["mob"];
}

$sql="select staff_id,attendance,att_date from fac_attendance where att_date='".$today_date."' and attendance='Absent'";
$result=mysqli_query($conn,$sql);

foreach($result as $value)
{ 
	$staff_id=$value["staff_id"];	
		$att_date=$value["att_date"];
		$f3=$value["attendance"];

		$sql_fac="select fac_fname from faculty where fac_id='".$staff_id."'";
		$result_fac=mysqli_query($conn,$sql_fac);
		while($row_fac=mysqli_fetch_array($result_fac,MYSQLI_ASSOC))
		{
			$fac_fname = $row_fac["fac_fname"];
		}
		
		if($mob_number!="null"){
		$message = "Dear Admin, ".$fac_fname." is absent from school today ".$att_date.". ".$sms_school_name;
		//echo $message;
		require("sms_gateway.php");
		}
}
  
   header("Location:index.php?success=.'success'");
  }
