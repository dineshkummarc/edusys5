<?php
require("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$count = test_input($_GET["count"]);
	
    //for($i=1;$i<$count+1;$i++){
    for($i=0;$i<$count;$i++){
	
	$attendance = test_input($_POST["attendance"][$i]);
	$first_name = test_input($_POST["first_name"][$i]);
	$roll_no = test_input($_POST["roll_no"][$i]);
	echo $attendance;
	echo "<br>";
	echo $first_name;
	echo "<br>";
	echo $roll_no;
	echo "<br>";
	
	$taken_by = test_input($_POST["taken_by"][$i]);
	$tot_class=1;
	if($attendance=="Present"){
		$att_count=1;
	}else{
		$att_count=0;
	}
	
	

	$sql="insert into fac_attendance (first_fname,roll_no,taken_by,attendance,att_date,att_count,tot_class) values('$first_name','$roll_no','$taken_by','$attendance',now(),'$att_count','$tot_class')";
   
	 if ($conn->query($sql) === TRUE) {
		
	var_dump($sql);	
		
        } 
		
  	var_dump($sql);	
}
   header("Location:index.php");
}



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}