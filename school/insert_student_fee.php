<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$student_id = test_input($_POST["id"]);
	$adm_fee = test_input($_POST["adm_fee"]);
	
	$rec_date = test_input($_POST["rec_date"]);
	$rec_no = test_input($_POST["rec_no"]);
	$note = test_input($_POST["note"]); //present_class
	$class = test_input($_POST["present_class"]);

	$sql="insert into student_fee (student_id,tot_paid,rec_date,rec_no,note,academic_year,class) values('$student_id','$adm_fee','$rec_date','$rec_no','$note','$cur_academic_year','$class')";
		  if ($conn->query($sql) === TRUE) {
			$last_id = $conn->insert_id;
			header("Location:student_fee_sms.php?id=".$last_id);
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
