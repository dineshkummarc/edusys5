<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

require("connection.php");

	$attendance=$_POST["attendance"];
	$att_date=$_POST["att_date"];
	$id=$_POST["id"];
	$staff_id=$_POST["staff_id"];
	
	if($attendance=="Present"){
		$att_count=1;
	}else{
		$att_count=0;
	}
	
	$sql="update fac_attendance set attendance='".$attendance."',att_date='".$att_date."',att_count='".$att_count."' where  id='".$id."'";
	//var_dump($sql);
	
	if ($conn->query($sql) === TRUE) 
	{
	
	header("Location:fac_attendance_desc.php?id=".$staff_id);


	} 
	else 
	{
				
	header("Location:fac_attendance_desc.php?failed=.'failed'");	
		
	}


}else{
		header("Location:login.php");
	}
	

?>