<?php
session_start();
if(isset($_SESSION['staff_uname'])&&!empty($_SESSION['staff_pass'])&&!empty($_SESSION['admin_id'])&&!empty($_SESSION['staff_academic_year']))
{
$cur_academic_year = $_SESSION['staff_academic_year'];
$admin_id=$_SESSION['admin_id'];
$staff_uname=$_SESSION['staff_uname'];
$staff_pass=$_SESSION['staff_pass'];
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