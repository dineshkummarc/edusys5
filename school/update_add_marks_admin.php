<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
if(isset($_POST['id'])){

	$id=$_POST['id'];
	$username=$_POST['username'];
	$log_pas=$_POST['log_pas'];
	$class=$_POST['class'];
	$section=$_POST['section'];
	$academic_year=$_POST['academic_year'];
	$email=$_POST['email'];

	
	
}

$sql = "update class_ad_members set username='".$username."',log_pas='".$log_pas."',class='".$class."',section='".$section."',academic_year='".$cur_academic_year."',email='".$email."' where id='".$id."'";
var_dump($sql);
if ($conn->query($sql) === TRUE)  {
			header("Location:all_marks_admin.php?status=.'success'");
			} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			}
}
?>