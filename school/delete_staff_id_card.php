<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
if(isset($_GET['id'])){
	$id=$_GET['id'];
	
}

$sql_id="select staff_id,photo_path from staff_id_cards where id ='".$id."'";
$result_id=mysqli_query($conn,$sql_id);
if($value=mysqli_fetch_array($result_id,MYSQLI_ASSOC))
{
	$staff_id = $value["staff_id"];
  $photo_path = $value["photo_path"];
 }

 if(file_exists($photo_path)){
  //delete the image
    unlink($photo_path);
 }
$sql = "DELETE FROM staff_id_cards WHERE id='".$id."'";
var_dump($sql);

if ($conn->query($sql) === TRUE)  {
	header("Location:fac_description.php?fac_id=".$staff_id);
	} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
	}

}
?>