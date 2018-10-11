<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

require("connection.php");
if(isset($_POST["admini"]))
{
	
	
	$adm_name=$_POST["adm_name"];
	$adm_desig=$_POST["adm_desig"];
	$adm_loc=$_POST["adm_loc"];
	$parent_contact=$_POST["parent_contact"];
	$memb_since=$_POST["memb_since"];
	$adm_email=$_POST["adm_email"];
	$id=$_POST["id"];
	
	$sql="update administration set adm_name='".$adm_name."',adm_loc='".$adm_loc."',adm_desig='".$adm_desig."',parent_contact='".$parent_contact."',memb_since='".$memb_since."',adm_email='".$adm_email."' where id='".$id."'";
	
	
	
	if ($conn->query($sql) === TRUE) 
	{
		echo "success";
	
	header("Location:adm_members.php?success=.'success'");


	} 
	else 
	{
				
	header("Location:adm_members.php?failed=.'failed'");	
		
	}


}

	}else{
		header("Location:login.php");
	}
	
?>