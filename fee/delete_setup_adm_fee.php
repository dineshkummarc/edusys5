<?php
require("connection.php");
if(isset($_GET['id'])){
	$id=$_GET['id'];
	
}
$sql = "DELETE FROM set_adm_fee WHERE id='".$id."'";

if ($conn->query($sql) === TRUE)  {
			header("Location:set_adm_fee_det.php?deleted=.'success'");
			} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			}

?>
