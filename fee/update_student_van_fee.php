<?php
require("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$id = test_input($_POST["id"]);
	$first_name = test_input($_POST["first_name"]);
	$roll_no = test_input($_POST["roll_no"]);
	$date=date("Y");
	$year=intval($date);
	$next_year=$year+1;
	$academic_year=$year."-".$next_year;
	$present_class = test_input($_POST["present_class"]);
	$section = test_input($_POST["section"]);
	$van_fee = test_input($_POST["van_fee"]);
	$rec_date = test_input($_POST["rec_date"]);
	$rec_no = test_input($_POST["rec_no"]);
	$route_name = test_input($_POST["route_name"]);
	
	
	

  
  $sql_fee="Select van_fee from set_van_fee where academic_year='".$academic_year."' and route_name='".$route_name."'";
  $result_fee=mysqli_query($conn,$sql_fee);
  if($row_fee=mysqli_fetch_array($result_fee,MYSQLI_ASSOC))
	{
		$tot_fee=$row_fee["van_fee"];
	}
  
 
		
		
		 $sql="update student_van_fee set first_name='".$first_name."',roll_no='".$roll_no."',academic_year='".$academic_year."',present_class='".$present_class."',section='".$section."',van_fee='".$van_fee."',rec_date='".$rec_date."',rec_no='".$rec_no."',route_name='".$route_name."' where id='".$id."'";
  
	 if ($conn->query($sql) === TRUE) {
		echo "success";	
		
	}

//var_dump($sql);

header("Location:collected_van_fee.php?success=success");
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}