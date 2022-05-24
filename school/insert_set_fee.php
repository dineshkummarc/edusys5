<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$class = test_input($_POST["class"]);
	
	$adm_fee = test_input($_POST["adm_fee"]);
	$fee_towards = test_input($_POST["fee_towards"]);
	
	$tot_fee = $adm_fee;
	

  $sql="insert into set_fee (academic_year,class,adm_fee,tot_fee,fee_towards) values('$cur_academic_year','$class','$adm_fee','$tot_fee','$fee_towards')";
  var_dump($sql);
		  if ($conn->query($sql) === TRUE) {
			header("Location:set_fee.php?success='success'");
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
