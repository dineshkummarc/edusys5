<?php

session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{

require("connection.php");

	$attendance=$_POST["attendance"];
	$att_date=$_POST["att_date"];
	$id=$_POST["id"];
	$first_name=$_POST["first_name"];
	$roll_no=$_POST["roll_no"];
	$present_class=$_POST["present_class"];
	if($attendance=="Present"){
		$att_count=1;
	}else{
		$att_count=0;
	}
	
	$sql="update attendance set attendance='".$attendance."',att_date='".$att_date."',att_count='".$att_count."' where id='".$id."'";
	
	
	if ($conn->query($sql) === TRUE) 
	{
		echo "success";
	
	header("Location:attendance_desc.php?name=".$first_name."&roll_no=".$roll_no."&present_class=".$present_class);


	} 
	else 
	{
				
	header("Location:attendance_desc.php?failed=.'failed'");	
		
	}


}else{
		header("Location:login.php");
	}
	

?>