<?php
require("connection.php");
//connect with the database

//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table
$sql="SELECT first_name FROM students WHERE first_name LIKE '%".$searchTerm."%' ORDER BY first_name ASC";

$result=mysqli_query($conn,$sql);

		if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
    $data[] = $row['first_name'];
}else{
	$data[]="Not Available";
}
//return json data
echo json_encode($data);
?>