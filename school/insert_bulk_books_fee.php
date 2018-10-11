<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$count = $_GET["count"];
	
    for($i=0;$i<$count;$i++){
	$name = test_input($_POST["first_name"][$i]);
	$parent_name = test_input($_POST["father_name"][$i]);
	$roll_no = test_input($_POST["roll_no"][$i]);

	$class = test_input($_POST["present_class"][$i]);
	$section = test_input($_POST["section"][$i]);
	$adm_fee = test_input($_POST["adm_fee"][$i]);
	
	$rec_date = test_input($_POST["rec_date"][$i]);
	$rec_no = test_input($_POST["rec_no"][$i]);
	
	$tot_paid = $adm_fee;
	

  
  $sql_fee="Select tot_fee from set_books_fee where academic_year='".$cur_academic_year."' and class='".$class."'";
  $result_fee=mysqli_query($conn,$sql_fee);
  if($row_fee=mysqli_fetch_array($result_fee,MYSQLI_ASSOC))
	{
		$tot_fee=$row_fee["tot_fee"];
	}
  
    if($adm_fee!=""){
		$sql="insert into student_books_fee (name,parent_name,roll_no,academic_year,class,section,tot_fee,adm_fee,tot_paid,rec_date,rec_no) values('$name','$parent_name','$roll_no','$cur_academic_year','$class','$section','$tot_fee','$adm_fee','$tot_paid','$rec_date','$rec_no')";
  
	 if ($conn->query($sql) === TRUE) {
		 $sql_upd="update students set tot_books_fee='".$tot_fee."' , tot_books_paid=tot_books_paid+'".$adm_fee."' where first_name='".$name."' and roll_no='".$roll_no."'";
			  $conn->query($sql_upd);
	}	
  }
  
	
	
  
}
header("Location:bulk_books_fee_update.php?success=success");
}
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}