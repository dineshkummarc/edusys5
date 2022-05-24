<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
if(isset($_POST["submit"]))
{	
	$photo_date=date("Y-m-d");
	$first_name=test_input($_POST["first_name"]);
	$city=test_input($_POST["city"]);
	
	$filetmp = $_FILES["photo"]["tmp_name"];

	$filename = $_FILES["photo"]["name"];

	$filetype = $_FILES["photo"]["type"];

	$filepath = "guest_photo/".$filename;

	move_uploaded_file($filetmp,$filepath);
	
	
	
	
	$sql="insert into guest_photos (first_name,city,photo_name,photo_path,photo_type,photo_date,academic_year) values('$first_name','$city','$filename','$filepath','$filetype','$photo_date','$cur_academic_year')";
	
	
	
	if ($conn->query($sql) === TRUE) 
	{
		echo "success";
	
	header("Location:reviews.php?guest_success=.'success'");
    } 
	else 
	{
	var_dump($sql);			
		
	}
}
}

	
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
	
?>