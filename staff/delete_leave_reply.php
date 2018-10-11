<?php
require("connection.php");
if(isset($_GET['id'])){
	$id=$_GET['id'];
	
}
$sql = "DELETE FROM leave_reply WHERE id='".$id."'";

if ($conn->query($sql) === TRUE)  {
			header("Location:replied_actions.php?deleted=.'success'");
			} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			}

?>
