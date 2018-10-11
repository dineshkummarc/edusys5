<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$id = test_input($_POST["id"]);
	$name = test_input($_POST["name"]);
	$parent_name = test_input($_POST["parent_name"]);
	$roll_no = test_input($_POST["roll_no"]);
	
	$class = test_input($_POST["present_class"]);
	$section = test_input($_POST["section"]);
	$adm_fee = test_input($_POST["adm_fee"]);
	
	$rec_date = test_input($_POST["rec_date"]);
	$rec_no = test_input($_POST["rec_no"]);
	
 
  $sql="update student_fee set name='".$name."',parent_name='".$parent_name."',roll_no='".$roll_no."',academic_year='".$cur_academic_year."',class='".$class."',section='".$section."',tot_paid='".$adm_fee."',rec_date='".$rec_date."',rec_no='".$rec_no."' where id='".$id."'";

if ($conn->query($sql) === TRUE) {
	 $sql_upd="update students set tot_paid=tot_paid+'".$adm_fee."' where academic_year='".$cur_academic_year."' and first_name='".$name."' and roll_no='".$roll_no."'";
			  $conn->query($sql_upd);
			header("Location:student_fee_sms.php?name=".$name."&tot_paid=".$tot_paid."&rec_no=".$rec_no."&rec_date=".$rec_date."&roll_no=".$roll_no);
			
			} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
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
