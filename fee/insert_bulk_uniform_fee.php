<?php
require("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$count = $_GET["count"];
	
    for($i=0;$i<$count;$i++){
	$name = test_input($_POST["first_name"][$i]);
	$parent_name = test_input($_POST["father_name"][$i]);
	$roll_no = test_input($_POST["roll_no"][$i]);
	//$academic_year = test_input($_POST["academic_year"]);
	$date=date("Y");
	$year=intval($date);
	$next_year=$year+1;
			
	$academic_year=$year."-".$next_year;
	$class = test_input($_POST["present_class"][$i]);
	$section = test_input($_POST["section"][$i]);
	$adm_fee = test_input($_POST["adm_fee"][$i]);
	
	$rec_date = test_input($_POST["rec_date"][$i]);
	$rec_no = test_input($_POST["rec_no"][$i]);
	
	$tot_paid = $adm_fee;
	

  
  $sql_fee="Select tot_fee from set_uniform_fee where academic_year='".$academic_year."' and class='".$class."'";
  $result_fee=mysqli_query($conn,$sql_fee);
  if($row_fee=mysqli_fetch_array($result_fee,MYSQLI_ASSOC))
	{
		$tot_fee=$row_fee["tot_fee"];
	}
  
    if($adm_fee!=""){
		$sql="insert into student_uniform_fee (name,parent_name,roll_no,academic_year,class,section,tot_fee,adm_fee,tot_paid,rec_date,rec_no) values('$name','$parent_name','$roll_no','$academic_year','$class','$section','$tot_fee','$adm_fee','$tot_paid','$rec_date','$rec_no')";
  
	 if ($conn->query($sql) === TRUE) {
		 $sql_upd="update students set tot_uniform_fee='".$tot_fee."' , tot_uniform_paid=tot_uniform_paid+'".$adm_fee."' where first_name='".$name."' and roll_no='".$roll_no."'";
			  $conn->query($sql_upd);
	}	
  }
  
	
	
  
}
header("Location:bulk_uniform_fee_update.php?success=success");
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}