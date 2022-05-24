<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$academic_year = test_input($_POST["academic_year"]);
	$class = test_input($_POST["class"]);
	$section = test_input($_POST["section"]);
	$adm_fee = test_input($_POST["adm_fee"]);
	
	$tot_fee = $adm_fee;
	

  $sql="insert into set_cca_fee (academic_year,class,section,adm_fee,tot_fee) values('$cur_academic_year','$class','$section','$adm_fee','$tot_fee')";
		  if ($conn->query($sql) === TRUE) {
		   $sql_upd="update students set tot_cca_fee='".$tot_fee."' where academic_year='".$cur_academic_year."' and present_class='".$class."'";
		   $conn->query($sql_upd);
		   var_dump($sql_upd);
			header("Location:set_cca_fee.php?status='submitted'");
			} else {
			header("Location:set_cca_fee.php?status='failed'");
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
