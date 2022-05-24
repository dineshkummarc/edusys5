<?php

session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{

require("connection.php");
if(isset($_POST["admini"]))
{
	$adm_name=$_POST["adm_name"];
	$adm_desig=$_POST["adm_desig"];
	$adm_loc=$_POST["adm_loc"];
	$parent_contact=$_POST["parent_contact"];
	$memb_since=$_POST["memb_since"];
	$adm_email=$_POST["adm_email"];
	
	
	$filetmp = $_FILES["adm_photo"]["tmp_name"];

	$filename = $_FILES["adm_photo"]["name"];

	$filetype = $_FILES["adm_photo"]["type"];

	$filepath = "admini/".$filename;

	move_uploaded_file($filetmp,$filepath);
	
	
	
	
	$sql="insert into administration (adm_name,adm_desig,adm_loc,parent_contact,memb_since,adm_email,adm_photo_name,adm_photo_path,adm_photo_type) values('$adm_name','$adm_desig','$adm_loc','$parent_contact','$memb_since','$adm_email','$filename','$filepath','$filetype')";
	
	
	if ($conn->query($sql) === TRUE) 
	{
		echo "success";
	
	header("Location:add_adm_members.php?success=.'success'");


	} 
	else 
	{
				
	header("Location:add_adm_members.php?failed=.'failed'");	
		
	}


}

	}else{
		header("Location:login.php");
	}
	
?>