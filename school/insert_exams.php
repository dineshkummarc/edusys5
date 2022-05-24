<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
date_default_timezone_set('Asia/Kolkata');
$today=date('Y-m-d');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$count = test_input($_POST["exams"]);

	$class = test_input($_POST["class"]);
	$academic_year = test_input($_POST["academic_year"]);

	for($i=0;$i<$count;$i++){
		$exam_name= test_input($_POST["exams$i"]);
		$sql="insert into exams (exam_name,class,academic_year,date,count) values('$exam_name','$class','$cur_academic_year','$today','$count')";
		$conn->query($sql); 
    }
	header("Location:add_exams.php?success=success");

	}
	}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?> 