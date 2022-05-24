<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
if(isset($_GET['id'])){
	$id=$_GET['id'];
	
}

$sql="select * from attendance where id ='".$id."'";
$result=mysqli_query($conn,$sql);
if($value=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
	$student_id = $value["student_id"];
}

$sql = "DELETE FROM attendance WHERE id='".$id."'";
//var_dump($sql);

if ($conn->query($sql) === TRUE)  {
	header("Location:attendance_desc.php?student_id=".$student_id);
	} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
?>