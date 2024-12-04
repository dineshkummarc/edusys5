<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
if(isset($_POST["register"]))
{
	$sex=test_input($_POST["sex"]);
	$dob=test_input($_POST["dob"]);
	$rollno=test_input($_POST["rollno"]);
	$father_name=test_input($_POST["father_name"]);
	$mother_name=test_input($_POST["mother_name"]);
	$caste=test_input($_POST["caste"]);
	$mother_tongue=test_input($_POST["mother_tongue"]);
	$section=test_input($_POST["section"]);
	$adhaar_no=test_input($_POST["adhaar_no"]);
	$address=test_input($_POST["address"]);
	$class_join=test_input($_POST["class_join"]);
	$first_name=test_input($_POST["first_name"]);
	$admission=test_input($_POST["rollno"]);
	$roll_no=test_input($_POST["rollno"]);
	$blood=test_input($_POST["blood"]);
	$parent_contact=test_input($_POST["parent_contact"]);
	

	$sql="insert into students (present_class,admission_no,blood,sex,dob,roll_no,academic_year,father_name,mother_name,caste,mother_tongue,class_join,first_name,parent_contact,rollno,section,address,adhaar_no) values('$class_join','$admission','$blood','$sex','$dob','$roll_no','$cur_academic_year','$father_name','$mother_name','$caste','$mother_tongue','$class_join','$first_name','$parent_contact','$rollno','$section','$address','$adhaar_no')";
	
	
	
	if ($conn->query($sql) === TRUE) 
	{
	
	header("Location:all_students.php?success=.'success'");
  } 
	else 
	{
	var_dump($sql);
	}
}
}else{
		header("Location:login.php");
	}
	
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
	
?>