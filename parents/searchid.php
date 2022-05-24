<?php
require("connection.php");
//connect with the database

//get search term
$searchId = $_GET['term'];
//get matched data from skills table
$sql="SELECT roll_no FROM students WHERE roll_no LIKE '%".$searchId."%' ORDER BY roll_no ASC";

$result=mysqli_query($conn,$sql);

		if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
    $data[] = $row['roll_no'];
}
//return json data
echo json_encode($data);
?>