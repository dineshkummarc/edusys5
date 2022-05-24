<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$id = test_input($_POST["id"]);
	$fee_towards = test_input($_POST["fee_towards"]);
	$individual_fee = test_input($_POST["individual_fee"]);
	
  $sql="insert into set_individual_fee (student_id,individual_fee,fee_towards) values('$id','$individual_fee','$fee_towards')";
  
		  if ($conn->query($sql) === TRUE) {
			header("Location:description.php?id=".$id);
			} else {
			header("Location:individual_set_fee.php?failed='failed'");
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
