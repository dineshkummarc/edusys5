<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

require("connection.php");

	$attendance=$_POST["attendance"];
	$student_id=$_POST["student_id"];
	$att_date=$_POST["att_date"];
	$id=$_POST["id"];
	if($attendance=="Present"){
		$att_count=1;
	}else{
		$att_count=0;
	}


	
	$sql="update attendance set attendance='".$attendance."',att_date='".$att_date."',att_count='".$att_count."' where  id='".$id."'";
	
	
	if ($conn->query($sql) === TRUE) 
	{
	header("Location:att_sms.php?academic_year=".$cur_academic_year."&student_id=".$student_id);
	
	} 
	else 
	{
				
	header("Location:attendance_desc.php?student_id=".$student_id);
		
	}


}else{
		header("Location:login.php");
	}
	

?>