<?php
require("connection.php");
if(isset($_GET['fac_id'])){
	$fac_id=$_GET['fac_id'];
	
}
$sql = "DELETE FROM faculty WHERE fac_id='".$fac_id."'";

if ($conn->query($sql) === TRUE)  {
			header("Location:teach_staff.php?deleted=.'success'");
			} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			}

?>