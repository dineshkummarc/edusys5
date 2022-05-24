<?php
require("connection.php");
if(isset($_GET['id'])){
	$id=$_GET['id'];
	
}
$sql = "DELETE FROM student_books_fee WHERE id='".$id."'";

if ($conn->query($sql) === TRUE)  {
			header("Location:paid_books_fee_details.php?deleted=.'success'");
			} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			}

?>
