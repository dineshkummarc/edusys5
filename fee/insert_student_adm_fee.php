<?php
require("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = test_input($_POST["name"]);
	$parent_name = test_input($_POST["parent_name"]);
	$roll_no = test_input($_POST["roll_no"]);
	//$academic_year = test_input($_POST["academic_year"]);
	$date=date("Y");
	$year=intval($date);
	$next_year=$year+1;
			
	$academic_year=$year."-".$next_year;
	$class = test_input($_POST["present_class"]);
	$section = test_input($_POST["section"]);
	$adm_fee = test_input($_POST["adm_fee"]);
	
	$rec_date = test_input($_POST["rec_date"]);
	$rec_no = test_input($_POST["rec_no"]);
	
	$tot_paid = $adm_fee;
	

  
  
  $sql_fee="Select tot_fee from set_adm_fee where academic_year='".$academic_year."' and class='".$class."'";
  $result_fee=mysqli_query($conn,$sql_fee);
  if($row_fee=mysqli_fetch_array($result_fee,MYSQLI_ASSOC))
	{
		$tot_fee=$row_fee["tot_fee"];
	}
  
   
  $sql="insert into student_adm_fee (name,parent_name,roll_no,academic_year,class,section,tot_fee,adm_fee,tot_paid,rec_date,rec_no) values('$name','$parent_name','$roll_no','$academic_year','$class','$section','$tot_fee','$adm_fee','$tot_paid','$rec_date','$rec_no')";
		  if ($conn->query($sql) === TRUE) {
			  $sql_upd="update students set tot_admis_fee='".$tot_fee."' , tot_admis_paid=tot_admis_paid+'".$adm_fee."' where first_name='".$name."' and roll_no='".$roll_no."'";
			  $conn->query($sql_upd);
			header("Location:student_adm_fee_sms.php?name=".$name."&tot_paid=".$tot_paid."&rec_no=".$rec_no."&rec_date=".$rec_date."&roll_no=".$roll_no);
			//header("Location:student_fee_sms.php?status=.'submitted'");
			} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
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
