<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

require("connection.php");

	$attendance=$_POST["attendance"];
	$att_date=$_POST["att_date"];
	$id=$_POST["id"];
	$first_fname=$_POST["first_fname"];
	$roll_no=$_POST["roll_no"];
	
	if($attendance=="Present"){
		$att_count=1;
	}else{
		$att_count=0;
	}
	
	$sql="update fac_attendance set attendance='".$attendance."',att_date='".$att_date."',att_count='".$att_count."' where  id='".$id."'";
	var_dump($sql);
	
	if ($conn->query($sql) === TRUE) 
	{
		echo "success";
	
	header("Location:attendance_desc.php?name=".$first_fname."&roll_no=".$roll_no);


	} 
	else 
	{
				
	header("Location:attendance_desc.php?failed=.'failed'");	
		
	}


}else{
		header("Location:login.php");
	}
	

?>