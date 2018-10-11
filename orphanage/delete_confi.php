<?php
require("connection.php");
if(isset($_GET['id'])){
	$id=$_GET['id'];
	
}
$sql = "DELETE FROM school_det WHERE id='".$id."'";

if ($conn->query($sql) === TRUE)  {
			header("Location:schools.php?status=.'success'");
			} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			}

?>