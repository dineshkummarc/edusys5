<?php
session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{

require("connection.php");
if(isset($_POST["upd_donation"]))
{
	$id=$_POST["id"];
	$name=$_POST["name"];
	$location=$_POST["location"];
	$rec_date=$_POST["rec_date"];
	$rec_no=$_POST["rec_no"];
	$amount=$_POST["amount"];
	$mob=$_POST["mob"];
	$towards=$_POST["towards"];
	
	
	
	$sql="UPDATE anv_don SET name='".$name."',location='".$location."',rec_date='".$rec_date."',rec_no='".$rec_no."',amount='".$amount."',mob='".$mob."',towards='".$towards."' where id='".$id."'";
	
	
	if ($conn->query($sql) === TRUE) 
	{
			
		
	
	header("Location:sms_don.php?name=".$name."&rec_no=".$rec_no."&rec_date=".$rec_date."&mob=".$mob."&amount=".$amount);


	} 
	else 
	{
			
	header("Location:all_donation.php?failed=.'failed'");	
	
	}


}


	}else{
		header("Location:login.php");
	}
	

?>