<?php
require("connection.php");
if((isset($_GET['name']))&&(isset($_GET['roll']))){
	$name=$_GET['name'];
	$roll_no=$_GET['roll'];
}
$sql = "DELETE FROM students WHERE first_name='".$name."' and roll_no='".$roll_no."'";

if ($conn->query($sql) === TRUE)  {
			header("Location:all_students.php?deleted=.'success'");
			} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			}

?>