<?php
require("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$academic_year = test_input($_POST["academic_year"]);
	$class = test_input($_POST["class"]);
	$section = test_input($_POST["section"]);
	$adm_fee = test_input($_POST["adm_fee"]);
	
	/* $tut_fee = test_input($_POST["tut_fee"]);
	$lab_fee = test_input($_POST["lab_fee"]);
	$lib_fee = test_input($_POST["lib_fee"]);
	$sp_fee = test_input($_POST["sp_fee"]);
	$mag_fee = test_input($_POST["mag_fee"]);
	$exa_fee = test_input($_POST["exa_fee"]);
	$bett_fee = test_input($_POST["bett_fee"]);
	$st_wel_fund = test_input($_POST["st_wel_fund"]);
	$teach_wel_fund = test_input($_POST["teach_wel_fund"]);
	$caut_dep = test_input($_POST["caut_dep"]);
	$devp_fund = test_input($_POST["devp_fund"]);
	$medical = test_input($_POST["medical"]);
	$miscel_fee = test_input($_POST["miscel_fee"]); */
	
	$tot_fee = $adm_fee;
	
/* 	
	
 if(isset($_POST['edit_prog_reg'])){
	  $sql_edit="update banned_reg set name='".$name."',memb_id='".$memb_id."',fname='".$fname."',mobile='".$mobile."',reg_date='".$reg_date."',banned_date='".$banned_date."',ban_reason='".$ban_reason."' where id='".$id."'";
	    if ($conn->query($sql_edit) === TRUE) {
			header("Location:banned_reg.php?status=.'edit_submitted'");
			} else {
			echo "Error: " . $sql_edit . "<br>" . $conn->error;
			}
  }else{  */
  
   
  $sql="insert into set_fee (academic_year,class,section,adm_fee,tot_fee) values('$academic_year','$class','$section','$adm_fee','$tot_fee')";
		  if ($conn->query($sql) === TRUE) {
			header("Location:set_fee.php?status='submitted'");
			} else {
			header("Location:set_fee.php?status='failed'");
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
