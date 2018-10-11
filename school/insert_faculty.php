<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

require("connection.php");
if(isset($_POST["faculty"]))
{
	
	
	$fac_fname=$_POST["fac_fname"];
	$fac_lname=$_POST["fac_lname"];
	$fac_email=$_POST["fac_email"];
	$fac_dob=$_POST["fac_dob"];
	$parent_contact=$_POST["parent_contact"];
	$fac_desig=$_POST["fac_desig"];
	$fac_dep=$_POST["fac_dep"];
	$fac_prev_org=$_POST["fac_prev_org"];
	$fac_quali=$_POST["fac_quali"];
	$fac_join=$_POST["fac_join"];
	$fac_add=$_POST["fac_add"];
	$fac_sex=$_POST["fac_sex"];
	$academic_year=$_POST["academic_year"];
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
	
	
	
	
	$sql="insert into faculty (fac_fname,fac_lname,fac_email,fac_dob,parent_contact,fac_desig,class_teach,fac_dep,fac_prev_org,fac_quali,fac_join,fac_add,fac_sex,fac_photo_name,fac_photo_path,fac_photo_type,fac_adhar_name,fac_adhar_path,fac_adhar_type,fac_id_name,fac_id_path,fac_id_type,academic_year,section,adhaar_no,staff_pass) values('$fac_fname','$fac_lname','$fac_email','$fac_dob','$parent_contact','$fac_desig','$class_teach','$fac_dep','$fac_prev_org','$fac_quali','$fac_join','$fac_add','$fac_sex','$filename','$filepath','$filetype','$filename1','$filepath1','$filetype1','$filename2','$filepath2','$filetype2','$cur_academic_year','$section','$adhaar_no','$staff_pass')";
	
	
	if ($conn->query($sql) === TRUE) 
	{
		echo "success";
	
	header("Location:register_faculty.php?success=.'success'");


	} 
	else 
	{
				
	header("Location:register_faculty.php?failed=.'failed'");	
		
	}


}

	}else{
		header("Location:login.php");
	}
	
	
?>