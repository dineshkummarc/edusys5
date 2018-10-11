<?php
require("connection.php");
error_reporting("0");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$academic_year = test_input($_POST["academic_year"]);
	$class = test_input($_POST["class"]);
	$id = test_input($_POST["id"]);
	if($_POST["section"]){
	$section = test_input($_POST["section"]);	
		}else{
		$section="";
		}
	
	$adm_fee = test_input($_POST["adm_fee"]);
	
	$tot_fee = $adm_fee;
	

  $sql="update set_adm_fee set class='".$class."',academic_year='".$academic_year."',adm_fee='".$adm_fee."',tot_fee='".$tot_fee."' where id='".$id."'";
		  if ($conn->query($sql) === TRUE) {
		  $sql_upd="update students set tot_admis_fee='".$tot_fee."' where present_class='".$class."' and section='".$section."'";
			  $conn->query($sql_upd);
			  var_dump($sql_upd);
			header("Location:set_adm_fee_det.php?status='submitted'");
			} else {
			header("Location:set_adm_fee_det.php?status='failed'");
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
