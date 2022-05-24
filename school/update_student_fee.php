<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
	error_reporting("0");
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$id = test_input($_POST["id"]);
	$tot_paid = test_input($_POST["adm_fee"]);
	$rec_date = test_input($_POST["rec_date"]);
	$rec_no = test_input($_POST["rec_no"]);
	
	$sql="update student_fee set academic_year='".$cur_academic_year."',tot_paid='".$tot_paid."',rec_date='".$rec_date."',rec_no='".$rec_no."' where id='".$id."'";

	if ($conn->query($sql) === TRUE) {
	 	header("Location:student_fee_sms.php?id=".$id);
		} 
		else
		{
		echo "Error: " . $sql . "<br>" . $conn->error;
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
