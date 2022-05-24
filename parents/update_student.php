<?php 
session_start();
if(isset($_SESSION['lkg_uname'])&&isset($_SESSION['lkg_pass']))
{
	
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
	$dob=$_POST["dob"];
	$class_join=$_POST["class_join"];
	$present_class=$_POST["class_join"];
	$parent_contact=$_POST["parent_contact"];
	$father_name=$_POST["father_name"];
	$town=$_POST["town"];
	$village=$_POST["village"];
	$taluk=$_POST["taluk"];
	$roll_no=$_POST["roll_no"];
	$sql="Update students set first_name='".$first_name."',class_join='".$class_join."',present_class='".$class_join."',sex='".$sex."',dob='".$dob."',parent_contact='".$parent_contact."',father_name='".$father_name."',town='".$town."',village='".$village."',taluk='".$taluk."',address='".$address."',section='".$section."',rollno='".$rollno."',adhaar_no='".$adhaar_no."',blood='".$blood."',roll_no='".$roll_no."' where id='".$id."'";
	if ($conn->query($sql) === TRUE) 
	{
		//var_dump($sql);
		header("Location:all_students.php?success=.'success'");	
	}
	}
	}else
	{
		header("Location:login.php");
	}
	


?>