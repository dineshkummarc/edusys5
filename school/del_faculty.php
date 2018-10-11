<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
if(isset($_GET['fac_id'])){
	$fac_id=$_GET['fac_id'];
	
}
$sql = "DELETE FROM faculty WHERE fac_id='".$fac_id."'";

if ($conn->query($sql) === TRUE)  {
			header("Location:teach_staff.php?deleted=.'success'");
			} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			}
}
?>