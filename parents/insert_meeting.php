<?php
require("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$meeting_type = test_input($_POST["meeting_type"]);
	$meeting_class = test_input($_POST["meeting_class"]);
	$meeting_name = test_input($_POST["meeting_name"]);
	$meeting_date = test_input($_POST["meeting_date"]);
	$meeting_time = test_input($_POST["meeting_time"]);
	
	$holiday_name = test_input($_POST["holiday_name"]);
	$holiday_type = test_input($_POST["holiday_type"]);
	
	/* 
	$sql_contact="select parent_contact,first_name,roll_no from students where first_name='".$first_name."' and roll_no='".$roll_no."'";
	$result_contact=mysqli_query($conn,$sql_contact);
	if($row_contact=mysqli_fetch_array($result_contact,MYSQLI_ASSOC))
	{
		$parent_contact=$row_contact["parent_contact"];
	} */
	

	$sql="insert into meeting (meeting_type,meeting_class,meeting_name,meeting_date,meeting_time) values('$meeting_type','$meeting_class','$meeting_name','$meeting_date','$meeting_time')";
     var_dump($sql);
		  if ($conn->query($sql) === TRUE) {
			header("Location:meeting_sms.php?meeting_class=".$meeting_class."&meeting_name=".$meeting_name."&meeting_date=".$meeting_date."&meeting_time=".$meeting_time."&meeting_type=".$meeting_type);
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