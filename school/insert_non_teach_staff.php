<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
if(isset($_POST["non_teach"]))
{
	
	
	$first_name=$_POST["first_name"];
	$last_name=$_POST["last_name"];
	$email=$_POST["email"];
	$dob=$_POST["dob"];
	$contact=$_POST["contact"];
	$desig=$_POST["desig"];
	
	$join_date=$_POST["join_date"];
	$add=$_POST["add"];
	$sex=$_POST["sex"];
	
	
	echo $first_name;
	echo "<br>";
	echo $last_name;
	echo "<br>";
	echo $email;
	echo "<br>";
	echo $dob;
	echo "<br>";
	
	$filetmp = $_FILES["photo_name"]["tmp_name"];

	$filename = $_FILES["photo_name"]["name"];

	$filetype = $_FILES["photo_name"]["type"];

	$filepath = "non_teach_photo/".$filename;

	move_uploaded_file($filetmp,$filepath);
	
	
	$filetmp1 = $_FILES["adhar_name"]["tmp_name"];

	$filename1 = $_FILES["adhar_name"]["name"];

	$filetype1 = $_FILES["adhar_name"]["type"];

	$filepath1 = "non_teach_adhar/".$filename1;

	move_uploaded_file($filetmp1,$filepath1);
	
	
	$filetmp2 = $_FILES["id_name"]["tmp_name"];

	$filename2 = $_FILES["id_name"]["name"];

	$filetype2 = $_FILES["id_name"]["type"];

	$filepath2 = "non_teach_id/".$filename2;

	move_uploaded_file($filetmp2,$filepath2);
	
	
	
	
	$sql="insert into non_teach (first_name,last_name,email,dob,contact,desig,join_date,address,sex,photo_name,photo_path,photo_type,adhar_name,adhar_path,adhar_type,id_name,id_path,id_type,academic_year) values('$first_name','$last_name','$email','$dob','$contact','$desig','$join_date','$add','$sex','$filename','$filepath','$filetype','$filename1','$filepath1','$filetype1','$filename2','$filepath2','$filetype2','$cur_academic_year')";
	
	
	if ($conn->query($sql) === TRUE) 
	{
		echo "success";
	
	header("Location:non_teach_staff.php?success=.'success'");


	} 
	else 
	{
				
	header("Location:non_teach_staff.php?failed=.'failed'");	
	//var_dump($sql);	
	}


}

	}else{
		header("Location:login.php");
	}
	
?>