<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$count = $_GET["count"];
	$assign_date = date("Y-m-d");
    for($i=0;$i<$count;$i++){
	$subject_name = test_input($_POST["subject_name"][$i]);
	$exam_date = test_input($_POST["exam_date"][$i]);
	$exam_name = test_input($_POST["exam_name"][$i]);
	$start_time = test_input($_POST["start_time"][$i]);
	$end_time = test_input($_POST["end_time"][$i]);
	$academic_year = test_input($_POST["academic_year"][$i]);
	
	$present_class = test_input($_POST["present_class"][$i]);
	$section = test_input($_POST["section"][$i]);
	
if($subject_name!=""){
   $sql="insert into exam_timetable (subject_name,exam_date,exam_name,start_time,end_time,academic_year,present_class,section,assign_date) values('$subject_name','$exam_date','$exam_name','$start_time','$end_time','$cur_academic_year','$present_class','$section','$assign_date')";

  //var_dump($sql);
	 if ($conn->query($sql) === TRUE) {
		echo "success";
	}	
	}	
}
header("Location:exam_timetable.php?success=success");
}
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}