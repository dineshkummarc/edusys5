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
$sql = "DELETE FROM online_class WHERE id='".$id."'";

if ($conn->query($sql) === TRUE)  {
	header("Location:all_online_classes.php?success=.'success'");
	} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	}

?>
