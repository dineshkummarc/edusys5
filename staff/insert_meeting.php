<?php
require("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$meeting_type = test_input($_POST["meeting_type"]);
	$meeting_class = test_input($_POST["meeting_class"]);
	$section = test_input($_POST["section"]);
	$meeting_name = test_input($_POST["meeting_name"]);
	$meeting_date = test_input($_POST["meeting_date"]);
	$meeting_time = test_input($_POST["meeting_time"]);
	
	$holiday_name = test_input($_POST["holiday_name"]);
	$holiday_type = test_input($_POST["holiday_type"]);
	


	$sql="insert into meeting (meeting_type,meeting_class,meeting_name,meeting_date,meeting_time) values('$meeting_type','$meeting_class','$meeting_name','$meeting_date','$meeting_time')";
     var_dump($sql);
		  if ($conn->query($sql) === TRUE) {
			header("Location:meeting_sms.php?meeting_class=".$meeting_class."&meeting_name=".$meeting_name."&meeting_date=".$meeting_date."&meeting_time=".$meeting_time."&meeting_type=".$meeting_type."&section=".$section);
			}else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			}
    }


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?> 