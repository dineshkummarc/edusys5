<?php
require("connection.php");
if(isset($_GET['id'])){
	$id=$_GET['id'];
	
}
$sql = "DELETE FROM books WHERE id='".$id."'";

if ($conn->query($sql) === TRUE)  {
			header("Location:all_books.php?deleted=.'success'");
			} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			}

?>