<?php
require("connection.php");
if(isset($_POST['id'])){

	$id=$_POST['id'];
	$subject_name=$_POST['subject_name'];
	$class=$_POST['class'];
	
	
}

$sql = "update subjects set subject_name='".$subject_name."',class='".$class."' where id='".$id."'";

if ($conn->query($sql) === TRUE)  {
			header("Location:subjects.php?status=.'success'");
			} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			}

?>