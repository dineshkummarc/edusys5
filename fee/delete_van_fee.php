<?php
require("connection.php");
if(isset($_GET['id'])){
	$id=$_GET['id'];
	
}
$sql = "DELETE FROM student_van_fee WHERE id='".$id."'";

if ($conn->query($sql) === TRUE)  {
			header("Location:collected_van_fee.php?deleted=.'success'");
			} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			}

?>