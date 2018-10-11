<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	//$academic_year = test_input($_POST["academic_year"]);
	$route_name = test_input($_POST["route_name"]);
	$stage_name = test_input($_POST["stage_name"]);
	$van_fee = test_input($_POST["van_fee"]);
	$assign_date = test_input($_POST["assign_date"]);
	
	date_default_timezone_set('Asia/Kolkata');
$today=date('Y-m-d');
	
	$tot_fee = $adm_fee;
	

  $sql="insert into set_van_fee (academic_year,route_name,stage_name,van_fee,assign_date) values('$cur_academic_year','$route_name','$stage_name','$van_fee','$today')";
		  if ($conn->query($sql) === TRUE) {
		   $sql_upd="update students set tot_van_fee='".$tot_fee."' where academic_year='".$cur_academic_year."' and present_class='".$class."'";
			header("Location:set_van_fee.php?status='submitted'");
			} else {
			header("Location:set_van_fee.php?status='failed'");
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
