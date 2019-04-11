<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$id = test_input($_POST["id"]);
	$sub1 = test_input($_POST["sub1"]);
	$sub2 = test_input($_POST["sub2"]);
	$sub3 = test_input($_POST["sub3"]);
	$sub4 = test_input($_POST["sub4"]);
	$sub5 = test_input($_POST["sub5"]);
	
$sql="update student_marks set sub1='".$sub1."',sub2='".$sub2."',sub3='".$sub3."',sub4='".$sub4"',sub5='".$sub5."' where id='".$id."'";
var_dump($sql);

/*
  if ($conn->query($sql) === TRUE) {
	header("Location:class_marks.php?success=success");
	} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	*/
	}
	}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>			
