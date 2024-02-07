<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$count = $_POST["count"];
	//echo $count;
	$i="";
  for($i=0;$i<=$count;$i++){
	$route_name = test_input($_POST["route_name"][$i]);
	$stage_name = test_input($_POST["stage_name"][$i]);
	$student_id = test_input($_POST["student_id"][$i]);
	$present_class = test_input($_POST["present_class"][$i]);
	$section = test_input($_POST["section"][$i]);
	
	if(($_POST['route_name'][$i])!=""){
			$sql="insert into route_students (student_id,route_name,present_class,section,stage_name,academic_year) values('$student_id','$route_name','$present_class','$section','$stage_name','$cur_academic_year')";
  var_dump($sql);
	 if ($conn->query($sql) === TRUE) {
		echo "success";
		
	}	
  }
  }
  
	
	
  
}
}
//header("Location:route_students.php?success=success");

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}