<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$id = test_input($_POST["id"]);
	$first_name = test_input($_POST["first_name"]);
	$roll_no = test_input($_POST["roll_no"]);
	$present_class = test_input($_POST["class"]);
	$section = test_input($_POST["section"]);
	$fee_towards = test_input($_POST["fee_towards"]);
	$adm_fee = test_input($_POST["adm_fee"]);
	
	ob_start();
	date_default_timezone_set("Asia/Kolkata");
	$today_date=date("Y-m-d");

	
  
	$sql="update set_fee set first_name='".$first_name."',roll_no='".$roll_no."',class='".$present_class."',section='".$section."',adm_fee='".$adm_fee."',fee_towards='".$fee_towards."',academic_year='".$cur_academic_year."',updated_date='".$today_date."' where id = '".$id."'";
  
  
		  if ($conn->query($sql) === TRUE) {
		  $sql_upd="update students set total_student_fee=total_student_fee+'".$adm_fee."' where first_name='".$first_name."' and roll_no='".$roll_no."' and academic_year='".$cur_academic_year."'";
			  $conn->query($sql_upd);
			  var_dump($sql_upd);
			header("Location:description.php?first_name=".$first_name."&roll_no=".$roll_no."&class=".$present_class."&suceess=success");
			} else {
			header("Location:set_fee.php?failed='failed'");
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
