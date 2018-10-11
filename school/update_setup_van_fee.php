<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
error_reporting("0");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$academic_year = test_input($_POST["academic_year"]);
	$route_name = test_input($_POST["route_name"]);
	$stage_name = test_input($_POST["stage_name"]);
	$id = test_input($_POST["id"]);
	if($_POST["section"]){
	$section = test_input($_POST["section"]);	
		}else{
		$section="";
		}
	
	$adm_fee = test_input($_POST["adm_fee"]);
	
	$tot_fee = $adm_fee;
	

  $sql="update set_van_fee set route_name='".$route_name."',stage_name='".$stage_name."',academic_year='".$cur_academic_year."',van_fee='".$adm_fee."' where id='".$id."'";
  var_dump($sql);
		  if ($conn->query($sql) === TRUE) {
		  $sql_upd="update students set tot_van_fee='".$tot_fee."' where academic_year='".$cur_academic_year."' and present_class='".$class."'";
			  $conn->query($sql_upd);
			  var_dump($sql_upd);
			header("Location:set_van_fee_det.php?status='submitted'");
			} else {
			header("Location:set_van_fee_det.php?status='failed'");
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
