<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

require("connection.php");
if(isset($_POST["donation"]))
{
	
	
	$name=$_POST["name"];
	$location=$_POST["location"];
	$rec_date=$_POST["rec_date"];
	$rec_no=$_POST["rec_no"];
	$amount=$_POST["amount"];
	$mob=$_POST["mob"];
	$towards=$_POST["towards"];
	
	
	
	
	
	$sql="insert into anv_don (name,location,rec_date,rec_no,amount,mob,towards,academic_year) values('$name','$location','$rec_date','$rec_no','$amount','$mob','$towards','$cur_academic_year')";
	
	
	if ($conn->query($sql) === TRUE) 
	{
		echo "success";
	
	//header("Location:sms_don.php?success=.'success'");
	
	header("Location:sms_don.php?name=".$name."&rec_no=".$rec_no."&rec_date=".$rec_date."&mob=".$mob."&amount=".$amount);


	} 
	else 
	{
				
	header("Location:add_holiday.php?failed=.'failed'");	
		
	}


}

	}else{
		header("Location:login.php");
	}
	
?>