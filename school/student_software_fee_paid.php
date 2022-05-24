<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
if(isset($_GET['id'])){
	$id=$_GET['id'];
	
}
$sql = "DELETE FROM student_software_fee where academic_year='".$cur_academic_year."' and id='".$id."'";

if ($conn->query($sql) === TRUE)  {
	header("Location:paid_software_fee_details.php?deleted=.'success'");
	} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
?>