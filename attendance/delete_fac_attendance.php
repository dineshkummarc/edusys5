<?php
require("connection.php");
if(isset($_GET['id'])){
	$id=$_GET['id'];
	
}
$sql = "DELETE FROM fac_attendance WHERE id='".$id."'";

if ($conn->query($sql) === TRUE)  {
			header("Location:fac_attendance_desc.php?deleted=.'success'");
			} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			}

?>