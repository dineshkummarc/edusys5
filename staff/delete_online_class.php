<?php
session_start();
if(isset($_SESSION['staff_uname'])&&!empty($_SESSION['staff_pass'])&&!empty($_SESSION['admin_id']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
if(isset($_GET['id'])){
	$id=$_GET['id'];
	
}
$sql = "DELETE FROM online_class WHERE id='".$id."'";

if ($conn->query($sql) === TRUE)  {
	header("Location:all_online_classes.php?success=.'success'");
	} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	}

?>
