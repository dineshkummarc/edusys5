<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
date_default_timezone_set('Asia/Kolkata');
$today=date('Y-m-d');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$count = test_input($_POST["subject"]);

	$class = test_input($_POST["class"]);
	echo $count;

	
	
    for($i=0;$i<$count;$i++){
		$subject_name= test_input($_POST["subject$i"]);

		echo $subject_name;
		echo "<br>";
		echo $_POST["subject.$i"];
		
		$sql="insert into subjects (subject_name,class,date,count,academic_year) values('$subject_name','$class','$today','$count','$cur_academic_year')";
		$conn->query($sql); 
    }
header("Location:add_subj.php?success=success");

}
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?> 