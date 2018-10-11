<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
if(isset($_GET['id'])){
	$id=$_GET['id'];
	}
	
	$sql_det="select name,roll_no,class from student_fee where id='".$id."'";
	$result_det=mysqli_query($conn,$sql_det);
	if($row_det=mysqli_fetch_array($result_det,MYSQLI_ASSOC))
	{
	$first_name=$row_det["name"];	
	$roll_no=$row_det["roll_no"];	
	$class=$row_det["class"];	
	}
	//var_dump($sql_det);
	
	$sql = "DELETE FROM student_fee WHERE id='".$id."'";
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