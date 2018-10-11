<?php
session_start();

if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))

{
require("connection.php");
error_reporting("0");
if(isset($_POST["faculty"]))
{
	$fac_fname=$_POST["fac_fname"];
	$fac_id=$_POST["fac_id"];
	$fac_lname=$_POST["fac_lname"];
	$fac_email=$_POST["fac_email"];
	$fac_dob=$_POST["fac_dob"];
	$fac_mob=$_POST["fac_mob"];
	$fac_desig=$_POST["fac_desig"];
	$fac_dep=$_POST["fac_dep"];
	$fac_prev_org=$_POST["fac_prev_org"];
	$fac_quali=$_POST["fac_quali"];
	$fac_join=$_POST["fac_join"];
	$fac_add=$_POST["fac_add"];
	$fac_sex=$_POST["fac_sex"];
	$class_teach=$_POST["class_teach"];
	$section=$_POST["section"];
	$adhaar_no=$_POST["adhaar_no"];
	$staff_pass=$_POST["staff_pass"];
	
	$filetmp = $_FILES["fac_photo"]["tmp_name"];

	$filename = $_FILES["fac_photo"]["name"];

	$filetype = $_FILES["fac_photo"]["type"];

	$filepath = "faculty/".$filename;

	move_uploaded_file($filetmp,$filepath);
	
	
	$filetmp1 = $_FILES["fac_adhar"]["tmp_name"];

	$filename1 = $_FILES["fac_adhar"]["name"];

	$filetype1 = $_FILES["fac_adhar"]["type"];

	$filepath1 = "fa_adhar/".$filename1;

	move_uploaded_file($filetmp1,$filepath1);
	
	
	$filetmp2 = $_FILES["fac_id"]["tmp_name"];

	$filename2 = $_FILES["fac_id"]["name"];

	$filetype2 = $_FILES["fac_id"]["type"];

	$filepath2 = "fa_id/".$filename2;

	move_uploaded_file($filetmp2,$filepath2);
	
	
	$sql="Update faculty set fac_fname='".$fac_fname."',fac_lname='".$fac_lname."',fac_email='".$fac_email."',fac_dob='".$fac_dob."',parent_contact='".$fac_mob."',fac_desig='".$fac_desig."',fac_dep='".$fac_dep."',fac_prev_org='".$fac_prev_org."',fac_quali='".$fac_quali."',fac_join='".$fac_join."',fac_add='".$fac_add."',fac_sex='".$fac_sex."',fac_photo_name='".$filename."',fac_photo_path='".$filepath."',fac_photo_type='".$filetype."',fac_adhar_name='".$filename1."',fac_adhar_path='".$filepath1."',fac_adhar_type='".$filetype1."',fac_id_name='".$filename2."',fac_id_path='".$filepath2."',fac_id_type='".$filetype3."',class_teach='".$class_teach."',section='".$section."',adhaar_no='".$adhaar_no."',staff_pass='".$staff_pass."' where fac_id='".$fac_id."'";
	
	if ($conn->query($sql) === TRUE) 
	{
		//var_dump($sql);
	
	header("Location:teach_staff.php?success=.'success'");


	} 
	else 
	{
		//var_dump($sql);
				
	header("Location:teach_staff.php?failed=.'failed'");	
	
	}


}

	}else{
		header("Location:login.php");
	}
	
?>