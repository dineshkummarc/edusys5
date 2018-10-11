<?php
session_start();
if(isset($_SESSION['lkg_uname'])&&!empty($_SESSION['lkg_pass'])&&!empty($_SESSION['academic_year']))
{
$cur_academic_year = $_SESSION['academic_year'];
require("connection.php");
//connect with the database

//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table
$sql="SELECT book_name FROM books where book_name LIKE '%".$searchTerm."%' ORDER BY book_name ASC";

$result=mysqli_query($conn,$sql);

		if($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
    $data[] = $row['book_name'];
}else{
	$data[]="Not Available";
}
//return json data
echo json_encode($data);
}
?>