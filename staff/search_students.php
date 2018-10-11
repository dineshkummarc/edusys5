<?php
require("connection.php");
//connect with the database

//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table
$sql="SELECT first_name,roll_no FROM students WHERE first_name LIKE '%".$searchTerm."%'";

$result=mysqli_query($conn,$sql);

		if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
    $data[] = $row['first_name'];
    $data[] = $row['roll_no'];
}else{
	$data[]="Not Available";
	
}
//return json data
echo json_encode($data);

?>