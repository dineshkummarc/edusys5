<?php
session_start();
if (isset($_SESSION['lkg_uname']) && !empty($_SESSION['lkg_pass']) && !empty($_SESSION['academic_year'])) {
$academic_year = $_SESSION['academic_year'];
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