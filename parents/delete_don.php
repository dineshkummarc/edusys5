<?php
require("connection.php");
if(isset($_GET['id'])){
	$id=$_GET['id'];
	
}
$sql = "DELETE FROM anv_don WHERE id='".$id."'";

if ($conn->query($sql) === TRUE)  {
			header("Location:all_donation.php?deleted=.'success'");
			} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			}

?>