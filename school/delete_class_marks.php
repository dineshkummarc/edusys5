<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
require("connection.php");

if(isset($_GET['id'])){
	$id=$_GET['id'];
	}
	$sql = "DELETE FROM student_marks WHERE id='".$id."'";
	if ($conn->query($sql) === TRUE)  {
	header("Location:class_marks.php?deleted=.'success'");
	} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
?>