<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$id = test_input($_POST["id"]);
	$fee_name = test_input($_POST["fee_name"]);
	$fee_details = test_input($_POST["fee_details"]);
	
	ob_start();
	date_default_timezone_set("Asia/Kolkata");
	$today_date=date("Y-m-d");
	
  
  $sql="update fee_name set fee_name='".$fee_name."',fee_details='".$fee_details."',academic_year='".$cur_academic_year."',updated_date='".$today_date."' where id='".$id."'";
		  if ($conn->query($sql) === TRUE) {
			 
			header("Location:all_fee_name.php?success=success");
			
			} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			}
			
	}
	}
			//}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>			
