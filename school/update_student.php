<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
	
require("connection.php");
if(isset($_POST["upd_register"]))
{
	$first_name=$_POST["first_name"];
	$last_name=$_POST["last_name"];
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
	$town=$_POST["town"];
	$village=$_POST["village"];
	$taluk=$_POST["taluk"];
	$roll_no=$_POST["roll_no"];
	$admission=$_POST["admission"];
	$rollno=$_POST["rollno"];
	$adhaar_no=$_POST["adhaar_no"];
	$join_date=$_POST["join_date"];
	$student_type=$_POST["student_type"];
	
	if (is_uploaded_file($_FILES['photo']['tmp_name'])) {
	//echo "set";
    $filetmp = $_FILES["photo"]["tmp_name"];

	$filename = $_FILES["photo"]["name"];

	$filetype = $_FILES["photo"]["type"];

	$filepath = "photo/".$filename;

	move_uploaded_file($filetmp,$filepath);	
	
     $sql="Update students set first_name='".$first_name."',last_name='".$last_name."',join_date='".$join_date."',class_join='".$class_join."',present_class='".$class_join."',sex='".$sex."',dob='".$dob."',caste='".$caste."',parent_contact='".$parent_contact."',father_name='".$father_name."',town='".$town."',village='".$village."',taluk='".$taluk."',address='".$address."',section='".$section."',roll_no1='".$admission_no."',adhaar_no='".$adhaar_no."',blood='".$blood."',admission_no='".$admission."',roll_no='".$roll_no."' ,photo_name='".$filename."',photo_path='".$filepath."',photo_type='".$filetype."',student_type='".$student_type."',mother_tongue='".$mother_tongue."' where id='".$id."'";	
	}
	else
	{
	//echo "Not set";
	   $sql="Update students set first_name='".$first_name."',last_name='".$last_name."',join_date='".$join_date."',class_join='".$class_join."',present_class='".$class_join."',sex='".$sex."',dob='".$dob."',caste='".$caste."',parent_contact='".$parent_contact."',father_name='".$father_name."',town='".$town."',village='".$village."',taluk='".$taluk."',address='".$address."',section='".$section."',roll_no1='".$admission_no."',adhaar_no='".$adhaar_no."',blood='".$blood."',admission_no='".$admission."',roll_no='".$roll_no."',student_type='".$student_type."',mother_tongue='".$mother_tongue."' where id='".$id."'";	
	}
	
var_dump($sql);
	
	if ($conn->query($sql) === TRUE) 
	{
	var_dump($sql);
   // header("Location:all_students.php?success=.'success'");	
	}
	}
	}else
	{
		header("Location:login.php");
	}
	


?>