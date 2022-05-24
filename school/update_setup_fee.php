<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
error_reporting("0");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$academic_year = test_input($_POST["academic_year"]);
	$class = test_input($_POST["class"]);
	$fee_towards = test_input($_POST["fee_towards"]);
	$id = test_input($_POST["id"]);
	if($_POST["section"]){
	$section = test_input($_POST["section"]);	
		}else{
		$section="";
		}
	
	$adm_fee = test_input($_POST["adm_fee"]);
	
	$tot_fee = $adm_fee;
	

  $sql="update set_fee set class='".$class."',adm_fee='".$adm_fee."',tot_fee='".$tot_fee."',fee_towards='".$fee_towards."' where id='".$id."'";
	if ($conn->query($sql) === TRUE) {
	header("Location:set_fee_det.php?status='submitted'");
	} else {
	header("Location:set_fee_det.php?status='failed'");
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
