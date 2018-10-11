<?php
require("connection.php");
if(isset($_GET['id'])){
	$id=$_GET['id'];
	
}
$sql = "DELETE FROM request_study WHERE id='".$id."'";

if ($conn->query($sql) === TRUE)  {
			header("Location:req_certificates.php?deleted=.'success'");
			} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			}

?>