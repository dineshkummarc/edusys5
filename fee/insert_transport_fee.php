<?php
require("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$count = $_GET["count"];
	
    for($i=0;$i<$count;$i++){
	$first_name = test_input($_POST["first_name"][$i]);
	$roll_no = test_input($_POST["roll_no"][$i]);
	
	$date=date("Y");
	$year=intval($date);
	$next_year=$year+1;
			
	$academic_year=$year."-".$next_year;
	$class = test_input($_POST["present_class"][$i]);
	$section = test_input($_POST["section"][$i]);
	$van_fee = test_input($_POST["van_fee"][$i]);
	
	$rec_date = test_input($_POST["rec_date"][$i]);
	$rec_no = test_input($_POST["rec_no"][$i]);
	$route_name = test_input($_POST["route_name"][$i]);
	$stage_name = test_input($_POST["stage_name"][$i]);
	
	
	

  
  $sql_fee="Select van_fee from set_van_fee where academic_year='".$academic_year."' and route_name='".$route_name."' and stage_name='".$stage_name."'";
  $result_fee=mysqli_query($conn,$sql_fee);
  if($row_fee=mysqli_fetch_array($result_fee,MYSQLI_ASSOC))
	{
		$tot_fee=$row_fee["van_fee"];
	}
  
    if($van_fee!=""){
		$sql="insert into student_van_fee (first_name,roll_no,academic_year,present_class,section,van_fee,rec_date,rec_no,route_name,stage_name) values('$first_name','$roll_no','$academic_year','$class','$section','$van_fee','$rec_date','$rec_no','$route_name','$stage_name')";
  
	 if ($conn->query($sql) === TRUE) {
		echo "success";	
		
	}

var_dump($sql);
  }
  
	
	
  
}
header("Location:transport_fee_update.php?success=success");
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}