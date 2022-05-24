<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$id = test_input($_POST["id"]);
  $student_id = test_input($_POST["student_id"]);
	$fee_towards = test_input($_POST["fee_towards"]);
	$individual_fee = test_input($_POST["individual_fee"]);
	
  $sql = "update set_individual_fee set individual_fee='".$individual_fee."',fee_towards='".$fee_towards."' where id='".$id."'";
  
		  if ($conn->query($sql) === TRUE) {
			header("Location:description.php?id=".$student_id);
			} else {
        header("Location:description.php?id=".$student_id);
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
