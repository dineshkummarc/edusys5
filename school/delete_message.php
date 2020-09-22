<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
if(isset($_GET['id'])){
	$id=$_GET['id'];
	
}
$sql = "DELETE FROM contact_school  WHERE id='".$id."' and academic_year='".$cur_academic_year."'";

if ($conn->query($sql) === TRUE)  {
	header("Location:contact_school.php?deleted=.'success'");
	} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
	}
}
?>