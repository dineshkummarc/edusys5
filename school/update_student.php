<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
	
require("connection.php");
if(isset($_POST["upd_register"]))
{
	$first_name=$_POST["first_name"];
	$sex=$_POST["sex"];
	$rollno=$_POST["rollno"];
	$section=$_POST["section"];
	$address=$_POST["address"];
	$blood=$_POST["blood"];
	$id=$_POST["id"];
  $mother_tongue=$_POST["mother_tongue"];
	$dob=$_POST["dob"];
	$caste=$_POST["caste"];
	$class_join=$_POST["class_join"];
	$present_class=$_POST["class_join"];
	$parent_contact=$_POST["parent_contact"];
	$father_name=$_POST["father_name"];
	$mother_name=$_POST["mother_name"];
	$town=$_POST["town"];
	$village=$_POST["village"];
	$taluk=$_POST["taluk"];
	$roll_no=$_POST["roll_no"];
	$admission=$_POST["admission"];
	$rollno=$_POST["rollno"];
	$adhaar_no=$_POST["adhaar_no"];
	$admission_no=$_POST["admission_no"];


	$sql="Update students set first_name='".$first_name."',class_join='".$class_join."',present_class='".$class_join."',sex='".$sex."',dob='".$dob."',caste='".$caste."',parent_contact='".$parent_contact."',father_name='".$father_name."',mother_name='".$mother_name."',town='".$town."',village='".$village."',taluk='".$taluk."',address='".$address."',section='".$section."',admission_no='".$admission_no."',adhaar_no='".$adhaar_no."',blood='".$blood."',admission_no='".$admission."',roll_no='".$roll_no."',mother_tongue='".$mother_tongue."' where id='".$id."'";	
	
	
	if ($conn->query($sql) === TRUE) 
	{
	//var_dump($sql);
    header("Location:all_students.php?success=.'success'");	
	}
	}
	
	
	
	}
	else
	{
		header("Location:login.php");
	}
	


?>