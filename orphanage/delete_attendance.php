<?php
require("connection.php");
if(isset($_GET['id'])){
	$id=$_GET['id'];
	
}
$sql = "DELETE FROM attendance WHERE id='".$id."'";

if ($conn->query($sql) === TRUE)  {
			header("Location:attendance_desc.php?deleted=.'success'");
			} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			}

?>