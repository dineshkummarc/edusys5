<?php
session_start();
if(isset($_SESSION['staff_uname'])&&isset($_SESSION['staff_pass'])&&isset($_SESSION['class_teach']))
{
$class_teach=$_SESSION['class_teach'];
$staff_uname=$_SESSION['staff_uname'];
$staff_pass=$_SESSION['staff_pass'];
require("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$reply = mysqli_real_escape_string($conn, $_POST["reply"]);
	$comment_id = test_input($_POST["comment_id"]);
	$video_id = test_input($_POST["video_id"]);
	
$sql="insert into comment_reply (reply,comment_id,video_id,academic_year) values('$reply','$comment_id','$video_id','$academic_year')";
$conn->query($sql);
header("Location:video_description.php?id=".$video_id."&success=.'success'");
}
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?> 