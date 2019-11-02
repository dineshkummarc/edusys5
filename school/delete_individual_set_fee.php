<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$first_name=$_GET['first_name'];
	$roll_no=$_GET['roll_no'];
	$class=$_GET['class'];
	}
	
	
	
	$sql = "DELETE FROM set_fee WHERE id='".$id."'";
	if ($conn->query($sql) === TRUE)
	{
	header("Location:description.php?first_name=".$first_name."&roll_no=".$roll_no."&class=".$class."&suceess=success");
	}
	else 
	{
	echo "Error: " . $sql . "<br>" . $conn->error;
	}
		}
?>