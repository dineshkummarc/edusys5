<?php
require("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$academic_year = test_input($_POST["academic_year"]);
	$class = test_input($_POST["class"]);
	if($_POST["section"]){
	$section = test_input($_POST["section"]);	
		}else{
		$section="";
		}
	
	$adm_fee = test_input($_POST["adm_fee"]);
	
	$tot_fee = $adm_fee;
	

  $sql="insert into set_fee (academic_year,class,section,adm_fee,tot_fee) values('$academic_year','$class','$section','$adm_fee','$tot_fee')";
		  if ($conn->query($sql) === TRUE) {
		  $sql_upd="update students set tot_fee='".$tot_fee."' where present_class='".$class."' and section='".$section."'";
			  $conn->query($sql_upd);
			  var_dump($sql_upd);
			//header("Location:set_fee.php?status='submitted'");
			} else {
			//header("Location:set_fee.php?status='failed'");
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
