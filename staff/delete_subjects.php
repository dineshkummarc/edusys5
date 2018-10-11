<?php
require("connection.php");
if(isset($_GET['id'])){
	$id=$_GET['id'];
	
}
$sql = "DELETE FROM subjects WHERE id='".$id."'";

if ($conn->query($sql) === TRUE)  {
			header("Location:subjects.php?status=.'success'");
			} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			}

?>