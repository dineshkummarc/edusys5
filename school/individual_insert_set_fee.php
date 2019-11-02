<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$first_name = test_input($_POST["first_name"]);
	$roll_no = test_input($_POST["roll_no"]);
	$fee_towards = test_input($_POST["fee_towards"]);
	$class = test_input($_POST["class"]);
	
	$adm_fee = test_input($_POST["adm_fee"]);
	
  $sql="insert into set_fee (first_name,roll_no,academic_year,class,adm_fee,fee_towards) values('$first_name','$roll_no','$cur_academic_year','$class','$adm_fee','$fee_towards')";
  
		  if ($conn->query($sql) === TRUE) {
				  //$sql_upd="update students set tot_fee='".$tot_fee."' where academic_year='".$cur_academic_year."' and present_class='".$class."'";
					//$conn->query($sql_upd);
					//var_dump($sql_upd);
			header("Location:description.php?first_name=".$first_name."&class=".$class."&roll_no=".$roll_no);
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
