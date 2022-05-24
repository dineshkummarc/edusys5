<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];

require("connection.php");
if(isset($_POST["faculty"]))
{
	$fac_fname=$_POST["fac_fname"];
	$fac_dob=$_POST["fac_dob"];
	$parent_contact=$_POST["parent_contact"];
	$fac_desig=$_POST["fac_desig"];
	$fac_dep=$_POST["fac_dep"];
	$fac_quali=$_POST["fac_quali"];
	$fac_add=$_POST["fac_add"];
	$fac_sex=$_POST["fac_sex"];
	$class_teach=$_POST["class_teach"];
	//$section=$_POST["section"];
	$adhaar_no=$_POST["adhaar_no"];
	$staff_type=$_POST["staff_type"];
	
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
	
	$sql="insert into faculty (fac_fname,fac_dob,parent_contact,fac_desig,class_teach,fac_dep,fac_quali,fac_add,fac_sex,fac_photo_name,fac_photo_path,fac_photo_type,adhaar_no,staff_type) values('$fac_fname','$fac_dob','$parent_contact','$fac_desig','$class_teach','$fac_dep','$fac_quali','$fac_add','$fac_sex','$filename','$filepath','$filetype','$adhaar_no','$staff_type')";
	var_dump($sql);
	
	if ($conn->query($sql) === TRUE) 
	{
	echo "success";
	//header("Location:register_faculty.php?success=.'success'");
	} 
	else 
	{
	//header("Location:register_faculty.php?failed=.'failed'");	
	}
}

}
else
{
	header("Location:login.php");
}
?>